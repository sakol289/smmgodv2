<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
ob_start();

// var_dump($_SESSION);

$config = require_once '../int/config.php';


if ($_SESSION["neira_userlogin"] != 1  || $user["client_type"] == 1) {
	// echo "คุณไม่มีสิทธิ์เข้าถึงหน้านี้";
	header("Location:/");
}
try {
	$conn = new PDO("mysql:host=" . $config["db"]["host"] . ";dbname=" . $config["db"]["name"] . ";charset=" . $config["db"]["charset"] . ";", $config["db"]["user"], $config["db"]["pass"]);
} catch (PDOException $e) {
	die($e->getMessage());
}

$method       = $conn->prepare("SELECT * FROM payment_methods WHERE method_name='paymentv2'");
$method->execute();
$method       = $method->fetch(PDO::FETCH_ASSOC);
$extras       = json_decode($method["method_extras"], true);

// var_dump($method);
var_dump($extras);

?>

<!DOCTYPE html>
<html lang="th">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CyberSafePayment</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
				<i class="fas fa-check-circle fa-2x"></i><br> <small>ยืนยันสลิป/ลิงก์</small>
			</div>
		</div>

		<div class="row">
			<div class="col-md-4">
				<div class="card mb-4">
					<div class="card-header fw-semibold">ข้อมูลรายการ</div>
					<div class="card-body">
						<!-- <p class="d-flex justify-content-between"><span
								class="text-muted">หมายเลขคำสั่ง</span><code>clj13a2m</code></p> -->
						<p class="d-flex justify-content-between"><span class="text-muted">ประเภทรายการ</span>
							<span class="badge bg-primary">ชำระค่าบริการ</span>
						</p>
						<hr>
						<!-- <p class="d-flex justify-content-between align-items-center">
							<span class="text-muted">ยอดชำระเงิน</span>
							<span class="h5 text-success fw-bold mb-0">100 บาท</span>
						</p> -->
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<div class="card mb-4">
					<div class="card-header fw-semibold">วิธีการยืนยันการชำระเงิน</div>
					<div class="card-body">
						<form id="paymentConfirmationForm" method="POST" action="/confirm-payment" enctype="multipart/form-data">
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
							</div>

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
		<small class="text-muted">&copy; 2025 CyberSafePayment - ระบบชำระเงินออนไลน์ที่ปลอดภัยและรวดเร็ว</small>
		<br>
		<a href="/license" class="text-decoration-none text-primary small mt-2 d-inline-block"><i
				class="fas fa-id-card me-1"></i>License</a>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
	<!-- เพิ่มไลบรารี jsQR -->
	<script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
	<script>
		const paymentTypeSelect = document.getElementById('paymentType');
		const qrSection = document.getElementById('qrSection');
		const angpaoSection = document.getElementById('angpaoSection');
		const paymentSlipInput = document.getElementById('paymentSlip');
		const uploadButtonLabel = document.getElementById('uploadButtonLabel');
		const uploadStatus = document.getElementById('uploadStatus');
		const qrError = document.getElementById('qrError');
		const submitButton = document.getElementById('submitButton');

		paymentTypeSelect.addEventListener('change', function() {
			if (this.value === 'angpao') {
				qrSection.classList.add('d-none');
				angpaoSection.classList.remove('d-none');
				submitButton.disabled = false; // เปิดใช้งานปุ่มสำหรับซองอั่งเปา
				qrError.classList.add('d-none');
			} else {
				qrSection.classList.remove('d-none');
				angpaoSection.classList.add('d-none');
				submitButton.disabled = true; // ปิดใช้งานปุ่มจนกว่าสลิปจะถูกตรวจสอบ
			}
		});

		paymentSlipInput.addEventListener('change', function() {
			if (this.files && this.files.length > 0) {
				const file = this.files[0];
				uploadButtonLabel.textContent = `📁 ${file.name}`;
				uploadStatus.textContent = 'กำลังตรวจสอบ QR Code...';

				// อ่านไฟล์ภาพ
				const reader = new FileReader();
				reader.onload = function(e) {
					const img = new Image();
					img.onload = function() {
						// สร้าง canvas เพื่อประมวลผลภาพ
						const canvas = document.createElement('canvas');
						const ctx = canvas.getContext('2d');
						canvas.width = img.width;
						canvas.height = img.height;
						ctx.drawImage(img, 0, 0, img.width, img.height);

						// ใช้ jsQR เพื่ออ่าน QR Code
						const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
						const code = jsQR(imageData.data, imageData.width, imageData.height);

						if (code) {
							// QR Code อ่านได้
							uploadStatus.textContent = 'ตรวจพบ QR Code สำเร็จ';
							qrError.classList.add('d-none');
							submitButton.disabled = false; // เปิดใช้งานปุ่มยืนยัน
							// ตัวเลือก: เก็บข้อมูล QR Code หากต้องการตรวจสอบ
							console.log('QR Code Data:', code.data);
						} else {
							// QR Code อ่านไม่ได้
							uploadStatus.textContent = 'เลือกรูปภาพสลิปการโอน';
							qrError.classList.remove('d-none');
							submitButton.disabled = true; // ปิดใช้งานปุ่มยืนยัน
						}
					};
					img.src = e.target.result;
				};
				reader.readAsDataURL(file);
			} else {
				uploadButtonLabel.textContent = '📁 อัปโหลดรูป';
				uploadStatus.textContent = 'เลือกรูปภาพสลิปการโอน';
				qrError.classList.add('d-none');
				submitButton.disabled = true;
			}
		});
	</script>
</body>

</html>