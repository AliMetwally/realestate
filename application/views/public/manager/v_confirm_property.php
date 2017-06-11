<div class="row">
    <section class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <i class="fa fa-flag-checkered"></i>
                 <h3 class="box-title">اعتماد الوحدات</h3>                 
            </div> <!-- /.box-header -->
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(!empty($unconfirmed_property)) { ?>
                        
                        <table id="success_deal_table" class="table table-bordered table-hover">
                            <thead>
                                <th>النوع</th>
                                <th>الكود</th>
                                <th>المنطقة</th>
                                <th>المساحة</th>                            
                                <th>سعر الكاش</th>
                                <th>سعر التقسيط</th>
                                <th>المالك</th>
                                <th>رقم المالك</th>
                                <th></th>
                                <th></th>
                            </thead>
                            
                            <tbody>
                                <?php
                                    foreach ($unconfirmed_property as $property) { ?>
                                
                                    <tr>
                                        <td><?= $property->property_type_name?> </td>
                                        <td><?= $property->key_number?> </td>
                                        <td><?= $property->area_name?> </td>
                                        <td><?= $property->area.' م'.'<sup>2</sup>'?> </td>
                                        <td><?= $property->requested_price?> </td>
                                        <td><?= $property->installment_price?> </td>
                                        <td><?= $property->owner_name?> </td>
                                        <td><?= $property->owner_phone?> </td>
                                        <td>
                                            <a target="_blank" href="<?= base_url("property/getPropertyDetails/$property->property_id") ?>" class="btn btn-block btn-primary">التفاصيل
                                                <i class="fa fa-external-link"></i>
                                            </a>
                                        </td> 
                                        <td>
                                            <a href="<?= base_url("manager/confirm_property/$property->property_id")?>" class="btn btn-block btn-warning">اعتماد 
                                                <i class="fa fa-thumbs-o-up"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        
                        <?php }                            
                        ?>
                        
                    </div>
                </div>
            </div> <!-- /.box-body -->
        </div> <!-- ./box -->
    </section>
</div><!-- /.row-->

<div class="row">
    <section class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <i class="fa fa-flag-checkered"></i>
                 <h3 class="box-title">اعتماد الأبراج</h3>                 
            </div> <!-- /.box-header -->
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if(!empty($unconfirmed_towers)) { ?>
                        
                        <table id="success_deal_table" class="table table-bordered table-hover">
                            <thead>
                                <th>كود البرج</th>
                                <th>اسم البرج</th>
                                <th>المنطقة</th>
                                <th>الشارع</th> 
                                <th></th>
                                <th></th>
                            </thead>
                            
                            <tbody>
                                <?php
                                    foreach ($unconfirmed_towers as $tower) { ?>
                                
                                    <tr>
                                        <td><?= $tower->tower_id?> </td>
                                        <td><?= $tower->tower_name?> </td>
                                        <td><?= $tower->area_name?> </td>
                                        <td><?= $tower->street?> </td>
                                        <td>
                                            <a target="_blank" href="<?= base_url("sales/displayTower/$tower->tower_id") ?>" class="btn btn-block btn-primary">التفاصيل
                                                <i class="fa fa-external-link"></i>
                                            </a>
                                        </td> 
                                        <td>
                                            <a href="<?= base_url("manager/confirm_tower/$tower->tower_id")?>" class="btn btn-block btn-warning">اعتماد 
                                                <i class="fa fa-thumbs-o-up"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    
                                
                                <?php }
                                ?>
                            </tbody>
                        </table>
                        
                        <?php }                            
                        ?>
                        
                    </div>
                </div>
            </div> <!-- /.box-body -->
        </div> <!-- ./box -->
    </section>
</div><!-- /.row-->