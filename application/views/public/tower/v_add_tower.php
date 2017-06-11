
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
                        <a href="#tower" data-toggle="tab" aria-controls="tower" role="tab" title="بيانات البرج">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-home"></i>
                            </span>
                        </a>
                    </li>
                    <!-- tower details -->
                    <!-- garage and mezzanine -->
                    <li role="presentation" class="disabled col-md-2">
                        <a href="#tower_details1" data-toggle="tab" aria-controls="tower_details1" role="tab" title="مواصفات الجراجات والميزانين">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </span>
                        </a>
                    </li>
                    <!-- manegerial units -->
                    <li role="presentation" class="disabled col-md-2">
                        <a href="#tower_details2" data-toggle="tab" aria-controls="tower_details2" role="tab" title="الوحدات الادارية">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </span>
                        </a>
                    </li>
                    <!-- shop -->
                    <li role="presentation" class="disabled col-md-2">
                        <a href="#tower_details3" data-toggle="tab" aria-controls="tower_details3" role="tab" title="المحلات">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </span>
                        </a>
                    </li>
                    <!-- flats -->
                    <li role="presentation" class="disabled col-md-2">
                        <a href="#tower_details" data-toggle="tab" aria-controls="tower_details" role="tab" title="الشقق السكنية">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-list-alt"></i>
                            </span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <form role="form" id="tower-form" method="post" > <!-- action="<?= base_url('tower/addTower')?>" -->
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
                                <div id="tower-owner-notification"></div>
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
                                                <label for="owner_state_id">المحافظة</label>
                                                <select id="owner_state_id" name="owner_state_id" class="form-control state-dropdown">
                                                    <option value="0">اختر المحافظة</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="owner_state_id">المنطقة</label>
                                                <select id="owner_state_id" name="owner_area_id" type="text" class="form-control owner-area-dropdown"  >
                                                    <option value="0">اختر المنطقة</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="owner_street">الشارع</label>
                                                <input id="owner_street" name="owner_street" type="text" class="form-control" placeholder="الشارع" >
                                            </div>
                                        </div>
                                    </div>
                                </div>                        
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button id="btn-tower-wizard-1" type="button" class="btn btn-primary next-step">التالى</button></li>
                        </ul>
                    </div>
                    <!--property panel-->
                    <div class="tab-pane" role="tabpanel" id="tower">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> بيانات البرج
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div id="tower-notification"></div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="tower_name" class="col-md-2 control-label">اسم البرج</label>                                     
                                        <input class="form-control col-md-7" name="tower_name" id="tower_name" type="text">                                        
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
                                                <select id="tower_state_id" name="state_id" type="text" class="form-control state-dropdown"  >
                                                    <option value="0">اختر المحافظة</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="area_id">المنطقة</label>
                                                <select id="area_id" name="area_id" type="text" class="form-control tower-area-dropdown"  >
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
                            <li><button id="btn-tower-wizard-2" type="button" class="btn btn-primary next-step">التالى</button></li>
                        </ul>
                    </div>
                    
                    <!-- towe details 1 -->
                    <div class="tab-pane" role="tabpanel" id="tower_details1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> مواصفات الجراجات والميزانين
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div id="tower-details_1-notification"></div>
                                <!-- data -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="garage_no">عدد الجراجات</label>
                                        <input class="form-control" name="garage_no" id="garage_no" type="text">
                                    </div>
                                    <!-- garage price -->
                                    <div class="form-group col-md-6">
                                        <label for="garage_price">سعر الكاش</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">بالجنيه</span>
                                        <input id="garage_price" name="garage_price" type="text" class="form-control" placeholder="إدخل السعر" >
                                        </div>
                                    </div>
                                    
                                    <!-- installment price -->
                                    <div  class="form-group col-md-4">
                                        <label for="garage_installment_price">سعر التقسيط</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">بالجنيه</span>
                                            <input class="form-control" type="text" name="garage_installment_price" id="garage_installment_price" placeholder="ادخل سعر التقسيط" />
                                        </div>
                                    </div>
                                    <!-- installment years -->
                                    <div  class="form-group col-md-4">
                                        <label for="garage_payment_year">سنة</label>
                                        <input class="form-control" type="text" name="garage_payment_year" id="payment_year" placeholder="إدخل عدد السنين" />
                                    </div>
                                    <!-- installment months -->
                                    <div  class="form-group col-md-4">
                                        <label for="garage_payment_month">شهر</label>
                                        <input class="form-control" type="text" name="garage_payment_month" id="payment_month" placeholder="إدخل عدد الشهور" />
                                    </div>
                                    <!-- garage type -->
                                    <div class="form-group col-md-6">
                                        <label class="control-label">نوع الجراج</label>
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="garage_type" id="garag_type" value="1">
                                                    باكية عادية
                                                </label>
                                            </div>
                                            
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="garage_type" id="garag_type" value="2">
                                                    باكية حرة
                                                </label>
                                            </div>
                                        </div>
                                            
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="garage_commission">عمولة تسويق الجراج</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span>
                                            <input id="garage_commission" name="garage_commission" type="text" class="form-control" placeholder="إدخل عمولة تسويق الجراج" >			
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="mezzanine_no">عدد ادوار الميزانين</label>
                                        <input class="form-control" name="mezzanine_no" id="mezzanine_no" type="text">                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="mezzanine_commission">عمولة تسويق الميزانين</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span>
                                            <input id="mezzanine_commission" name="mezzanine_commission" type="text" class="form-control" placeholder="إدخل عمولة تسويق الميزانين" >			
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row" id="mezzanine_data"></div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">السابق</button></li>
                            <li><button id="btn-tower-wizard-3" type="button" class="btn btn-primary next-step">التالى</button></li>
                        </ul>
                    </div>
                    
                    <!-- tower details 2 -->
                    <div class="tab-pane" role="tabpanel" id="tower_details2">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span> الوحدات الادرية
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div id="tower-details_2-notification"></div>
                                <!-- data -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="managerial_units">عدد الوحدات الادارية</label>
                                        <input class="form-control" name="managerial_units" id="managerial_units" type="text">                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="managerial_units_commission">عمولة تسويق الوحدات الادارية</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span>
                                            <input id="managerial_units_commission" name="managerial_units_commission" type="text" class="form-control" placeholder="إدخل عمولة تسويق الوحدات الادارية" >			
                                        </div>
                                    </div>
                                 </div>   
                                <div class="row" id="units_data"></div>
                                    
                                    
                                
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">السابق</button></li>
                            <li><button id="btn-tower-wizard-4" type="button" class="btn btn-primary next-step">التالى</button></li>
                        </ul>
                    </div>
                    
                    <!-- towe details 3 -->
                    <div class="tab-pane" role="tabpanel" id="tower_details3">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>بيانات المحلات
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div id="tower-shops-notification"></div>
                                <!-- data -->
                                <!-- shop data -->
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="shop_no">عدد المحلات</label>
                                        <input class="form-control" name="shop_no" id="shop_no" type="text">                                        
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="shop_commission">عمولة تسويق المحل</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span>
                                            <input id="shop_commission" name="shop_commission" type="text" class="form-control" placeholder="إدخل عمولة تسويق المحل" >			
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <!-- generate the tabs based on number -->
                                        <div id="shop_tabs"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">السابق</button></li>
                            <li><button id="btn-tower-wizard-5" type="button" class="btn btn-primary next-step">التالى</button></li>
                        </ul>
                    </div>
                    
                    <!--property layout-->
                    <div class="tab-pane" role="tabpanel" id="tower_details">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="text-center">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> الشقق السكنية
                                </h4>
                            </div>
                            <div class="panel-body">                                
                                <div id="tower-save-notification"></div>
                                
                                
                                <hr/>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="floors_no">عدد الأدوار السكنية</label>
                                        <input class="form-control" name="floors_no" id="floors_no" type="text">                                        
                                    </div>
                                    
                                    <!-- license limit -->
                                    <div class="form-group col-md-6">
                                        <label class="control-label" for="license_limit">الرخصة حتي الدور</label>
                                        <input class="form-control" name="license_limit" id="license_limit" type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="flat_no">عدد النماذج بالدور</label>
                                        <input class="form-control" name="flat_no" id="flat_no" type="text">                                        
                                    </div>                                 

                                    <div class="form-group col-md-6">
                                        <label for="flat_commission">عمولة تسويق الشقة</label>
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span>
                                            <input id="flat_commission" name="flat_commission" type="text" class="form-control" placeholder="إدخل عمولة تسويق الشقة" >			
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="elevator">عدد الاسناسيرات</label>
                                        <input class="form-control" name="elevator" id="flat_no" type="text">                                        
                                    </div>  
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <!-- generate the tabs based on number -->
                                        <div id="flat_tabs"></div>
                                    </div>
                                </div>
                                <hr/>
                            </div>
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="button" class="btn btn-default prev-step">السابق</button></li>                              
                            <li><button id="btn-tower-wizard-save" class="btn btn-success" type="button">حفظ بيانات البرج</button></li>
                            
                            <!--
                            <li><input type="submit" value="show shop"/></li>
                            -->
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    // load the lookups 
        // 1. load the state of owner
        var lst_state = "<?= base_url();?>dropdown/ddlState";
        loadDropdown(lst_state,'.state-dropdown', 'state_id', 'state_name', 'اختار المحافظة');
        
        // 2. load the area basd on state
        $('#owner_state_id').change(function (){
        var state_id = $('#owner_state_id').val();
        var lst_area = "<?= base_url();?>dropdown/ddlArea/" + state_id;
        loadDropdown(lst_area,'.owner-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
        });
        
        // 3. load area of tower state
        $('#tower_state_id').change(function (){
        var state_id = $('#tower_state_id').val();
        var lst_area = "<?= base_url();?>dropdown/ddlArea/" + state_id;
        loadDropdown(lst_area,'.tower-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
        });
        
</script>

<!-- add the segments -->
<script>
    $(function (){
        // shop tabs
        $('#shop_no').change(function(){
           var shop_no = $(this).val();
           var shop_segment = <?php echo json_encode($this->load->view('segment/shop_segment', '', true));?> ;
           var tabs = generatePropertyTabs(shop_no, 'shop', 'المحل ', shop_segment);
           $('#shop_tabs').html(tabs);
        });
        
        // flat tabs
        $('#flat_no').change(function(){
           var flat_no = $(this).val();
           var flat_segment = <?php echo json_encode($this->load->view('segment/flat_segment', '', true));?> ;
           var tabs = generatePropertyTabs(flat_no, 'flat', 'نموذج ', flat_segment);
           $('#flat_tabs').html(tabs);
        });
        
        // managerial_units
        $('#managerial_units').change(function (){
            var units_no = $(this).val();
            var units_data = '';
            
            for (var i = 1; i <= units_no; i++) {
                units_data += '<div class="panel panel-success">';
                units_data += '<div class="panel-heading">وحدة ادارية ('+i+')</div>';
                units_data += '<div class="panel-body">';
                
                units_data += '<div class="form-group col-md-6">';
                units_data += '<label for="units_area">مساحة الوحدة الادارية  </label>';
                units_data += '<div class="input-group">';
                units_data += '<input class="form-control" name="units_area[]" type="text">';
                units_data += '<span class="input-group-addon">متر مربع</span>';
                units_data += '</div>'; // end of input group 
                units_data += '</div>'; // end of column div 
                
                units_data += '<div class="form-group col-md-6">';
                units_data += '<label for="units_price">سعر الكاش</label>';
                units_data += '<div class="input-group"> ';
                units_data += '<input class="form-control" name="units_price[]" type="text">';
                units_data += '<span class="input-group-addon">جنيه</span>';
                units_data += '</div>';
                units_data += '</div>';
                
                units_data += '<div  class="form-group col-md-4">';
                units_data += '<label for="unit_installment_price">سعر التقسيط</label>';
                units_data += '<div class="input-group">';
                units_data += '<span class="input-group-addon">بالجنيه</span>';
                units_data += '<input class="form-control" type="text" name="unit_installment_price[]" id="unit_installment_price" placeholder="ادخل سعر التقسيط" />';
                units_data += '</div></div>';
                
                units_data += '<div  class="form-group col-md-4">';
                units_data += '<label for="unit_payment_year">سنة</label>';
                units_data += '<input class="form-control" type="text" name="unit_payment_year[]" id="unit_payment_year" placeholder="إدخل عدد السنين" /> </div>';

                units_data += '<div  class="form-group col-md-4">';
                units_data += '<label for="unit_payment_month">شهر</label>';
                units_data += '<input class="form-control" type="text" name="unit_payment_month[]" id="unit_payment_month" placeholder="إدخل عدد الشهور" /> </div>'
                
                
                units_data += '</div>'; // end of panel body
                units_data += '</div>'; // end of panel 
            }
            
            $('#units_data').empty();
            $('#units_data').html(units_data);
        });
        
        // mezzanine 
        $('#mezzanine_no').change(function () {
            var mezz_no = $(this).val();
            var mezz_data = '';
            
            for (var i = 1; i <= mezz_no; i++) {
                
                mezz_data += '<div class="panel panel-info">';
                mezz_data += '<div class="panel-heading">الميزانين ('+i+')</div>';
                mezz_data += '<div class="panel-body">';
                
                mezz_data += '<div class="form-group col-md-6">';
                mezz_data += '<label for="mezzanine_area">مساحة الميزانين  </label>';
                mezz_data += '<div class="input-group">';
                mezz_data += '<input class="form-control" name="mezzanine_area[]" type="text">';
                mezz_data += '<span class="input-group-addon">متر مربع</span>';
                mezz_data += '</div>'; // end of input group 
                mezz_data += '</div>'; // end of column div 
                                
                mezz_data += '<div class="form-group col-md-6">';
                mezz_data += '<label for="mezzanine_price">سعر الكاش</label>';
                mezz_data += '<div class="input-group"> ';
                mezz_data += '<input class="form-control" name="mezzanine_price[]" type="text">';
                mezz_data += '<span class="input-group-addon">جنيه</span>';
                mezz_data += '</div>';
                mezz_data += '</div>'; // end of column div
                
                mezz_data += '<div  class="form-group col-md-4">';
                mezz_data += '<label for="mezz_installment_price">سعر التقسيط</label>';
                mezz_data += '<div class="input-group">';
                mezz_data += '<span class="input-group-addon">بالجنيه</span>';
                mezz_data += '<input class="form-control" type="text" name="mezz_installment_price[]" id="mezz_installment_price" placeholder="ادخل سعر التقسيط" />';
                mezz_data += '</div></div>';
                
                mezz_data += '<div  class="form-group col-md-4">';
                mezz_data += '<label for="mezz_payment_year">سنة</label>';
                mezz_data += '<input class="form-control" type="text" name="mezz_payment_year[]" id="mezz_payment_year" placeholder="إدخل عدد السنين" /> </div>';

                mezz_data += '<div  class="form-group col-md-4">';
                mezz_data += '<label for="mezz_payment_month">شهر</label>';
                mezz_data += '<input class="form-control" type="text" name="mezz_payment_month[]" id="mezz_payment_month" placeholder="إدخل عدد الشهور" /> </div>'
                
                mezz_data += '</div>'; // end of panel body
                mezz_data += '</div>'; // end of panel 
                
            } // end of for loop
            
            $('#mezzanine_data').empty();
            $('#mezzanine_data').html(mezz_data);
            
        });
    });
</script>
<script src="<?= base_url('assets/js/tower-wizard.js'); ?>"></script>