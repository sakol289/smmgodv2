<?php include 'header.php'; ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-5sAR7xN1Nv6AKZb1r1lQF8V1p5l9yy+1Q1Zt1Q1Zt1Q1Zt1Q1Zt1Q1Zt1Q1Zt1Q1" crossorigin="anonymous" onerror="console.warn('Bootstrap CDN failed. Some styling may be missing.');">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" onerror="console.warn('Font Awesome CDN failed. Icons may be missing.');">
<style>
.card {
  border: none;
  border-radius: 6px;
  transition: all 0.3s ease;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}
.chart-container {
  position: relative;
  height: 300px;
  width: 100%;
}
.alert {
  margin: 10px;
  font-size: 14px;
}
/* Card summary styles for both themes */
.summary-card {
  border: none;
  border-radius: 18px;
  box-shadow: 0 4px 24px rgba(0,0,0,0.10), 0 1.5px 4px rgba(0,0,0,0.08);
  background: linear-gradient(135deg, #f8fafc 60%, #e9ecef 100%);
  padding: 24px 20px 20px 20px;
  margin-bottom: 24px;
  transition: box-shadow 0.3s, background 0.3s;
  position: relative;
  overflow: hidden;
}
.summary-card:hover {
  box-shadow: 0 8px 32px rgba(0,0,0,0.18), 0 2px 8px rgba(0,0,0,0.12);
  background: linear-gradient(135deg, #f1f3f7 60%, #e2e6ea 100%);
}
.summary-card .summary-icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 56px;
  height: 56px;
  border-radius: 50%;
  background: linear-gradient(135deg, #e0e7ff 60%, #c7d2fe 100%);
  box-shadow: 0 2px 8px rgba(67,97,238,0.10);
  font-size: 2.2rem;
  color: #4361ee;
  margin-right: 18px;
  flex-shrink: 0;
}
.summary-card .summary-content {
  flex: 1;
}
.summary-card .summary-title {
  font-size: 13px;
  color: #6c757d;
  font-weight: 500;
  margin-bottom: 2px;
}
.summary-card .summary-value {
  font-size: 2.1rem;
  font-weight: bold;
  color: #222;
  margin-bottom: 4px;
}
.summary-card .summary-change {
  font-size: 14px;
  font-weight: 400;
}
/* Theme: dark mode */
.dark-mode .summary-card {
  background: linear-gradient(135deg, #23272f 60%, #181a20 100%);
  box-shadow: 0 4px 24px rgba(0,0,0,0.40), 0 1.5px 4px rgba(0,0,0,0.18);
}
.dark-mode .summary-card:hover {
  background: linear-gradient(135deg, #23272f 60%, #23272f 100%);
}
.dark-mode .summary-card .summary-title {
  color: #b0b8c1;
}
.dark-mode .summary-card .summary-value {
  color: #fff;
}
.dark-mode .summary-card .summary-icon {
  background: linear-gradient(135deg, #2d3a5a 60%, #1e2746 100%);
  color: #7da0fa;
}
.summary-row {
  margin-left: -10px;
  margin-right: -10px;
  display: flex;
  flex-wrap: wrap;
}
.summary-col {
  padding-left: 10px;
  padding-right: 10px;
  margin-bottom: 20px;
  width: 100%;
}
@media (min-width: 768px) {
  .summary-col { width: 33.3333%; }
}
@media (min-width: 1200px) {
  .summary-col { width: 16.6666%; }
}
@media (max-width: 767px) {
  .summary-row { flex-direction: column; }
  .summary-col { width: 100%; }
  .card, .summary-card { padding: 16px 8px 12px 8px; }
  .chart-container { height: 200px; }
  .table-responsive, .table { width: 100%; overflow-x: auto; }
}
</style>

<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// ดึงข้อมูลจาก DB
$total_customers = $conn->query("SELECT COUNT(*) FROM clients")->fetchColumn();
$new_customers_today = $conn->query("SELECT COUNT(*) FROM clients WHERE DATE(register_date) = CURDATE()")->fetchColumn();
$total_balance = $conn->query("SELECT SUM(payment_amount) FROM payments WHERE payment_status='3'")->fetchColumn();
$total_orders = $conn->query("SELECT COUNT(*) FROM orders")->fetchColumn();
$orders_today = $conn->query("SELECT COUNT(*) FROM orders WHERE DATE(order_create) = CURDATE()")->fetchColumn();
$revenue_today = $conn->query("SELECT SUM(payment_amount) FROM payments WHERE payment_status='3' AND DATE(payment_create_date) = CURDATE()")->fetchColumn();

// รายได้แต่ละเดือน 12 เดือนล่าสุด
$monthly_revenue = [];
$thai_months = ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
$monthly_labels = [];
$monthly_data = [];
for($i=11;$i>=0;$i--) {
    $month = date('Y-m', strtotime("-$i months"));
    $label = $thai_months[(int)date('m', strtotime($month))-1];
    $monthly_labels[] = $label;
    $sum = $conn->query("SELECT SUM(payment_amount) FROM payments WHERE payment_status='3' AND DATE_FORMAT(payment_create_date, '%Y-%m') = '$month'")->fetchColumn();
    $monthly_data[] = floatval($sum);
}

// รายได้รายวันในเดือนปัจจุบัน
$current_month = date('Y-m');
$current_month_days = date('t'); // จำนวนวันในเดือนปัจจุบัน
$daily_revenue_labels = [];
$daily_revenue_data = [];
for($day=1;$day<=$current_month_days;$day++) {
    $date = sprintf('%s-%02d', $current_month, $day);
    $daily_revenue_labels[] = $day;
    $sum = $conn->query("SELECT SUM(payment_amount) FROM payments WHERE payment_status='3' AND DATE(payment_create_date) = '$date'")->fetchColumn();
    $daily_revenue_data[] = floatval($sum);
}

// ฟังก์ชันแปลงวันที่เป็นไทยแบบสั้น
function thai_date_short($date) {
  $thai_months = ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
  $d = date('j', strtotime($date));
  $m = $thai_months[(int)date('m', strtotime($date))-1];
  return "$d $m";
}
// วันที่วันนี้ (ภาษาไทย)
function thai_date($date) {
    $thai_months = ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
    $d = date('j', strtotime($date));
    $m = $thai_months[(int)date('m', strtotime($date))-1];
    $y = date('Y', strtotime($date)) + 543;
    return "$d $m $y";
}
function thai_date_time($date) {
  $thai_months = ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.'];
  $d = date('j', strtotime($date));
  $m = $thai_months[(int)date('m', strtotime($date))-1];
  $y = date('Y', strtotime($date)) + 543;
  $time = date('H:i', strtotime($date));
  return "$d $m $y $time";
}
$today_th = thai_date(date('Y-m-d'));

// สถานะทั้งหมดและ label ภาษาไทย
$order_statuses = [
  'pending' => 'รอดำเนินการ',
  'inprogress' => 'กำลังทำ',
  'completed' => 'เสร็จสิ้น',
  'partial' => 'สำเร็จบางส่วน',
  'processing' => 'กำลังตรวจสอบ',
  'canceled' => 'ยกเลิก'
];

// กราฟเส้น: Order Status เดือนปัจจุบัน
$days = [];
$order_data = [];
foreach ($order_statuses as $status => $th_label) {
  $order_data[$status] = [];
}
for($day=1;$day<=$current_month_days;$day++) {
  $date = sprintf('%s-%02d', $current_month, $day);
  $days[] = $day; // ใช้เลขวันที่แทน
  foreach ($order_statuses as $status => $th_label) {
    $count = $conn->query("SELECT COUNT(*) FROM orders WHERE order_status='$status' AND DATE(order_create) = '$date'")->fetchColumn();
    $order_data[$status][] = intval($count);
  }
}

// Pie Chart: Order Status Distribution วันนี้
$order_status_pie = [];
foreach ($order_statuses as $status => $th_label) {
  $order_status_pie[] = $conn->query("SELECT COUNT(*) FROM orders WHERE order_status='$status'")->fetchColumn();
}

// var_dump($total_customers, $new_customers_today, $total_balance, $total_orders, $orders_today, $revenue_today);

// Top 5 Best-Selling Services (by order count)
$top_services = $conn->query("
  SELECT s.service_name, c.category_name, COUNT(o.order_id) as orders, SUM(o.order_charge) as revenue
  FROM orders o
  JOIN services s ON o.service_id = s.service_id
  JOIN categories c ON s.category_id = c.category_id
  WHERE o.order_status IN ('completed','partial')
  GROUP BY o.service_id
  ORDER BY orders DESC
  LIMIT 5
")->fetchAll(PDO::FETCH_ASSOC);

// Latest Orders
$latest_orders = $conn->query("
  SELECT o.*, c.username
  FROM orders o
  JOIN clients c ON o.client_id = c.client_id
  ORDER BY o.order_create DESC
  LIMIT 10
")->fetchAll(PDO::FETCH_ASSOC);

// Orders with working time > 1 day
$long_orders = $conn->query("
  SELECT o.*, c.username, s.service_name,
    TIMESTAMPDIFF(HOUR, o.order_create, NOW()) as hours_diff
  FROM orders o
  JOIN clients c ON o.client_id = c.client_id
  JOIN services s ON o.service_id = s.service_id
  WHERE TIMESTAMPDIFF(HOUR, o.order_create, NOW()) > 24
    AND o.order_status NOT IN ('partial', 'canceled', 'completed')
  ORDER BY o.order_create ASC
  LIMIT 20
")->fetchAll(PDO::FETCH_ASSOC);




$status_labels = [
  'pending' => 'รอดำเนินการ',
  'inprogress' => 'กำลังทำ',
  'completed' => 'เสร็จสิ้น',
  'partial' => 'สำเร็จบางส่วน',
  'processing' => 'กำลังตรวจสอบ',
  'canceled' => 'ยกเลิก'
];

// --- Slow services: average completion time over 6 hours from last 10 completed orders ---
$slow_services = [];
$services = $conn->query("SELECT service_id, service_name FROM services")->fetchAll(PDO::FETCH_ASSOC);
foreach ($services as $service) {
    $orders = $conn->prepare("SELECT order_create, last_check FROM orders WHERE service_id=? AND order_status='completed' AND last_check IS NOT NULL AND order_create IS NOT NULL ORDER BY order_id DESC LIMIT 10");
    $orders->execute([$service['service_id']]);
    $orders = $orders->fetchAll(PDO::FETCH_ASSOC);
    $sum = 0;
    $valid = 0;
    foreach ($orders as $order) {
        $start = strtotime($order['order_create']);
        $end = strtotime($order['last_check']);
        if ($start && $end && $end > $start + 900) {
            $duration = ($end - 900) - $start;
            if ($duration > 0) {
                $sum += $duration;
                $valid++;
            }
        }
    }
    if ($valid < 2) continue;
    $avg = $sum / $valid;
    if ($avg > 21600) { // 6 hours
        $hours = floor($avg / 3600);
        $minutes = floor(($avg % 3600) / 60);
        $slow_services[] = [
            'service_id' => $service['service_id'],
            'service_name' => $service['service_name'],
            'avg_text' => "{$hours} ชม. {$minutes} นาที",
            'avg_seconds' => round($avg)
        ];
    }
}
?>

<div class="container-fluid">
  <!-- Summary Cards -->
  <div class="summary-row">
    <div class="summary-col">
      <div class="summary-card d-flex align-items-center">
        <div class="summary-icon"><i class="fa fa-users"></i></div>
        <div class="summary-content">
          <div class="summary-title">ลูกค้าทั้งหมด</div>
          <div class="summary-value"><?=number_format($total_customers)?></div>
          <div class="summary-change text-success"><i class="fa fa-arrow-up"></i> <?=number_format($new_customers_today)?> <small>ลูกค้าใหม่วันนี้</small></div>
        </div>
      </div>
    </div>
    <div class="summary-col">
      <div class="summary-card d-flex align-items-center">
        <div class="summary-icon" style="background:linear-gradient(135deg,#d1fae5 60%,#a7f3d0 100%);color:#10b981;"><i class="fa fa-wallet"></i></div>
        <div class="summary-content">
          <div class="summary-title">ยอดเติมเงินรวมทั้งหมด</div>
          <div class="summary-value">฿<?=number_format($total_balance,2)?></div>
          <div class="summary-change text-info"><i class="fa fa-calendar-day"></i> <?=$today_th?></div>
        </div>
      </div>
    </div>
    <div class="summary-col">
      <div class="summary-card d-flex align-items-center">
        <div class="summary-icon" style="background:linear-gradient(135deg,#fef9c3 60%,#fde68a 100%);color:#f59e42;"><i class="fa fa-shopping-cart"></i></div>
        <div class="summary-content">
          <div class="summary-title">ออเดอร์ทั้งหมด</div>
          <div class="summary-value"><?=number_format($total_orders)?></div>
          <div class="summary-change text-info"><i class="fa fa-calendar-day"></i> <?=$today_th?></div>
        </div>
      </div>
    </div>
    <div class="summary-col">
      <div class="summary-card d-flex align-items-center">
        <div class="summary-icon" style="background:linear-gradient(135deg,#fbc2eb 60%,#a6c1ee 100%);color:#f72585;"><i class="fa fa-chart-bar"></i></div>
        <div class="summary-content">
          <div class="summary-title">รายได้วันนี้</div>
          <div class="summary-value">฿<?=number_format($revenue_today,2)?></div>
          <div class="summary-change text-info"><i class="fa fa-calendar-day"></i> <?=$today_th?></div>
        </div>
      </div>
    </div>
    <div class="summary-col">
      <div class="summary-card d-flex align-items-center">
        <div class="summary-icon" style="background:linear-gradient(135deg,#c7d2fe 60%,#818cf8 100%);color:#3730a3;"><i class="fa fa-user-plus"></i></div>
        <div class="summary-content">
          <div class="summary-title">ลูกค้าใหม่วันนี้</div>
          <div class="summary-value"><?=number_format($new_customers_today)?></div>
          <div class="summary-change text-info"><i class="fa fa-calendar-day"></i> <?=$today_th?></div>
        </div>
      </div>
    </div>
    <div class="summary-col">
      <div class="summary-card d-flex align-items-center">
        <div class="summary-icon" style="background:linear-gradient(135deg,#fca5a5 60%,#f87171 100%);color:#b91c1c;"><i class="fa fa-receipt"></i></div>
        <div class="summary-content">
          <div class="summary-title">ออเดอร์วันนี้</div>
          <div class="summary-value"><?=number_format($orders_today)?></div>
          <div class="summary-change text-info"><i class="fa fa-calendar-day"></i> <?=$today_th?></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts Row -->
  <div class="row">
    <!-- Monthly Order Status -->
    <div class="col-md-8 mb-4">
      <div class="card">
        <div class="card-header"><strong>Order Status - เดือนปัจจุบัน (<?=date('F Y')?>)</strong></div>
        <div class="card-body">
          <div class="chart-container">
            <canvas id="monthlyOrderChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- Order Status Distribution -->
    <div class="col-md-4 mb-4">
      <div class="card">
        <div class="card-header"><strong>Order Status Distribution</strong></div>
        <div class="card-body">
          <div class="chart-container">
            <canvas id="statusPieChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Monthly Revenue (Line Chart) -->
  <div class="card mb-4" style="margin-top:30px;">
    <div class="card-header"><strong>รายได้รายเดือน (12 เดือนล่าสุด)</strong></div>
    <div class="card-body">
      <div class="chart-container">
        <canvas id="monthlyRevenueChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Daily Revenue (Line Chart) -->
  <div class="card mb-4">
    <div class="card-header"><strong>รายได้รายวันในเดือนปัจจุบัน (<?=date('F Y')?>)</strong></div>
    <div class="card-body">
      <div class="chart-container">
        <canvas id="dailyRevenueChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Top 5 Services -->
  <div class="card mb-4">
    <div class="card-header"><strong>Top 5 Best-Selling Services</strong></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Service</th>
              <th>Orders</th>
              <th>Revenue</th>
              <th>Category</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($top_services as $row): ?>
              <tr>
                <td><?=htmlspecialchars($row['service_name'])?></td>
                <td><?=number_format($row['orders'])?></td>
                <td>฿<?=number_format($row['revenue'],2)?></td>
                <td><?=htmlspecialchars($row['category_name'])?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Latest Orders -->
  <div class="card mb-4">
    <div class="card-header"><strong>Latest Orders</strong> <a href="<?=site_url('admin/orders')?>" class="float-end">ดูทั้งหมด</a></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Customer</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($latest_orders as $row): ?>
              <tr>
                <td><?=htmlspecialchars($row['username'])?></td>
                <td><?=thai_date_time($row['order_create'])?></td>
                <td>฿<?=number_format($row['order_charge'],2)?></td>
                <td><span class="badge bg-primary">
                  <?= htmlspecialchars($row['order_status']) ?>
                  <?php if (isset($status_labels[$row['order_status']])): ?>
                    (<?= $status_labels[$row['order_status']] ?>)
                  <?php endif; ?>
                </span></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Orders with working time > 1 day -->
  <div class="card mb-4">
    <div class="card-header"><strong>ออเดอร์ที่ใช้เวลาทำงานเกิน 1 วัน (สถานะไม่ใช่บางส่วน/ยกเลิก/สำเร็จ)</strong></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>เลขออเดอร์</th>
              <th>ลูกค้า</th>
              <th>บริการ</th>
              <th>จำนวน</th>
              <th>ลิงก์</th>
              <th>สถานะ</th>
              <th>เวลาสั่ง</th>
              <th>เวลาทำงาน (ชม.)</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($long_orders as $row): ?>
              <tr>
                <td><?=htmlspecialchars($row['order_id'])?></td>
                <td><?=htmlspecialchars($row['username'])?></td>
                <td>
                  <?php
                    // ดึงชื่อบริการ
                    $service = $conn->query("SELECT service_name FROM services WHERE service_id = '{$row['service_id']}'")->fetchColumn();
                    echo htmlspecialchars($service);
                  ?>
                </td>
                <td><?=number_format($row['order_quantity'])?></td>
                <td>
                  <?php if (!empty($row['order_url'])): ?>
                    <p><?=htmlspecialchars($row['order_url'])?></p>
                  <?php else: ?>
                    -
                  <?php endif; ?>
                </td>
                <td><span class="badge bg-primary">
                  <?= htmlspecialchars($row['order_status']) ?>
                  <?php if (isset($status_labels[$row['order_status']])): ?>
                    (<?= $status_labels[$row['order_status']] ?>)
                  <?php endif; ?>
                </span></td>
                <td><?=thai_date_time($row['order_create'])?></td>
                <?php
                  $start = new DateTime($row['order_create']);
                  $end = new DateTime(); // เวลาปัจจุบัน
                  $diff = $start->diff($end);
                  $hours = $diff->days * 24 + $diff->h;
                  $minutes = $diff->i;
                ?>
                <td><?=$hours?> ชม. <?=$minutes?> นาที</td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php if (empty($long_orders)): ?>
          <div class="alert alert-info text-center">ไม่มีออเดอร์ที่เข้าเงื่อนไข</div>
        <?php endif; ?>
      </div>
    </div>
  </div>


  <div class="card mb-4">
    <div class="card-header"><strong>บริการที่ใช้เวลาสำเร็จนานเกิน 6 ชั่วโมง (เฉลี่ย 10 ออเดอร์ล่าสุด)</strong></div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ไอดีบริการ</th>
              <th>ชื่อบริการ</th>
              <th>เวลาสำเร็จเฉลี่ย</th>
              <th>วินาที</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($slow_services as $row): ?>
              <tr>
                <td><?=htmlspecialchars($row['service_id'])?></td>
                <td><?=htmlspecialchars($row['service_name'])?></td>
                <td><?=$row['avg_text']?></td>
                <td><?=number_format($row['avg_seconds'])?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php if (empty($slow_services)): ?>
          <div class="alert alert-info text-center">ไม่มีบริการที่ใช้เวลาสำเร็จนานเกิน 6 ชั่วโมง</div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
(function() {
  try {
    if (typeof Chart === 'undefined') {
      console.error('Chart.js is not available.');
      displayError('ไม่สามารถโหลด Chart.js ได้ กรุณาตรวจสอบการเชื่อมต่อ CDN หรืออินเทอร์เน็ต');
      return;
    }
    document.addEventListener('DOMContentLoaded', function() {
      // Monthly Order Status Chart (เดือนปัจจุบัน)
      var monthlyOrderCtx = document.getElementById('monthlyOrderChart').getContext('2d');
      new Chart(monthlyOrderCtx, {
        type: 'line',
        data: {
          labels: <?=json_encode($days)?>,
          datasets: [
            <?php $colors = ['#4361ee','#f72585','#4cc9f0','#fbbf24','#6366f1','#e63946']; $i=0; $ds = []; foreach($order_statuses as $status => $th_label){
              $label = $status;
              if ($th_label) $label .= ' (' . $th_label . ')';
              $ds[] = "{\n              label: '$label',\n              data: ".json_encode($order_data[$status]).",\n              borderColor: '{$colors[$i%count($colors)]}',\n              backgroundColor: '{$colors[$i%count($colors)]}22',\n              tension: 0.3,\n              fill: true\n            }";
              $i++;
            } echo implode(",\n", $ds); ?>
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: { 
            y: { 
              beginAtZero: true,
              ticks: { font: { size: 12 } }
            },
            x: {
              ticks: { 
                font: { size: 12 },
                maxTicksLimit: 31
              }
            }
          },
          plugins: {
            legend: { 
              position: 'top',
              labels: { font: { size: 14 } }
            },
            tooltip: { 
              mode: 'index', 
              intersect: false,
              callbacks: {
                title: context => 'วันที่ ' + context[0].label + ' ' + '<?=date('F Y')?>'
              }
            }
          }
        }
      });
      // Order Status Pie Chart (วันนี้)
      var statusPieCtx = document.getElementById('statusPieChart').getContext('2d');
      new Chart(statusPieCtx, {
        type: 'pie',
        data: {
          labels: <?=json_encode(array_map(function($k, $v) { return $k . ' (' . $v . ')'; }, array_keys($order_statuses), $order_statuses))?>,
          datasets: [{
            data: <?=json_encode($order_status_pie)?>,
            backgroundColor: ['#4361ee','#f72585','#4cc9f0','#fbbf24','#6366f1','#e63946'],
            borderColor: '#fff',
            borderWidth: 2
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: { position: 'top' },
            tooltip: {
              callbacks: {
                label: function(context) {
                  let label = context.label || '';
                  let value = context.parsed;
                  let total = context.chart._metasets[0].total || context.dataset.data.reduce((a, b) => a + b, 0);
                  let percent = total ? ((value / total) * 100).toFixed(1) : 0;
                  return label + ': ' + percent + '%';
                }
              }
            }
          }
        }
      });
      // Monthly Revenue Chart (เดิม)
      var monthlyRevenueCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
      new Chart(monthlyRevenueCtx, {
        type: 'line',
        data: {
          labels: <?=json_encode($monthly_labels)?>,
          datasets: [
            {
              label: 'รายได้',
              data: <?=json_encode($monthly_data)?>,
              borderColor: '#4361ee',
              backgroundColor: 'rgba(67, 97, 238, 0.08)',
              tension: 0.3,
              fill: true,
              pointRadius: 4,
              pointBackgroundColor: '#4361ee',
              pointBorderColor: '#fff',
              pointHoverRadius: 6
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              ticks: { callback: value => '฿' + value }
            }
          },
          plugins: {
            legend: { position: 'top' },
            tooltip: {
              callbacks: {
                label: context => context.dataset.label + ': ฿' + context.parsed.y
              }
            }
          }
        }
      });

      // Daily Revenue Chart (รายได้รายวันในเดือนปัจจุบัน)
      var dailyRevenueCtx = document.getElementById('dailyRevenueChart').getContext('2d');
      new Chart(dailyRevenueCtx, {
        type: 'bar',
        data: {
          labels: <?=json_encode($daily_revenue_labels)?>,
          datasets: [
            {
              label: 'รายได้รายวัน',
              data: <?=json_encode($daily_revenue_data)?>,
              borderColor: '#10b981',
              backgroundColor: 'rgba(16, 185, 129, 0.2)',
              borderWidth: 2,
              borderRadius: 4,
              borderSkipped: false,
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              ticks: { 
                callback: value => '฿' + value.toLocaleString(),
                font: { size: 12 }
              }
            },
            x: {
              ticks: { 
                font: { size: 12 },
                maxTicksLimit: 31
              }
            }
          },
          plugins: {
            legend: { 
              position: 'top',
              labels: { font: { size: 14 } }
            },
            tooltip: {
              callbacks: {
                title: context => 'วันที่ ' + context[0].label,
                label: context => 'รายได้: ฿' + context.parsed.y.toLocaleString()
              }
            }
          }
        }
      });
    });
  } catch (error) {
    console.error('Script execution failed:', error);
    displayError('An error occurred while rendering the charts. Check the console for details.');
  }

  // Display error messages in the UI
  function displayError(message) {
    const containers = document.querySelectorAll('.chart-container');
    containers.forEach(container => {
      const errorDiv = document.createElement('div');
      errorDiv.className = 'alert alert-danger text-center';
      errorDiv.textContent = message;
      container.appendChild(errorDiv);
    });
  }
})();
</script>

<?php include 'footer.php'; ?>