<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
ob_start();

$config = require_once '../int/config.php';

// ตรวจสอบการล็อกอิน
if (!isset($_SESSION["neira_userlogin"]) || $_SESSION["neira_userlogin"] != 1 || (isset($user["client_type"]) && $user["client_type"] == 1)) {
    header("Location: /");
    exit;
}

if (!isset($_SESSION["cybersafepayment"])) {
    header("Location: /paymentv2/status.php?error=ห้ามเข้าโดยไม่ได้รับอนุญาต");
    exit;
}

try {
    $conn = new PDO(
        "mysql:host=" . $config["db"]["host"] . ";dbname=" . $config["db"]["name"] . ";charset=" . $config["db"]["charset"],
        $config["db"]["user"],
        $config["db"]["pass"]
    );
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ข้อผิดพลาด: " . $e->getMessage());
}

$method = $conn->prepare("SELECT * FROM payment_methods WHERE method_name = 'paymentv2'");
$method->execute();
$method = $method->fetch(PDO::FETCH_ASSOC);

if (!$method || empty($method["method_extras"])) {
    die("ข้อผิดพลาด: ไม่พบข้อมูลวิธีการชำระเงินหรือ method_extras ว่าง");
}

$extras = json_decode($method["method_extras"], true);
if (json_last_error() !== JSON_ERROR_NONE || empty($extras['imageqrcode'])) {
    die("ข้อผิดพลาด: ไม่สามารถถอดรหัส method_extras หรือไม่มี imageqrcode");
}

$settings = $conn->prepare('SELECT * FROM settings WHERE id=:id');
$settings->execute(array('id' => 1));
$settings = $settings->fetch(PDO::FETCH_ASSOC);

