<?php
if ($properties) {?>
<form>    
    <table id="property_deal_table" class="table table-section table-bordered">
        <thead>
            <tr>
                <th colspan="2">اسم العميل</th>
                <th>التليفون</th>
                <th>نوع الوحدة</th>  
                <th>المساحة</th>              
                <th>المنطقة</th>
                <th>أقل سعر</th>
                <th>أعلى سعر</th>
                <th>أقل دور</th>
                <th>أعلى دور</th>
                <th>التشطيب</th>
            </tr>
        </thead>
        <tbody id="property_deal_data">
            <?php foreach ($properties as $property) { 
            ?>
            <tr>
                <td colspan="2"><?= $property->client_name?></td>
                <td><?= $property->client_phone?></td>
                <td><?= $property->property_type_name?></td>
                <td><?= $property->area .' م'.'<sup>2</sup>'?></td>
                <td><?= $property->area_name?></td>                
                <td><?= $property->min_price?></td>
                <td><?= $property->max_price?></td>
                <td><?= $property->min_floor?></td>
                <td><?= $property->max_floor?></td>
                <td><?= $property->finishing_name?></td>
            </tr>
            <?php }  ?>
        </tbody>
    </table>
</form>

<?php } // EO IF ?>

