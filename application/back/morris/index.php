<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();
/*
 * php code///////////**********************************************************
 */

/*
 * header***********************************************************************
 */
require 'dist/template/back/header.php';
/*
 * header***********************************************************************
 */
?>

<!--style for this page-->
<!-- Morris Charts CSS -->
<link href="<?php echo $baseUrl; ?>/vendor/morrisjs/morris.css" rel="stylesheet">


<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->  

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Morris.js Charts</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Area Chart Example
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-area-chart"></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Bar Chart Example
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-bar-chart"></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Line Chart Example
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-line-chart"></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Donut Chart Example
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-donut-chart"></div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Morris.js Usage
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <p>Morris.js is a jQuery based charting plugin created by Olly Smith. In SB Admin, we are using the most recent version of Morris.js which includes the resize function, which makes the charts fully responsive. The documentation for Morris.js is available on their website, <a target="_blank" href="http://morrisjs.github.io/morris.js/">http://morrisjs.github.io/morris.js/</a>.</p>
                <a target="_blank" class="btn btn-default btn-lg btn-block" href="http://morrisjs.github.io/morris.js/">View Morris.js Documentation</a>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
<!-- /.row -->

<!--main content end-->

<?php
/*
 * footer***********************************************************************
 */
require 'dist/template/back/footer.php';
/*
 * footer***********************************************************************
 */

 ?>

<!--script for this page-->
<!-- Morris Charts JavaScript -->
<script src="<?php echo $baseUrl; ?>/vendor/raphael/raphael.min.js"></script>
<script src="<?php echo $baseUrl; ?>/vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo $baseUrl; ?>/data/morris-data.js"></script>
