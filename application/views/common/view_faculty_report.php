
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="main-content">
                <div class="extra_lead_menu">
                    <div class="col-12 d-flex justify-content-end mb-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb p-0">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Report</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Faculty Report</li>
                            </ol>
                        </nav>
                    </div>
                    <section class="section">
                        <div class="section-body">
                            <div class="card card-primary shadow-sm p-3">
                                <div class="row"> 
                                    <div class="col-md-12">
                                        <div class="card-header py-0 text-center">
                                            <h4>Faculty Wise Demo Performance </h4>
                                            <ul class="nav pl-0 ml-auto mb-3">
                                                <li class="float-right ml-2">
                                                    <a href="" class="btn btn-info text-white" data-toggle="modal"
                                                    data-target=".date_filter">
                                                        <i class="fas fa-filter" data-toggle="tooltip"
                                                            data-placement="bottom" title="Filter"></i>
                                                        </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                         <div class="table-responsive">
                                                <div id="columnchart"> </div>
                                         </div>
                                    </div> 
                                </div>
                            </div>
                            <div class="card card-primary shadow-sm">    
                                <div class="card-header">
                                    <h4>Faculty Demo Report</h4>
                                    <ul class="info_ul ml-auto">
                                        <li>D : DONE</li>
                                        <li>L : LEAVE</li>
                                        <li>C : CANCEL</li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm today-rt table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th colspan="5"></th> 
                                                    <th colspan="33" style="text-align:center;">Day </th>
                                                </tr>
                                                <tr>
                                                    <th rowspan="2">Faculty Name</th>
                                                    <th rowspan="2">Total Demo</th>
                                                    <th rowspan="2">Take Demo</th>
                                                    <th rowspan="2">Done Demo</th>
                                                    <th rowspan="2">Cancel Demo</th>
                                                    <th style="text-align:center;" colspan="3">0 </th>
                                                    <th style="text-align:center;" colspan="3">1 </th>
                                                    <th style="text-align:center;" colspan="3">2 </th>
                                                    <th style="text-align:center;" colspan="3">3 </th>
                                                    <th style="text-align:center;" colspan="3">4 </th>
                                                    <th style="text-align:center;" colspan="3">5 </th>
                                                    <th style="text-align:center;" colspan="3">6 </th>
                                                    <th style="text-align:center;" colspan="3">7 </th>
                                                    <th style="text-align:center;" colspan="3">8 </th>
                                                    <th style="text-align:center;" colspan="3">9 </th>
                                                    <th style="text-align:center;" colspan="3">10 &amp; more</th>
                                                </tr>
                                                <tr>
                                                    <!-- <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th>
                                                    <th></th> -->
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                    
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                    
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                    
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                    
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                    
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                    
                                                    <th class="alert-success">D</th>
                                                    <th class="alert-warning">L</th>
                                                    <th class="alert-danger">C</th>
                                                
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($faculty_all as $val) {
                                                 $totaldemo=0;
                                                 $takedemo=0;
                                                  $donedemo=0;
                                                   $canceldemo=0;
                                                 $dd0=0;
                                                 $dd1=0;
                                                 $dd2=0;
                                                 $dd3=0;
                                                 $dd4=0;
                                                 $dd5=0;
                                                 $dd6=0;
                                                 $dd7=0;
                                                 $dd8=0;
                                                 $dd9=0;
                                                 $dd10=0;
                                                 
                                                 $dl0=0;
                                                 $dl1=0;
                                                 $dl2=0;
                                                 $dl3=0;
                                                 $dl4=0;
                                                 $dl5=0;
                                                 $dl6=0;
                                                 $dl7=0;
                                                 $dl8=0;
                                                 $dl9=0;
                                                 $dl10=0;
                                                 
                                                 $dc0=0;
                                                 $dc1=0;
                                                 $dc2=0;
                                                 $dc3=0;
                                                 $dc4=0;
                                                 $dc5=0;     
                                                 $dc6=0;
                                                 $dc7=0;
                                                 $dc8=0;
                                                 $dc9=0; 
                                                 $dc10=0;
                                                                  
                                                 foreach($faculty_analysis as $row) {
                                                    if($row->discard=="0") { 
                                                        if($val->faculty_id == $row->faculty_id) {
                                                            $totaldemo++;
                                                            if($row->attendance !=""){
                                                                $day1=0;
                                                                $all_att = explode("&&",$row->attendance);
                                                                for($i=0;$i<sizeof($all_att);$i++){
                                                                    $att = explode("/",$all_att[$i]);
                                                                    if(@$att[1]=="P"){
                                                                        $day1++;	
                                                                    }
                                                                }
                                                                if($day1!=0){
                                                                    $takedemo++;
                                                                }
                                                            }
                                                            if($row->demoStatus=="3" && $day1!=0){
                                                                $canceldemo++;
                                                            }
                                                            $day=0;
                                                            $all_att = explode("&&",$row->attendance);
                                                            for($i=0;$i<sizeof($all_att);$i++){
                                                                $att = explode("/",$all_att[$i]);
                                                                if(@$att[1]=="P"){
                                                                    $day++;	
                                                                }
                                                            }
                                                            if($row->demoStatus=="1")
                                                            {
                                                                $donedemo++;
                                                                if($day==0) { $dd0++; }
                                                                if($day==1) { $dd1++; }
                                                                if($day==2) { $dd2++; }
                                                                if($day==3) { $dd3++; }
                                                                if($day==4) { $dd4++; }
                                                                if($day==5) { $dd5++; }
                                                                if($day==6) { $dd6++; }
                                                                if($day==7) { $dd7++; }
                                                                if($day==8) { $dd8++; }
                                                                if($day==9) { $dd9++; }
                                                                if($day>=10) { $dd10++; }
                                                            }
                                                            if($row->demoStatus=="2")
                                                            {
                                                                if($day==0) { $dl0++; }
                                                                if($day==1) { $dl1++; }
                                                                if($day==2) { $dl2++; }
                                                                if($day==3) { $dl3++; }
                                                                if($day==4) { $dl4++; }
                                                                if($day==5) { $dl5++; }
                                                                if($day==6) { $dl6++; }
                                                                if($day==7) { $dl7++; }
                                                                if($day==8) { $dl8++; }
                                                                if($day==9) { $dl9++; }
                                                                if($day>=10) { $dl10++; }
                                                            }
                                                            if($row->demoStatus=="3")
                                                            {
                                                                if($day==0) { $dc0++; }
                                                                if($day==1) { $dc1++; }
                                                                if($day==2) { $dc2++; }
                                                                if($day==3) { $dc3++; }
                                                                if($day==4) { $dc4++; }
                                                                if($day==5) { $dc5++; }
                                                                if($day==6) { $dc6++; }
                                                                if($day==7) { $dc7++; }
                                                                if($day==8) { $dc8++; }
                                                                if($day==9) { $dc9++; }
                                                                if($day>=10) { $dc10++; }
                                                            }
                                                        }    
                                                    } 
                                                 }
                                                ?>
                                                <tr>
                                                    <td><?php echo $val->name; ?></td>
                                                    <td><?php echo $totaldemo; ?></td>
                                                    <td><?php echo $takedemo; ?></td>
                                                    <td><?php echo $donedemo; ?></td>
                                                    <td><?php echo $canceldemo; ?></td>
                                                    <td><?php echo $dd0; ?></td>
                                                    <td><?php echo $dl0; ?></td>
                                                    <td><?php echo $dc0; ?></td>
                                                    <td><?php echo $dd1; ?></td>
                                                    <td><?php echo $dl1; ?></td>
                                                    <td><?php echo $dc1; ?></td>
                                                    <td><?php echo $dd2; ?></td>
                                                    <td><?php echo $dl2; ?></td>
                                                    <td><?php echo $dc2; ?></td>
                                                    <td><?php echo $dd3; ?></td>
                                                    <td><?php echo $dl3; ?></td>
                                                    <td><?php echo $dc3; ?></td>
                                                    <td><?php echo $dd4; ?></td>
                                                    <td><?php echo $dl4; ?></td>
                                                    <td><?php echo $dc4; ?></td>
                                                    <td><?php echo $dd5; ?></td>
                                                    <td><?php echo $dl5; ?></td>
                                                    <td><?php echo $dc5; ?></td>
                                                    <td><?php echo $dd6; ?></td>
                                                    <td><?php echo $dl6; ?></td>
                                                    <td><?php echo $dc6; ?></td>
                                                    <td><?php echo $dd7; ?></td>
                                                    <td><?php echo $dl7; ?></td>
                                                    <td><?php echo $dc7; ?></td>
                                                    <td><?php echo $dd8; ?></td>
                                                    <td><?php echo $dl8; ?></td>
                                                    <td><?php echo $dc8; ?></td>
                                                    <td><?php echo $dd9; ?></td>
                                                    <td><?php echo $dl9; ?></td>
                                                    <td><?php echo $dc9; ?></td>
                                                    <td><?php echo $dd10; ?></td>
                                                    <td><?php echo $dl10; ?></td>
                                                    <td><?php echo $dc10; ?></td>
                                                </tr>
                                                <?php }?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                            </div>
                            
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    
   
    <div class="modal fade date_filter" tabindex="-1" role="dialog" 
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                    <h5 class="modal-title" id="date_filter">Search</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="<?php echo base_url(); ?>DemoReportController/view_faculty_report">
                        <div class="row">
                            <div class="col-6" >
                                <label>Date From:</label> 
                                <input type="date" id="fromdate" class="form-control" name="filter_demoDate_start" value="<?php if(!empty($filter_demoDate_start)) { echo $filter_demoDate_start; } ?>">  
                            </div>  
                            <div class="col-6" >
                                <label>Date To:</label> 
                                <input type="date" id="todate" class="form-control" name="filter_demoDate_end" value="<?php if(!empty($filter_demoDate_end)) { echo $filter_demoDate_end; } ?>">
                            </div>
                        </div>
                        <div class="modal-footer bg-white"> 
                            <input type="submit" class="btn btn-primary" value="Filter" name="faculty_analysis">
                            <a class="btn btn-light text-dark" href="<?php echo base_url(); ?>DemoReportController/view_faculty_report">Reset</a>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/forms-advanced-forms.js"></script>

    <!-- General JS Scripts -->
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!--Excel Download-->
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/table2excel.js"></script> 
    
    <script src="https://demo.rnwmultimedia.com/dist/assets/bundles/jquery-ui/jquery-ui.min.js"></script> 

    <script src="https://demo.rnwmultimedia.com/dist/assets/bundles/apexcharts/apexcharts.min.js"></script>
    <!-- Page Specific JS File --> 


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <script src="https://demo.rnwmultimedia.com/dist/assets/js/page/index.js"></script>

    <!-- JS Libraies -->
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="https://demo.rnwmultimedia.com/dist/assets/js/custom.js"></script> 
    <!-- Page Specific JS File --> 

    <!-- <script>
        $(function () {
            columnchart();
        });
        function columnchart(){
            var options = {
                colors: ['#00e396', '#ff0'],
            series: [{
            name: 'Servings',
            data: [44, 55, 41, 67, 22, 43, 21, 33, 45, 31, 87, 65, 35, 10, 15, 30, 38, 56, 78, 52, 63, 95, 12, 34, 50]
            }],
            annotations: {
            points: [{
                x: ' ',
                seriesIndex: 0,
                label: {
                borderColor: '#775DD0',
                offsetY: 0,
                style: {
                    color: '#fff',
                    background: '#775DD0',
                }, 
                }
            }]
            },
            chart: {
            height: 350,
            type: 'bar' 
            },
            plotOptions: {
            bar: {
                borderRadius: 10,
                columnWidth: '50%',
            } 
            },
            dataLabels: {
            enabled: false
            },
            stroke: {
            width: 2
            },
            
            grid: {
            row: {
                colors: ['#fff', '#f2f2f2']
            }
            },
            xaxis: {
            labels: {
                rotate: -90
            },
            categories: ['Jinkal Kalathiya', 'BHAVIN MADAHNI ', 'PARTH LAKKAD', 'PIYUSH NAKRANI', 'DIPAK KOLI', 'DIVYESH DESAI',
                'MILAN BHUT', 'AVKAS THUMMAR', 'AASHISH SOLANKI', 'PARTH JADHVANI', 'VRAJESH RANK', 'MEET DESAI', 'AMISHA JOSHI', 'HARSH MALAVIYA', 'DEEP RAJAPARA',
                'RIDDHI DHANANI', 'VIDIT SAVALIYA', 'NIKUNJ SHASHTRI, JALPA CHUDASAMA', 'BHAVIK GEVARIYA', 'RAKESH GOSALIYA', 'NIRBHAY VIRANI', 'PARAS BHALODIYA',
                'HITENDRA BAVADIYA', 'HITESH KOLADIYA', 'VISHAL BHADANI','OM KHENI','JENISH VAGHASIYA','SAGAR VEKARIYA','SHANTANU SHARMA ','SWANAND DARBHE','MILAN VASOYA',
                'ANKIT DHARSANDIYA','DARSHAN MANDAKNA','BHUMI LATHIYA','KRISHNA VAGHASIYA'],
            tickPlacement: 'on'
            },
            yaxis: {
            title: {
                text: 'Servings',
            },
            }
            };

            var chart = new ApexCharts(document.querySelector("#"), options);
            chart.render();
        }
    </script> -->

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);
      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Move', 'Percentage'],
          <?php foreach($faculty_all as $val) { 
              $demo_res1=0;  $ttttt=0;  $ddddd=0;
              foreach($faculty_analysis as $row) {
                   if($row->discard=="0") {
                       if($val->faculty_id==$row->faculty_id) {
                            if($row->demoStatus=="1")
                            {
                                $ttttt++;
                            }
                            if($row->demoStatus=="3" && $row->attendance!="")
                            {
                                    $day=0;
                					$all_att = explode("&&",$row->attendance);
                					
                					for($i=0;$i<sizeof($all_att);$i++)
                					{
                						$att = explode("/",$all_att[$i]);
                						if(@$att[1]=="P")
                						{
                							$day++;	
                						}
                					}
                					if($day!=0)
                					{
                                        $ttttt++;
                					}
                            }
                            if($row->demoStatus=="1")
                            {
                                $ddddd++;
                            }
                       }
                   }
              }
              
               $demo_res1 = $ddddd*100;
               if($demo_res1!=0)
               {
                  $ress = $demo_res1/$ttttt;
               }
               else
               {
                   $ress=0;
               }
              ?>
                ["<?php echo $val->name; ?>", <?php echo $ress; ?>],
                
          <?php } ?>
         
        ]);

        var options = {
            colors: ['#00e396', '#ff0'],
            height: 350,
          width: 4800,
          legend: { position: 'none' },
          chart: {
            subtitle: '' },
          axes: {
            x: {
              0: { side: 'top', label: ''} // Top x-axis.
            }
          },
          bar: { groupWidth: "70%" }
        };

        var chart = new google.charts.Bar(document.getElementById(''));
        // Convert the Classic options to Material options.
        chart.draw(data, google.charts.Bar.convertOptions(options));
      };
    </script>
        <script>
        $(function () {
            columnchart();
        });
        function columnchart(){
    var options = {
             colors: ['#67b7dc', '#6794dc', '#6771dc', '#9985E3', '#B585E3', '#D285E3', '#E385D8', '#E385BC', '#E385A0', '#E38785', '#E3A385', '#E3BF85', '#ffa57b', '#00e396', '#5864bd', '#6794dc', '#9985E3', '#01e396', '#6561dc', '#9985E3', '#B585E3', '#D255E3', '#E389D8', '#E385BC', '#E385A0'],
            series: [<?php foreach($faculty_all as $val ) { $demo_res1=0;  $ttttt=0;  $ddddd=0;
              foreach($faculty_analysis as $row) {
                   if($row->discard=="0") {
                       if($val->faculty_id==$row->faculty_id) {
                            if($row->demoStatus=="1")
                            {
                                $ttttt++;
                            }
                            if($row->demoStatus=="3" && $row->attendance!="")
                            {
                                    $day=0;
                					$all_att = explode("&&",$row->attendance);
                					
                					for($i=0;$i<sizeof($all_att);$i++)
                					{
                						$att = explode("/",$all_att[$i]);
                						if(@$att[1]=="P")
                						{
                							$day++;	
                						}
                					}
                					if($day!=0)
                					{
                                        $ttttt++;
                					}
                            }
                            if($row->demoStatus=="1")
                            {
                                $ddddd++;
                            }
                       }
                   }
              }
              
               $demo_res1 = $ddddd*100;
               if($demo_res1!=0)
               {
                  $ress = $demo_res1/$ttttt;
               }
               else
               {
                   $ress=0;
               } ?>{
                name: '<?php echo $val->name; ?>',
                data: [<?php echo $ress; ?>]
            },<?php }?>],
          annotations: {
          points: [{
            x: '',
            seriesIndex: 0,
            label: {
              borderColor: '#ff0',
              offsetY: 0,
              style: {
                color: '#fff',
                background: '#ff0',
              },
              text: 'Bananas are good',
            }
          }]
        },
        chart: {
          height: 350,
          type: 'bar',
        },
        plotOptions: {
          bar: {
            borderRadius: 50,
            columnWidth: '90%',
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          width: 1
        },
        
        grid: {
          row: {
            colors: ['#fff']
          }
        },
        xaxis: {
          labels: {
            rotate: -45
          },
          categories: [' '],
          tickPlacement: 'on'
        },
        yaxis: {
          title: {
            text: '',
          },
        },
        legend: {
            display : false 
        },
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'light',
            type: "horizontal",
            shadeIntensity: 0.25,
            gradientToColors: undefined,
            inverseColors: true,
            opacityFrom: 0.85,
            opacityTo: 0.85,
            stops: [50, 0, 100]
          },
        }
        };
        var chart = new ApexCharts(document.querySelector("#columnchart"), options);
        chart.render();
        }
    </script>

    

</body>
 
</html>