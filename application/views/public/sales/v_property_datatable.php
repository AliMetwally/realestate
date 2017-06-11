<div class="col-xs-12 col-md-10">
<div style="margin-top: 30px;">
    <table id="property-table" class="display responsive" width="100%">
        <div class="container">
            <div class="row">
                <thead>
                    <tr>
                        <th></th>
                        <th>المساحة</th>
                        <th>السعر المستهدف</th>
                        <th>الدور</th>  
                        <th>عدد الأسانسيرات</th>
                        <th>التشطيب</th>
                        <th>الكهرباء</th>
                        <th>المياه</th>
                        <th>الغاز</th>
                        <th>الرخصة</th>
                        <th>طريقة الدفع</th>
                        <th>المنطقة</th>
                        <th>الشارع</th>
                        <th>النوع</th> 
                        <th>التفاصيل</th>
                    </tr>
                    <tr id="filterrow">
                        <th></th>
                        <th>المساحة</th>
                        <th>السعر المستهدف</th>
                        <th>الدور</th>  
                        <th>عدد الأسانسيرات</th>
                        <th>التشطيب</th>
                        <th>الكهرباء</th>
                        <th>المياه</th>
                        <th>الغاز</th>
                        <th>الرخصة</th>
                        <th>طريقة الدفع</th>
                        <th>المنطقة</th>
                        <th>الشارع</th>
                        <th>النوع</th>           
                        <th width="0px"></th>             
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th></th>
                        <th>المساحة</th>
                        <th>السعر المستهدف</th>
                        <th>الدور</th>
                        <th>عدد الأسانسيرات</th>
                        <th>التشطيب</th>
                        <th>الكهرباء</th>
                        <th>المياه</th>
                        <th>الغاز</th>
                        <th>الرخصة</th>
                        <th>طريقة الدفع</th>
                        <th>المنطقة</th>
                        <th>الشارع</th>
                        <th>الدور</th>
                        <th>النوع</th>
                    </tr>
                </tfoot>

                <tbody>
                    <?php foreach ($datatable as $val) { ?>
                        <tr>
                            <td></td>
                            <th><?php echo $val->area; ?> م2</th>
                            <td><?php echo $val->requested_price; ?></td>
                            <td><?php echo $val->floor; ?></td>
                            <td><?php echo $val->elevator; ?></td>
                            <th><?php echo $val->finishing_name; ?></th>
                            <th style="background-color: #F0AD4E; color: #FFFFFF;"><?php echo $val->electricity_gauge; ?></th>
                            <th style="background-color: #F0AD4E; color: #FFFFFF;"><?php echo $val->water_gauge; ?></th>
                            <th style="background-color: #F0AD4E; color: #FFFFFF;"><?php echo $val->gase_gauge; ?></th>
                            <th><?php echo $val->license; ?></th>
                            <th><?php echo $val->method_name; ?></th>
                            <td><?php echo $val->area_name; ?></td>
                            <td><?php echo $val->street; ?></td>
                            <td><?php echo $val->property_type_name; ?></td>

                            <td width="60px">
                                <a href="<?php echo base_url('property/getPropertyDetails/' . $val->property_id); ?>" class="btn btn-warning"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> التفاصيل</a>
                            </td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </div>
        </div>
    </table>
</div>
</div>

