<div class="row">
    <section class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <i class="fa fa-area-chart"></i>
                <h3 class="box-title">إدخال تنبيهات الإدارة</h3>                 
            </div> <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo base_url('notifications/addNotification'); ?>" method="get">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <label for="notification_to">جهة التنبيه</label>
                                <select id="notification_to" name="notification_to" class="form-control notification-to-dropdown"  >
                                </select>
                            </div>                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-8">
                                <div class="form-group">
                                    <label class="control-label" for="notification_description">محتوى التنبيه</label>
                                    <textarea rows="4" class="form-control" name="notification_description" id="notification_date" type="text"></textarea>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="notification_date">التاريخ</label>
                                    <input rows="4" class="form-control" name="notification_date" id="notification_description" type="date"/>
                                </div>
                            </div>   
                        </div>
                    </div>
                    <div class="col-md-2">
                        <!--<input type="submit" class="btn btn-primary" value="حفظ">-->
                        <input id="search_deal_property" type="submit"  class="btn btn-block btn-success btn-flat" value="حفظ" style="margin-top: 25px">        
                    </div>
                </form>
            </div>
    </section>
</div>

<script>
    $(function () {
        // load the lookups 
        // 1. load the state of owner
        var lst_nots = "<?= base_url(); ?>dropdown/ddlUsers";
        loadDropdownNotification(lst_nots, '.notification-to-dropdown', 'user_id', 'username', 'اختار الجهة','الكل');
    });
</script>
