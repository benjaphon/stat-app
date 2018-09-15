<?php
/*
 * php code///////////**********************************************************
 */

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
        <h1 class="page-header">Create User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <form action="<?php echo $baseUrl; ?>/back/user/form_create" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>

                    <div class="form-group">
                        <label>User Type</label>
                        <select class="form-control" name="user_type">
                            <option value='admin'>Admin</option>
                        </select>
                    </div>
                    
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="glyphicon glyphicon-floppy-save"></i>
                        Save
                    </button>
                    <a class="btn btn-default" href="<?php echo $baseUrl; ?>/back/user">
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
    $( "form" ).on("submit", function(e) {
        e.preventDefault();
        $form = $(this);

        $.post("<?php echo $baseUrl; ?>/back/user/check_user", $form.serialize(), function(data){
            if(data.status){

                $.post($form.attr('action'), $form.serialize(), function(data){
                    
                    if(data.status){
                        swal({
                            title: "Good job!", 
                            text: "Save Success!", 
                            type: "success"
                        }, function() {
                            window.location.replace("<?php echo $baseUrl ?>/back/user");
                        });
                    } else {
                        swal("Save Fail!", data.msg, "error");
                    };
                }, "json");
            } else {
                swal("Save Fail!", data.msg, "error");
            };
            
        }, "json");

    });
});
</script>


