<div class="page-content">
	<link href="<?= base_url('assets/libs/chart.js/chart.min.css'); ?>" rel="stylesheet" type="text/css" />
	<!-- start page title -->
	<div class="row">
		<div class="col-12">
			<div class="page-title-box d-flex align-items-center justify-content-between">
				<h4 class="page-title mb-0 font-size-18">Analytics</h4>

				<div class="page-title-right">
					<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
					</ol>
				</div>

			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Number of ultrasound examinations</h4>
					<canvas id="pieChart" height="150"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Average time of ultrasound examination</h4>
					<canvas id="barChart" height="150"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">Precision of markers</h4>
					<canvas id="lineChart" height="150"></canvas>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title d-inline">
						Particular case
					</h4>
					<div class="float-right text-center">
						<h4 class="card-title">
							Alignment Percentage
						</h4>
						<input class="knob" data-width="80" data-height="80" data-thickness=".1" data-readOnly="true" data-linecap="round" data-fgcolor="#0089ef" value="80">
					</div>
					<div class="mt-3">
						<p>Model and partitioner alignment</p>
						<p>RCIE</p>
						<p>Patient ID</p>
					</div>
					<div>
						<p>Model and partitioner alignment</p>
						<p>Malformation</p>
						<p>Patient ID</p>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<script src="<?= base_url("assets/libs/jquery-knob/jquery.knob.min.js") ?>"></script>
<script>
	$(function() {
		$(".knob").knob()
	});
</script>

<script src="<?= base_url("assets/libs/chart.js/Chart.min.js") ?>"></script>
<script>
	new Chart(document.getElementById("pieChart"), {
		"type": "doughnut",
		"data": {
			"labels": ["1er trimestre", "2éme trimestre", "3éme trimestre"],
			"datasets": [{
				"data": [300, 180, 160],
				"backgroundColor": ["#45cb85", "#ebeff2", "#0089ef"],
				"hoverBackgroundColor": ["#45cb85", "#ebeff2", "#0089ef"],
				"hoverBorderColor": "#fff"
			}]
		},
		options: {
			legend: {
				position: "bottom"
			}
		}
	});
	new Chart(document.getElementById("barChart"), {
		"type": "bar",
		"data": {
			labels: ["Nov", "Oct", "Dec", "Jan"],
			datasets: [{
				label: "Average time of ultrasound examination",
				backgroundColor: "rgba(69, 203, 133, 0.8)",
				borderColor: "rgba(69, 203, 133, 0.8)",
				borderWidth: 1,
				hoverBackgroundColor: "rgba(69, 203, 133, 0.9)",
				hoverBorderColor: "rgba(69, 203, 133, 0.9)",
				data: [10, 9, 7, 4]
			}]
		},
		options: {
			scales: {
				xAxes: [{
					barPercentage: .4
				}],
				yAxes: [{
					ticks: {
						max: 12,
						min: 0,
						callback: function(value) {
							return value + " Min"
						}
					}
				}]
			},
			legend: {
				display: false,
			},
		}
	});
	new Chart(document.getElementById("lineChart"), {
		"type": "line",
		"data": {
			labels: ["Nov", "Oct", "Dec", "Jan"],
			datasets: [{
				label: "Precision of markers",
				fill: !0,
				lineTension: .5,
				backgroundColor: "rgba(59, 93, 231, 0.2)",
				borderColor: "#3b5de7",
				borderCapStyle: "butt",
				borderDash: [],
				borderDashOffset: 0,
				borderJoinStyle: "miter",
				pointBorderColor: "#3b5de7",
				pointBackgroundColor: "#fff",
				pointBorderWidth: 1,
				pointHoverRadius: 5,
				pointHoverBackgroundColor: "#3b5de7",
				pointHoverBorderColor: "#fff",
				pointHoverBorderWidth: 2,
				pointRadius: 1,
				pointHitRadius: 10,
				data: [50, 65, 58, 85]
			}]
		},
		"options": {
			scales: {
				yAxes: [{
					ticks: {
						max: 100,
						min: 0,
						stepSize: 10,
						callback: function(value) {
							return value + "%"
						}
					}
				}]
			},
			legend: {
				display: false,
			}
		}
	});
</script>