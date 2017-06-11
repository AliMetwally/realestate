<?php
echo '<div class="row">';

$unit_pointer = 0;

foreach ($unit_data as $unit) {
    $unit_pointer ++;
    ?>
    
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
			<div class="offer <?= $this->model_tower_data->boxStatus($unit->status)?>">
				<div class="shape">
					<div class="shape-text">
						<?= $unit->status_name?> <!-- متوفر -->								
					</div>
				</div>
				<div class="offer-content">
					<h3 class="lead">
						وحدة ادارية (<?= $unit_pointer?>)
					</h3>
                                    <div class="row property-details">
                                        <div class="col-md-6"><p>المساحة</p></div>
                                    <div class="col-md-6"><p><?= $unit->area?></p></div>                                    
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
