<!--
this view display the towers as a datatable 
-->
<div class="box box-primary">

    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-bell"></i>
        <h3 class="box-title">إحصائيات الموظفين</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box-tools -->
    </div> <!-- / .box-header -->

    <div class="box-body">
        
        
        <div class="row">
            <div class="col-md-12">

                <thead>
                    <?php if ($follow_details) { ?>
                    <table id="tower_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
                        <thead>
                            <tr>
                                <th>الموظف</th>
                                <th>التاريخ</th>
                                <th>نوع التنبيه</th>
                                <th>اسم العميل</th>
                                <th>رقم العميل</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($follow_details as $follow) {
                                $follow_up_date = new DateTime($follow->follow_up_date);
                                ?>
                                <tr>
                                    <td><?= $follow->username ?></td>
                                    <td width="80px"><?= date_format($follow_up_date,'d-m-Y') ?></td>
                                    <td width="100px"><?= $follow->follow_up_name ?></td>
                                    <td><?= $follow->client_name ?></td>
                                    <td><?= $follow->client_phone ?></td>
                                    <td><?= $follow->follow_up ?></td>
                                    <td><a class="btn btn-info" href="<?=  base_url('manager/client_all_follow_up/'.$follow->client_id) ?>">التفاصيل</a></td>

                                </tr>
                            <?php
                            } // end of for
                        } // end of if
                        else {
                            echo '<p>لا توجد تنبيهات اليوم</p>';
                        }
                        ?>
                    </tbody>
                </table>

                <?php
//            echo '<pre>';
//            echo print_r($daily_notifications);
//            echo '</pre>';
//        
                ?>
            </div> <!-- / .box-body -->
        </div>
    </div>
</div> <!-- /.box -->


