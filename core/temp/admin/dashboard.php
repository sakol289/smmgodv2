<?php include 'header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer">

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
</style>

<div class="container-fluid">

  <!-- Summary Cards -->
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default panel-custom">
        <div class="panel-body">
          <small class="text-muted">Total Customers</small>
          <h3><strong>2,842</strong></h3>
          <p><span class="text-success"><i class="fa fa-arrow-up"></i> 12.5%</span> <small>vs last month</small></p>
          <div class="text-right">
            <i class="fa fa-users fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default panel-custom">
        <div class="panel-body">
          <small class="text-muted">Total Balance</small>
          <h3><strong>$24,318</strong></h3>
          <p><span class="text-success"><i class="fa fa-arrow-up"></i> 8.2%</span> <small>vs last month</small></p>
          <div class="text-right">
            <i class="fa fa-wallet fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default panel-custom">
        <div class="panel-body">
          <small class="text-muted">Total Orders</small>
          <h3><strong>1,284</strong></h3>
          <p><span class="text-success"><i class="fa fa-arrow-up"></i> 5.3%</span> <small>vs last month</small></p>
          <div class="text-right">
            <i class="fa fa-shopping-cart fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="panel panel-default panel-custom">
        <div class="panel-body">
          <small class="text-muted">Total Sales (30 days)</small>
          <h3><strong>$48,950</strong></h3>
          <p><span class="text-success"><i class="fa fa-arrow-up"></i> 15.7%</span> <small>vs last month</small></p>
          <div class="text-right">
            <i class="fa fa-chart-bar fa-2x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts Row -->
  <div class="row">
    <!-- Monthly Order Status -->
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Monthly Order Status</strong></div>
        <div class="panel-body">
          <div class="chart-container">
            <canvas id="monthlyOrderChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- Order Status Distribution -->
    <div class="col-md-6">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Order Status Distribution</strong></div>
        <div class="panel-body">
          <div class="chart-container">
            <canvas id="statusPieChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Monthly Revenue -->
  <div class="panel panel-default">
    <div class="panel-heading"><strong>Monthly Revenue</strong></div>
    <div class="panel-body">
      <div class="chart-container">
        <canvas id="monthlyRevenueChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Top 5 Services -->
  <div class="panel panel-default">
    <div class="panel-heading"><strong>Top 5 Best-Selling Services</strong></div>
    <div class="panel-body">
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
            <tr><td>Premium Consultation</td><td>245</td><td>$12,250</td><td>Consulting</td></tr>
            <tr><td>Web Development</td><td>189</td><td>$9,450</td><td>Development</td></tr>
            <tr><td>Marketing Package</td><td>156</td><td>$7,800</td><td>Marketing</td></tr>
            <tr><td>SEO Optimization</td><td>123</td><td>$6,150</td><td>SEO</td></tr>
            <tr><td>Graphic Design</td><td>98</td><td>$4,900</td><td>Design</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Latest Orders -->
  <div class="panel panel-default">
    <div class="panel-heading"><strong>Latest Orders</strong> <a href="#" class="pull-right">View All</a></div>
    <div class="panel-body">
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
            <tr><td>John Smith</td><td>Oct 12, 2023</td><td>$125.00</td><td><span class="label label-primary">Processing</span></td></tr>
            <tr><td>Sarah Johnson</td><td>Oct 12, 2023</td><td>$89.50</td><td><span class="label label-warning">In Progress</span></td></tr>
            <tr><td>Michael Brown</td><td>Oct 11, 2023</td><td>$245.75</td><td><span class="label label-success">Completed</span></td></tr>
            <tr><td>Emily Davis</td><td>Oct 11, 2023</td><td>$56.90</td><td><span class="label label-danger">Cancelled</span></td></tr>
            <tr><td>Robert Wilson</td><td>Oct 10, 2023</td><td>$189.00</td><td><span class="label label-success">Completed</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- ✅ แก้ไขส่วน Script เพื่อความเสถียร -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js" integrity="sha384-vD7JJwkWY4Y+93lbX6mOxPAAycVLJReP1OvlYBMQSyWXu8UoMC58KL7rkmXHZsdi" crossorigin="anonymous"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  if (typeof Chart === 'undefined') {
    console.error("Chart.js didn't load.");
    displayError('Chart.js failed to load. Please check your internet or script path.');
    return;
  }

  const ctx1 = document.getElementById('monthlyOrderChart')?.getContext('2d');
  const ctx2 = document.getElementById('statusPieChart')?.getContext('2d');
  const ctx3 = document.getElementById('monthlyRevenueChart')?.getContext('2d');

  if (!ctx1 || !ctx2 || !ctx3) {
    console.warn("One or more canvas elements not found.");
    displayError('One or more charts failed to render.');
    return;
  }

  new Chart(ctx1, {
    type: 'line',
    data: {
      labels: ['Day 1','Day 2','Day 3','Day 4','Day 5','Day 6','Day 7'],
      datasets: [
        {
          label: 'Processing',
          data: [12,19,15,8,11,13,7],
          borderColor: '#4361ee',
          backgroundColor: 'rgba(67, 97, 238, 0.1)',
          fill: true,
          tension: 0.3
        },
        {
          label: 'In Progress',
          data: [8,12,5,9,7,10,6],
          borderColor: '#f72585',
          backgroundColor: 'rgba(247, 37, 133, 0.1)',
          fill: true,
          tension: 0.3
        },
        {
          label: 'Completed',
          data: [25,30,28,32,27,35,40],
          borderColor: '#4cc9f0',
          backgroundColor: 'rgba(76, 201, 240, 0.1)',
          fill: true,
          tension: 0.3
        },
        {
          label: 'Cancelled',
          data: [2,3,1,4,2,1,0],
          borderColor: '#e63946',
          backgroundColor: 'rgba(230, 57, 70, 0.1)',
          fill: true,
          tension: 0.3
        }
      ]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: { legend: { position: 'top' } },
      scales: { y: { beginAtZero: true } }
    }
  });

  new Chart(ctx2, {
    type: 'pie',
    data: {
      labels: ['Processing','In Progress','Completed','Cancelled'],
      datasets: [{
        data: [25,20,50,5],
        backgroundColor: ['#4361ee','#f72585','#4cc9f0','#e63946'],
        borderWidth: 2,
        borderColor: '#fff'
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { position: 'top' },
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.label + ': ' + context.parsed + '%';
            }
          }
        }
      }
    }
  });

  new Chart(ctx3, {
    type: 'bar',
    data: {
      labels: ['Day 1','Day 2','Day 3','Day 4','Day 5','Day 6','Day 7'],
      datasets: [{
        label: 'Revenue ($)',
        data: [1500,2200,1800,2500,2000,2300,2700],
        backgroundColor: '#4361ee',
        borderColor: '#4361ee',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: function(value) {
              return '$' + value;
            }
          }
        }
      },
      plugins: {
        legend: { position: 'top' },
        tooltip: {
          callbacks: {
            label: function(context) {
              return context.dataset.label + ': $' + context.parsed.y;
            }
          }
        }
      }
    }
  });

  function displayError(msg) {
    document.querySelectorAll('.chart-container').forEach(container => {
      const div = document.createElement('div');
      div.className = 'alert alert-danger text-center';
      div.textContent = msg;
      container.appendChild(div);
    });
  }
});
</script>

<?php include 'footer.php'; ?>
