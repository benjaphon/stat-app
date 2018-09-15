<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();

$option = array(
    'table' => 'users',
    'condition' => "id={$_GET['id']}"
);

$query = $db->select($option);
$row = $db->get($query);
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
        <h1 class="page-header">Update User</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <form action="<?php echo $baseUrl; ?>/back/user/form_update" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <label for="username">Username</label>
                        <input class="form-control" maxlength="50" name="username" type="text" value="<?php echo $row['username']; ?>" autocomplete="off" required />
                    </div>
                    <div class="form-group">
                        <label for="old_password">Old Password</label>
                        <input class="form-control" maxlength="50" name="old_password" type="password" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="new_password">New Password</label>
                        <input class="form-control" maxlength="50" name="new_password" type="password" autocomplete="off" />
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirm">New Password Confirm</label>
                        <input class="form-control" maxlength="50" name="new_password_confirm" type="password" autocomplete="off" />
                    </div>

                    <div class="form-group">
                        <label>User Type</label>
                        <select class="form-control" name="user_type">
                            <option value='admin'>Admin</option>
                        </select>
                    </div>
                    
                </div>
                <div class="panel-footer">
                    <a id="save" class="btn btn-success">
                        <i class="glyphicon glyphicon-floppy-save"></i>
                        Save
                    </a>
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

    $("#save").click(function(e){
        e.preventDefault();
        $form = $("form");

        $.post("<?php echo $baseUrl; ?>/back/user/check_user", $form.serialize(), function(data){
            if(data.status){
                 
                if($("input[name='old_password']").val()){

                //validate
                $.post("<?php echo $baseUrl; ?>/back/user/check_old_password", $form.serialize(), function(data){
                    if(data=='true'){

                        if( ($("input[name='new_password']").val() == "") || ($("input[name='new_password_confirm']").val() == "") ){
                            swal("Error!", "กรุณาระบุ password ใหม่", "error");
                            return false;
                        }

                        if( $("input[name='new_password']").val() != $("input[name='new_password_confirm']").val() ){
                            swal("Error!", "password ไม่ตรงกัน", "error");
                            return false;
                        }

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
                        swal("Error!", "password ไม่ถูกต้อง", "error");
                        return false;
                    };
                });
                } else {

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

                };

            } else {
                swal("Save Fail!", data.msg, "error");
            };
            
        }, "json");

        

    });

    $("select[username='user_type']").val("<?php echo $row['user_type']; ?>");
});

</script>


