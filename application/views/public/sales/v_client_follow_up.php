<!-- 
    this view takes the follow up and display it
-->

<?php if ($client_follow) { ?>
    <table id="deal_follow_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
    <thead>
        <tr class="text-center">
            <th>#</th>
            <th>اسم المندوب</th>
            <th>اسم العميل</th>
            <th>التليفون</th>
            <th>من المتصل</th>
            <th>التاريخ</th>
            <th>نوع المتابعة</th>
            <th>النتيجة</th>
        </tr>
    </thead>
    <!--<caption class="text-center lead">متابعات العميل  / <?= $follow_up[0]->client_name?></caption>-->
    <tbody>
        <?php foreach ($client_follow as $follow) { ?>
            <tr>
                <td><?= $follow->follow_up_id ?></td>
                <td><?= $follow->username ?></td>
                <td><?= $follow->client_name ?></td>                
                <td><?= $follow->client_phone ?></td>                
                <td><?= $follow->who_call_name ?></td>
                <td><?= $follow->follow_up_date ?></td>
                <td><?= $follow->follow_up_name ?></td>
                <td><?= $follow->follow_up ?></td>
                
            </tr>

        <?php } ?>
    </tbody>
</table>
<?php } // end if
 else {
     echo '<p>لا توجد بيانات للعرض</p>';
}
?>
