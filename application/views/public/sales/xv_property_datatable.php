<div style="margin-top: 30px;">
<table id="property-table" class="display responsive" width="100%">
    <thead>
        <tr>
            <th></th>
            <th>النوع</th>
            <th>السعر المستهدف</th>
            <th>الحالة</th>
            <th>المنطقة</th>
            <th>الشارع</th>
            <th>التشطيب</th>
            <th>الرخصة</th>
            <th>كهرباء</th>
            <th>غاز</th>
            <th>مياه</th>
        </tr>
        <tr id="filterrow">
            <th></th>
            <th>النوع</th>
            <th>السعر المستهدف</th>
            <th>الحالة</th>
            <th>المنطقة</th>
            <th>الشارع</th>
            <th>التشطيب</th>
            <th>الرخصة</th>
            <th>كهرباء</th>
            <th>غاز</th>
            <th>مياه</th>
        </tr>
    </thead>

    <tfoot>
        <tr>
            <th></th>
            <th>النوع</th>
            <th>السعر المستهدف</th>
            <th>الحالة</th>
            <th>المنطقة</th>
            <th>الشارع</th>
            <th>التشطيب</th>
            <th>الرخصة</th>
            <th>كهرباء</th>
            <th>غاز</th>
            <th>مياه</th>
        </tr>
    </tfoot>

    <tbody>
            <?php foreach ($datatable as $val) {?>
        <tr>
            <td></td>
            <td><?php echo $val->property_type_name;?></td>
            <td><?php echo $val->requested_price;?></td>
            <td><?php echo $val->status_name;?></td>
            <td><?php echo $val->area_name;?></td>
            <td><?php echo $val->street;?></td>
            <td><?php echo $val->finishing_name;?></td>
            <td><?php echo $val->license;?></td>
            <td><?php echo $val->electricity_gauge;?></td>
            <td><?php echo $val->gase_gauge;?></td>
            <td><?php echo $val->water_gauge;?></td>
        </tr>
            <?php };?>
    </tbody>
</table>
</div>

