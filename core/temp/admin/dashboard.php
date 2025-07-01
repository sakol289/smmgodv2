<?php include 'header.php'; ?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
.panel-custom {
  border: none;
  border-radius: 6px;
  transition: all 0.3s ease;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.panel-custom:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}
.panel-body-icon {
  background: rgba(67, 97, 238, 0.1);
  padding: 15px;
  border-radius: 10px;
}
</style>



<div class="container-fluid">
  <div class="row" style="background: #fff; padding: 15px 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); margin-bottom: 20px;">
    <div class="col-sm-6">
      <div class="header-icon pull-left"><i class="fa fa-chart-line"></i></div>
      <h3 class="pull-left" style="margin: 8px 0 0 10px; font-weight: bold;">Business Dashboard</h3>
    </div>
    <div class="col-sm-6 text-right">
      <i class="fa fa-bell text-muted"></i>
      <img src="https://ui-avatars.com/api/?name=Admin+User&background=4361ee&color=fff" width="32" height="32" class="img-circle">
      <span>Admin User</span>
    </div>
  </div>

  <!-- Summary Cards -->
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default panel-custom">
        <div class="panel-body clearfix">
          <div class="pull-left">
            <small class="text-muted">Total Customers</small>
            <h3>2,842</h3>
            <span class="text-success"><i class="fa fa-arrow-up"></i> 12.5%</span>
            <small>vs last month</small>
          </div>
          <div class="pull-right panel-body-icon">
            <i class="fa fa-users fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default panel-custom">
        <div class="panel-body clearfix">
          <div class="pull-left">
            <small class="text-muted">Total Balance</small>
            <h3>$24,318</h3>
            <span class="text-success"><i class="fa fa-arrow-up"></i> 8.2%</span>
            <small>vs last month</small>
          </div>
          <div class="pull-right panel-body-icon">
            <i class="fa fa-wallet fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default panel-custom">
        <div class="panel-body clearfix">
          <div class="pull-left">
            <small class="text-muted">Total Orders</small>
            <h3>1,284</h3>
            <span class="text-success"><i class="fa fa-arrow-up"></i> 5.3%</span>
            <small>vs last month</small>
          </div>
          <div class="pull-right panel-body-icon">
            <i class="fa fa-shopping-cart fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default panel-custom">
        <div class="panel-body clearfix">
          <div class="pull-left">
            <small class="text-muted">Total Sales (30 days)</small>
            <h3>$48,950</h3>
            <span class="text-success"><i class="fa fa-arrow-up"></i> 15.7%</span>
            <small>vs last month</small>
          </div>
          <div class="pull-right panel-body-icon">
            <i class="fa fa-chart-bar fa-2x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart -->
  <div class="panel panel-default">
    <div class="panel-heading"><strong>Monthly Order Status</strong></div>
    <div class="panel-body">
      <div class="chart-container">
        <canvas id="monthlyOrderChart"></canvas>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('monthlyOrderChart').getContext('2d');
    const monthlyOrderChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
        datasets: [
          {
            label: 'Processing',
            data: [12, 19, 15, 8, 11, 13, 7],
            borderColor: '#4361ee',
            backgroundColor: 'rgba(67, 97, 238, 0.1)',
            tension: 0.3,
            fill: true
          },
          {
            label: 'In Progress',
            data: [8, 12, 5, 9, 7, 10, 6],
            borderColor: '#f72585',
            backgroundColor: 'rgba(247, 37, 133, 0.1)',
            tension: 0.3,
            fill: true
          },
          {
            label: 'Completed',
            data: [25, 30, 28, 32, 27, 35, 40],
            borderColor: '#4cc9f0',
            backgroundColor: 'rgba(76, 201, 240, 0.1)',
            tension: 0.3,
            fill: true
          },
          {
            label: 'Cancelled',
            data: [2, 3, 1, 4, 2, 1, 0],
            borderColor: '#e63946',
            backgroundColor: 'rgba(230, 57, 70, 0.1)',
            tension: 0.3,
            fill: true
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true,
            grid: {
              color: 'rgba(0, 0, 0, 0.05)'
            }
          },
          x: {
            grid: {
              display: false
            }
          }
        },
        plugins: {
          legend: {
            position: 'top'
          },
          tooltip: {
            mode: 'index',
            intersect: false
          }
        }
      }
    });
  });
</script>

<?php include 'footer.php'; ?>