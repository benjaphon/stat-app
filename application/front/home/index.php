<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();
$option = array(
    "table" => "subject",
    "order" => "id DESC"
);
$query = $db->select($option);

$option = array(
    'table' => 'geography'
);

$query_geo = $db->select($option);

$option = array(
    'table' => 'provinces'
);

$query_province = $db->select($option);


/*
 * php code///////////**********************************************************
 */
?>

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $baseUrl; ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $baseUrl; ?>/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $baseUrl; ?>/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $baseUrl; ?>/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Sweet Alert -->
    <link href="<?php echo $baseUrl; ?>/vendor/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $baseUrl; ?>/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Bootstrap Select CSS -->
    <link href="<?php echo $baseUrl; ?>/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">
<style>

#logo {
    margin-bottom: 20px;
}

#banner img {
    width: 100%;
}

.page-header {}

footer {
    min-height: 100px;
    background-color: #66CDAA;
    color: white;
}

footer .footer-copyright {
    padding: 50px 0;
}

.form-control, .btn{
  -webkit-border-radius: 3rem;
     -moz-border-radius: 3rem;
          border-radius: 3rem;
}

.description {
    padding-top: 20px;
}

.vertical-middle{
    display: flex;
    align-items: center;
}

.graph-collapse {
    display: none;
}

</style>
<body>
    
