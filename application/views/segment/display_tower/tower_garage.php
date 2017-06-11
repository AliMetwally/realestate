<?php
echo '<div class="row">';

$garage_pointer = 0;

foreach ($garage_data as $garage) {
    $garage_pointer ++;
    ?>
    
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
			<div class="offer <?= $this->model_tower_data->boxStatus($garage->status)?>">
				<div class="shape">
					<div class="shape-text">
						<?= $garage->status_name?> <!-- متوفر -->								
					</div>
				</div>
				<div class="offer-content">
					<h3 class="lead">
						جراج (<?= $garage_pointer?>)
					</h3>
                                    <div class="row property-details">
                                        <div class="col-md-6"><p>المساحة</p></div>
                                    <div class="col-md-6"><p><?= $garage->area?></p></div>                                    
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