<!--
this view display the towers as a datatable 
-->
<div class="box box-primary collapsed-box">

    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-building-o"></i>
        <h3 class="box-title">الابراج</h3>
        <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
    </div><!-- /.box-tools -->
    </div> <!-- / .box-header -->

    <div class="box-body">
        <div class="row">
            <div class="col-md-8">
                <table id="tower_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
                    <thead>
                        <tr>
                            <td>tower_id</td>
                            <th>البرج</th>
                            <th>المنطقة</th>
                            <th> الادوار</th>
                            <th> النماذج</th>
                            <th> المحلات</th>
                            <th> الميزانين</th>
                            <th> الوحدات الادارية</th>
                            <th> الجراجات</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($towers_data as $tower) { ?>
                            <tr>
                                <td><?= $tower->tower_id ?></td>
                                <td><a target="_blank" href="<?= base_url("sales/displayTower/$tower->tower_id")?>"><?= $tower->tower_name ?></a></td>
                                <td><?= $tower->area_name ?></td>

                                <td><?= $tower->floors_no ?></td>
                                <td><?= $tower->flat_no ?></td>
                                <td><?= $tower->shop_no ?></td>
                                <td><?= $tower->mezzanine_no ?></td>
                                <td><?= $tower->managerial_units ?></td>
                                <td><?= $tower->garage_no ?></td>
                                
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div> <!-- /.col -->
            <div class="col-md-4">
                <p class="text-center">
                    <strong>معلومات عن البرج</strong>
                </p>
                <p id="tower_name"></p>
            </div> <!-- /.col -->
        </div>        
    </div> <!-- /.box-body -->
</div>

<script>

    $(function () {
        var base_url = "<?= base_url();?>";
        var table = $('#tower_table').DataTable({
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
        
        $('#tower_table tbody').on('click', 'tr', function (){
            var data = table.row(this).data();
                        
            $.ajax({
                url: base_url+"/tower_info/getTower/"+data[0],
                type: 'GET',
                //dataType: 'json',
                success: function (tower) {
                        console.log(tower);
                        $('#tower_name').html(tower);
                    }
            });
        });
    });

</script>