<?php
if (!empty($property_images)){   ?>
<!-- images row -->
<div class="row">

    <!-- images section -->
    <section class="col-md-12">
        <div class="box collapsed-box box-primary">
                <div class="box-header with-border">
                    <i class="fa fa-photo"></i>
                <h3 class="box-title">صور الوحدة</h3>
                    
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div> <!-- / box-header -->

            <div class="box-body">
                <div  class="row">
                    <div class="col-md-12">
                        <div id="lightgallery-demo">
                            <ul id="lightgallery" class="list-unstyled">
                                    <?php 
                                    $img_count = 0;
                                    foreach ($property_images as $img)                                        
                                    { 
                                        $img_count += 1;
                                        ?>                                    
                                        <li data-src="<?= base_url("$img->image_path") ?>">
                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4">
                                                <a href="" class="thumbnail">
                                                    <img class="image" width="200px" height="150px" src="<?= base_url("$img->image_path") ?>">
                                                </a>
                                            </div>
                                            <?php 
                                             if($img_count %6 == 0)
                                                {
                                                    echo '<div class="clearfix"></div>';
                                                }
                                            ?>
                                        </li>
                                    <?php 
                                    }?>                               
                                
                            </ul>
                        </div>
                        
                    </div> <!-- /.col -->
                </div> <!-- /.row  -->
            </div> <!-- /.box-body  -->
        </div> <!-- /.box  -->
    </section> 
</div>
<?php } // end of if for images ?>

<!-- property details -->
<div class="row">
    <section class="col-md-12">
        <!-- box-header -->
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="fa fa-home"></i>
                <h3 class="box-title">الوصف</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div> <!-- / .box-header -->
            <div class="box-body">
                <div class="col-md-12">
                    <div class="row">
                    <div class="col-md-1"><p>العنوان</p></div>
                    <div class="col-md-11"><p><?= $property_details->street. ' , '.$property_details->area_name. ' ,'. $property_details->state_name?></p></div>
                </div>
                </div> 
                <!-- right section -->
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4"><p>النوع</p></div>
                        <div class="col-md-8"><p><?= $property_details->property_type_name?></p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><p>سعر الكاش</p></div>
                        <div class="col-md-8"><p><?= $property_details->requested_price?></p></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><p>سعر التقسيط</p></div>
                        <div class="col-md-8">
                            <p><?= $property_details->installment_price==0? 'لا يوجد' :  $property_details->installment_price ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><p>مده التقسيط</p></div>
                        <div class="col-md-8"><p><?= $property_details->installments == 0? 'لا يوجد' : $property_details->installments.' شهر' ?></p></div>
                    </div>
                </div>
                <!-- left section -->
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-4"><p>المساحة</p></div>
                        <div class="col-md-8"><p><?= $property_details->area?> م</p></div>
                    </div>
                    <?php if(isset($property_details->bedroom)) { ?>
                    <div class="row">
                        <div class="col-md-4"><p>عدد الغرف</p></div>
                        <div class="col-md-8"><p><?= $property_details->bedroom?></p></div>
                    </div>
                    <?php } ?>
                    
                    <?php if(isset($property_details->bathroom)) { ?>
                    <div class="row">
                        <div class="col-md-4"><p>عدد الحمامات</p></div>
                        <div class="col-md-8"><p><?= $property_details->bathroom?></p></div>
                    </div>
                    <?php } ?>
                    
                    <?php if(isset($property_details->reception)) { ?>
                    <div class="row">
                        <div class="col-md-4"><p>الريسبشن</p></div>
                        <div class="col-md-8"><p><?= $property_details->reception?></p></div>
                    </div>
                    <?php } ?>  
                </div>
                
                <div class="col-md-4">
                    <?php if(isset($property_details->key_number) ) { ?>
                    <div class="row">
                        <div class="col-md-4"><p>كود الوحدة</p></div>
                        <div class="col-md-8"><p><?= $property_details->key_number?></p></div>
                    </div>
                    <?php } ?>  
                    
                    <?php if(isset($property_details->owner_name)) { ?>
                    <div class="row">
                        <div class="col-md-4"><p>اسم المالك</p></div>
                        <div class="col-md-8"><p><?= $property_details->owner_name?></p></div>
                    </div>
                    <?php } ?>  
                    
                    <?php if(isset($property_details->owner_phone)) { ?>
                    <div class="row">
                        <div class="col-md-4"><p>تليفون المالك</p></div>
                        <div class="col-md-8"><p><?= $property_details->owner_phone?></p></div>
                    </div>
                    <?php } ?>  
                </div>
            </div> <!-- /.box-body -->
        </div> <!-- /.box -->
    </section>
