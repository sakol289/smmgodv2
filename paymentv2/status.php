<?php
// ตรวจสอบ GET parameters
$status = isset($_GET['status']) ? htmlspecialchars($_GET['status']) : 'unknown';
$transaction_id = isset($_GET['transaction_id']) ? htmlspecialchars($_GET['transaction_id']) : 'N/A';
$amount = isset($_GET['amount']) ? htmlspecialchars($_GET['amount']) : 'N/A';
$payment_date = isset($_GET['date']) ? htmlspecialchars($_GET['date']) : date('Y-m-d H:i:s');
$error_message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สถานะการชำระเงิน</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+Thai:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Noto Serif Thai', serif; }
        .animate-pulse-once { animation: pulse 0.5s ease-in-out; }
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .gradient-bg { background: linear-gradient(135deg, #1e3a8a 0%, #3b0764 100%); }
        .gold-accent { color: #d4af37; }
    </style>
</head>
<body class="gradient-bg min-h-screen flex items-center justify-center">
    <div class="bg-white bg-opacity-95 p-10 rounded-2xl shadow-2xl max-w-lg w-full transform transition-all duration-300">
        <h1 class="text-3xl font-bold text-center mb-8 gold-accent">
            <?php echo $status === 'success' ? 'การชำระเงินสำเร็จ' : 'การชำระเงินไม่สำเร็จ'; ?>
        </h1>
        
        <div class="space-y-6">
            <?php if ($status === 'success'): ?>
                <div class="text-center animate-pulse-once">
                    <svg class="mx-auto h-16 w-16 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <p class="text-green-700 font-semibold text-lg mt-3">ชำระเงินเรียบร้อยแล้ว!</p>
                </div>
                
                <div class="border-t border-gray-200 pt-6 space-y-3">
                    <p class="text-gray-800"><strong class="gold-accent">เลขประวัติการโอน:</strong> <?php echo $transaction_id; ?></p>
                    <p class="text-gray-800"><strong class="gold-accent">จำนวนเงิน:</strong> <?php echo number_format($amount, 2); ?> บาท</p>
                    <p class="text-gray-800"><strong class="gold-accent">วันที่ชำระ:</strong> <?php echo $payment_date; ?></p>
                </div>
            <?php else: ?>
                <div class="text-center animate-pulse-once">
                    <svg class="mx-auto h-16 w-16 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <p class="text-red-700 font-semibold text-lg mt-3">เกิดข้อผิดพลาด!</p>
                </div>
                
                <div class="border-t border-gray-200 pt-6 space-y-3">
                    <p class="text-gray-800"><strong class="gold-accent">สาเหตุ:</strong> <?php echo $error_message ?: 'ไม่ทราบสาเหตุ'; ?></p>
                    <p class="text-gray-800"><strong class="gold-accent">เลขประวัติการโอน:</strong> <?php echo $transaction_id; ?></p>
                    <p class="text-gray-800"><strong class="gold-accent">วันที่:</strong> <?php echo $payment_date; ?></p>
                </div>
            <?php endif; ?>
            
            <div class="text-center mt-8">
                <a href="/" class="inline-block bg-gradient-to-r from-blue-900 to-purple-900 text-white px-8 py-3 rounded-full hover:from-blue-800 hover:to-purple-800 transition-all duration-300 shadow-lg">
                    กลับสู่หน้าหลัก
                </a>
            </div>
        </div>
    </div>
</body>
</html>