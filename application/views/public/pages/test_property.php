<form method="post" action="<?php echo base_url('test/saveProperty'); ?>">
    <!-- Owner data -->

    <div>

        <label for="owner_name">الإسم</label>
        <input id="owner_name" name="owner_name" type="text" class="form-control" placeholder="إسم المالك" >
        <label for="owner_phone">الهاتف</label>
        <input id="owner_phone" name="owner_phone" type="text" class="form-control" placeholder="رقم الهاتف" >			
        <label for="state_id">المحافظة</label>
        <select id="owner_state_id" name="owner_state_id" class="form-control state-dropdown" ><option value="0">اختار المحافظة</option><option value="5">الاسكندرية</option><option value="6">مطروح</option></select>

        <label for="area_id">المنطقة</label>
        <select id="area_id" name="owner_area_id" type="text" class="form-control owner-area-dropdown" ><option value="0">اختار المنطقة</option><option value="1">السيوف</option><option value="2">الساعة</option><option value="3">لوران</option></select>

        <label for="street">الشارع</label>
        <input id="street" name="owner_street" type="text" class="form-control" placeholder="الشارع" >
        <hr>
    </div>


    <label for="property_type">نوع الوحدة</label>
    <select id="property_type" name="property_type" class="form-control property-dropdown" ><option value="0">اختار النوع</option><option value="1">شقة</option><option value="2">محل</option><option value="3">جراج</option><option value="4">ميزانين</option></select>

    <label for="requested_price">السعر</label>
    <input id="requested_price" name="requested_price" type="number" class="form-control" placeholder="إدخل السعر" >

    <label for="date_on_market">تاريخ بداية التسويق</label>
    <input id="date_on_market" name="date_on_market" type="text" class="form-control" placeholder="إدخل التاريخ" >			
    <date-util format="dd/MM/yyyy"></date-util>

    <label for="commission">العمولة</label>
    <input id="commission" name="commission" type="number" class="form-control" placeholder="إدخل العمولة">

    <label class="radio-inline" for="payment_method1">
        <input type="radio" name="payment_method" id="payment_method1" value="1">كاش
    </label>

    <label class="radio-inline" for="payment_method2">
        <input type="radio" name="payment_method" id="payment_method2" value="2">تقسيط
    </label

    <label for="state_id">المحافظة</label>
    <select id="property_state_id" name="state_id" type="text" class="form-control state-dropdown" ><option value="0">اختار المحافظة</option><option value="5">الاسكندرية</option><option value="6">مطروح</option></select>

    <label for="area_id">المنطقة</label>
    <select id="area_id" name="area_id" type="text" class="form-control property-area-dropdown" ><option value="0">اختار المنطقة</option><option value="1">السيوف</option><option value="2">الساعة</option><option value="3">لوران</option></select>

    <label for="street">الشارع</label>
    <input id="street" name="street" type="text" class="form-control" placeholder="الشارع" >
    <label for="payment_year">سنة</label>
    <input class="form-control" type="number" name="payment_year" id="payment_year" placeholder="عدد الشهور التقسيط">

    <label for="payment_month">شهر</label>
    <input class="form-control" type="number" name="payment_month" id="payment_month" placeholder="إدخل عدد الشهور">

    <hr>
    <h1>تفاصيل الوحدة</h1>
    <label for="floor">الدور</label>
    <input id="floor" name="floor" type="number" class="form-control" placeholder="إدخل رقم الدور" >			

    <label for="property_type">نوع الوحدة</label>
    <select id="property_type" name="property_type" class="form-control property-dropdown" ><option value="0">اختار النوع</option><option value="1">شقة</option><option value="2">محل</option><option value="3">جراج</option><option value="4">ميزانين</option></select>

    <label for="floors_num">عدد الأدوار</label>
    <input id="floors_num" name="floors_num" type="number" class="form-control" placeholder="إدخل عدد الدور" >	

    <label for="finishing">التشطيب</label>
    <select id="finishing" name="finishing" type="text" class="form-control finishing-dropdown" ><option value="0">اختار نوع التشطيب</option><option value="1">لوكس</option><option value="2">سوبر لوكس</option><option value="3">نصف تشطيب</option><option value="4">على الطوبة</option><option value="5">any any</option></select>

    <label for="have_license">الرخصة</label>
    <input id="have_license" name="have_license" type="checkbox" value="1" class="form-control" aria-label="...">		

    <div class="panel-body">                                                
        <div class="gauge-water-placeholder"><div class="col-xs-12 col-sm-4  col-md-4"><label class="radio-inline" for="gauge_water1"><input type="radio" name="gauge_water" id="gauge_water1" value="1">مقايسة</label> </div><div class="col-xs-12 col-sm-4  col-md-4"><label class="radio-inline" for="gauge_water2"><input type="radio" name="gauge_water" id="gauge_water2" value="2">عداد</label> </div><div class="col-xs-12 col-sm-4  col-md-4"><label class="radio-inline" for="gauge_water3"><input type="radio" name="gauge_water" id="gauge_water3" value="3">لا يوجد</label> </div></div>
    </div>

    <div class="panel-body">                                                                                               
        <div class="gauge-electricity-placeholder"><div class="col-xs-12 col-sm-4  col-md-4"><label class="radio-inline" for="gauge_electricity1"><input type="radio" name="gauge_electricity" id="gauge_electricity1" value="1">مقايسة</label> </div><div class="col-xs-12 col-sm-4  col-md-4"><label class="radio-inline" for="gauge_electricity2"><input type="radio" name="gauge_electricity" id="gauge_electricity2" value="2">عداد</label> </div><div class="col-xs-12 col-sm-4  col-md-4"><label class="radio-inline" for="gauge_electricity3"><input type="radio" name="gauge_electricity" id="gauge_electricity3" value="3">لا يوجد</label> </div></div>                                                    
    </div>

    <div class="panel-body">
        <div class="gauge-gase-placeholder"><div class="col-xs-12 col-sm-4  col-md-4"><label class="radio-inline" for="gauge_gase1"><input type="radio" name="gauge_gase" id="gauge_gase1" value="1">مقايسة</label> </div><div class="col-xs-12 col-sm-4  col-md-4"><label class="radio-inline" for="gauge_gase2"><input type="radio" name="gauge_gase" id="gauge_gase2" value="2">عداد</label> </div><div class="col-xs-12 col-sm-4  col-md-4"><label class="radio-inline" for="gauge_gase3"><input type="radio" name="gauge_gase" id="gauge_gase3" value="3">لا يوجد</label> </div></div>
    </div>

    <label for="elevator">الأسانسير</label>
    <input id="elevator" name="elevator" type="number" class="form-control" placeholder="إدخل عدد الأسانسيرات" >

    <label for="building_type">نوع المبنى</label>
    <select id="building_type" name="building_type" class="form-control building-dropdown" ><option value="0">اختار نوع المبني</option><option value="1">برج</option><option value="2">بيت اهالي</option></select>

    <hr>
    <h1>نموذج الوحدة</h1>
    <label for="area">المساحة</label>
    <input id="area" name="area" type="number" class="form-control" placeholder="إدخل المساحة">	
    <label for="bedroom">عدد غرف النوم</label>
    <input id="bedroom" name="bedroom" type="number" class="form-control" placeholder="إدخل عدد غرف النوم">	
    <label for="bathroom">عدد الحمامات</label>
    <input id="bathroom" name="bathroom" type="number" class="form-control" placeholder="إدخل عدد الحمامات">	

    <input type="submit" value="add property"/>
</form>
