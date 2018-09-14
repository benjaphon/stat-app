<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();
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

/*
 * header***********************************************************************
 */
require 'dist/template/back/header.php';
/*
 * header***********************************************************************
 */
?>

<!--style for this page-->

<!-- Bootstrap Select CSS -->
<link href="<?php echo $baseUrl; ?>/vendor/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet">

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->  

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Create Subject</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <form action="<?php echo $baseUrl; ?>/back/graph/form-create-subject" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject_name" required>
                    </div>

                    <div class="form-group">
                        <label>Chart Type</label>
                        <select class="form-control" name="chart_type">
                            <option value='แท่ง'>แท่ง</option>
                            <option value='แท่ง (แนวนอน)'>แท่ง (แนวนอน)</option>
                            <option value='เส้น'>เส้น</option>
                            <option value='วงกลม'>วงกลม</option>
                        </select>
                    </div>
                    
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="glyphicon glyphicon-floppy-save"></i>
                        Save
                    </button>
                    <a class="btn btn-default" href="<?php echo $baseUrl; ?>/back/graph">
                        <i class="glyphicon glyphicon-remove-circle"></i>
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
                

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

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $baseUrl; ?>/vendor/bootstrap-select/js/bootstrap-select.min.js"></script>

<script>
$(document).ready(function(){
    $( "form" ).submit(function() {
        swal("Good job!", "Save Success!", "success");
    });
});
</script>


