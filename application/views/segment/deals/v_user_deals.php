
<?php
    // test if there is a data
    if (!empty($user_deals)) { ?>
    
    

<table id="user_deals_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
    <thead>
        <tr class="text-center">
            <th>deal_id</th>
            <th>الوحدة</th>
            <th>اسم العميل</th>
            <th>تليفون</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($user_deals as $deal) { ?>
            <tr>
                <td><?= $deal->deal_id ?></td>
                <td><?= $deal->property_type_name.' / '.$deal->area_name.' / '.$deal->owner_name ?></td>
                <td><?= $deal->client_name ?></td>
                <td><?= $deal->client_phone ?></td>

                <td>التفاصيل</td>
            </tr>

        <?php } ?>
    </tbody>
</table>

<script>
    $(function (){
        var base_url = "<?= base_url();?>";
        var deals_table = $('#user_deals_table').DataTable({
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
        
        // action on row 
        $('#user_deals_table tbody').on('click', 'tr', function (){
            var dealRow = deals_table.row(this).data();
            $.ajax({
                url:base_url+"manager/showDealFollow/"+dealRow[0], // deal_id
                type: 'GET',
                success: function (follow_data) {
                            $('#follow_data').html(follow_data);
                        }
            });
        });
    });
</script>

<?php }
    else
    { ?>
<p class="alert alert-danger lead text-center">لا توجد بيانات للعرض</p>
    <?php }
?>