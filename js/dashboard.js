/* globals Chart:false, feather:false */

(() => {
    'use strict'
  
    feather.replace({ 'aria-hidden': 'true' })
  
    // First chart
    //This chart uses a 12-month period for the labels and displays the water flow velocity data in meters per second. You can adjust the data and labels as needed to match your specific use case.
    const ctx1 = document.getElementById('myChart1');
    // eslint-disable-next-line no-unused-vars
    const myChart1 = new Chart(ctx1, {
      type: 'line',
      data: {
        labels: [
          'Sunday',
          'Monday',
          'Tuesday',
          'Wednesday',
          'Thursday',
          'Friday',
          'Saturday'
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
          ],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
        }]
      },
      options: {
        /* title: {
          display: true,
          text: 'Water Flow Velocity in m/s'
        }, */
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });
  
  
    // Second chart
    // In this chart, the labels represent the months of the year and the data represents the river depth (in meters) during each month. I also added some additional options to display the y-axis and x-axis labels.
    const ctx2 = document.getElementById('myChart2')
    // eslint-disable-next-line no-unused-vars
    const myChart2 = new Chart(ctx2, {
    type: 'line',
    data: {
      labels: [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ],
      datasets: [{
        data: [
          2.1,
          1.8,
          2.3,
          2.5,
          2.2,
          1.9,
          1.7
        ],
        lineTension: 0,
        backgroundColor: 'transparent',
        borderColor: '#dc3545',
        borderWidth: 4,
        pointBackgroundColor: '#dc3545'
      }]
    },
    options: {
      /* title: {
        display: true,
        text: 'River Depth'
      }, */
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          },
          /* scaleLabel: {
            display: true,
            labelString: 'Depth (m)'
          } */
        }],
        xAxes: [{
          /* scaleLabel: {
            display: true,
            labelString: 'Month'
          } */
        }]
      },
      legend: {
        display: false
      }
    }
    })
  
  
    // Third chart
    const ctx3 = document.getElementById('myChart3');
    const myChart3 = new Chart(ctx3, {
      type: 'line',
      data: {
        labels: [
          'Sunday',
          'Monday',
          'Tuesday',
          'Wednesday',
          'Thursday',
          'Friday',
          'Saturday'
        ],
        datasets: [{
          data: [
            18,
            20,
            22,
            21,
            19,
            17,
            16
          ],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#28a745',
          borderWidth: 4,
          pointBackgroundColor: '#28a745'
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: false
            }
          }]
        },
        legend: {
          display: false
        }
      }
    });
  
  
  
  })()