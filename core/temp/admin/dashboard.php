<?php include 'header.php'; ?>
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
  .card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    border: none;
    border-radius: 0.75rem;
  }

  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
  }

  .chart-container {
    position: relative;
    height: 300px;
  }

  .header-icon {
    background: linear-gradient(135deg, #4361ee, #3f37c9);
  }

  .table th,
  .table td {
    vertical-align: middle;
  }

  .badge {
    padding: 0.5em 1em;
    font-weight: 500;
  }

  .progress {
    height: 8px;
    border-radius: 4px;
  }
</style>

<div class="container-fluid">
  <div class="min-vh-100">
    <!-- Header -->
    <header class="bg-white shadow-sm py-3">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <div class="header-icon rounded p-2 me-3">
              <i class="fas fa-chart-line text-white fs-4"></i>
            </div>
            <h1 class="h3 mb-0 fw-bold">Business Dashboard</h1>
          </div>
          <div class="d-flex align-items-center gap-3">
            <div class="position-relative">
              <i class="fas fa-bell text-secondary fs-5"></i>
              <span class="position-absolute top-0 start-100 translate-middle p-1 bg-danger border border-light rounded-circle"></span>
            </div>
            <div class="d-flex align-items-center">
              <img src="https://ui-avatars.com/api/?name=Admin+User&background=4361ee&color=fff" alt="User" class="rounded-circle me-2" width="32" height="32">
              <span class="fw-medium">Admin User</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <main class="container py-4">
      <!-- Summary Cards -->
      <div class="row g-4 mb-4">
        <!-- Total Customers -->
        <div class="col-md-6 col-lg-3">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h6 class="text-muted mb-2">Total Customers</h6>
                <h3 class="mb-2 fw-bold">2,842</h3>
                <div class="d-flex align-items-center">
                  <span class="text-success small fw-bold">
                    <i class="fas fa-arrow-up me-1"></i>12.5%
                  </span>
                  <span class="text-muted small ms-2">vs last month</span>
                </div>
              </div>
              <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                <i class="fas fa-users text-primary fs-3"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Balance -->
        <div class="col-md-6 col-lg-3">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h6 class="text-muted mb-2">Total Balance</h6>
                <h3 class="mb-2 fw-bold">$24,318</h3>
                <div class="d-flex align-items-center">
                  <span class="text-success small fw-bold">
                    <i class="fas fa-arrow-up me-1"></i>8.2%
                  </span>
                  <span class="text-muted small ms-2">vs last month</span>
                </div>
              </div>
              <div class="bg-success bg-opacity-10 p-3 rounded-3">
                <i class="fas fa-wallet text-success fs-3"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Orders -->
        <div class="col-md-6 col-lg-3">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h6 class="text-muted mb-2">Total Orders</h6>
                <h3 class="mb-2 fw-bold">1,284</h3>
                <div class="d-flex align-items-center">
                  <span class="text-success small fw-bold">
                    <i class="fas fa-arrow-up me-1"></i>5.3%
                  </span>
                  <span class="text-muted small ms-2">vs last month</span>
                </div>
              </div>
              <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                <i class="fas fa-shopping-cart text-primary fs-3"></i>
              </div>
            </div>
          </div>
        </div>

        <!-- Total Sales -->
        <div class="col-md-6 col-lg-3">
          <div class="card shadow-sm h-100">
            <div class="card-body d-flex justify-content-between align-items-center">
              <div>
                <h6 class="text-muted mb-2">Total Sales (30 days)</h6>
                <h3 class="mb-2 fw-bold">$48,950</h3>
                <div class="d-flex align-items-center">
                  <span class="text-success small fw-bold">
                    <i class="fas fa-arrow-up me-1"></i>15.7%
                  </span>
                  <span class="text-muted small ms-2">vs last month</span>
                </div>
              </div>
              <div class="bg-warning bg-opacity-10 p-3 rounded-3">
                <i class="fas fa-chart-bar text-warning fs-3"></i>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Today's Stats -->
      <div class="row g-4 mb-4">
        <!-- Today's Profit -->
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <h6 class="text-muted mb-2">Today's Profit</h6>
                  <h3 class="mb-0 fw-bold">$1,250</h3>
                </div>
                <div class="bg-danger bg-opacity-10 p-3 rounded-3">
                  <i class="fas fa-money-bill-wave text-danger fs-3"></i>
                </div>
              </div>
              <div>
                <div class="d-flex justify-content-between small mb-1">
                  <span>Target: $1,500</span>
                  <span>83%</span>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-danger" style="width: 83%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Today's Orders -->
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <h6 class="text-muted mb-2">Today's Orders</h6>
                  <h3 class="mb-0 fw-bold">42</h3>
                </div>
                <div class="bg-primary bg-opacity-10 p-3 rounded-3">
                  <i class="fas fa-clipboard-list text-primary fs-3"></i>
                </div>
              </div>
              <div>
                <div class="d-flex justify-content-between small mb-1">
                  <span>Target: 50</span>
                  <span>84%</span>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-primary" style="width: 84%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- New Customers Today -->
        <div class="col-md-4">
          <div class="card shadow-sm h-100">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                  <h6 class="text-muted mb-2">New Customers Today</h6>
                  <h3 class="mb-0 fw-bold">18</h3>
                </div>
                <div class="bg-success bg-opacity-10 p-3 rounded-3">
                  <i class="fas fa-user-plus text-success fs-3"></i>
                </div>
              </div>
              <div>
                <div class="d-flex justify-content-between small mb-1">
                  <span>Target: 20</span>
                  <span>90%</span>
                </div>
                <div class="progress">
                  <div class="progress-bar bg-success" style="width: 90%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Charts and Latest Orders -->
      <div class="row g-4 mb-4">
        <div class="col-lg-8">
          <!-- Monthly Order Status Chart -->
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title fw-bold mb-4">Monthly Order Status</h5>
              <div class="chart-container">
                <canvas id="monthlyOrderChart"></canvas>
              </div>
            </div>
          </div>

          <!-- Latest Orders -->
          <div class="card shadow-sm mt-4">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title fw-bold mb-0">Latest Orders</h5>
                <a href="#" class="text-primary text-decoration-underline">View All</a>
              </div>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr class="text-muted">
                      <th>Customer</th>
                      <th>Date</th>
                      <th>Amount</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>John Smith</td>
                      <td>Oct 12, 2023</td>
                      <td>$125.00</td>
                      <td>
                        <span class="badge bg-primary bg-opacity-10 text-primary">Processing</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Sarah Johnson</td>
                      <td>Oct 12, 2023</td>
                      <td>$89.50</td>
                      <td>
                        <span class="badge bg-warning bg-opacity-10 text-warning">In Progress</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Michael Brown</td>
                      <td>Oct 11, 2023</td>
                      <td>$245.75</td>
                      <td>
                        <span class="badge bg-success bg-opacity-10 text-success">Completed</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Emily Davis</td>
                      <td>Oct 11, 2023</td>
                      <td>$56.90</td>
                      <td>
                        <span class="badge bg-danger bg-opacity-10 text-danger">Cancelled</span>
                      </td>
                    </tr>
                    <tr>
                      <td>Robert Wilson</td>
                      <td>Oct 10, 2023</td>
                      <td>$189.00</td>
                      <td>
                        <span class="badge bg-success bg-opacity-10 text-success">Completed</span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- Order Status Statistics and Top Selling Services -->
        <div class="col-lg-4">
          <!-- Order Status Statistics -->
          <div class="card shadow-sm">
            <div class="card-body">
              <h5 class="card-title fw-bold mb-4">Order Status Statistics</h5>
              <div class="d-flex flex-column gap-3">
                <!-- Processing -->
                <div>
                  <div class="d-flex justify-content-between mb-1">
                    <span class="fw-medium">Processing</span>
                    <span class="fw-medium">25%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-primary" style="width: 25%"></div>
                  </div>
                </div>
                <!-- In Progress -->
                <div>
                  <div class="d-flex justify-content-between mb-1">
                    <span class="fw-medium">In Progress</span>
                    <span class="fw-medium">15%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-warning" style="width: 15%"></div>
                  </div>
                </div>
                <!-- Completed -->
                <div>
                  <div class="d-flex justify-content-between mb-1">
                    <span class="fw-medium">Completed</span>
                    <span class="fw-medium">52%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-success" style="width: 52%"></div>
                  </div>
                </div>
                <!-- Cancelled -->
                <div>
                  <div class="d-flex justify-content-between mb-1">
                    <span class="fw-medium">Cancelled</span>
                    <span class="fw-medium">8%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar bg-danger" style="width: 8%"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Top Selling Services -->
          <div class="card shadow-sm mt-4">
            <div class="card-body">
              <h5 class="card-title fw-bold mb-4">Top Selling Services</h5>
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr class="text-muted">
                      <th>ID</th>
                      <th>Name</th>
                      <th>Total Orders</th>
                      <th>Total Quantity</th>
                      <th>Provider</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>5013</td>
                      <td>TikTok Views | Start Immediately</td>
                      <td>3225</td>
                      <td>41,416,490</td>
                      <td>smmxserver</td>
                      <td>
                        <a href="#" class="text-primary text-decoration-underline">View</a>
                      </td>
                    </tr>
                    <tr>
                      <td>5017</td>
                      <td>TikTok Hearts [Max 1 Million]</td>
                      <td>2196</td>
                      <td>3,758,023</td>
                      <td>smmxserver</td>
                      <td>
                        <a href="#" class="text-primary text-decoration-underline">View</a>
                      </td>
                    </tr>
                    <tr>
                      <td>5018</td>
                      <td>TikTok Likes [Max 1 Million]</td>
                      <td>1274</td>
                      <td>1,414,393</td>
                      <td>smmxserver</td>
                      <td>
                        <a href="#" class="text-primary text-decoration-underline">View</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>

  <script>
    // Initialize charts when the page loads
    document.addEventListener('DOMContentLoaded', function() {
      // Monthly Order Status Chart
      const ctx = document.getElementById('monthlyOrderChart').getContext('2d');
      const monthlyOrderChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Day 1', 'Day 2', 'Day 3', 'Day 4', 'Day 5', 'Day 6', 'Day 7'],
          datasets: [{
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
              position: 'top',
              labels: {
                boxWidth: 20,
                padding: 15
              }
            },
            tooltip: {
              mode: 'index',
              intersect: false,
              backgroundColor: 'rgba(0, 0, 0, 0.8)',
              padding: 10
            }
          }
        }
      });
    });
  </script>

</div>

<?php include 'footer.php'; ?>