// กำหนด reCAPTCHA site key
$recaptchaSiteKey = $settings['recaptcha_key'];
?>
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CyberSafePayment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="bg-light">

    <header class="bg-white border-bottom shadow-sm sticky-top py-3">
        <div class="container d-flex align-items-center justify-content-center">
            <a href="/" class="d-flex align-items-center text-decoration-none text-dark">
                <div class="bg-primary text-white rounded d-flex align-items-center justify-content-center me-2"
                    style="width: 32px; height: 32px;">
                    <i class="fas fa-check"></i>
                </div>
                <h1 class="h5 fw-bold m-0">CyberSafePayment</h1>
            </a>
        </div>
    </header>

    <main class="container py-5">
        <div class="mb-4">
            <h2 class="h4 fw-bold">ตรวจสอบการชำระเงิน</h2>
            <p class="text-muted">เลือกประเภทการโอนเงินเพื่อดำเนินการ</p>
        </div>

        <div class="d-flex justify-content-between mb-5">
            <div class="text-center text-success">
                <i class="fas fa-check-circle fa-2x"></i><br><small>เลือกรายการ</small>
            </div>
            <div class="text-center text-success">
                <i class="fas fa-check-circle fa-2x"></i><br><small>ยืนยันการชำระเงิน</small>
            </div>
            <div class="text-center text-primary">
                <i class="fas fa-check-circle fa-2x"></i><br><small>ยืนยันสลิป/ลิงก์</small>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header fw-semibold">ข้อมูลรายการ</div>
                    <div class="card-body">
                        <p class="d-flex justify-content-between"><span class="text-muted">ประเภทรายการ</span>
                            <span class="badge bg-primary">ชำระค่าบริการ</span>
                        </p>
                        <hr>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header fw-semibold">วิธีการยืนยันการชำระเงิน</div>
                    <div class="card-body">
                        <form id="paymentConfirmationForm" method="POST" action="/payment/paymentv2" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="paymentType" class="form-label">เลือกประเภทการชำระเงิน</label>
                                <select class="form-select" id="paymentType" name="paymentType">
                                    <option value="qr" selected>โอนเงินผ่านพร้อมเพย์</option>
                                    <option value="angpao">ซองอั่งเปา</option>
                                </select>
                            </div>

                            <div id="qrSection">
                                <div class="mb-4">
                                    <p class="mb-2">📌 สแกน QR นี้ผ่านแอปธนาคารของคุณ:</p>
                                    <div class="border p-3 text-center rounded">
                                        <img src="<?php echo htmlspecialchars($extras['imageqrcode']); ?>" alt="QR Code พร้อมเพย์" class="img-fluid rounded">
                                    </div>
                                </div>

                                <div id="slipUpload">
                                    <label for="paymentSlip" class="form-label">อัปโหลดสลิป</label>
                                    <div class="border border-dashed border-secondary rounded p-4 text-center bg-white">
                                        <i class="fas fa-file-upload fa-2x text-muted mb-2"></i>
                                        <p class="text-muted mb-2" id="uploadStatus">เลือกรูปภาพสลิปการโอน</p>
                                        <label for="paymentSlip" class="btn btn-primary" id="uploadButtonLabel">📁 อัปโหลดรูป</label>
                                        <input type="file" id="paymentSlip" name="paymentSlip" accept="image/*" class="d-none">
                                    </div>
                                    <div id="qrError" class="text-danger small mt-2 d-none">ไม่สามารถอ่าน QR Code ได้ กรุณาอัปโหลดสลิปที่มี QR Code ชัดเจน</div>
                                </div>
                            </div>

                            <div id="angpaoSection" class="d-none">
                                <label for="angpaoLink" class="form-label">ลิงก์ซองอั่งเปา</label>
                                <input type="url" class="form-control" id="angpaoLink" name="angpaoLink" placeholder="วางลิงก์ซองอั่งเปาที่นี่">
                                <div id="angpaoError" class="text-danger small mt-2 d-none">กรุณากรอกลิงก์ซองอั่งเปาที่ถูกต้อง</div>
                            </div>

                            <div class="mb-3">
                                <div class="g-recaptcha" data-sitekey="<?php echo htmlspecialchars($recaptchaSiteKey); ?>" data-callback="recaptchaCallback"></div>
                                <div id="recaptchaError" class="text-danger small mt-2 d-none">กรุณายืนยันว่าไม่ใช่บอท</div>
                            </div>

                            <input type="hidden" id="idkey" name="idkey">
                            <input type="hidden" id="payment_method" name="payment_method">
                            <input type="hidden" id="status" name="status">

                            <div class="alert alert-warning small mt-4">
                                <strong>คำแนะนำ:</strong>
                                <ul class="mb-1 ps-3">
                                    <li>ทำรายการภายในเวลาที่กำหนด 5-10 นาที</li>
                                    <li>ห้ามใช้สลิปที่ซ้ำหากพบทางเราจะทำการแบน</li>
                                </ul>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 mt-4" id="submitButton" disabled>ยืนยันการชำระเงิน</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="#" class="btn btn-link text-decoration-none"><i
                    class="fas fa-arrow-left me-2"></i>กลับไปหน้าชำระเงิน</a>
        </div>
    </main>

    <footer class="bg-white border-top text-center py-4 mt-5">
        <small class="text-muted">© 2025 CyberSafePayment - ระบบชำระเงินออนไลน์ที่ปลอดภัยและรวดเร็ว</small>
        <br>
        <a href="/license" class="text-decoration-none text-primary small mt-2 d-inline-block"><i
                class="fas fa-id-card me-1"></i>License</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script>
        const paymentTypeSelect = document.getElementById('paymentType');
        const qrSection = document.getElementById('qrSection');
        const angpaoSection = document.getElementById('angpaoSection');
        const paymentSlipInput = document.getElementById('paymentSlip');
        const uploadButtonLabel = document.getElementById('uploadButtonLabel');
        const uploadStatus = document.getElementById('uploadStatus');
        const qrError = document.getElementById('qrError');
        const angpaoError = document.getElementById('angpaoError');
        const submitButton = document.getElementById('submitButton');
        const form = document.getElementById('paymentConfirmationForm');
        const idkeyInput = document.getElementById('idkey');
        const paymentMethodInput = document.getElementById('payment_method');
        const statusInput = document.getElementById('status');
        const angpaoLinkInput = document.getElementById('angpaoLink');
        const recaptchaError = document.getElementById('recaptchaError');

        let qrCodeData = null;

        // อัปเดตค่าเริ่มต้น
        paymentMethodInput.value = 'slip';
        statusInput.value = 'false';

        paymentTypeSelect.addEventListener('change', function() {
            qrCodeData = null;
            idkeyInput.value = '';
            statusInput.value = 'false';
            paymentMethodInput.value = this.value === 'qr' ? 'slip' : 'angpao';
            submitButton.disabled = true;
            qrError.classList.add('d-none');
            angpaoError.classList.add('d-none');
            recaptchaError.classList.add('d-none');
            paymentSlipInput.value = ''; // รีเซ็ตไฟล์อัปโหลด
            uploadButtonLabel.textContent = '📁 อัปโหลดรูป';
            uploadStatus.textContent = 'เลือกรูปภาพสลิปการโอน';

            if (this.value === 'angpao') {
                qrSection.classList.add('d-none');
                angpaoSection.classList.remove('d-none');
                validateAngpaoLink();
            } else {
                qrSection.classList.remove('d-none');
                angpaoSection.classList.add('d-none');
            }
            checkFormValidity();
        });

        paymentSlipInput.addEventListener('change', function() {
            if (this.files && this.files.length > 0) {
                const file = this.files[0];
                uploadButtonLabel.textContent = `📁 ${file.name}`;
                uploadStatus.textContent = 'กำลังตรวจสอบ QR Code...';

                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        const canvas = document.createElement('canvas');
                        const ctx = canvas.getContext('2d');
                        canvas.width = img.width;
                        canvas.height = img.height;
                        ctx.drawImage(img, 0, 0, img.width, img.height);

                        const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                        const code = jsQR(imageData.data, imageData.width, imageData.height);

                        if (code) {
                            uploadStatus.textContent = 'ตรวจพบ QR Code สำเร็จ';
                            qrError.classList.add('d-none');
                            qrCodeData = code.data;
                            idkeyInput.value = qrCodeData;
                            statusInput.value = 'true';
                            paymentMethodInput.value = 'slip';
                            checkFormValidity();
                        } else {
                            uploadStatus.textContent = 'เลือกรูปภาพสลิปการโอน';
                            qrError.classList.remove('d-none');
                            qrCodeData = null;
                            idkeyInput.value = '';
                            statusInput.value = 'false';
                            submitButton.disabled = true;
                        }
                    };
                    img.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                uploadButtonLabel.textContent = '📁 อัปโหลดรูป';
                uploadStatus.textContent = 'เลือกรูปภาพสลิปการโอน';
                qrError.classList.add('d-none');
                qrCodeData = null;
                idkeyInput.value = '';
                statusInput.value = 'false';
                submitButton.disabled = true;
            }
        });

        angpaoLinkInput.addEventListener('input', validateAngpaoLink);

        function validateAngpaoLink() {
            const link = angpaoLinkInput.value.trim();
            if (link && isValidUrl(link)) {
                idkeyInput.value = link;
                statusInput.value = 'true';
                paymentMethodInput.value = 'angpao';
                angpaoError.classList.add('d-none');
                checkFormValidity();
            } else {
                idkeyInput.value = '';
                statusInput.value = 'false';
                angpaoError.classList.remove('d-none');
                submitButton.disabled = true;
            }
        }

        function isValidUrl(string) {
            try {
                new URL(string);
                return true;
            } catch (_) {
                return false;
            }
        }

        function checkFormValidity() {
            const recaptchaResponse = grecaptcha.getResponse();
            const isQrValid = paymentTypeSelect.value === 'qr' && qrCodeData && statusInput.value === 'true';
            const isAngpaoValid = paymentTypeSelect.value === 'angpao' && idkeyInput.value && statusInput.value === 'true';

            if ((isQrValid || isAngpaoValid) && recaptchaResponse) {
                submitButton.disabled = false;
                recaptchaError.classList.add('d-none');
            } else {
                submitButton.disabled = true;
                if (!recaptchaResponse) {
                    recaptchaError.classList.remove('d-none');
                }
            }
        }

        function recaptchaCallback() {
            recaptchaError.classList.add('d-none');
            checkFormValidity();
        }

        // ตรวจสอบฟอร์มเมื่อโหลดหน้า
        checkFormValidity();
    </script>
</body>
</html>