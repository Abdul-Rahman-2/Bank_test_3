const toggleButton = document.getElementById('toggle-btn')
const sidebar = document.getElementById('sidebar')

function toggleSidebar() {
  sidebar.classList.toggle('close')
  toggleButton.classList.toggle('rotate')

  closeAllSubMenus()
}

function toggleSubMenu(button) {

  if (!button.nextElementSibling.classList.contains('show')) {
    closeAllSubMenus()
  }

  button.nextElementSibling.classList.toggle('show')
  button.classList.toggle('rotate')

  if (sidebar.classList.contains('close')) {
    sidebar.classList.toggle('close')
    toggleButton.classList.toggle('rotate')
  }
}

function closeAllSubMenus() {
  Array.from(sidebar.getElementsByClassName('show')).forEach(ul => {
    ul.classList.remove('show')
    ul.previousElementSibling.classList.remove('rotate')
  })
}

// Visitors +1 For Every Visit For The Website
let visitorsCount = localStorage.getItem('visitorsCount') || 0;

visitorsCount++;

localStorage.setItem('visitorsCount', visitorsCount);

document.querySelector('.visitors_amount').textContent = visitorsCount;

// Diagram

const ctx = document.getElementById('usersChart').getContext('2d');
const visitorsChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
    datasets: [{
      label: 'Number of Users',
      data: [0, 1000, 3500, 4000, 5000, 6500, 8500],
      backgroundColor: 'transparent',
      borderColor: '#5e63ff',
      borderWidth: 2,
      pointBackgroundColor: '#5e63ff',
      pointBorderColor: '#3f45e4',
      pointRadius: 4
    }]
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        labels: {
          color: '#f0f0f0'
        }
      }
    },
    scales: {
      x: {
        ticks: {
          color: '#f0f0f0'
        },
        grid: {
          color: '#3f44e481'
        }
      },
      y: {
        ticks: {
          color: '#f0f0f0',
          stepSize: 2000,
          beginAtZero: true
        },
        grid: {
          color: '#3f44e481'
        }
      }
    }
  }
});