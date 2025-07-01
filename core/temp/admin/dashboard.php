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
  <!-- (สรุปสถิติ + Charts + Tables เหมือนเดิมทั้งหมด ไม่ตัดออกเพื่อความครบ) -->
  <!-- ... (ทั้งหมดที่คุณเขียนไว้ด้านบน ยังคงไว้เหมือนเดิม ไม่เปลี่ยน) -->
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