</div> <!-- /.row property details -->
    
<!-- more details -->
<div class="row">
    <section class="col-md-12">
        <!-- box-header -->
        <div class="box box-success">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
                <i class="fa fa-pencil-square-o"></i>
                <h3 class="box-title">تفاصيل اخري</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div> <!-- / .box-header -->
            <div class="box-body">
                <!-- first section -->
                <div class="row">
                    <?php if(isset($property_details->water_gauge)) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>عداد المياه</p></div>
                            <div class="col-md-6"><p><?= $property_details->water_gauge?></p></div>                            
                        </div>                            
                    </div>
                    <?php } ?>
                    
                    <?php if(isset($property_details->electricity_gauge)) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>عداد الكهرباء</p></div>
                            <div class="col-md-6"><p><?= $property_details->electricity_gauge?></p></div>                            
                        </div>                            
                    </div>
                    <?php } ?>
                    
                    <?php if(isset($property_details->gase_gauge)) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>عداد الغاز</p></div>
                            <div class="col-md-6"><p><?= $property_details->gase_gauge?></p></div>                            
                        </div>                            
                    </div>
                    <?php } ?>
                    
                </div>
                <!-- second section -->
                <div class="row">
                    <?php if(isset($property_details->floor)) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>الدور</p></div>
                            <div class="col-md-6"><p><?= $property_details->floor?></p></div>                            
                        </div>                            
                    </div>
                    <?php } ?>
                    
                    <?php if(isset($property_details->floors_num)) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>عدد الادوار</p></div>
                            <div class="col-md-6"><p><?= $property_details->floors_num?></p></div>                            
                        </div>                            
                    </div>
                    <?php } ?>
                    
                    <?php if(isset($property_details->elevator)) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>الاسانسير</p></div>
                            <div class="col-md-6"><p><?= $property_details->elevator == 0 || !isset($property_details->elevator)? 'لا يوجد' : $property_details->elevator ?></p></div>                            
                        </div>                            
                    </div>
                    <?php } ?>
                    
                </div>
                <!-- third section -->
                <div class="row">
                    <?php if(isset($property_details->finishing_name)) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>التشطيب</p></div>
                            <div class="col-md-6"><p><?= $property_details->finishing_name?></p></div>                            
                        </div>                            
                    </div>
                    <?php } ?>
                    
                    <?php if(isset($property_details->building_name)) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>نوع المنبي</p></div>
                            <div class="col-md-6"><p><?= $property_details->building_name?></p></div>                            
                        </div>                            
                    </div>
                    <?php } ?>
                    
                    <?php if(isset($property_details->v)) { ?>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>الموقع من المبني</p></div>
                            <div class="col-md-6"><p><?= $property_details->tower_side_name?></p></div>                            
                        </div>                            
                    </div>
                    <?php } ?>
                </div>
                
                <!--fourth section -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>الرخصة</p></div>
                            <div class="col-md-6"><p><?= $property_details->license == 0 || !isset($property_details->license)?'لا توجد' : $property_details->license?></p></div>                            
                        </div>                            
                    </div>
                    
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6"><p>الرخصة حتي الدور</p></div>
                            <div class="col-md-6"><p><?= $property_details->license_to == 0 || !isset($property_details->license_to)?'لا توجد' : $property_details->license_to?></p></div>                            
                        </div>                            
                    </div>
                    
                </div>
            </div> <!-- /.box-body -->
        </div> <!-- /.box -->
    </section>
</div><!-- /.row more details  -->
<script>
    $(function (){
        $("#lightgallery").lightGallery(); 
    });
</script>

