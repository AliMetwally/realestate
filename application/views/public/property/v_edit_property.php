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
                        <div class="form-group col-md-6">
                            <label for="owner_name">الإسم</label>
                            <input id="owner_name" name="owner_name" type="text" class="form-control" placeholder="إسم المالك" value="<?=$property_details->owner_name?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="owner_phone">الهاتف</label>
                            <input id="owner_phone" name="owner_phone" type="text" class="form-control" placeholder="رقم الهاتف" value="<?=$property_details->owner_phone?>" disabled>			
                        </div>
                    </div>                      
                </div>
            </div>
        </div>
        <!--property panel-->
        <div class="tab-pane active" role="tabpanel" id="property">
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
                            <input id="property_type_id" value="<?= $property_details->property_type?>" class="hidden">
                            <select id="property_type" name="property_type" class="form-control property-dropdown"  >
                                <!--<option value="0">اختر نوع الوحدة</option>-->
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="building_type">نوع المبنى</label>
                            <input id="building_type_id" value="<?= $property_details->building_type?>" class="hidden">
                            <select id="building_type" name="building_type" class="form-control building-dropdown"  >
                                <option value="0">اختر نوع المبنى</option>
                            </select>
                        </div>
                        <!-- tower side -->
                        <div class="form-group col-md-4">
                            <label for="tower_side">الموقع من المبني</label>
                            <input id="tower_side_id" value="<?= $property_details->tower_side?>" class="hidden">
                            <select id="tower_side" name="tower_side" class="form-control tower_side-dropdown"  >
                                <option value="0">اختر نوع المبنى</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                    </div>
                    <div class="row">

                        <!-- the key number in the application -->
                        <div class="form-group col-md-4">
                            <label for="key_number">كود الوحده</label>
                            <input id="key_number" name="key_number" type="text" value="<?= $property_details->key_number; ?>" class="form-control" placeholder="ادخل كود الوحده" >			
                        </div>

                        <div class="form-group col-md-4">
                            <label for="floor">الدور</label>
                            <input id="floor" name="floor" type="text" class="form-control" placeholder="إدخل رقم الدور" value="<?= $property_details->floor; ?>">			
                        </div>
                        <div class="form-group col-md-4">
                            <label for="floors_num">عدد الأدوار</label>
                            <input id="floors_num" name="floors_num" type="text" class="form-control" placeholder="إدخل عدد الدور"  value="<?= $property_details->floors_num; ?>" >			
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
                            <input id="property_state" value="<?= $property_details->state_id?>" class="hidden">
                                    <label for="state_id">المحافظة</label>
                                    <select id="property_state_id" name="state_id" type="text" class="form-control state-dropdown"  >
                                        <option value="0">اختر المحافظة</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <input id="property_area" value="<?= $property_details->area_id?>" class="hidden">
                                    <label for="area_id">المنطقة</label>
                                    <select id="area_id" name="area_id" type="text" class="form-control property-area-dropdown"  >
                                        <option value="0">اختر المنطقة</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="street">الشارع</label>
                                    <input id="street" name="street" type="text" class="form-control" placeholder="الشارع" value="<?=$property_details->street?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <!--property layout-->
        <div class="tab-pane active" role="tabpanel" id="property_details">
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
                                <input id="area" name="area" type="text" class="form-control" placeholder="إدخل المساحة" value="<?=$property_details->area?>">			
                                <span class="input-group-addon">متر مربع</span>
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="bedroom">عدد غرف النوم</label>
                            <input id="bedroom" name="bedroom" type="text" class="form-control" placeholder="إدخل عدد غرف النوم" value="<?=$property_details->bedroom?>">			
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="bathroom">عدد الحمامات</label>
                            <input id="bathroom" name="bathroom" type="text" class="form-control" placeholder="إدخل عدد الحمامات" value="<?=$property_details->bathroom?>">			
                        </div>
                        <!-- reception -->
                        <div class="form-group col-md-6">
                            <label for="reception">الريسيبشن</label>
                            <input id="reception" name="reception" type="text" class="form-control" placeholder="إدخل عدد قطع الريسيبشن" value="<?=$property_details->reception?>">			
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--property details-->
        <div class="tab-pane active" role="tabpanel" id="layout">
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
                              <input id="finishing_id" value="<?= $property_details->finishing?>" class="hidden">
                            <label for="finishing">التشطيب</label>
                            <select id="finishing" name="finishing" type="text" class="form-control finishing-dropdown"  >
                                <option value="0">اختر نوع التشطيب</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 col-lg-2 col-lg-offset-2 col-md-offset-4">
                              <input id="finishing_id" value="<?= $property_details->have_license?>" class="hidden">
                            <label for="have_license">الرخصة</label>
                            <select id="have_license" name="have_license" type="text" class="form-control owner-area-dropdown">
                               <?php 
                                $license_1 = '';
                                $license_2 = '';
                               if($property_details->have_license == 1){
                                   $license_1 ='selected="selected"'; 
                               } else {
                                   $license_2 ='selected="selected"'; 
                               } 
                               ?>
                                <option <?=$license_1?> value="1">يوجد</option>
                                <option <?=$license_2?> value="0">لا يوجد</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="license_to">الرخصة حتى الدور</label>
                            <input id="license_to" name="license_to" type="text" class="form-control" placeholder="إدخل آخر دور للرخصة"  value="<?= $property_details->license_to?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="elevator">الأسانسير</label>
                            <input id="elevator" name="elevator" type="text" class="form-control" placeholder="إدخل عدد الأسانسيرات"  value="<?= $property_details->elevator?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="gauge_water"><span class="glyphicon glyphicon-tint" aria-hidden="true"></span> المياه</label>
                            <?php 
                                $water_1 = '';
                                $water_2 = '';
                                $water_3 = '';
                                $water_4 = '';
                               if($property_details->water_id == 1){
                                   $water_1 ='selected="selected"'; 
                               } else if($property_details->water_id == 2) {
                                   $water_2 ='selected="selected"'; 
                               
                               } else if($property_details->water_id == 3) {
                                   $water_3 ='selected="selected"'; 
                               } 
                                else if($property_details->water_id == 4) {
                                   $water_4 ='selected="selected"'; 
                               } 
                               ?>
                            <select id="gauge_water" name="gauge_water" type="text" class="form-control owner-area-dropdown">
                                        <option value="0">اختر نوع العداد</option>
                                        <option <?=$water_1?> value="1">مقايسة</option>
                                        <option <?=$water_2?> value="2">عداد</option>
                                        <option <?=$water_3?> value="3">لا يوجد</option>
                                        <option <?=$water_4?> value="4">مجمع</option>
                            </select>
                        </div> 
                        <div class="form-group col-md-4">
                            <?php 
                                $electricity_1 = '';
                                $electricity_2 = '';
                                $electricity_3 = '';
                                $electricity_4 = '';
                               if($property_details->electricity_id == 1){
                                   $electricity_1 ='selected="selected"'; 
                               } else if($property_details->electricity_id == 2) {
                                   $electricity_2 ='selected="selected"'; 
                               
                               } else if($property_details->electricity_id == 3) {
                                   $electricity_3 ='selected="selected"'; 
                               } 
                                else if($property_details->electricity_id == 4) {
                                   $electricity_4 ='selected="selected"'; 
                               } 
                               ?>
                            <label for="gauge_electricity"><span class="glyphicon glyphicon-flash" aria-hidden="true"></span> الكهرباء</label>
                            <select id="gauge_electricity" name="gauge_electricity" type="text" class="form-control owner-area-dropdown">
                                        <option value="0">اختر نوع العداد</option>
                                        <option <?=$electricity_1?> value="1">مقايسة</option>
                                        <option <?=$electricity_2?> value="2">عداد</option>
                                        <option <?=$electricity_3?> value="3">لا يوجد</option>
                                        <option <?=$electricity_4?> alue="4">مجمع</option>
                            </select>
                        </div>   
                        <div class="form-group col-md-4">
                            <?php 
                                $gase_1 = '';
                                $gase_2 = '';
                                $gase_3 = '';
                                $gase_4 = '';
                               if($property_details->gase_id == 1){
                                   $gase_1 ='selected="selected"'; 
                               } else if($property_details->gase_id == 2) {
                                   $gase_2 ='selected="selected"'; 
                               
                               } else if($property_details->gase_id == 3) {
                                   $gase_3 ='selected="selected"'; 
                               } else if($property_details->gase_id == 4) {
                                   $gase_4 ='selected="selected"'; 
                               } 
                               ?>
                            <label for="gauge_gase"><span class="glyphicon glyphicon-fire" aria-hidden="true"></span> الغاز</label>
                            <select id="gauge_gase" name="gauge_gase" type="text" class="form-control owner-area-dropdown">
                                        <option value="0">اختر نوع العداد</option>
                                        <option <?=$gase_1?> value="1">مقايسة</option>
                                        <option <?=$gase_2?> value="2">عداد</option>
                                        <option <?=$gase_3?> value="3">لا يوجد</option>
                                        <option <?=$gase_4?> alue="4">مجمع</option>
                                        
                            </select>
                        </div>                                      
                    </div>
                </div>
            </div>
        </div>

        <!--payment method-->
        <div class="tab-pane active" role="tabpanel" id="pay_method">
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
                                <input id="requested_price" name="requested_price" type="text" class="form-control" placeholder="إدخل السعر" value="<?=$property_details->requested_price?>" >
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="commission">العمولة</label>
                            <div class="input-group">
                                <span class="input-group-addon">%</span>
                                <input id="commission" name="commission" type="text" class="form-control" placeholder="إدخل العمولة"  value="<?=$property_details->commission?>">
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
                                <input class="form-control" type="text" name="installment_price" id="installment_price" placeholder="ادخل سعر التقسيط" value="<?=$property_details->installment_price?>" />
                            </div>
                        </div>
                        <!-- deposit -->
                        <div  class="form-group col-md-6">
                            <label for="deposit">مقدم التقسيط</label>
                            <div class="input-group">
                                <span class="input-group-addon">بالجنيه</span>
                                <input class="form-control" type="text" name="deposit" id="deposit" placeholder="مقدم التقسيط" value="<?=$property_details->deposit?>" />
                            </div>
                        </div>

                        <!-- installment months -->
                        <div  class="form-group col-md-6">
                            <label for="payment_month">شهر</label>
                            <input class="form-control" type="text" name="payment_month" id="payment_month" placeholder="إدخل عدد الشهور"  value="<?=$property_details->installments?>" />
                        </div>
                    </div>
                </div> <!-- end of panel body -->
            </div>
