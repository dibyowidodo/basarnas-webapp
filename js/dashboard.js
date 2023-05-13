/* globals Chart:false, feather:false */

(() => {
    'use strict'
  
    feather.replace({ 'aria-hidden': 'true' })
  
    // First chart
    const ctx1 = document.getElementById('myChart1');
    // eslint-disable-next-line no-unused-vars
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
          ],
          lineTension: 0,
          backgroundColor: 'transparent',
          borderColor: '#007bff',
          borderWidth: 4,
          pointBackgroundColor: '#007bff'
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
  
  
    // Second chart
    const ctx2 = document.getElementById('myChart2');
    // eslint-disable-next-line no-unused-vars
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
    })
  

  
  
  })()