<div class="box box-primary">
    <!-- box-header -->
    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-bell"></i>
        <h3 class="box-title">التنبيهات</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div> <!-- / .box-header -->

    <div class="box-body">
        <?php if ($daily_notifications){ ?>
        <a class="btn btn-success" href="<?php echo base_url('reports/rep_daily_notifications/'. $this->session->userId)?>">طباعة التنبيهات</a>
            <form action="<?= base_url('sales/updateFollowUp') ?>" method="get">
                <table id="tower_table" class="table table-bordered table-hover" role="grid">
                    <thead>
                        <tr>
                            <th>التاريخ</th>
                            <th>نوع التنبيه</th>
                            <th>اسم العميل</th>
                            <th>رقم العميل</th>
                            <th>آخر متابعة</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($daily_notifications as $notification) {
                            $notification_date = new DateTime($notification->notification_date);
                            ?>
                            <tr>
                                <td><?= date_format($notification_date, 'd/m/Y') ?></td>
                                <td><?= $notification->notification_name ?></td>
                                <td><?= $notification->client_name ?></td>
                                <td><?= $notification->client_phone ?></td>
                                <td><?= $notification->follow_up ?></td>
                        <input type="hidden" id="notification_id" name="notification_id" value="<?= $notification->notification_id ?>">
                        <input type="hidden" id="follow_up_id" name="follow_up_id" value="<?= $notification->follow_up_id ?>">
                        <input type="hidden" id="user_id" name="user_id" value="<?= $notification->user_id ?>">
                        <input type="hidden" id="deal_id" name="deal_id" value="<?= $notification->deal_id ?>">
                        <td><a class="btn btn-success" href="<?= base_url('sales/updateFollowUp/'. $notification->notification_id . '/' . $notification->follow_up_id . '/' . $notification->user_id . '/' . $notification->deal_id . '/1') ?>">تمت</a></td>
                        <td><a class="btn btn-danger" href="<?= base_url('sales/updateFollowUp/'. $notification->notification_id . '/' . $notification->follow_up_id . '/' . $notification->user_id . '/' . $notification->deal_id . '/2') ?>">لم تتم</a></td>

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
        </form>

        <?php
//            echo '<pre>';
//            echo print_r($daily_notifications);
//            echo '</pre>';
//        
        ?>
    </div> <!-- / .box-body -->
</div> <!-- /.box -->