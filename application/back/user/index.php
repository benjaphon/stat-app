<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();
$option = array(
    "table" => "users"
);
$query = $db->select($option);
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

<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->  

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Users</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <a class="btn btn-lg btn-success btn-xs-block" href="<?php echo $baseUrl; ?>/back/user/create">
                <i class="fa fa-plus"></i>
                <span><strong>Create</strong></span>
            </a>
            <a id="btn_edit" class="btn btn-lg btn-warning btn-xs-block disabled">
                <i class="fa fa-edit"></i>
                <span><strong>Edit</strong></span>            
            </a>          
            </a>
            <a id="btn_delete" class="btn btn-lg btn-danger btn-xs-block disabled">
                <i class="fa fa-trash" aria-hidden="true"></i>
                <span><strong>Delete</strong></span>            
            </a>
        </div>
    </div>

    
</div>
<div class="row">
    <div class="col-lg-12">
        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>User Type</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = $db->get($query)) { ?>
                <tr class="odd gradeX">
                    <td><?php echo $row['id']; ?></td>
                    <td>
                        <?php echo $row['username']; ?>
                        <input type="hidden" id="row_id" value="<?php echo $row['id']; ?>" />
                    </td>
                    <td><?php echo $row['user_type']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
    <!-- /.col-lg-12 -->
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

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    var table = $('#dataTables').DataTable({
        responsive: true,
        
        "order": [[ 0, "desc" ]]
    }).column( 0 ).visible( false );

    $('#dataTables tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            $('#btn_edit,#btn_delete').addClass('disabled');
        }
        else {
            if(<?php echo $db->rows($query); ?>){
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('#btn_edit,#btn_delete').removeClass('disabled');
            }
        }
    } );

    $('#btn_edit').click( function () {
        var id = table.$('tr.selected').find("#row_id").val();
        window.location.replace("<?php echo $baseUrl; ?>/back/user/update/" + id);
    } );

    $('#btn_delete').click( function () {
        var id = table.$('tr.selected').find("#row_id").val();
        
        swal({
            title: "Are you sure?",
            text: "Your will not be able to recover this row!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){
            swal("Deleted!", "Your row has been deleted.", "success");
            $.get("<?php echo $baseUrl; ?>/back/user/form_delete/" + id);
            table.row('.selected').remove().draw( false );
            $('#btn_edit,#btn_delete').addClass('disabled');
        });

    } );
});
</script>

