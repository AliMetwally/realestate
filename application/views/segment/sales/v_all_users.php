<div class="box box-success">

    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-users"></i>
        <h3 class="box-title">عمليات التسويق لكل الموظفين</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div> <!-- / .box-header -->

    <div class="box-body">
        <div class="row">
            <div class="col-md-3">
                <table id="users_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
                    <thead>
                        <tr>
                            <th>رقم</th>
                            <th>اسم الموظف</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users_data as $users) { ?>
                            <tr>
                                <td><?= $users->user_id ?></td>
                                <td><?= $users->username ?></td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div> <!-- /.col -->
            <div class="col-md-5" id="deals_data"></div>
            <div class="col-md-4" id="follow_data"></div>
        </div>        
    </div> <!-- /.box-body -->
</div>
<script>
    $(function() {
        var base_url = "<?= base_url();?>";
        var table = $('#users_table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false
        });
        
        $('#users_table tbody').on('click', 'tr', function (){
            // get the row data
            var userRow = table.row(this).data();
            $.ajax({
                url:base_url+"manager/showUserDeals/"+userRow[0], // data[0] is the first column in the table user_id
                type: 'GET',
                success: function (deals) {
                        $('#deals_data').html(deals);
                    }
            });
            
        });
        
    }); // end of jquery
    
</script>