<!--            <ul class="list-inline pull-right">
                 the save action on js file form-wizerd 
                <li><button id="btn-wizard-save" type="button" class="btn btn-success btn-lg">حفظ</button></li>
            </ul>-->
        </div> <!-- end of panel -->
        <div class="clearfix"></div>
    </div>
</form>
<script>
    $(function() {
        // load the lookups 
        // 1. load the state of owner
        var lst_state = "<?= base_url(); ?>dropdown/ddlState";
        var property_state = $('#property_state').val();
        loadDropdown(lst_state, '.state-dropdown', 'state_id', 'state_name', 'اختار المحافظة',property_state);

        // 2. load the area basd on state
        $('#owner_state_id').change(function() {
            var state_id = $('#owner_state_id').val();
            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + state_id;
            loadDropdown(lst_area, '.owner-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
        });

        // 3. load the property type
        var lst_property = "<?= base_url(); ?>dropdown/ddlPropertyType";
        var select_option = $('#property_type_id').val();
        loadDropdown(lst_property, '.property-dropdown', 'property_type', 'property_type_name', 'اختار النوع',select_option);

        // 4. load the building type 
        var lst_building = "<?= base_url() ?>dropdown/ddlBuildingType";
        var building_id = $('#building_type_id').val();
        loadDropdown(lst_building, '.building-dropdown', 'building_type', 'building_name', 'اختار نوع المبني',building_id);

        // 5. load area of property 
            var state_id = property_state;
            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + state_id;
            var property_area_id = $('#property_area').val();
            loadDropdown(lst_area, '.property-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة',property_area_id);
        
            $('#property_state_id').change(function() {
            state_id = $('#property_state_id').val();            
            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + state_id;
            var property_area_id = $('#property_area').val();
            loadDropdown(lst_area, '.property-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة',property_area_id);
        
        });
        
        

        // 6. load the finishing lst
        var lst_finishing = "<?= base_url() ?>dropdown/ddlFinishing";
        var finishing_id = $('#finishing_id').val();
        loadDropdown(lst_finishing, '.finishing-dropdown', 'finishing_id', 'finishing_name', 'اختار نوع التشطيب',finishing_id);

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
        var tower_side = $('#tower_side_id').val();
        loadDropdown(lst_tower_side, '.tower_side-dropdown', 'tower_side', 'tower_side_name', 'الموقع من البرج',tower_side);
    });
</script>