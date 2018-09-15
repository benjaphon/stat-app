<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();

$option = array(
    'table' => 'subject',
    'condition' => "id={$_GET['id']}"
);

$query_subject = $db->select($option);
$row_subject = $db->get($query_subject);

$option = array(
    'table' => 'turnover LEFT JOIN geography ON geography.GEO_ID = turnover.geo_id LEFT JOIN provinces ON provinces.PROVINCE_ID = turnover.province_id',
    'condition' => "subject_id={$_GET['id']}"
);

$query_turnover = $db->select($option);

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
        <h1 class="page-header">Update Turnover</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <a class="btn btn-lg btn-default" href="<?php echo $baseUrl; ?>/back/graph">
                <i class="glyphicon glyphicon-remove-circle"></i>
                Back
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-6">
        <form action="<?php echo $baseUrl; ?>/back/graph/form-update-subject" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <input type="hidden" name="id" value="<?php echo $row_subject['id'] ?>">
                    <div class="form-group">
                        <label>Subject</label>
                        <input type="text" class="form-control" name="subject_name" value="<?php echo $row_subject['name']; ?>" required>
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

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" rows="5" name="description"><?php echo $row_subject['description']; ?></textarea>
                    </div>
             
                </div>
                <div class="panel-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-edit"></i>
                        Update
                    </button>
                    <button type="reset" class="btn btn-default" href="<?php echo $baseUrl; ?>/back/graph">
                        <i class="fa fa-refresh"></i>
                        Reset
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">

            <div class="panel-heading">
                <form id="turnover_form" action="<?php echo $baseUrl; ?>/back/graph/form-create-turnover" method="post">
                    <input type="hidden" name="subject_id" value="<?php echo $_GET['id']; ?>">
                    <div class="form-group">
                        <label>Geography</label>
                        <select class="form-control selectpicker" name="geography">
                            <option value="0" selected="selected">None</option>
                            <?php while ($row = $db->get($query_geo)){
                                echo "<option value='{$row['GEO_ID']}'>{$row['GEO_NAME']}</option>";
                            }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Province</label>
                        <select class="form-control selectpicker" data-live-search="true" name="province">
                            <option value="0" selected="selected">None</option>
                            <?php while ($row = $db->get($query_province)){
                                echo "<option value='{$row['PROVINCE_ID']}'>{$row['PROVINCE_NAME']}</option>";
                            }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Year</label>
                        <input class="form-control" type="text" maxlength="4" name="year" placeholder="พ.ศ." required/>
                    </div>
                    <div class="form-group">
                        <label>Budget</label>
                        <input class="form-control" type="number" name="budget" step="0.00001" placeholder="งบประมาณ (ล้านบาท)" required/>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="btn_add" class="btn btn-success btn-xs-block">
                            <i class="fa fa-plus"></i>
                            <span><strong>Add</strong></span>
                        </button>
                        <a id="btn_delete" class="btn btn-danger btn-xs-block disabled">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                            <span><strong>Delete</strong></span>            
                        </a>
                    </div>
                </form>
            </div>

            <div class="panel-footer">

                <div class="table-responsive">
                    <table id="tbl_turnover" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ภาค</th>
                                <th>จังหวัด</th>
                                <th>ปี</th>
                                <th>จำนวน (ล้านบาท)</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while ($row_turnover = $db->get($query_turnover)) { ?>
                            <tr>
                                <td>
                                    <input type="hidden" id="row_id" value="<?php echo $row_turnover['id']; ?>">
                                    <?php echo $row_turnover['GEO_NAME']; ?>
                                </td>
                                <td><?php echo $row_turnover['PROVINCE_NAME']; ?></td>
                                <td><?php echo $row_turnover['operating_year']; ?></td>
                                <td><?php echo $row_turnover['operating_budget']; ?></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
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
    var table = $('#tbl_turnover').DataTable({
        "searching": false,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "ordering": false
    });

    $("select[name='chart_type']").val("<?php echo $row_subject['chart_type']; ?>");

    $( "select[name='geography']" ).change(function () {
        var geoID = $(this).val();
       
        if(geoID) {
            $.ajax({
                url: "<?php echo $baseUrl; ?>/back/graph/form-select-province",
                dataType: 'Json',
                data: {'geo_id':geoID},
                success: function(data) {
                    $('select[name="province"]').empty();
                    $('select[name="province"]').append('<option value="0">None</option>');
                    $.each(data, function(key, value) {
                        $('select[name="province"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                    $('select[name="province"]').selectpicker('refresh');
                }
            });
        }else{
            $('select[name="geography"]').empty().append('<option value="0">None</option>');
            $('select[name="province"]').selectpicker('refresh');
        }
    });

    $('#tbl_turnover tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
            $('#btn_delete').addClass('disabled');
        }
        else {
            if(<?php echo $db->rows($query_turnover); ?>){
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
                $('#btn_delete').removeClass('disabled');
            }
        }
    } );

    $( "#turnover_form" ).submit(function( event ) {
 
        // Stop form from submitting normally
        event.preventDefault();

        // Get some values from elements on the page:
        var $form = $( this ),
        url = $form.attr( "action" );

        // Send the data using post
        var posting = $.post( url, $form.serialize() );

        posting.done(function( data ) {
            table.row.add( [
                "<input type='hidden' id='row_id' value='"+data+"'></input>"+
                $("select[name='geography'] option:selected").text(),
                $("select[name='province'] option:selected").text(),
                $("input[name='year']").val(),
                $("input[name='budget']").val(),
            ] ).draw( false );
            $form.trigger("reset");
            $('select[name="geography"],select[name="province"]').val("0");
            $( "select[name='geography']" ).change().focus();
        });
    });

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
            $.get("<?php echo $baseUrl; ?>/back/graph/form-delete-turnover/" + id);
            table.row('.selected').remove().draw( false );
            $('#btn_delete').addClass('disabled');
        });

    } );
});
</script>


