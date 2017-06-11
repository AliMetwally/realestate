<div class="row"> 
    <form target="_blank" action="<?= base_url('reports/rep_separated_property') ?>" method="get" id="deal_property_form">
        <!-- property type -->
        <div class="form-group col-md-4">
            <label class="control-label" for="property_type">نوع الوحدة</label>
            <select class="form-control property-dropdown" name="property_type" id="property_type" ng-model="property_type"></select>
        </div>
        <!-- category -->
        <!--    <div class="form-group col-md-4">
                <label class="control-label" for="tower_id">تصنيف الوحدة</label>
                <select class="form-control" name="tower_id" id="tower_id">
                    <option value="0">اختر التصنيف</option>
                    <option value="1">أبراج</option>
                    <option value="2">شقق متفرقة</option>
                </select>
            </div>-->
        <!-- tower -->
        <div class="form-group col-md-4">
            <label class="control-label" for="tower_id">اختار البرج</label>
            <select class="form-control tower-dropdown" name="tower_id" id="tower_id">
                <!--<option value="0">متفرقة</option>-->
            </select>
        </div>


        <!-- state id -->
        <div class="form-group col-md-4">
            <label class="control-label" for="property_state_id">المحافظة</label>
            <select class="form-control state-dropdown" name="state_id" id="state_id" type="text"></select>
        </div>

        <!-- area id -->
        <div class="form-group col-md-4">
            <label class="control-label" for="property_area_id">المنطقة</label>
            <select class="form-control area-dropdown" name="area_id" id="area_id" type="text"></select>
        </div>

        <!-- area -->
        <div class="form-group col-md-4">
            <label class="control-label" for="area">المساحة</label>
            <input class="form-control" name="area" id="area" type="text">
        </div> 

        <!-- min price -->
        <div class="form-group col-md-4">
            <label class="control-label" for="min_price">اقل سعر</label>
            <input class="form-control" name="min_price" id="min_price" type="text">
        </div>

        <!-- max_price -->
        <div class="form-group col-md-4">
                <label class="control-label" for="max_price">اعلي سعر</label>
            <input class="form-control" name="max_price" id="max_price" type="text">
        </div>

        <!-- finishing -->
        <div class="form-group col-md-4">
            <label class="control-label" for="finishing">نوع التشطيب</label>
            <select class="form-control finishing-dropdown" name="finishing" id="finishing"></select>
        </div>

        <!-- min floor -->
        <div class="form-group col-md-4">
            <label class="control-label" for="min_floor">من الدور</label>
            <input class="form-control" name="min_floor" id="min_floor" type="text">
        </div>

        <!-- max floor -->
        <div class="form-group col-md-4">
            <label class="control-label" for="max_floor">حتي الدور</label>
            <input class="form-control" name="max_floor" id="max_floor" type="text">
        </div>


        <div class="col-md-2">
            <a id="search_deal_property" class="btn btn-block btn-primary btn-flat" style="margin-top: 25px">بحث <i class="glyphicon glyphicon-search"></i></a>        
        </div>
        
        
<!--        <div class="col-md-2">
            <input type="submit" value="طباعة التقرير" id="rep_separated_property" class="btn btn-block btn-success btn-flat" style="margin-top: 25px">
        </div>-->
    </form>
</div> <!-- /.row  -->


<p id="result_note"></p>
<!-- the search result table -->
<div id="test"></div>
<div id="test2"></div>
<script>
    $(function () {

        var lst_property = "<?= base_url(); ?>dropdown/ddlPropertyType";
        loadDropdown(lst_property, '.property-dropdown', 'property_type', 'property_type_name', 'اختار النوع');

        // load the state
        var lst_state = "<?= base_url(); ?>dropdown/ddlState";
        loadDropdown(lst_state, '.state-dropdown', 'state_id', 'state_name', 'اختار المحافظة');

        // load the area
        // 2. load the area basd on state
        $('#state_id').change(function () {
            var state_id = $('#state_id').val();
            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + state_id;
            loadDropdown(lst_area, '.area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
        });
        // 2. load the area basd on state
//        $('#tower_id').change(function() {
//            var tower_id = $('#tower_id').val();
//            var lst_towers = "<?= base_url(); ?>dropdown/ddlTowers/" + tower_id;
//            loadDropdown(lst_towers, '.tower-dropdown', 'tower_id', 'tower_name', 'اختر البرج');
//        });

//         load the towers 
        var lst_towers = "<?= base_url() ?>dropdown/ddlTowers";         
        loadDropdownTower(lst_towers, '.tower-dropdown', 'tower_id', 'tower_name', 'اختر البرج','شقق متفرقة');
        

        // load the finishing lst
        var lst_finishing = "<?= base_url() ?>dropdown/ddlFinishing";
        loadDropdown(lst_finishing, '.finishing-dropdown', 'finishing_id', 'finishing_name', 'اختار نوع التشطيب');

        // do the ajax call when search the deal property
        // display the property table
        var display_mode = <?= $display_flg; ?>;
        var property_result_url;
//        if (display_mode == 1) { // in case of manager - display the actions
            property_result_url = '<?= base_url('search_property/getPropertiesTableNonExist') ?>';
//        } else if (display_mode == 2) // in case of sales follow up
//        {

//        }
        console.log(display_mode);
        $('#search_deal_property').click(function () {
            $.ajax({
                url: property_result_url,
                type: 'get',
                sync: false,
                data: $('#deal_property_form').serialize(),
                success: function (data) {
                    $('#test').html(data);
                } // end of success 
            });
        }); // end of search click button 


    }); // end of query
</script>

