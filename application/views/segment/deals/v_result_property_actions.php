<?php
if ($properties) {?>
<div id="table_notification"></div>
    <table id="property_deal_table" class="table table-bordered table-hover">
        <thead>
            <tr>
                <!--<th></th>-->
                <th>النوع</th>
                <th>الكود</th>
                <th colspan="2">المالك</th>                
                <th>المنطقة</th>
                <th>كاش</th>
                <th>تقسيط</th>
                <th>الدور</th>
                <th>المساحة</th>
                <!--<th>الحالة</th>-->
                <!--<th></th>-->
                <th></th>
                <!-- manager action section  -->
                <?php if($this->session->role == 1 ) // in case of manager
                { ?>
                <th></th>
                <?php }
                ?>
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
                <td class="hidden"><?= $property->property_id;?></td>
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
                <!--<td><?= $property->status_name?></td>-->
                <td>
                     <a target="_blank" href="<?= base_url("property/getPropertyDetails/$property->property_id")?>" class="btn btn-block btn-primary btn-sm">التفاصيل
                        <i class="fa fa-external-link"></i>
                    </a>
                </td>  
                <!-- manager action section  -->
                <?php if($this->session->role == 1 ) // in case of manager
                { ?>
                    <td>
                        <a href="<?= base_url("property/delete_property/$property->property_id")?>" class="btn btn-block btn-danger delete_property btn-sm" data-property_id ="<?= $property->property_id?>" >وقف العمل
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </td>
                <?php }
                ?>
                <?php if($this->session->role == 2 ) // in case of manager
                { ?>
                    <td>
                        <a href="<?= base_url("property/edit_property/$property->property_id")?>" class="btn btn-block btn-warning edit_property btn-sm" data-property_id ="<?= $property->property_id?>" > تعديل
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                <?php }
                ?>
                
                <!--<td><a target="_blank" href="property/getPropertyDetails/<?= $property->property_id?>">التفاصيل</a></td>-->
            </tr>
            <?php }  ?>
        </tbody>
    </table>    


<?php } // EO IF ?>

<script>
    $(function (){
        var propertyRow; // inject the row table data 
        var property_id;
        var base_url = "<?= base_url();?>";
        
        var deals_table = $('#property_deal_table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false           
        }); // end of datatable              
        
        $('#property_deal_table tbody').on('click', 'tr', function (){
            propertyRow = deals_table.row(this).data();
            property_id = propertyRow[0];
            console.log(property_id);
            if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            deals_table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
            
        }
        
        );// end of row selection 
        
        // the delete action 
//        $('a.delete_property').click(function (e){            
//            // do ajax call 
//            $.ajax({
//                url : '<?= base_url("property/delete_property")?>/' + $(this).data('property_id'),//property_id, // js variable 
//                type: '',
//                dataType: 'json',
//                success: function (data) {
//                        showNotification(data,'#table_notification');
//                        deals_table.row('.selected').remove().draw( false );
//                    }
//            });
//            
//            //e.stopPropagation();
//        });
        
    }); // end of jauery
</script>


