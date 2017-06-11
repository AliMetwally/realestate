
<?php 

    $floors = $tower->floors_no; // number of floors in the tower
    $forms = $tower->flat_no; // number of forms or flat in the floor
    
    $flat_pointer = 0;
    $floor_pointer = 0;
    
    
    
    foreach ($flat_data as $flat) 
    {         
            if ($flat_pointer % $forms == 0) 
            {
                $floor_pointer ++;
            // the begin of floor
            ?>
                <!-- -----------start of floor---------- -->
                    <div class="row"> 
                            <!-- floor number -->
                            <div class="col-md-1"> 
                                <div class="row"> 
                                    <div class="col-md-12"> 
                                        الدور (<?= $floor_pointer?>) 
                                    </div> 
                                </div> 
                            </div> 
                            <!-- flat data -->
                            <div class="col-md-11">
                                <div class="row">
                <!-- ----------------------------------- -->
            <?php } ?>
                <!-- -----------the flat data box------- -->
                <div class="col-md-3">
                    
                    <div class="offer offer-radius <?= $this->model_tower_data->boxStatus($flat->status)?>">
                            <div class="shape">
                                <div class="shape-text">
                                    <?= $flat->status_name?> <!-- متوفر -->
                                </div>
                            </div>
                            <div class="offer-content">
                                <h3 class="lead">
                                    نموذج (<?= $flat_pointer +1?>)
                                </h3>						
                                <div class="row property-details">
                                    <div class="col-md-6"><p>المساحة</p></div>
                                    <div class="col-md-6"><p><?= $flat->area?></p></div>
                                    <div class="col-md-6"><p>سعر الكاش</p></div>
                                    <div class="col-md-6"><p><?= $flat->requested_price?></p></div> 
                                </div>
                            </div>
                        </div>
                </div> <!-- flat -->
                <!-- ----------------------------------- -->
            
        <?php
        if ($flat_pointer+1 == $forms) 
        {
            // end of the floor 
            ?>
                <!-- -----------end of floor---------- -->
                        </div>
                    </div>
                </div> <!-- the floor -->
                <!-- ----------------------------------- -->
            <?php
            // reset the flat pointer for the new floor
            $flat_pointer = 0;
        }
        else {
            // or get the next flat form
            $flat_pointer ++;
        }
    }