<div class="container">
    <nav class="text-right">
        <a class="btn" href="<?php echo $baseUrl; ?>/back/user/login">Login</a>
    </nav>
    <header>
        <div class="row">
            <div id="logo" class="col-lg-12 text-center">
                <img src="dist/img/logo.png" alt="logo">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div id="banner">
                    <img src="dist/img/banner.jpg" alt="banner">
                </div>
            </div>
        </div>
    </header>
    <div class="page-header text-center">
        <h1>สถิติที่ SME ต้องรู้</h1>
    </div>

    <?php 
        $i = 0;
        while ($row_subject = $db->get($query)){
            $i += 1;
            $db->point($query_geo, 0);
            $db->point($query_province, 0);
    ?>

    <div class="row <?php echo ($i > 5)?"graph-collapse":""; ?> ">
        <div class="col-lg-12">
        
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a data-toggle="collapse" href="#collapse-<?php echo $row_subject['id']; ?>">
                        <div class="row vertical-middle">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <h3 class="panel-title">
                                        <?php echo $row_subject['name']; ?>
                                        <i style="float: right;" class="fa fa-long-arrow-right"></i>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div id="collapse-<?php echo $row_subject['id']; ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="hidden" name="subject_id" value="<?php echo $row_subject['id']; ?>">
                                    <select class="form-control selectpicker" name="geography">
                                        <option value="0" selected="selected">None</option>
                                        <?php while ($row = $db->get($query_geo)){
                                            echo "<option value='{$row['GEO_ID']}'>{$row['GEO_NAME']}</option>";
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <select class="form-control selectpicker" data-live-search="true" name="province">
                                        <option value="0" selected="selected">None</option>
                                        <?php while ($row = $db->get($query_province)){
                                            echo "<option value='{$row['PROVINCE_ID']}'>{$row['PROVINCE_NAME']}</option>";
                                        }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <input class="form-control" type="text" maxlength="4" name="year" placeholder="พ.ศ." required/>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <select class="form-control text-right" name="chart_type">
                                        <option value='แท่ง' <?php echo ($row_subject['chart_type']=="แท่ง")?"selected='selected'":''; ?> >แท่ง</option>
                                        <option value='แท่ง (แนวนอน)' <?php echo ($row_subject['chart_type']=="แท่ง (แนวนอน)")?"selected='selected'":''; ?> >แท่ง (แนวนอน)</option>
                                        <option value='เส้น' <?php echo ($row_subject['chart_type']=="เส้น")?"selected='selected'":''; ?> >เส้น</option>
                                        <option value='วงกลม' <?php echo ($row_subject['chart_type']=="วงกลม")?"selected='selected'":''; ?> >วงกลม</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <button type="button" name="filter" class="btn btn-block btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <canvas name="myChart" subject_id="<?php echo $row_subject['id']; ?>" chartType="<?php echo $row_subject['chart_type']; ?>" width="400" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="row description">
                            <div class="col-lg-12">
                                <p><?php echo $row_subject['description']; ?></p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php } ?>

    <div class="row">
        <div class="col-lg-12">
            <div class="form-group text-center">
                <button type="button" id="btn_graph_collapse" class="btn btn-lg btn-default">ดูเพิ่มเติม</button>
            </div>
        </div>
    </div>

<!-- Footer -->
<footer class="page-footer font-small blue">

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">
    © 2018 บริษัทจัดการโดย สำนักงานส่งเสริมวิสาหกิจขนาดกลางและขนาดย่อม (สสว.)
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->

</div>

    <!-- jQuery -->
    <script src="<?php echo $baseUrl; ?>/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $baseUrl; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $baseUrl; ?>/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $baseUrl; ?>/dist/js/sb-admin-2.js"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo $baseUrl; ?>/vendor/sweetalert/sweetalert.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $baseUrl; ?>/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>

    <!-- chartjs -->
    <script src="<?php echo $baseUrl; ?>/vendor/nnnick/chartjs/dist/Chart.min.js"></script>
    <script src="<?php echo $baseUrl; ?>/js/chartjs-plugin-annotation.min.js"></script>

    <script>

    //Initial Variable
    var myBarChart = [];

    var initData = {
        labels: [],
        datasets: [{
            label: "ผลประกอบการ",
            backgroundColor: "#337ab7",
            data: [],
        }]
    };

    var initOptions = {

        responsive: true,
        maintainAspectRatio: true,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }

    };
    
    //------------------//
    //Function

    function createChart(ctx,chartType,data,options){
        return new Chart(ctx, {
                type: chartType,
                data: data,
                options: options
            });
    }

    function initChart() {

        $("canvas[name='myChart']").each(function(index){
            var ctx = this.getContext('2d');
            var id = $(this).attr( "subject_id" );
            var type = $(this).attr( "chartType" );
            var chartType = realChartType(type);
            
            myBarChart[id] = createChart(ctx,chartType,initData,initOptions)

        });
        
    }

    function realChartType(type){

        switch (type) {
                case "แท่ง":
                    chartType = 'bar';
                    break;
                case "แท่ง (แนวนอน)":
                    chartType = 'horizontalBar';
                    break;    
                case "เส้น":
                    chartType = 'line';
                    break;
                case "วงกลม":
                    chartType = 'pie';
                    break;
            };

        return chartType;
    }

    //------------------//

    $(document).ready(function(){
        
        initChart();

        $( "#btn_graph_collapse" ).click(function(){
            $( ".graph-collapse:lt(5)" ).show("slow").removeClass("graph-collapse");
        });

        $( "select[name='geography']" ).change(function () {
            var geoID = $(this).val();
            var parent = $(this).parents(".panel");
            var select_province = parent.find("select[name='province']");

            if(geoID) {
                $.ajax({
                    url: "<?php echo $baseUrl; ?>/front/home/form-select-province",
                    dataType: 'Json',
                    data: {'geo_id':geoID},
                    success: function(data) {
                        select_province.empty();
                        select_province.append('<option value="0">None</option>');
                        $.each(data, function(key, value) {
                            select_province.append('<option value="'+ key +'">'+ value +'</option>');
                        });
                        select_province.selectpicker('refresh');
                    }
                });
            }else{
                $(this).empty().append('<option value="0">None</option>');
                select_province.selectpicker('refresh');
            }
        });

        $("button[name='filter']").click(function(event){
            event.preventDefault();
            var parent = $(this).parents(".panel");

            var ctx = parent.find("canvas[name='myChart']").get(0).getContext('2d');
            var id = parent.find("input[name='subject_id']").val();
            var geo_id = parent.find("select[name='geography']").val();
            var province_id = parent.find("select[name='province']").val();
            var year = parent.find("input[name='year']").val();
            var type = parent.find("select[name='chart_type']").val();
            var chartType = realChartType(type);

            $.post( "<?php echo $baseUrl; ?>/front/home/form-select-data", { subject_id: id, geo_id: geo_id, province_id: province_id, year: year }, function(result){
                
                myBarChart[id].destroy();
                var data = {
                    labels: result.operating_year,
                    datasets: [{
                        label: "ผลประกอบการ",
                        backgroundColor: "#337ab7",
                        fill: false,
                        data: result.SUM_RESULT_YEAR,
                    }]
                };

                if (chartType=="line") {
                    data.datasets[0].borderColor = "#337ab7";
                }
                
                myBarChart[id] = createChart(ctx,chartType,data,initOptions)
                console.log(myBarChart[id]);

            }, "json");
        });

        $("select[name='chart_type']").change(function(){
            var type = $(this).val();
            var parent = $(this).parents(".panel");

            var id = parent.find("input[name='subject_id']").val();
            var ctx = parent.find("canvas[name='myChart']").get(0).getContext('2d');
            var chartType = realChartType(type);
            var data = myBarChart[id].data;
            
            if (chartType=="line") {
                data.datasets[0].borderColor = "#337ab7";
            }else{
                delete data.datasets[0].borderColor;
            }
            console.log(data);
            myBarChart[id].destroy();
            myBarChart[id] = createChart(ctx,chartType,data,initOptions)
        });

    });

    
    </script>

</body>
</html>