@extends('layouts.scrtrDoctorApp')
@section('content')
   <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>98</h3>
                                <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>1072</h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>72</h3>
                                <span class="widget-title3">Attend <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>618</h3>
                                <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Nombres des RDV pour le mois précédent"{{$mois}}"</h4>
                                </div>
                                <canvas id="pie-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Nombre RDV/Prescriptions Par Mois</h4>
                                </div>
                                <canvas id="bargraph"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          </div>
<script>

	// Bar Chart

	var barChartData = {
		labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
		datasets: [{
			label: 'Nombre RDV',
			backgroundColor: 'rgba(0, 158, 251, 0.5)',
			borderColor: 'rgba(0, 158, 251, 1)',
			borderWidth: 1,
			data: [<?php print_r($data1[0])?>,<?php print_r($data1[1])?>,<?php print_r($data1[2])?>,<?php print_r($data1[3])?>,
    <?php print_r($data1[4])?>,<?php print_r($data1[5])?>,<?php print_r($data1[6])?>,<?php print_r($data1[7])?>,<?php print_r($data1[8])?>,
  <?php print_r($data1[9])?>,<?php print_r($data1[10])?>,<?php print_r($data1[11])?>]
  		}, {
			label: 'Nombre Prescriptions',
			backgroundColor: 'rgba(255, 188, 53, 0.5)',
			borderColor: 'rgba(255, 188, 53, 1)',
			borderWidth: 1,
			data: [<?php print_r($data2[0])?>,<?php print_r($data2[1])?>,<?php print_r($data2[2])?>,<?php print_r($data2[3])?>,
      <?php print_r($data2[4])?>,<?php print_r($data2[5])?>,<?php print_r($data2[6])?>,<?php print_r($data2[7])?>,<?php print_r($data2[8])?>,
      <?php print_r($data2[9])?>,<?php print_r($data2[10])?>,<?php print_r($data2[11])?>]
		}]
	};

	var ctx = document.getElementById('bargraph').getContext('2d');
	window.myBar = new Chart(ctx, {
		type: 'bar',
		data: barChartData,
		options: {
			responsive: true,
			legend: {
				display: true,
			}
		}
	});

	// pie Chart
	var linectx = document.getElementById('pie-chart').getContext('2d');
	window.myLine = new Chart(linectx, {
    type: 'pie',
      data: {
        labels: ["Admin Admin", "Houda", "Alaà", "Amin", "Ilyess"],
        datasets: [{
          label: "Population (millions)",
          data: [<?php print_r($data4[0])?>,<?php print_r($data4[1])?>]

        }]
      },
      options: {
        title: {
          display: true,
        }
      }
  });

</script>
@endsection
