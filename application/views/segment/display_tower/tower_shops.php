<?php
echo '<div class="row">';

$shop_pointer = 0;

foreach ($shop_data as $shop) {
    $shop_pointer ++;
    ?>
    
    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
			<div class="offer <?= $this->model_tower_data->boxStatus($shop->status)?>">
				<div class="shape">
					<div class="shape-text">
						<?= $shop->status_name?> <!-- متوفر -->								
					</div>
				</div>
				<div class="offer-content">
					<h3 class="lead">
						محل (<?= $shop_pointer?>)
					</h3>
                                    <div class="row property-details">
                                        <div class="col-md-6"><p>المساحة</p></div>
                                    <div class="col-md-6"><p><?= $shop->area?></p></div>                                    
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