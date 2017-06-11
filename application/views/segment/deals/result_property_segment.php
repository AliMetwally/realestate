<?php
if ($properties) {?>
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
        <tbody id="property_deal_data">
            <?php foreach ($properties as $property) { 
            $tower_id = $property->tower_id;
                        if($tower_id > '0') {$tower_link = base_url("sales/displaytower/$tower_id");}
                        else
                        {$tower_link = '/#';}
            ?>
            <tr>
                <td><label><input type="radio" id="deal_property_id" name="property_id" value="<?= $property->property_id?>"></label></td>
                <td><?= $property->property_type_name?></td>
                <td><?= $property->key_number?></td>
                <!--<td><a target="_blank" href="<?=$tower_link?>"><?= $property->owner_name?></a></td>-->
                <td><?= $property->owner_name?></td>
                <td><?= $property->owner_phone?></td>
                <td><?= $property->area_name?></td>                
                <td><?= $property->requested_price?></td>
                <td><?= $property->installment_price?></td>
                <td><?= $property->floor?></td>
                <td><?= $property->area .' م'.'<sup>2</sup>'?></td>
                <td><?= $property->status_name?></td>
                <!--<td><a target="_blank" href="property/getPropertyDetails/<?= $property->property_id?>">التفاصيل</a></td>-->
            </tr>
            <?php }  ?>
        </tbody>
    </table>
    <a id="add_property_deal" class="btn btn-success" data-dismiss="modal">اضافة الوحدة للعملية</a>
</form>

<?php } // EO IF ?>

<script>
    $(function (){
        var base_url = "<?= base_url();?>";
        var deals_table = $('#property_deal_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false           
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


