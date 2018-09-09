<?php
/*
 * php code///////////**********************************************************
 */
$db = new database();

$title = 'เพิ่มผู้ใช้ใหม่';
/*
 * php code///////////**********************************************************
 */

/*
 * header***********************************************************************
 */
require 'template/back/header.php';
/*
 * header***********************************************************************
 */
?>
<script type="text/javascript" src="<?php echo $baseUrl; ?>/js/jquery.form-validator.min.js"></script>
<div id="page-warpper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">เพิ่มข้อมูลใหม่</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="subhead">
                <a role="button" id="save" class="btn btn-success btn-xs new-data" href="#">
                    <i class="glyphicon glyphicon-floppy-save"></i>
                    บันทึก
                </a>
                <a role="button" class="search-button btn btn-default btn-xs" href="<?php echo $baseUrl; ?>/back/user">
                    <i class="glyphicon glyphicon-remove-circle"></i>
                    ยกเลิก
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-horizontal" style="margin-top: 10px;">
                <form id="user-form" action="<?php echo $baseUrl; ?>/back/user/form_create" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" for="User_firstname">ชื่อจริง <span class="required">*</span></label>
                        <div class="col-sm-4">
                            <input maxlength="100" class="form-control input-sm" name="firstname" id="firstname" type="text" data-validation="required" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" for="User_lastname">นามสกุล <span class="required">*</span></label>
                        <div class="col-sm-4">
                            <input maxlength="100" class="form-control input-sm" name="lastname" id="lastname" type="text" data-validation="required" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" for="User_username">Username <span class="required">*</span></label>
                        <div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="50" name="username" id="username" type="text" data-validation="required" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label required" for="User_password">Password <span class="required">*</span></label>
                        <div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="50" name="password" id="password" type="text" data-validation="required" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_email">อีเมล์</label>
                        <div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="100" name="email" id="email" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_phone">โทรศัพท์</label>
                        <div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="20" name="phone" id="phone" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_address">ที่อยู่</label>
                        <div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="200" name="address" id="address" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_district">อำเภอ</label>
                        <div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="100" name="district" id="district" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_province">จังหวัด</label>
                        <div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="100" name="province" id="province" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_postcode">รหัสไปรษณีย์</label>
                        <div class="col-sm-4">
                            <input class="form-control input-sm" maxlength="5" name="postcode" id="postcode" type="text" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="User_user_type">ประเภทสมาชิก</label>
                        <div class="col-sm-4">
                            <select class="form-control input-sm" name="user_type" id="user_type">
                                <option value="user">ผู้ใช้ทั่วไป</option>
                                <option value="admin">ผู้ดูแลระบบ</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#save").click(function () {
            $("#user-form").submit();
            return false;
        });
    });
    $.validate();
</script>
<?php
/*
 * footer***********************************************************************
 */
require 'template/back/footer.php';
/*
 * footer***********************************************************************
 */