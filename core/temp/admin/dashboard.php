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
</style>

<div class="container-fluid">
  <!-- Summary Cards -->
  <div class="row">
    <div class="col-md-3 mb-4">
      <div class="card">
        <div class="card-body">
          <small class="text-muted">Total Customers</small>
          <h3><strong>2,842</strong></h3>
          <p><span class="text-success"><i class="fa fa-arrow-up"></i> 12.5%</span> <small>vs last month</small></p>
          <div class="text-end">
            <i class="fa fa-users fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card">
        <div class="card-body">
          <small class="text-muted">Total Balance</small>
          <h3><strong>$24,318</strong></h3>
          <p><span class="text-success"><i class="fa fa-arrow-up"></i> 8.2%</span> <small>vs last month</small></p>
          <div class="text-end">
            <i class="fa fa-wallet fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card">
        <div class="card-body">
          <small class="text-muted">Total Orders</small>
          <h3><strong>1,284</strong></h3>
          <p><span class="text-success"><i class="fa fa-arrow-up"></i> 5.3%</span> <small>vs last month</small></p>
          <div class="text-end">
            <i class="fa fa-shopping-cart fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 mb-4">
      <div class="card">
        <div class="card-body">
          <small class="text-muted">Total Sales (30 days)</small>
          <h3><strong>$48,950</strong></h3>
          <p><span class="text-success"><i class="fa fa-arrow-up"></i> 15.7%</span> <small>vs last month</small></p>
          <div class="text-end">
            <i class="fa fa-chart-bar fa-2x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Charts Row -->
  <div class="row">
    <!-- Monthly Order Status -->
    <div class="col-md-8 mb-4">
      <div class="card">
        <div class="card-header"><strong>Monthly Order Status</strong></div>
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

  <!-- Monthly Revenue -->
  <div class="card mb-4">
    <div class="card-header"><strong>Monthly Revenue</strong></div>
    <div class="card-body">
      <div class="chart-container">
        <canvas id="monthlyRevenueChart"></canvas>
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
  <div class="card mb-4">
    <div class="card-header"><strong>Latest Orders</strong> <a href="#" class="float-end">View All</a></div>
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
            <tr><td>John Smith</td><td>Oct 12, 2023</td><td>$125.00</td><td><span class="badge bg-primary">Processing</span></td></tr>
            <tr><td>Sarah Johnson</td><td>Oct 12, 2023</td><td>$89.50</td><td><span class="badge bg-warning">In Progress</span></td></tr>
            <tr><td>Michael Brown</td><td>Oct 11, 2023</td><td>$245.75</td><td><span class="badge bg-success">Completed</span></td></tr>
            <tr><td>Emily Davis</td><td>Oct 11, 2023</td><td>$56.90</td><td><span class="badge bg-danger">Cancelled</span></td></tr>
            <tr><td>Robert Wilson</td><td>Oct 10, 2023</td><td>$189.00</td><td><span class="badge bg-success">Completed</span></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
(function() {
  try {
    // Check if Chart.js is loaded
    if (typeof Chart === 'undefined') {
      console.error('Chart.js is not available.');
      displayError('ไม่สามารถโหลด Chart.js ได้ กรุณาตรวจสอบการเชื่อมต่อ CDN หรืออินเทอร์เน็ต');
      return;
    }

    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
      // Verify canvas elements
      const canvases = {
        monthlyOrder: document.getElementById('monthlyOrderChart'),
        statusPie: document.getElementById('statusPieChart'),
        monthlyRevenue: document.getElementById('monthlyRevenueChart')
      };

      for (const [key, canvas] of Object.entries(canvases)) {
        if (!canvas) {
          console.error(`Canvas element for ${key} not found.`);
          displayError(`Canvas for ${key} is missing. Check the HTML structure.`);
          return;
        }
      }

      // Monthly Order Status Chart
      new Chart(canvases.monthlyOrder.getContext('2d'), {
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
          scales: { y: { beginAtZero: true } },
          plugins: {
            legend: { position: 'top' },
            tooltip: { mode: 'index', intersect: false }
          }
        }
      });

      // Status Pie Chart
      new Chart(canvases.statusPie.getContext('2d'), {
        type: 'pie',
        data: {
          labels: ['Processing', 'In Progress', 'Completed', 'Cancelled'],
          datasets: [{
            data: [25, 20, 50, 5],
            backgroundColor: ['#4361ee', '#f72585', '#4cc9f0', '#e63946'],
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
                  if (label) label += ': ';
                  return label + context.parsed + '%';
                }
              }
            }
          }
        }
      });

      // Monthly Revenue Chart
      new Chart(canvases.monthlyRevenue.getContext('2d'), {
        type: 'bar',
        data: {
          labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
          datasets: [{
            label: 'Revenue ($)',
            data: [1500, 2200, 1800, 2500, 2000, 2300, 2700],
            backgroundColor: '#4361ee',
            borderColor: '#4361ee',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true,
              ticks: { callback: value => '$' + value }
            }
          },
          plugins: {
            legend: { position: 'top' },
            tooltip: {
              callbacks: {
                label: context => context.dataset.label + ': $' + context.parsed.y
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