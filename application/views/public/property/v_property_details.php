<!-- dancy box ui -->
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery.fancybox.min.css');?>">

<div class="container" style="margin-top: 30px;">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php foreach($property_images as $img) {?>
        <?php foreach($min_image->result() as $mig){?>
        <?php
         $class_data ='';
        if ($img->image_id == $mig->image_id ){
            $class_data = 'class="active"';
        }  else {
            $class_data = '';
        }
        ?>
            <li data-target="#carousel-example-generic" <?php echo $class_data;?> data-slide-to="<?php echo $img->image_id;?>"></li>           
        
        <?php }?>
        <?php }?>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php foreach ($property_images as $img_p) {?>
            <?php
         $class_data ='';
        if ($img_p->image_id == $mig->image_id ){
            $class_data = 'class="item active"';
        }  else {
            $class_data = 'class="item"';
        }
        ?>
            <div <?php echo $class_data;?> style="background-color: #808080;">      
                <a class="fancybox" href="<?php echo base_url($img_p->image_path);?>">
                <img src="<?php echo base_url($img_p->image_path);?>" alt="..." style="height: 400px;">
                </a>  
                <div class="carousel-caption">
                </div>
                
            </div>           
        <?php }?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
<div class="container" style="margin-top: 30px;">
    <?php foreach ($property_details as $dt) { ?>
        <div class="panel panel-default">
            <div class="panel-heading-fd">
                <h3 class="panel-title-fd">تفاصيل الوحدة</h3>
            </div>
            <div class="panel-body">
                <div class="media">
                    <div class="media-body">
                        <?php
                        //property type
                        if (empty($dt->property_type_name)){                        
                        $property_type_name = '';        
                        }
                        else{
                        $property_type_name =  '<h4 class="media-heading line-height"><strong>نوع الوحدة: </strong>'.$dt->property_type_name.'</h4>';
                        }
                        //requested price
                        if (empty($dt->requested_price) or $dt->requested_price == 0 ){                        
                        $requested_price = '';        
                        }
                        else{
                        $requested_price =  '<h4 class="media-heading line-height"><strong>سعر الكاش: </strong>'.$dt->requested_price.' جنيه</h4>';
                        }
                        //installment price
                        if (empty($dt->installment_price) or $dt->installment_price == 0){                        
                        $installment_price = '';        
                        }
                        else{
                        $installment_price =  '<h4 class="media-heading line-height"><strong>سعر التقسيط: </strong>'.$dt->installment_price.' جنيه</h4>';
                        }
                        //payment method name
                        if (empty($dt->method_name)){                        
                        $method_name = '';        
                        }
                        else{
                        $method_name =  '<h4 class="media-heading line-height"><strong>طريقة الدفع: </strong>'.$dt->method_name.' جنيه</h4>';
                        }
                        //floor
                        if (empty($dt->floor)){                        
                        $floor = '';        
                        }
                        else{
                        $floor =  '<h4 class="media-heading line-height"><strong>الدور: </strong>'.$dt->floor.'</h4>';
                        }
                        //floors number
                        if (empty($dt->floors_num)){                        
                        $floors_num = '';        
                        }
                        else{
                        $floors_num =  '<h4 class="media-heading line-height"><strong>عدد الأدوار: </strong>'.$dt->floors_num.'</h4>';
                        }
                        //building name
                        if (empty($dt->building_name)){                        
                        $building_name = '';        
                        }
                        else{
                        $building_name =  '<h4 class="media-heading line-height"><strong>نوع المبنى: </strong>'.$dt->building_name.'</h4>';
                        }
                        ;?>
                        <?php echo $property_type_name;?>
                        <?php echo $requested_price;?>
                        <?php echo $installment_price;?>
                        <?php echo $method_name;?>
                        <?php echo $floor;?>
                        <?php echo $floors_num;?>
                        <?php echo $building_name;?>

                    </div>
                </div>
            </div>
            <div class="panel-heading-fd">
                <h3 class="panel-title-fd">المميزات / وسائل الراحة </h3>
            </div>
            <div class="panel-body">                
                <div class="media">
                    <div class="media-body">
                        <?php
                        //area
                        if (empty($dt->area)){                        
                        $area = '';        
                        }
                        else{
                        $area =  '<h4 class="media-heading line-height"><strong>المساحة: </strong>'.$dt->area.' متر مربع</h4>';
                        }
                        //finishing
                        if (empty($dt->finishing_name)){                        
                        $finishing_name = '';        
                        }
                        else{
                        $finishing_name =  '<h4 class="media-heading line-height"><strong>التشطيب: </strong>'.$dt->finishing_name.' </h4>';
                        }
                        //bedroom
                        if (empty($dt->bedroom)){                        
                        $bedroom = '';        
                        }
                        else{
                        $bedroom =  '<h4 class="media-heading line-height"><strong>عدد غرف النوم: </strong>'.$dt->bedroom.' </h4>';
                        }
                        //bathroom
                        if (empty($dt->bathroom)){                        
                        $bathroom = '';        
                        }
                        else{
                        $bathroom =  '<h4 class="media-heading line-height"><strong>عدد الحمامات: </strong>'.$dt->bathroom.' </h4>';
                        }
                        //elevator
                        if (empty($dt->elevator)){                        
                        $elevator = '';        
                        }
                        else{
                        $elevator =  '<h4 class="media-heading line-height"><strong>عدد الأسانسيرات: </strong>'.$dt->elevator.' </h4>';
                        }
                        ?>
                        <?php echo $area;?>
                        <?php echo $finishing_name;?>
                        <?php echo $bedroom;?>
                        <?php echo $bathroom;?>
                        <?php echo $elevator;?>
                    </div>
                </div>
            </div>
            <div class="panel-heading-fd">
                <h3 class="panel-title-fd">المرافق</h3>
            </div>
            <div class="panel-body">                
                <div class="media">
                    <div class="media-body">
                         <?php
                        //license
                        if (empty($dt->license)){                        
                        $license = '';        
                        }
                        else{
                        $license =  '<h4 class="media-heading line-height"><strong>حالة الرخصة: </strong>'.$dt->license.'</h4>';
                        }
                        //electricity gauge
                        if (empty($dt->electricity_gauge)){                        
                        $electricity_gauge = '';        
                        }
                        else{
                        $electricity_gauge =  '<h4 class="media-heading line-height"><strong>الكهرباء : </strong>'.$dt->electricity_gauge.' </h4>';
                        }
                        //water gauge
                        if (empty($dt->water_gauge)){                        
                        $water_gauge = '';        
                        }
                        else{
                        $water_gauge =  '<h4 class="media-heading line-height"><strong>المياه : </strong>'.$dt->water_gauge.' </h4>';
                        }
                        //gase gauge
                        if (empty($dt->gase_gauge)){                        
                        $gase_gauge = '';        
                        }
                        else{
                        $gase_gauge =  '<h4 class="media-heading line-height"><strong>الغاز: </strong>'.$dt->gase_gauge.' </h4>';
                        }
                        ?>
                        <?php echo $license;?>
                        <?php echo $electricity_gauge;?>
                        <?php echo $water_gauge;?>
                        <?php echo $gase_gauge;?>
                    </div>
                </div>
            </div>

            <div class="panel-heading-fd">
                <h3 class="panel-title-fd">العنوان</h3>
            </div>
            <div class="panel-body">                
                <div class="media">
                    <div class="media-body">
                        <?php 
                        //area name
                        if (empty($dt->area_name)){                        
                        $area_name = '';        
                        }
                        else{
                        $area_name =  '<h4 class="media-heading line-height"><strong>المنطقة : </strong>'.$dt->area_name.' </h4>';
                        }
                        //street
                        if (empty($dt->street)){                        
                        $street = '';        
                        }
                        else{
                        $street =  '<h4 class="media-heading line-height"><strong>الشارع : </strong>'.$dt->street.' </h4>';
                        }
                        ?>
                        <?php echo $area_name;?>
                        <?php echo $street;?>                 
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
$(document).ready(function(){
        $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
});
   
</script>
<script src="<?= base_url('assets/js/lib/jquery.fancybox.min.js')?>"></script>
<!-- property details data -->

