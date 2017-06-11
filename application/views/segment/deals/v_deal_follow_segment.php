<?php
if (!empty($follow_up)) { ?>

    <table id="deal_follow_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
    <thead>
        <tr class="text-center">
            <th>follow id</th>
            <th>من المتصل</th>
            <th>التاريخ</th>
            <th>نوع المتابعة</th>
            <th>النتيجة</th>
        </tr>
    </thead>
    <caption class="text-center lead">متابعات العميل  / <?= $follow_up[0]->client_name?></caption>
    <tbody>
        <?php foreach ($follow_up as $follow) { ?>
            <tr>
                <td><?= $follow->follow_up_id ?></td>
                <td><?= $follow->who_call_name ?></td>
                <td><?= $follow->follow_up_date ?></td>
                <td><?= $follow->follow_up_name ?></td>
                <td><?= $follow->follow_up ?></td>
                
            </tr>

        <?php } ?>
    </tbody>
</table>

<?php }
 else {?>
     <p class="alert alert-danger lead text-center">لا توجد بيانات للعرض</p>
<?php } ?>

<script>
    $(function (){
        var deals_table = $('#deal_follow_table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "columnDefs":[{
                    "targets": [ 0 ],
                    "visible": false,
                    "searchable": false
            }]
        });
        
        
    });
</script>