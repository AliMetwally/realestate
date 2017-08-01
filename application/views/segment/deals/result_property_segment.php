<form>    
    <table id="property_deal_table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>النوع</th>
                <th>الكود</th>
                <th colspan="2">المالك</th>                
                <th>المنطقة</th>
                <th>كاش</th>
                <th>تقسيط</th>
                <th>الدور</th>
                <th>المساحة</th>
                <th>الحالة</th>
                <!--<th></th>-->
            </tr>
        </thead>
        
    </table>
    <a id="add_property_deal" class="btn btn-success" data-dismiss="modal">اضافة الوحدة للعملية</a>
</form>


<script>
    $(function (){
        var base_url = "<?= base_url();?>";
        var deals_table = $('#property_deal_table').DataTable({
            "processing":true,
            "serverSide":true,
            "searching": false,
            "info": false,
            "lengthChange": false,
            "autoWidth": false,
            "order":[],
            "ajax":{
                url:base_url+"search_property/propertyGrid",
                type:"POST",
                // this data from search_property/getPropertiesTable controller 
                data: <?= json_encode($data)?> // the data sent form the search parameters 
            },
            "columnDefs":[
                {
                    "targets":[0,10],
                    "orderable":false
                }
            ]          
        }); // end of datatable
        
        // add the property to the deal when click it
        $('#add_property_deal').click(function ()
        {
            var property_id = $('#deal_property_id:checked').val();
            // add to property id in view v_home_sales
            $('#property_id').val(property_id);
            $.ajax({
                url:base_url+'property/getPropertyName/'+property_id,
                type: 'GET',
                sync:false,
                success: function (data) {
                        $('#property_name').html(data);
                        $('#follow_up').text('تم تحديد الوحدة  : ' + data);
                    }
            });
            
        } // end of click add properties 
        );
        
    }); // end of jauery
</script>


