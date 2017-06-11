<!--
<div class="col-md-6">
    
    <form action="#" method="post" class="form-horizontal">
        <div id="notification-add-property"></div>
    </form>

</div>-->

<section>
    <div class="wizard">

        <div class="col-lg-10 col-md-10 col-xs-12 col-lg-offset-1 col-md-offset-1">
            <div class="wizard-inner">
                <ul class="nav nav-tabs " role="tablist">

                    <li role="presentation" class="active col-md-2">

                        <a href="#owner" data-toggle="tab" aria-controls="owner" role="tab" title="بيانات المالك">                        
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-user"></i>                            
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled col-md-2">
                        <a href="#property" data-toggle="tab" aria-controls="property" role="tab" title="بيانات الوحدة">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-home"></i>
                            </span>
                        </a>
                    </li>
                    <li role="presentation" class="disabled col-md-2">
                        <a href="#property_details" data-toggle="tab" aria-controls="property_details" role="tab" title="المواصفات">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </span>
                        </a>
                    </li>

                    <li role="presentation" class="disabled col-md-2">
                        <a href="#layout" data-toggle="tab" aria-controls="layout" role="tab" title="المميزات و المرافق">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-info-sign"></i>
                            </span>
                        </a>
                    </li>

                    

                    <li role="presentation" class="disabled col-md-2">
                        <a href="#pay_method" data-toggle="tab" aria-controls="pay_method" role="tab" title="طرق السداد">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-euro"></i>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <form role="form" id="property-form">
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="owner">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> بيانات المالك
                                </h4>
                            </div>
                            <!--owner panel-->
                            <div class="panel-body">
                                <div id="property-owner-notification"></div>
                                <!--owner name-->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="owner_name">الإسم</label>
                                        <input id="owner_name" name="owner_name" type="text" class="form-control" placeholder="إسم المالك" >
                                    </div>
                                </div>
                                <!--owner phone-->
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="owner_phone">الهاتف</label>
                                        <input id="owner_phone" name="owner_phone" type="text" class="form-control" placeholder="رقم الهاتف" >			
                                    </div>
                                </div>
                                <div class="row  col-md-10 col-md-offset-1">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h4 class="text-center">
                                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> العنوان
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <!--owner state-->
                                            <div class="form-group col-md-6">
                                                <label for="state_id">المحافظة</label>
                                                <select id="owner_state_id" name="owner_state_id" class="form-control state-dropdown"  >
                                                    <option value="0">اختر المحافظة</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="area_id">المنطقة</label>
                                                <select id="area_id" name="owner_area_id" type="text" class="form-control owner-area-dropdown"  >
                                                    <option value="0">اختر المنطقة</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="street">الشارع</label>
                                                <input id="street" name="owner_street" type="text" class="form-control" placeholder="الشارع" >
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button id="btn-wizard-1" type="button" class="btn btn-primary next-step">التالى</button></li>
                        </ul>
                    </div>
                    <!--property panel-->
                    <div class="tab-pane" role="tabpanel" id="property">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> بيانات الوحدة
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div id="property-notification"></div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="property_type">نوع الوحدة</label>
                                        <select id="property_type" name="property_type" class="form-control property-dropdown"  >
                                            <option value="0">اختر نوع الوحدة</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="building_type">نوع المبنى</label>
                                        <select id="building_type" name="building_type" class="form-control building-dropdown"  >
                                            <option value="0">اختر نوع المبنى</option>
                                        </select>
                                    </div>
                                    <!-- tower side -->
                                    <div class="form-group col-md-4">
                                        <label for="tower_side">الموقع من المبني</label>
                                        <select id="tower_side" name="tower_side" class="form-control tower_side-dropdown"  >
                                            <option value="0">اختر نوع المبنى</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <!-- date_on_market -->
                                    <!--
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label for="date_on_market">تاريخ بداية التسويق</label>                                        
                                            <input id="date_on_market" name="date_on_market" type="text" class="form-control" placeholder="إدخل التاريخ">

                                        </div>
                                    </div>
                                    -->
                                </div>
                                <div class="row">
                                    
                                    <!-- the key number in the application -->
                                    <div class="form-group col-md-4">
                                        <label for="key_number">كود الوحده</label>
                                        <input id="key_number" name="key_number" type="text" value="<?= $next_key_number?>" class="form-control" placeholder="ادخل كود الوحده" >			
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label for="floor">الدور</label>
                                        <input id="floor" name="floor" type="text" class="form-control" placeholder="إدخل رقم الدور" >			
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="floors_num">عدد الأدوار</label>
                                        <input id="floors_num" name="floors_num" type="text" class="form-control" placeholder="إدخل عدد الدور" >			
                                    </div>
                                </div>
                                <div class="row  col-md-10 col-md-offset-1">
                                    <div class="panel panel-success">
                                        <div class="panel-heading">
                                            <h4 class="text-center">
                                                <span class="glyphicon glyphicon-home" aria-hidden="true"></span> العنوان
                                            </h4>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group col-md-6">
                                                <label for="state_id">المحافظة</label>
                                                <select id="property_state_id" name="state_id" type="text" class="form-control state-dropdown"  >
                                                    <option value="0">اختر المحافظة</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="area_id">المنطقة</label>
                                                <select id="area_id" name="area_id" type="text" class="form-control property-area-dropdown"  >
                                                    <option value="0">اختر المنطقة</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="street">الشارع</label>
                                                <input id="street" name="street" type="text" class="form-control" placeholder="الشارع" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">السابق</button></li>
                            <li><button id="btn-wizard-2" type="button" class="btn btn-primary next-step">التالى</button></li>
                        </ul>
                    </div>
                    <!--property layout-->
                    <div class="tab-pane" role="tabpanel" id="property_details">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> مواصفات الوحدة
                                </h4>
                            </div>
                            <div class="panel-body">                                
                                <div id="property-layout-notification"></div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="area">المساحة</label>
                                        <div class="input-group">                                            
                                            <input id="area" name="area" type="text" class="form-control" placeholder="إدخل المساحة" >			
                                            <span class="input-group-addon">متر مربع</span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="bedroom">عدد غرف النوم</label>
                                        <input id="bedroom" name="bedroom" type="text" class="form-control" placeholder="إدخل عدد غرف النوم" >			
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="bathroom">عدد الحمامات</label>
                                        <input id="bathroom" name="bathroom" type="text" class="form-control" placeholder="إدخل عدد الحمامات" >			
                                    </div>
                                    <!-- reception -->
                                    <div class="form-group col-md-6">
                                        <label for="reception">الريسيبشن</label>
                                        <input id="reception" name="reception" type="text" class="form-control" placeholder="إدخل عدد قطع الريسيبشن" >			
                                    </div>
                                </div>
                                
                                
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">السابق</button></li>
                            <li><button type="button" btn-action="skip" class="btn btn-default skip-step">تجاهل</button></li>  
                            <li><button id="btn-wizard-3" type="button" class="btn btn-primary btn-info-full next-step">التالى</button></li>
                        </ul>
                    </div>
                    <!--property details-->
                    <div class="tab-pane" role="tabpanel" id="layout">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> المميزات و المرافق
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div id="property-details-notification"></div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="finishing">التشطيب</label>
                                        <select id="finishing" name="finishing" type="text" class="form-control finishing-dropdown"  >
                                            <option value="0">اختر نوع التشطيب</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 col-lg-1 col-lg-offset-2 col-md-offset-4">
                                        <label for="have_license">الرخصة</label>
                                        <input id="have_license" name="have_license" type="checkbox" value="1" class="form-control" aria-label="...">			
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="license_to">الرخصة حتى الدور</label>
                                        <input id="license_to" name="license_to" type="text" class="form-control" placeholder="إدخل عدد الأسانسيرات" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="elevator">الأسانسير</label>
                                        <input id="elevator" name="elevator" type="text" class="form-control" placeholder="إدخل عدد الأسانسيرات" >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="panel panel-primary">                                    
                                            <div class="panel-heading">
                                                <h4><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> المياه</h4>
                                            </div>
                                            <div class="panel-body">                                                
                                                <div class="gauge-water-placeholder"></div>
                                            </div>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="panel panel-warning">                                    
                                            <div class="panel-heading">
                                                <h4><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> الكهرباء</h4>
                                            </div>
                                            <div class="panel-body">                                                                                               
                                                <div class="gauge-electricity-placeholder"></div>                                                    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <div class="panel panel-success">                                    
                                            <div class="panel-heading">
                                                <h4><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> الغاز</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="gauge-gase-placeholder"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">السابق</button></li>
                            <li><button id="btn-wizard-4" type="button" class="btn btn-primary btn-info-full next-step">التالى</button></li>
                        </ul>
                    </div>
                    
                    <!--payment method-->
                    <div class="tab-pane" role="tabpanel" id="pay_method">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-euro" aria-hidden="true"></span> طرق السداد
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div id="property-save-notification"></div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="requested_price">سعر الكاش</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">بالجنيه</span>
                                            <input id="requested_price" name="requested_price" type="text" class="form-control" placeholder="إدخل السعر" >
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="commission">العمولة</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span>
                                            <input id="commission" name="commission" type="text" class="form-control" placeholder="إدخل العمولة">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--
                                    <div class="form-group col-xs-12 col-md-6">
                                        <div class="panel panel-primary">                                    
                                            <div class="panel-heading">
                                                <h4><span class="glyphicon glyphicon-eur" aria-hidden="true"></span> طريقة السداد</h4>
                                            </div>
                                            <div class="panel-body">

                                                <div class="payment-method-placeholder"></div>                                                
                                            </div>
                                        </div>
                                    </div>
                                    -->
                                    <!-- installment price -->
                                    <div  class="form-group col-md-6">
                                        <label for="installment_price">سعر التقسيط</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">بالجنيه</span>
                                            <input class="form-control" type="text" name="installment_price" id="installment_price" placeholder="ادخل سعر التقسيط" />
                                        </div>
                                    </div>
                                    <!-- deposit -->
                                    <div  class="form-group col-md-6">
                                        <label for="deposit">مقدم التقسيط</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">بالجنيه</span>
                                            <input class="form-control" type="text" name="deposit" id="deposit" placeholder="مقدم التقسيط" />
                                        </div>
                                    </div>
                                    
                                    <!-- installment years -->
                                    <div  class="form-group col-md-6">
                                        <label for="payment_year">سنة</label>
                                        <input class="form-control" type="text" name="payment_year" id="payment_year" placeholder="إدخل عدد السنين" />
                                    </div>
                                    <!-- installment months -->
                                    <div  class="form-group col-md-6">
                                        <label for="payment_month">شهر</label>
                                        <input class="form-control" type="text" name="payment_month" id="payment_month" placeholder="إدخل عدد الشهور" />
                                    </div>
                                </div>
                            </div> <!-- end of panel body -->
                        </div>
                        <ul class="list-inline pull-right">
                            <!-- the save action on js file form-wizerd -->
                            <li><button id="btn-wizard-save" type="button" class="btn btn-success btn-lg">حفظ</button></li>
                        </ul>
                    </div> <!-- end of panel -->
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>  
    </div>
