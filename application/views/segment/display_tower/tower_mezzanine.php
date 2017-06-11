<?php
echo '<div class="row">';

$mezzanine_pointer = 0;

foreach ($mezzanine_data as $mezzanine) {
    $mezzanine_pointer ++;
    ?>
    
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
			<div class="offer <?= $this->model_tower_data->boxStatus($mezzanine->status)?>">
				<div class="shape">
					<div class="shape-text">
						<?= $mezzanine->status_name?> <!-- متوفر -->								
					</div>
				</div>
				<div class="offer-content">
					<h3 class="lead">
						ميزانين (<?= $mezzanine_pointer?>)
					</h3>
                                    <div class="row property-details">
                                        <div class="col-md-6"><p>المساحة</p></div>
                                    <div class="col-md-6"><p><?= $mezzanine->area?></p></div>                                    
                                    </div>
				</div>
			</div>
    </div>
    
<?php
}
?>


<?php
echo '</div>';

?>
