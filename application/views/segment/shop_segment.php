<!-- shop area  -->
<div class="form-group col-md-6">
    <label for="shop_area[]">المساحة</label>
    <div class="input-group">                                            
        <input id="shop_area" name="shop_area[]" class="form-control" placeholder="إدخل المساحة" type="text">			
        <span class="input-group-addon">متر مربع</span>
    </div>
</div>

<!-- shop price -->
<div class="form-group col-md-6">
    <label for="shop_price[]">السعر الكاش</label>
    <div class="input-group">        
        <input id="shop_price" name="shop_price[]" type="text" class="form-control" placeholder="إدخل السعر" >
        <span class="input-group-addon">جنيه</span>
    </div>
</div>

<!-- installment price -->
<div  class="form-group col-md-6">
    <label for="shop_installment_price">سعر التقسيط</label>
    <div class="input-group">
        <span class="input-group-addon">بالجنيه</span>
        <input class="form-control" type="text" name="shop_installment_price[]" id="shop_installment_price" placeholder="ادخل سعر التقسيط" />
    </div>
</div>
<!-- installment years -->
<div  class="form-group col-md-3">
    <label for="shop_payment_year">سنة</label>
    <input class="form-control" type="text" name="shop_payment_year[]" id="shop_payment_year" placeholder="إدخل عدد السنين" />
</div>
<!-- installment months -->
<div  class="form-group col-md-3">
    <label for="shop_payment_month">شهر</label>
    <input class="form-control" type="text" name="shop_payment_month[]" id="shop_payment_month" placeholder="إدخل عدد الشهور" />
</div>

<!-- tower side -->
<div class="form-group col-md-6">
    <label for="shop_tower_side">الموقع من المبني</label>
    <select id="shop_tower_side" name="shop_tower_side[]" class="form-control shop_tower_side-dropdown">
        <option value="0">اختر نوع المبنى</option>
    </select>
</div>

<!-- the entrance width -->

<div class="form-group col-md-6">
    <label for="entrance_width[]">واجهة المحل</label>
    <div class="input-group">                                            
        <input id="entrance_width" name="entrance_width[]" class="form-control" placeholder="إدخل المساحة" type="text">			
        <span class="input-group-addon">متر </span>
    </div>
</div>

<!-- gauges -->
<!-- water gauge -->
<div class="form-group col-md-4">
    <label for="shop_gauge_water">عداد المياه</label>
    <select name="shop_gauge_water[]" class="form-control shop-water-dropdown"  >
        <option value="0">اختر النوع</option>
    </select>
</div>

<!-- electricity gauge -->
<div class="form-group col-md-4">
    <label for="shop_gauge_electricity">عداد الكهرباء</label>
    <select name="shop_gauge_electricity[]" class="form-control shop-electricity-dropdown"  >
        <option value="0">اختر النوع</option>
    </select>
</div>

<!-- gase gauge -->
<div class="form-group col-md-4">
    <label for="shop_gauge_gase">عداد الغاز</label>
    <select name="shop_gauge_gase[]" class="form-control shop-gase-dropdown"  >
        <option value="0">اختر النوع</option>
    </select>
</div>

<!-- payment method
<div class="form-group col-md-6">
    <label for="shop_payment_method">طريقة السداد</label>
    <select name="shop_payment_method[]" class="form-control shop-paymeny-dropdown"  >
        <option value="0">اختر طريقة السداد</option>
    </select>
</div>
 -->
<!-- installments -->



<!--
<div class="form-group col-xs-12 col-md-12">
    <div class="panel panel-primary">                                    
        <div class="panel-heading">
            <h4><span class="glyphicon glyphicon-eur" aria-hidden="true"></span> مدة التقسيط</h4>
        </div>

        <div class="panel-body">
            <div  class="col-xs-12 col-sm-6  col-md-6">
                <label for="shop_payment_year">سنة</label>
                <input class="form-control" type="text" name="shop_payment_year[]" id="payment_year" placeholder="إدخل عدد السنين" />
            </div>
            <div  class="col-xs-12 col-sm-6  col-md-6">
                <label for="shop_payment_month">شهر</label>
                <input class="form-control" type="text" name="shop_payment_month[]" id="payment_month" placeholder="إدخل عدد الشهور" />
            </div>
        </div>
    </div>
</div>
-->

<script>
    $(function () {
        // load water 
        var lst_water = "<?= base_url() ?>dropdown/ddlGauge";
        loadDropdown(lst_water, '.shop-water-dropdown', 'gauge_id', 'gauge_name', 'اختر النوع');

        // load electricity
        var lst_electricity = "<?= base_url() ?>dropdown/ddlGauge";
        loadDropdown(lst_electricity, '.shop-electricity-dropdown', 'gauge_id', 'gauge_name', 'اختر النوع');

        // load gauge gase
        var lst_gase = "<?= base_url() ?>dropdown/ddlGauge";
        loadDropdown(lst_gase, '.shop-gase-dropdown', 'gauge_id', 'gauge_name', 'اختر النوع');

        // load payment method
        var lst_payment = "<?= base_url() ?>dropdown/ddlPaymentMethod";
        loadDropdown(lst_payment, '.shop-paymeny-dropdown', 'payment_method', 'method_name', 'اختر طريقة السداد');
        
        // load the tower_side lst
        var lst_tower_side = "<?= base_url() ?>dropdown/ddlTowerSide";
        loadDropdown(lst_tower_side, '.shop_tower_side-dropdown', 'tower_side', 'tower_side_name', 'الموقع من البرج');

    });
</script>

