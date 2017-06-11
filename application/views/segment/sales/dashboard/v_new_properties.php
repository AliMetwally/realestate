<div class="box box-primary">
    <!-- box-header -->
    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-bell"></i>
        <h3 class="box-title">الوحدات الجديدة</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div> <!-- / .box-header -->
    <div class="box-body" >
    
    <div id="new-properties">
        <?php
                if ($new_properties) {
                                        
                    ?>
        
        <table id="tower_table" class="table table-bordered table-hover" role="grid">
            <thead>
                <tr>
                    <th>الكود</th>
                    <th>النوع</th>
                    <th>المنطقة</th>
                    <th>المساحة</th>
                    <th>الدور</th>
                    <th>سعر الكاش</th>
                    <th>سعر التقسيط</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($new_properties as $property) { 
                    
                    ?>
                        <tr>
                            <td><?= $property->key_number?></td>
                            <td><?= $property->property_type_name?></td>
                            <td><?= $property->area_name?></td>
                            <td><?= $property->area?></td>
                            <td><?= $property->floor?></td>
                            <td><?= $property->requested_price?></td>
                            <td><?= $property->installment_price?></td>
                            
                        </tr>
                    <?php } // end of for
                } // end of if
                else {
                    echo '<p>لا توجد وحدات للعرض</p>';
                }
                ?>
            </tbody>
        </table>
        
        <?php
//            echo '<pre>';
//            echo print_r($new_properties);
//            echo '</pre>';
//        ?>
    </div>
    </div><!-- / .box-body --> 
</div> <!-- /.box -->

<script>
    $(function ()
    {
        $('#new-properties').slimScroll({
    height: '250px'
  });
    }); // end of JQuery
</script>