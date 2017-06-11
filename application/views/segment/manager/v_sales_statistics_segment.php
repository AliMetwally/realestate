<div class="box box-success">

    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-users"></i>
        <h3 class="box-title">إحصائيات المندوبين</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
        </div><!-- /.box-tools -->
    </div> <!-- / .box-header -->

    <div class="box-body">
        <form action="<?= base_url('manager/manager_dashboard/') ?>" method="get" id="user_work_form">
            <div class="form-group col-md-4">
                <label for="from_date">التاريخ من</label>
                <input class="form-control" name="from_date" type="date" id="from_date" value="<?php echo $from_date; ?>"/>
            </div>
            <div class="form-group col-md-4">
                <label for="to_date">التاريخ إلى</label>
                <input class="form-control" name="to_date" type="date" id="to_date" value="<?php echo $to_date; ?>"/>
            </div>
            <div class="col-md-2">
                <input id="search_deal_property" type="submit" class="btn btn-block btn-primary btn-flat" value="بحث" style="margin-top: 25px">        
            </div>
            <div class="col-md-2">
                <a id="rep_sales_follow" href="<?= base_url('reports/rep_sales_follow/'.$from_date.'/'.$to_date)?>"  class="btn btn-block btn-success btn-flat"style="margin-top: 25px">طباعة التقرير</a>        
            </div>
        </form>
        <div class="row">
            <div class="col-md-3">
             
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <table id="users_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
                    <thead>
                        <tr>
                            <th>رقم</th>
                            <th>اسم الموظف</th>
                            <th>الاتصالات</th>
                            <th>المتابعات</th>
                            <th>الزيارات</th>
                            <th>المعاينات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sales_statistics as $users) { ?>
                            <tr class="text-center">
                                <td><?= $users->user_id ?></td>
                                <td><?= $users->username ?></td>
                                <td><?= $users->client_calls ?></td>
                                <td><?= $users->sales_calls ?></td>
                                <td><?= $users->visits ?></td>
                                <td><?= $users->property_view ?></td>
                                <?php 
                                if (empty($from_date)){
                                    $from_date = date('Y-m-d');
                                }
                                if(empty($to_date)){
                                    $to_date = date('Y-m-d');
                                }
                                ?>
                                <td><a class="btn btn-info" href="<?php echo base_url('manager/getNotification/'. $users->user_id.'/'.$from_date.'/'.$to_date) ?>">تفاصيل</a></td>
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

<!-- datepicker script -->
<script>
    // min_date 
        $('#from_date_picker').datepicker({
            altField: "#from_date",
            altFormat: "yymmdd",
            closeText: "إغلاق",
            prevText: "&#x3C;السابق",
            nextText: "التالي&#x3E;",
            currentText: "اليوم",
            monthNames: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو",
                "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
            monthNamesShort: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
            dayNames: ["الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"],
            dayNamesShort: ["أحد", "اثنين", "ثلاثاء", "أربعاء", "خميس", "جمعة", "سبت"],
            dayNamesMin: ["ح", "ن", "ث", "ر", "خ", "ج", "س"],
            weekHeader: "أسبوع",
            dateFormat: "dd/mm/yy",
            firstDay: 0,
            isRTL: true,
            showMonthAfterYear: false
        });
        
        // max date
        $('#max_date_picker').datepicker({
            altField: "#max_date",
            altFormat: "yymmdd",
            closeText: "إغلاق",
            prevText: "&#x3C;السابق",
            nextText: "التالي&#x3E;",
            currentText: "اليوم",
            monthNames: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو",
                "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
            monthNamesShort: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"],
            dayNames: ["الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت"],
            dayNamesShort: ["أحد", "اثنين", "ثلاثاء", "أربعاء", "خميس", "جمعة", "سبت"],
            dayNamesMin: ["ح", "ن", "ث", "ر", "خ", "ج", "س"],
            weekHeader: "أسبوع",
            dateFormat: "dd/mm/yy",
            firstDay: 0,
            isRTL: true,
            showMonthAfterYear: false
        });
</script>