<!--
this view display the towers as a datatable 
-->
<div class="box box-primary">

    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-bell"></i>
        <h3 class="box-title">تنبيهات الموظفين</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box-tools -->
    </div> <!-- / .box-header -->

    <div class="box-body">
        
        <form action="<?= base_url('notifications/') ?>" method="get" id="user_work_form">
            <div class="form-group col-md-5">
                <label for="from_date">التاريخ من</label>
                <input class="form-control" name="from_date" type="date" id="from_date" />
            </div>
            <div class="form-group col-md-5">
                <label for="to_date">التاريخ إلى</label>
                <input class="form-control" name="to_date" type="date" id="to_date" />
            </div>
            <div class="col-md-2">
                <input id="search_deal_property" type="submit" class="btn btn-block btn-primary btn-flat" value="بحث" style="margin-top: 25px">        
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">

                <thead>
                    <?php if ($daily_notifications) { ?>
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
                            foreach ($daily_notifications as $notification) {
                                
                                $notification_date = new DateTime($notification->notification_date);
                                if ($notification->confirmed == 1){
                                   $confirm = 'تمت';
                                } else if ($notification->confirmed == 2){
                                   $confirm = 'لم تتم';
                                } else {
                                   $confirm = 'معلقة';
                                }
                                ?>
                                <tr>
                                    <td><?= $notification->username ?></td>
                                    <td><?= date_format($notification_date,'Y-m-d') ?></td>
                                    <td><?= $notification->notification_name .' - '.$confirm?></td>
                                    <td><?= $notification->client_name ?></td>
                                    <td><?= $notification->client_phone ?></td>

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
