<!-- flat price -->
<div class="form-group col-md-6">
    <label for="flat_price[]">السعر</label>
    <div class="input-group">        
        <input id="flat_price" name="flat_price[]" type="text" class="form-control" placeholder="إدخل السعر" >
        <span class="input-group-addon">جنيه</span>
    </div>
</div>

<!-- flat area  -->
<div class="form-group col-md-6">
    <label for="flat_area[]">المساحة</label>
    <div class="input-group">                                            
        <input id="flat_area" name="flat_area[]" class="form-control" placeholder="إدخل المساحة" type="text">			
        <span class="input-group-addon">متر مربع</span>
    </div>
</div>



<!-- installment price -->
<div  class="form-group col-md-6">
    <label for="flat_installment_price">سعر التقسيط</label>
    <div class="input-group">
        <span class="input-group-addon">بالجنيه</span>
        <input class="form-control" type="text" name="flat_installment_price[]" id="flat_installment_price" placeholder="ادخل سعر التقسيط" />
    </div>
</div>

<!-- installment years -->
<div  class="form-group col-md-3">
    <label for="flat_payment_year">سنة</label>
    <input class="form-control" type="text" name="flat_payment_year[]" id="flat_payment_year" placeholder="إدخل عدد السنين" />
</div>
<!-- installment months -->
<div  class="form-group col-md-3">
    <label for="flat_payment_month">شهر</label>
    <input class="form-control" type="text" name="flat_payment_month[]" id="flat_payment_month" placeholder="إدخل عدد الشهور" />
</div>

<!-- tower side -->
<div class="form-group col-md-6">
    <label for="flat_tower_side">الموقع من المبني</label>
    <select id="flat_tower_side" name="flat_tower_side[]" class="form-control flat_tower_side-dropdown">
        <option value="0">اختر نوع المبنى</option>
    </select>
</div>

<!-- finishing -->
<div class="form-group col-md-6">
    <label for="flat_finishing">التشطيب</label>
    <select id="flat_finishing" name="flat_finishing[]" type="text" class="form-control flat-finishing-dropdown"  >
        <option value="0">اختر نوع التشطيب</option>
    </select>
</div>

<!-- bedrooms -->
<div class="form-group col-md-6">
    <label for="bedroom">عدد غرف النوم</label>
    <input id="bedroom" name="bedroom[]" type="text" class="form-control" placeholder="إدخل عدد غرف النوم" >			
</div>

<!-- bathroom-->
<div class="form-group col-md-6">
    <label for="bathroom">عدد الحمامات</label>
    <input id="bathroom" name="bathroom[]" type="text" class="form-control" placeholder="إدخل عدد الحمامات" >			
</div>

<!-- reception-->
<div class="col-md-offset-6 form-group col-md-6">
    <label for="reception">عدد قطع الريسيبشن</label>
    <input id="reception" name="reception[]" type="text" class="form-control" placeholder="إدخل عدد قطع الريسيبشن" >			
</div>

<!-- gauges -->
<!-- water gauge -->
<div class="row">
<div class="form-group col-md-4">
    <label for="flat_gauge_water">عداد المياه</label>
    <select name="flat_gauge_water[]" class="form-control flat-water-dropdown"  >
        <option value="0">اختر النوع</option>
    </select>
</div>

<!-- electricity gauge -->
<div class="form-group col-md-4">
    <label for="flat_gauge_electricity">عداد الكهرباء</label>
    <select name="flat_gauge_electricity[]" class="form-control flat-electricity-dropdown"  >
        <option value="0">اختر النوع</option>
    </select>
</div>

<!-- gase gauge -->
<div class="form-group col-md-4">
    <label for="flat_gauge_gase">عداد الغاز</label>
    <select name="flat_gauge_gase[]" class="form-control flat-gase-dropdown"  >
        <option value="0">اختر النوع</option>
    </select>
</div>
</div>
<!-- payment method 
<div class="form-group col-md-6">
    <label for="flat_payment_method">طريقة السداد</label>
    <select name="flat_payment_method[]" class="form-control flat-paymeny-dropdown"  >
        <option value="0">اختر طريقة السداد</option>
    </select>
</div>-->

<!-- installments 


<div class="form-group col-xs-12 col-md-12">
    <div class="panel panel-primary">                                    
        <div class="panel-heading">
            <h4><span class="glyphicon glyphicon-eur" aria-hidden="true"></span> مدة التقسيط</h4>
        </div>
        <div class="panel-body">
            <div  class="col-xs-12 col-sm-6  col-md-6">
                <label for="flat_payment_year">سنة</label>
                <input class="form-control" type="text" name="flat_payment_year[]" id="payment_year" placeholder="إدخل عدد السنين" />
            </div>
            <div  class="col-xs-12 col-sm-6  col-md-6">
                <label for="flat_payment_month">شهر</label>
                <input class="form-control" type="text" name="flat_payment_month[]" id="payment_month" placeholder="إدخل عدد الشهور" />
            </div>
        </div>
    </div>
</div>
-->

<script>
    $(function () {
        // load water 
        var lst_water = "<?= base_url() ?>dropdown/ddlGauge";
        loadDropdown(lst_water, '.flat-water-dropdown', 'gauge_id', 'gauge_name', 'اختر النوع');

        // load electricity
        var lst_electricity = "<?= base_url() ?>dropdown/ddlGauge";
        loadDropdown(lst_electricity, '.flat-electricity-dropdown', 'gauge_id', 'gauge_name', 'اختر النوع');

        // load gauge gase
        var lst_gase = "<?= base_url() ?>dropdown/ddlGauge";
        loadDropdown(lst_gase, '.flat-gase-dropdown', 'gauge_id', 'gauge_name', 'اختر النوع');

        // load payment method
        var lst_payment = "<?= base_url() ?>dropdown/ddlPaymentMethod";
        loadDropdown(lst_payment, '.flat-paymeny-dropdown', 'payment_method', 'method_name', 'اختر طريقة السداد');
        
        // load the finishing lst
        var lst_finishing = "<?= base_url() ?>dropdown/ddlFinishing";
        loadDropdown(lst_finishing, '.flat-finishing-dropdown', 'finishing_id', 'finishing_name', 'اختار نوع التشطيب');
        
        // load the tower_side lst
        var lst_tower_side = "<?= base_url() ?>dropdown/ddlTowerSide";
        loadDropdown(lst_tower_side, '.flat_tower_side-dropdown', 'tower_side', 'tower_side_name', 'الموقع من البرج');

    });
</script>