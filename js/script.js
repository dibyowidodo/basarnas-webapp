$(document).ready(function() {
	// Define chart context and options
	const ctx = document.getElementById('myChart').getContext('2d');
	const options = {
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero: true
				}
			}]
		},
		legend: {
			display: false
		}
	};

	// Define chart with initial empty data
	const chart = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: [],
			datasets: [{
				label: 'Suhu Air Sungai',
				data: [],
				backgroundColor: 'red',
				borderColor: 'red',
				borderWidth: 1
			}]
		},
		options: options
	});

	// Submit button click handler
	$('#submit').click(function() {
		const date = $('#date').val();
		const url = `get_data.php?date=${date}`;
		$.ajax({
			url: url,
			method: 'GET',
			success: function(data) {
				// Parse the data as JSON
				data = JSON.parse(data);

				// Update the chart data and labels
				chart.data.datasets[0].data = data;
				chart.data.labels = Array.from(Array(data.length / 2).keys()).map(i => `${i*2}:00`);

				// Update the chart
				chart.update();
			}
		});
	});
});
