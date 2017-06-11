
<?php if($tower) {?>
<!-- tower name header -->
<div class="row">
    <div class="col-md-12 ">
        <h3 class="page-header"> بيانات برج
            <?= $tower->tower_name; ?>
        </h3>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <!-- garage data -->
            <?php if($garage_data) {?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="garage"> <!-- variable -->
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseGarage" aria-expanded="true" aria-controls="collapseGarage">
                            الجراجات
                        </a>
                    </h4>
                </div>
                <div id="collapseGarage" class="panel-collapse collapse" role="tabpanel" aria-labelledby="garage"> <!-- variable -->
                    <div class="panel-body">
                        <!-- garage data -->
                        <?php $this->load->view('segment/display_tower/tower_garage');?>
                    </div>
                </div>
            </div>
            <?php }?>
            <!-- shops data -->
            <?php if($shop_data) {?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="shops"> <!-- variable -->
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseShop" aria-expanded="true" aria-controls="collapseShop">
                            المحلات
                        </a>
                    </h4>
                </div>
                <div id="collapseShop" class="panel-collapse collapse" role="tabpanel" aria-labelledby="shops"> <!-- variable -->
                    <div class="panel-body">
                        <!-- shops data -->
                        <!-- load the view of shops -->
                        <?php $this->load->view('segment/display_tower/tower_shops')?>
                    </div>
                </div>
            </div>
            <?php }?>
            <!-- mezzanine -->
            <?php if($mezzanine_data) {?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="mezzanine"> <!-- variable -->
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsemezzanine" aria-expanded="true" aria-controls="collapsemezzanine">
                            ادوار الميزانين
                        </a>
                    </h4>
                </div>
                <div id="collapsemezzanine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="mezzanine"> <!-- variable -->
                    <div class="panel-body">
                        <!-- mezzanine data -->
                        <?php $this->load->view('segment/display_tower/tower_mezzanine');?>
                    </div>
                </div>
            </div>  
            <?php }?>
            <!-- managerial units -->
            <?php if($unit_data) {?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="units"> <!-- variable -->
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseUnits" aria-expanded="true" aria-controls="collapseUnits">
                            الوحدات الادارية
                        </a>
                    </h4>
                </div>
                <div id="collapseUnits" class="panel-collapse collapse" role="tabpanel" aria-labelledby="units"> <!-- variable -->
                    <div class="panel-body">
                        <!-- garage data -->
                        <?php $this->load->view('segment/display_tower/tower_units');?>
                    </div>
                </div>
            </div>
            <?php }?>
            <!-- flats -->
            <?php if($flat_data) {?>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="flats"> <!-- variable -->
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFlats" aria-expanded="true" aria-controls="collapseFlats">
                            الشقق السكنية
                        </a>
                    </h4>
                </div>
                <div id="collapseFlats" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="flats"> <!-- variable -->
                    <div class="panel-body">
                        <!-- flat data from segment -->
                        <!-- flat data -->
                        <?php $this->load->view('segment/display_tower/tower_flats');?>
                    </div> <!-- end of panel body -->
                </div>
            </div>
            <?php }?>
        </div> <!-- end of panel group -->
    </div> <!-- end of column -->
</div> <!-- end of row -->

<?php }
else
{
    ?>

        <!-- message -->
        <div class="row">
    <div class="col-md-12 ">
        <h3 class="page-header"> 
            لا توجد بيانات للعرض            
        </h3>
    </div>
</div>

<?php
}

?>