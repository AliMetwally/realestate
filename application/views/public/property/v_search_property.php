<!-- search the property -->

<div ng-app="myApp" ng-controller="property-ctrl">
<section>
    <div class="row" >
        <h3 class="dark-grey">ابحث عن العقارات</h3>        
        <form class="col-md-10 well" method="get" id="search-Property-form" action="<?= base_url('Search_Property/getProperties')?>">
            <!-- property type -->
            <div class="form-group col-md-3">
                <label class="control-label" for="property_type">نوع الوحدة</label>
                <select class="form-control property-dropdown" name="property_type" id="property_type" ng-model="property_type"></select>
            </div>
            

            <!-- tower -->
            <div class="form-group col-md-3">
                <label class="control-label" for="tower_id">اختار البرج</label>
                <select class="form-control tower-dropdown" name="tower_id" id="tower_id"></select>
            </div>
            
             
            
            <!-- state id -->
            <div class="form-group col-md-3">
                <label class="control-label" for="state_id">المحافظة</label>
                <select class="form-control state-dropdown" name="state_id" id="state_id" type="text"></select>
            </div>

            <!-- area id -->
            <div class="form-group col-md-3">
                <label class="control-label" for="area_id">المنطقة</label>
                <select class="form-control area-dropdown" name="area_id" id="area_id" type="text"></select>
            </div>
            
            <!-- key number -->
            <div class="form-group col-md-3">
                <label class="control-label" for="key_number">كود الوحدة</label>
                <input class="form-control" name="key_number" id="key_number" type="text">
            </div>
            
            <!-- area -->
            <div class="form-group col-md-3">
                <label class="control-label" for="area">المساحة</label>
                <input class="form-control" name="area" id="area" type="text">
            </div> 
            
            <!-- min price -->
            <div class="form-group col-md-3">
                <label class="control-label" for="min_price">اقل سعر</label>
                <input class="form-control" name="min_price" id="min_price" type="text">
            </div>
            
            <!-- max_price -->
            <div class="form-group col-md-3">
                <label class="control-label" for="max_price">اعلي سعر</label>
                <input class="form-control" name="max_price" id="max_price" type="text">
            </div>
            
            <!-- finishing -->
            <div class="form-group col-md-3">
                <label class="control-label" for="finishing">نوع التشطيب</label>
                <select class="form-control finishing-dropdown" name="finishing" id="finishing"></select>
            </div>
            
            <!-- min floor -->
            <div class="form-group col-md-3">
                <label class="control-label" for="min_floor">من الدور</label>
                <input class="form-control" name="min_floor" id="min_floor" type="text">
            </div>
            
            <!-- max floor -->
            <div class="form-group col-md-3">
                <label class="control-label" for="max_floor">حتي الدور</label>
                <input class="form-control" name="max_floor" id="max_floor" type="text">
            </div>
            
            <!-- submit -->
            <div class="form-group col-md-3">
                <div class="col-sm-1 ">

                    <a ng-click="getData()" id="search-properties" class="btn btn-primary">بحث <i class="glyphicon glyphicon-search"></i></a>
                </div>
            </div>
        </form>
    </div>
</section>

<!-- the result -->
<section>
    <div class="row">         
        
        <div class="col-md-10">
            <table class="table table-hover table-bordered table-condensed text-center">
            
            <thead class="text-info">
                <tr>
                    <th class="text-center">الكود</th>
                    <th class="text-center">النوع</th>
                    <th class="text-center">الحالة</th>
                    <th class="text-center">المالك</th>
                    <th class="text-center">المنطقة</th>
                    <th class="text-center">سعر الكاش</th>
                    <th class="text-center">سعر التقسيط</th>
                    <th class="text-center">رقم الدور</th>
                    <th class="text-center">الرخصة</th>
                    
                    <th class="text-center" colspan="1">العمليات</th>
                </tr>
            </thead>
            
            <tbody class="">
                <tr ng-repeat="property in properties">
                    <td>{{property.key_number}}</td>
                    <td>{{property.property_type_name}}</td>
                    <td>{{property.status_name}}</td>
                    <?php 
                        $tower_id = '{{property.tower_id}}';
                        if($tower_id > '0') {$tower_link = base_url("sales/displaytower/$tower_id");}
                        else
                        {$tower_link = '/#';}
                    ?>
                    <td><a target="_blank" href="<?=$tower_link?>">{{property.owner_name}}</a></td>
                    <td>{{property.area_name}}</td>
                    <td>{{property.requested_price}}</td>
                    <td>{{property.installment_price}}</td>
                    <td>{{property.floor}}</td>                    
                    <td>{{property.license}}</td>
                    <td><a target="_blank" href="<?= base_url('property/getPropertyDetails/{{property.property_id}}')?>">التفاصيل</a></td>
                    
                    <!--<td><a href="<?= base_url('deals/deal/{{property.property_id}}')?>">بدء التسويق</a></td>-->
                    
                    
                </tr>
            </tbody>
        </table>
        </div>
        
    </div> <!-- end of row -->
</section>
</div>

<script>
    $(function() {
        // load the state
        var lst_state = "<?= base_url(); ?>dropdown/ddlState";
        loadDropdown(lst_state, '.state-dropdown', 'state_id', 'state_name', 'اختار المحافظة');

        // load the area
        // 2. load the area basd on state
        $('#state_id').change(function() {
            var state_id = $('#state_id').val();
            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + state_id;
            loadDropdown(lst_area, '.area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
        });
        
        //  load the property type
        var lst_property = "<?= base_url(); ?>dropdown/ddlPropertyType";
        loadDropdown(lst_property, '.property-dropdown', 'property_type', 'property_type_name', 'اختار النوع');
        
        // load the finishing lst
        var lst_finishing = "<?= base_url() ?>dropdown/ddlFinishing";
        loadDropdown(lst_finishing, '.finishing-dropdown', 'finishing_id', 'finishing_name', 'اختار نوع التشطيب');
        
        // load the towers 
        var lst_towers = "<?= base_url() ?>dropdown/ddlTowers";
        loadDropdown(lst_towers, '.tower-dropdown', 'tower_id', 'tower_name', 'اختر البرج');
        
    });
</script>

<script>
    var app = angular.module('myApp', []);
    app.controller('property-ctrl', function ($scope, $http){
        $scope.properties = [];
        
        $scope.getData = function()
        {
            //$scope.name = 'Ali';
            // ajax request
            $(function (){
                    $.ajax({
                    url: '<?= base_url('search_property/getProperties')?>',
                    type: 'get',
                    data: $('#search-Property-form').serialize(),
                    dataType : 'json',
                    success : function (data)
                    {
                        // angular code
                        $scope.properties = data;
                    }
                });
            });
        }; // end of function
        
    }); // end of controller
</script>
