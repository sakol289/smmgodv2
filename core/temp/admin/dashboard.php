<?php include 'header.php'; ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.min.js" defer></script>
<style>
  .panel-custom {
    border: none;
    border-radius: 6px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .chart-container {
    position: relative;
    height: 300px;
    width: 100%;
  }
</style>
<style>
  .panel-custom {
    border: none;
    border-radius: 6px;
    transition: all 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

  .chart-container {
    position: relative;
    height: 300px;
    width: 100%;
  }
</style>

<div class="container-fluid">
  <!-- Charts Row -->
  <div class="row">
    <!-- Monthly Order Status -->
    <div class="col-md-4">
      <div class="panel panel-default panel-custom">
        <div class="panel-heading"><strong>Monthly Order Status</strong></div>
        <div class="panel-body">
          <div class="chart-container">
            <canvas id="monthlyOrderChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- Order Status Distribution -->
    <div class="col-md-4">
      <div class="panel panel-default panel-custom">
        <div class="panel-heading"><strong>Order Status Distribution</strong></div>
        <div class="panel-body">
          <div class="chart-container">
            <canvas id="statusPieChart"></canvas>
          </div>
        </div>
      </div>
    </div>
    <!-- Monthly Revenue -->
    <div class="col-md-4">
      <div class="panel panel-default panel-custom">
        <div class="panel-heading"><strong>Monthly Revenue</strong></div>
        <div class="panel-body">
          <div class="chart-container">
            <canvas id="monthlyRevenueChart"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Check if Chart.js is loaded
    if (typeof Chart === 'undefined') {
      console.error('Chart.js is not loaded. Check the CDN URL or network connection.');
      return;
    }

    // Monthly Order Status Chart
    const monthlyOrderCanvas = document.getElementById('monthlyOrderChart');
    if (monthlyOrderCanvas) {
      try {
        new Chart(monthlyOrderCanvas.getContext('2d'), {
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
                label: 'Completed',
                data: [25, 30, 28, 32, 27, 35, 40],
                borderColor: '#4cc9f0',
                backgroundColor: 'rgba(76, 201, 240, 0.1)',
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
                beginAtZero: true
              }
            },
            plugins: {
              legend: {
                position: 'top'
              }
            }
          }
        });
        console.log('Monthly Order Status chart initialized');
      } catch (error) {
        console.error('Error initializing Monthly Order Status chart:', error);
      }
    } else {
      console.error('Monthly Order Status canvas not found');
    }

    // Status Pie Chart
    const statusPieCanvas = document.getElementById('statusPieChart');
    if (statusPieCanvas) {
      try {
        new Chart(statusPieCanvas.getContext('2d'), {
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
              legend: {
                position: 'top'
              },
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
        console.log('Status Pie chart initialized');
      } catch (error) {
        console.error('Error initializing Status Pie chart:', error);
      }
    } else {
      console.error('Status Pie canvas not found');
    }

    // Monthly Revenue Chart
    const monthlyRevenueCanvas = document.getElementById('monthlyRevenueChart');
    if (monthlyRevenueCanvas) {
      try {
        new Chart(monthlyRevenueCanvas.getContext('2d'), {
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
                ticks: {
                  callback: function(value) {
                    return '$' + value;
                  }
                }
              }
            },
            plugins: {
              legend: {
                position: 'top'
              }
            }
          }
        });
        console.log('Monthly Revenue chart initialized');
      } catch (error) {
        console.error('Error initializing Monthly Revenue chart:', error);
      }
    } else {
      console.error('Monthly Revenue canvas not found');
    }
  });
</script>

<?php include 'footer.php'; ?>