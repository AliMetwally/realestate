<!--
this view display the towers as a datatable 
-->
<div class="box box-primary">

    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-bell"></i>
        <h3 class="box-title">تنبيهات الإدارة</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box-tools -->
    </div> <!-- / .box-header -->

    <div class="box-body">
        <div class="row">
            <div class="col-md-12">

                <thead>
                    <?php if ($daily_notification_manager) { ?>
                    <table id="tower_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
                        <thead>
                            <tr>
                                <th>الموظف</th>
                                <th>التاريخ</th>
                                <th>نص التنبيه</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($daily_notification_manager as $notification) {
                                $notification_date = new DateTime($notification->notification_date);
                                ?>
                                <tr>
                                    <td><?= $notification->username ?></td>
                                    <td><?= date_format($notification_date, 'd/m/Y') ?></td>
                                    <td><?= $notification->notification_description ?></td>

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