</section>


<script>
    $(function() {
        // load the lookups 
        // 1. load the state of owner
        var lst_state = "<?= base_url(); ?>dropdown/ddlState";
        loadDropdown(lst_state, '.state-dropdown', 'state_id', 'state_name', 'اختار المحافظة');

        // 2. load the area basd on state
        $('#owner_state_id').change(function() {
            var state_id = $('#owner_state_id').val();
            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + state_id;
            loadDropdown(lst_area, '.owner-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
        });

        // 3. load the property type
        var lst_property = "<?= base_url(); ?>dropdown/ddlPropertyType";
        loadDropdown(lst_property, '.property-dropdown', 'property_type', 'property_type_name', 'اختار النوع');

        // 4. load the building type 
        var lst_building = "<?= base_url() ?>dropdown/ddlBuildingType";
        loadDropdown(lst_building, '.building-dropdown', 'building_type', 'building_name', 'اختار نوع المبني');

        // 5. load area of property 
        $('#property_state_id').change(function() {
            var state_id = $('#property_state_id').val();
            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + state_id;
            loadDropdown(lst_area, '.property-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
        });

        // 6. load the finishing lst
        var lst_finishing = "<?= base_url() ?>dropdown/ddlFinishing";
        loadDropdown(lst_finishing, '.finishing-dropdown', 'finishing_id', 'finishing_name', 'اختار نوع التشطيب');

        // 7. load the gauge water radio
        var lst_water = "<?= base_url() ?>dropdown/ddlGauge";
        generateGaugeRadio(lst_water, '.gauge-water-placeholder', 'gauge_water', 'gauge_id', 'gauge_name');

        // 8. load the gauge electricity radio
        var lst_electricity = "<?= base_url() ?>dropdown/ddlGauge";
        generateGaugeRadio(lst_electricity, '.gauge-electricity-placeholder', 'gauge_electricity', 'gauge_id', 'gauge_name');

        // 9. load the gauge gase radio
        var lst_gase = "<?= base_url() ?>dropdown/ddlGauge";
        generateGaugeRadio(lst_gase, '.gauge-gase-placeholder', 'gauge_gase', 'gauge_id', 'gauge_name');

        //10. load the payment method
        var lst_payment_method = "<?= base_url() ?>dropdown/ddlPaymentMethod";
        generateGaugeRadio(lst_payment_method, '.payment-method-placeholder', 'payment_method', 'payment_method', 'method_name');
        
        // 11. load the tower_side lst
        var lst_tower_side = "<?= base_url() ?>dropdown/ddlTowerSide";
        loadDropdown(lst_tower_side, '.tower_side-dropdown', 'tower_side', 'tower_side_name', 'الموقع من البرج');
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("input[id^='upload_file']").each(function() {
            var id = parseInt(this.id.replace("upload_file", ""));
            $("#upload_file" + id).change(function() {
                if ($("#upload_file" + id).val() !== "") {
                    $("#moreImageUploadLink").show();
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var upload_number = 2;
        $('#attachMore').click(function() {
            //add more file
            var moreUploadTag = '';
            moreUploadTag += '<div class="element"><label for="upload_file"' + upload_number + '>Upload File ' + upload_number + '</label>';
            moreUploadTag += '<input type="file" id="upload_file' + upload_number + '" name="upload_file' + upload_number + '"/>';
            moreUploadTag += '&nbsp;<a href="javascript:del_file(' + upload_number + ')" style="cursor:pointer;" onclick="return confirm(\"Are you really want to delete ?\")">Delete ' + upload_number + '</a></div>';
            $('<dl id="delete_file' + upload_number + '">' + moreUploadTag + '</dl>').fadeIn('slow').appendTo('#moreImageUpload');
            upload_number++;
        });
    });
</script>

<script type="text/javascript">
    function del_file(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }
</script>
<script src="<?= base_url('assets/js/form-wizerd.js'); ?>"></script>