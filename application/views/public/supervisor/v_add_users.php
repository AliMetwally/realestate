<div class="row">
    <section class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <i class="fa fa-area-chart"></i>
                <h3 class="box-title">إنشاء حساب جديد</h3>                 
            </div> <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo base_url('supervisor/AddNewuser'); ?>" method="get">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label" for="user_name">اسم الموظف</label>
                            <input class="form-control" name="user_name" id="user_name" type="text">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label" for="user_phone">رقم الهاتف</label>
                            <input class="form-control" name="user_phone" id="user_phone" type="text">
                        </div>
                    </div>
                    <div class="row">                    
                        <div class="form-group col-md-4">
                            <label class="control-label" for="user_id">اسم الحساب</label>
                            <input class="form-control" name="user_id" id="user_id" type="text">
                        </div>
                        <div class="form-group col-md-2">
                            <label class="control-label" for="user_pass">كلمة المرور</label>
                            <input class="form-control" name="user_pass" id="user_pass" type="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label class="control-label"  for="role_id">الصلاحية</label>
                            <select id="role_id" name="role_id" class="form-control role-dropdown"  >
                                <option value="0">اختر الصلاحية</option>
                            </select>
                        </div>  
                    </div>
                    <div class="col-md-2">
                        <!--<input type="submit" class="btn btn-primary" value="حفظ">-->
                        <input id="search_deal_property" type="submit"  class="btn btn-block btn-success btn-flat" value="حفظ" style="margin-top: 25px">        
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<script>
    $(function () {
        // load the lookups 
        // 1. load the state of owner
        var lst_role = "<?= base_url(); ?>dropdown/ddlRole";
        loadDropdown(lst_role, '.role-dropdown', 'role_id', 'role_name', 'اختار الصلاحية');
    });
</script>