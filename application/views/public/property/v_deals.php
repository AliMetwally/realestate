<div class=" col-md-11" style="margin-top: 30px;">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4>
                <span class="glyphicon glyphicon-user" aria-hidden="true"></span> بيانات العملية
            </h4>
        </div>
        <div class="panel-body">
            <form action="<?= base_url('property/save_deal');?>">
                <fieldset>
                    <legend>الإســم</legend>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="first_name">الإسم الأول</label>
                            <input id="first_name" name="first_name" type="text" class="form-control" placeholder="الإسم الأول">			
                        </div>

                        <div class="form-group col-md-3">
                            <label for="second_name">الإسم الثانى</label>
                            <input id="second_name" name="second_name" type="text" class="form-control" placeholder="الإسم الثانى">			
                        </div>

                        <div class="form-group col-md-3">
                            <label for="last_name">الإسم الأخير</label>
                            <input id="last_name" name="last_name" type="text" class="form-control" placeholder="الإسم الأخير">			
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="client_phone">رقم التليفون</label>
                            <input id="client_phone" name="client_phone" type="text" class="form-control" placeholder="رقم التليفون">			
                        </div>
                    </div>        
                    <hr>
                    <legend >العنوان</legend>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="state_id">المحافظة</label>
                            <select id="client_state_id" name="owner_state_id" class="form-control client-state-dropdown">
                                
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="area_id">المنطقة</label>
                            <select id="client_area_id" name="area_id" class="form-control client-area-dropdown">
                                
                            </select>
                        </div>
                    </div>
                    <div class="row">            
                        <div class="form-group col-md-6">
                            <label for="street">الشارع</label>
                            <textarea id="street" name="street" type="" class="form-control"></textarea>		
                        </div>
                    </div>
                    <div class="row">            
                        <div class="form-group col-md-3">
                            <label for="deal_status">حالة العملية</label>
                            <select id="deal_status" name="deal_status" class="form-control state-dropdown">
                                <option value="0">اختار الحالة</option>
                            </select>
                        </div>
                    </div> 
                    <hr>           
                    <legend >المتابعة</legend>
                    <div class="row">            
                        <div class="form-group col-md-6">
                            <label for="follow_up">تفاصيل الإتصال</label>
                            <textarea id="follow_up" name="follow_up" type="" class="form-control"></textarea>		
                        </div>
                    </div>
                    <div class="row">            
                        <div class="form-group col-md-3">
                            <label for="follow_up_type">نوع المتابعة</label>
                            <select id="follow_up_type" name="follow_up_type" class="form-control follow-up-dropdown">
                                
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="who_called">المتصل</label>
                            <select id="who_called" name="who_called" class="form-control state-dropdown">
                                <option value="0">اختار جهة الإتصال</option>
                                <option value="1">المندوب</option>
                                <option value="2">العميل</option>
                                
                            </select>
                        </div>
                    </div>

                    <ul class="list-inline pull-left">
                        <!-- the save action on js file form-wizerd -->
                        <li><button id="btn-save" type="button" class="btn btn-success btn-lg">حفظ</button></li>
                    </ul>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<script>
    $(function (){        
        // load the state
        var lst_state = "<?= base_url(); ?>dropdown/ddlState";
        loadDropdown(lst_state, '.client-state-dropdown', 'state_id', 'state_name', 'اختار المحافظة');

        // load the area
        // 2. load the area basd on state
        $('#client_state_id').change(function() {
            var state_id = $('#client_state_id').val();
            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + state_id;
            loadDropdown(lst_area, '.client-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
        });
        
        // load the notification_type
        var lst_notification = "<?= base_url()?>dropdown/ddlNotificationType";
        loadDropdown(lst_notification, '', 'notification_type', 'notification_name', 'اختار نوع المتابعة');
        
        // load the follow up type 
        var lst_follow_up = "<?= base_url()?>dropdown/ddlFollowUpType";
        loadDropdown(lst_follow_up, '.follow-up-dropdown', 'follow_up_type', 'follow_up_name', 'اختار نوع المتابعة');
    });
</script>