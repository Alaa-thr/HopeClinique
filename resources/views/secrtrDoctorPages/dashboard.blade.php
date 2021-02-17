@extends('layouts.scrtrDoctorApp')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
   <div class="page-wrapper">
     @if(Auth::user()->user_roles == 'adminM')
            <div class="content">
                <div class="row">                  
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{$nombrDoctors}}</h3>
                                <span class="widget-title1">Doctors <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{$nombrPatients}}</h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{$nombrSecretary}}</h3>
                                <span class="widget-title4">Secretary <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Appointment/Ordinances's number per current year</h4>
                                </div>
                                <canvas id="bargraph"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
             
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Appointment's number for the last month per doctor</h4>
                                </div>
                                <canvas id="pie-chart"></canvas>
                            </div>
                        </div>
                    </div>
               
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Patient's number per month</h4>
                                </div>
                                <canvas id="line-chart-patient"></canvas>
                            </div>
                        </div>
                    </div>                  
                </div>                 
              </div>
            @endif
            <div class="content">

            @if(Auth::user()->user_roles == 'doctor')
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3>{{$nombrPatientsPerDoctor}}</h3>
                                <span class="widget-title2">Patients <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(Auth::user()->user_roles == 'adminM')
                <div class="row m-t--50">
                    <div class="col-md-12 col-sm-12 col-lg-12 col-xl-12">
                            <div class="dash-widget">
                                <h3>Statistics for me</h3>    
                            </div>
                        </div>
                </div>
            @endif
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Appointments's number per month of current year</h4>
                                </div>
                                <canvas id="appointmentPerMonth"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Ordinances's number per month of current year</h4>
                                </div>
                                <canvas id="ordinancePerMonth"></canvas>
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
			label: "Appointments's Number",
			backgroundColor: 'rgba(0, 158, 251, 0.5)',
			borderColor: 'rgba(0, 158, 251, 1)',
			borderWidth: 1,
			data: [<?php print_r($data1[0])?>,<?php print_r($data1[1])?>,<?php print_r($data1[2])?>,<?php print_r($data1[3])?>,
    <?php print_r($data1[4])?>,<?php print_r($data1[5])?>,<?php print_r($data1[6])?>,<?php print_r($data1[7])?>,<?php print_r($data1[8])?>,
  <?php print_r($data1[9])?>,<?php print_r($data1[10])?>,<?php print_r($data1[11])?>]
  		}, {
			label: "Ordinances's Number",
			backgroundColor: 'rgba(255, 188, 53, 0.5)',
			borderColor: 'rgba(255, 188, 53, 1)',
			borderWidth: 1,
			data: [<?php print_r($data2[0])?>,<?php print_r($data2[1])?>,<?php print_r($data2[2])?>,<?php print_r($data2[3])?>,
      <?php print_r($data2[4])?>,<?php print_r($data2[5])?>,<?php print_r($data2[6])?>,<?php print_r($data2[7])?>,<?php print_r($data2[8])?>,
      <?php print_r($data2[9])?>,<?php print_r($data2[10])?>,<?php print_r($data2[11])?>]
		}]
	};

    if(document.getElementById('bargraph') != null){
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
    }
	

	// pie Chart
    var appointmentNumber = [], doctorsName = [], backgroundColors = [];

   <?php 
        $i = 0;
        for($i=0; $i < sizeof($data4) ;$i++) { ?>
            appointmentNumber.push(<?php echo $data4[$i];?>);
        <?php }
        for($i=0; $i < sizeof($data3) ;$i++) { ?>
            doctorsName.push("<?php echo strtoupper($data3[$i]);?>");
        <?php }
   ?>
   j=25,r=255,g=163,b=102;
    for (var i = 0; i < appointmentNumber.length; i++) {
        backgroundColors.push("rgb("+r+","+g+","+b+")");
        g+=40;
        b+=30;
        if(g > 255) {
            g= 100;
        }else if(b > 255){
            b=50;
        }
    }
    if(document.getElementById('pie-chart') != null){
        var linectx = document.getElementById('pie-chart').getContext('2d');
        window.myPie = new Chart(linectx,{
            type: 'pie',
            data: {
                datasets: [{
                    data: appointmentNumber,
                    backgroundColor: backgroundColors,
                }],
                labels: doctorsName
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: true,
                }
            }
        });
    }
    if(document.getElementById('line-chart-patient') != null){
        var lignePatient = document.getElementById('line-chart-patient').getContext('2d');
        window.myline = new Chart(lignePatient,{
            type: 'line',
            data: {
                datasets: [{
                    data:  [<?php print_r($data5NbrPatient[0])?>,<?php print_r($data5NbrPatient[1])?>,<?php print_r($data5NbrPatient[2])?>,<?php print_r($data5NbrPatient[3])?>,
      <?php print_r($data5NbrPatient[4])?>,<?php print_r($data5NbrPatient[5])?>,<?php print_r($data5NbrPatient[6])?>,<?php print_r($data5NbrPatient[7])?>,<?php print_r($data5NbrPatient[8])?>,
      <?php print_r($data5NbrPatient[9])?>,<?php print_r($data5NbrPatient[10])?>,<?php print_r($data5NbrPatient[11])?>],
        
                    backgroundColor: ['rgba(102, 0, 51,0.3)'],
                    borderColor: 'rgb(102, 0, 51)',
                    borderWidth: 2,
                }],
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: true,
                }
            }
        });
    }
    if(document.getElementById('appointmentPerMonth') != null){
        var lignePatient = document.getElementById('appointmentPerMonth').getContext('2d');
        window.myline = new Chart(lignePatient,{
            type: 'line',
            data: {
                datasets: [{
                    data:  [<?php print_r($dataNombreAppointmentDocPerMonth[0])?>,<?php print_r($dataNombreAppointmentDocPerMonth[1])?>,<?php print_r($dataNombreAppointmentDocPerMonth[2])?>,<?php print_r($dataNombreAppointmentDocPerMonth[3])?>,
      <?php print_r($dataNombreAppointmentDocPerMonth[4])?>,<?php print_r($dataNombreAppointmentDocPerMonth[5])?>,<?php print_r($dataNombreAppointmentDocPerMonth[6])?>,<?php print_r($dataNombreAppointmentDocPerMonth[7])?>,<?php print_r($dataNombreAppointmentDocPerMonth[8])?>,
      <?php print_r($dataNombreAppointmentDocPerMonth[9])?>,<?php print_r($dataNombreAppointmentDocPerMonth[10])?>,<?php print_r($dataNombreAppointmentDocPerMonth[11])?>],
        
                    backgroundColor: ['rgba(255, 255, 26,0.3)'],
                    borderColor: 'rgb(255, 255, 26)',
                    borderWidth: 2,
                }],
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: true,
                }
            }
        });
    }  
    if(document.getElementById('ordinancePerMonth') != null){
        var lignePatient = document.getElementById('ordinancePerMonth').getContext('2d');
        window.myline = new Chart(lignePatient,{
            type: 'line',
            data: {
                datasets: [{
                    data:  [<?php print_r($dataNombreOrdonnanceDocPerMonth[0])?>,<?php print_r($dataNombreOrdonnanceDocPerMonth[1])?>,<?php print_r($dataNombreOrdonnanceDocPerMonth[2])?>,<?php print_r($dataNombreOrdonnanceDocPerMonth[3])?>,
      <?php print_r($dataNombreOrdonnanceDocPerMonth[4])?>,<?php print_r($dataNombreOrdonnanceDocPerMonth[5])?>,<?php print_r($dataNombreOrdonnanceDocPerMonth[6])?>,<?php print_r($dataNombreOrdonnanceDocPerMonth[7])?>,<?php print_r($dataNombreOrdonnanceDocPerMonth[8])?>,
      <?php print_r($dataNombreOrdonnanceDocPerMonth[9])?>,<?php print_r($dataNombreOrdonnanceDocPerMonth[10])?>,<?php print_r($dataNombreOrdonnanceDocPerMonth[11])?>],
        
                    backgroundColor: ['rgba(26, 26, 255,0.3)'],
                    borderColor: 'rgb(26, 26, 255)',
                    borderWidth: 2,
                }],
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            },
            options: {
                responsive: true,
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: true,
                }
            }
        });
    }   

        
    
</script>
@endsection
