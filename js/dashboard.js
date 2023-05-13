const myChart1 = new Chart(ctx1, {
  type: 'line',
  data: {
    labels: [
      '00:00',
      '03:00',
      '06:00',
      '09:00',
      '12:00',
      '15:00',
      '18:00',
      '21:00'
    ],
    datasets: [{
      label: 'Water Flow Velocity',
      data: [
        3.5,
        4.2,
        5.1,
        6.2,
        5.8,
        4.9,
        4.3,
        3.7
      ],
      lineTension: 0,
      backgroundColor: 'transparent',
      borderColor: '#007bff',
      borderWidth: 4,
      pointBackgroundColor: '#007bff'
    }]
  },
  options: {
    title: {
      display: true,
      text: 'Water Flow Velocity in m/s'
    }, 
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: false
        }
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Time (24-hour format)'
        }
      }]
    },
    legend: {
      display: false
    }
  }
});

const myChart2 = new Chart(ctx2, {
  type: 'line',
  data: {
    labels: [
      '00:00',
      '03:00',
      '06:00',
      '09:00',
      '12:00',
      '15:00',
      '18:00',
      '21:00'
    ],
    datasets: [{
      data: [
        2.1,
        1.8,
        2.3,
        2.5,
        2.2,
        1.9,
        1.7,
        1.4
      ],
      lineTension: 0,
      backgroundColor: 'transparent',
      borderColor: '#dc3545',
      borderWidth: 4,
      pointBackgroundColor: '#dc3545'
    }]
  },
  options: {
    title: {
      display: true,
      text: 'River Depth'
    }, 
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: false
        },
        scaleLabel: {
          display: true,
          labelString: 'Depth (m)'
        } 
      }],
      xAxes: [{
        scaleLabel: {
          display: true,
          labelString: 'Time (24-hour format)'
        }
      }]
    },
    legend: {
      display: false
    }
  }
});
