<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();
$option_user = array(
    "table" => "users",
    "condition" => "id='{$_GET['id']}'"
);
$query_user = $db->select($option_user);
$rs_user = $db->get($query_user);


$title = 'แก้ไขผู้ใช้งาน : ' . $rs_user['username'];
/*
 * php code///////////**********************************************************
 */

/*
 * header***********************************************************************
 */
require 'assets/template/back/header.php';
/*
 * header***********************************************************************
 */
?>
 <!-- **********************************************************************************************************************************************************
  MAIN CONTENT
  *********************************************************************************************************************************************************** -->
  <!--main content start-->
  <section id="main-content">
      <section class="wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">แก้ไขข้อมูล <?php echo $rs_user['username']; ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="subhead">
                <!--<a role="button" id="save" class="btn btn-success btn-xs new-data" href="#">
                    <i class="glyphicon glyphicon-floppy-save"></i>
                    Save
                </a>
                <a role="button" class="search-button btn btn-default btn-xs" href="<?php echo $baseUrl; ?>/back/user">
                    <i class="glyphicon glyphicon-remove-circle"></i>
                    Cancel
                </a>-->
                <a role="button" class="search-button btn btn-danger btn-xs" href="<?php echo $baseUrl; ?>/back/user">
                    <i class="glyphicon glyphicon-circle-arrow-left"></i>
                    ย้อนกลับ
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-horizontal" style="margin-top: 10px;">
                <form id="user-form" action="<?php echo $baseUrl; ?>/back/user/form_update/<?php echo $rs_user['id']; ?>" method="post">
                    <input type="hidden" name="user_type" value="admin">
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" for="User_firstname">ชื่อจริง</label>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $rs_user['firstname'];?></label>
                        </div>
                        <!--<div class="col-sm-4">
                            <input maxlength="100" class="form-control input-sm" name="firstname" id="firstname" type="text" value="<?php echo $rs_user['firstname'];?>" />
                        </div>-->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" for="User_lastname">นามสกุล</label>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $rs_user['lastname'];?></label>
                        </div>
                        <!--<div class="col-sm-4">
                            <input maxlength="100" class="form-control input-sm" name="lastname" id="lastname" type="text" value="<?php echo $rs_user['lastname'];?>" />
                        </div>-->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" for="User_username">Username</label>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $rs_user['username'];?></label>
                        </div>
                        <!--<div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="50" name="username" id="username" type="text" value="<?php echo $rs_user['username'];?>" />
                        </div>-->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_email">อีเมล์</label>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $rs_user['email'];?></label>
                        </div>
                        <!--<div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="100" name="email" id="email" type="text" value="<?php echo $rs_user['email'];?>" />
                        </div>-->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_phone">โทรศัพท์</label>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $rs_user['phone'];?></label>
                        </div>
                        <!--<div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="20" name="phone" id="phone" type="text" value="<?php echo $rs_user['phone'];?>" />
                        </div>-->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_address">ที่อยู่</label>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $rs_user['address'];?></label>
                        </div>
                        <!--<div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="200" name="address" id="address" type="text" value="<?php echo $rs_user['address'];?>" />
                        </div>-->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_district">อำเภอ</label>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $rs_user['district'];?></label>
                        </div>
                        <!--<div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="100" name="district" id="district" type="text" value="<?php echo $rs_user['district'];?>" />
                        </div>-->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_province">จังหวัด</label>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $rs_user['province'];?></label>
                        </div>
                        <!--<div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="100" name="province" id="province" type="text" value="<?php echo $rs_user['province'];?>" />
                        </div>-->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_postcode">รหัสไปรษณีย์</label>
                        <div class="col-sm-4">
                            <label class="control-label"><?php echo $rs_user['postcode'];?></label>
                        </div>
                        <!--<div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="5" name="postcode" id="postcode" type="text" value="<?php echo $rs_user['postcode'];?>" />
                        </div>-->
                    </div>
                </form>
            </div>
        </div>
    </div>
      </section>
  </section>

  <!--main content end-->

<script type="text/javascript">
    $(document).ready(function() {
        $("#save").click(function() {
            $("#user-form").submit();
            return false;
        });
    });
</script>
<?php
/*
 * footer***********************************************************************
 */
require 'assets/template/back/footer.php';
/*
 * footer***********************************************************************
 */
 ?>