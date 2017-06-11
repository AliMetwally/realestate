<div class="box box-success collapsed-box">

    <div class="box-header ui-sortable-handle" style="cursor: move;">
        <i class="fa fa-area-chart"></i>
        <h3 class="box-title">تنبيهات المندوبين</h3>
        <div class="box-tools pull-right">
            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box-tools -->
    </div> <!-- / .box-header -->

    <div class="box-body">
        <form action="<?= base_url('manager/manager_dashboard/') ?>" method="get" id="user_work_form">
            <div class="form-group col-md-5">
                <label class=" control-label" for="min_date_picker" >التاريخ من</label>

                <input type="text" class="form-control rep_client_data" name="from_date" id="min_date_picker" />
                <!--<input type="hidden" class="form-control" name="from_date" id="from_date" />-->

            </div>
            <div class="form-group col-md-5">
                <label for="to_date">التاريخ إلى</label>
                <!--<input data-date-format="dd/mm/yyyy" class="form-control form_date" name="to_date" type="date" id="to_date" value="<?php echo $to_date; ?>"/>-->
                <input type="text" class="form-control rep_client_data" name="to_date" id="max_date_picker">
            </div>
            <div class="col-md-2">
                <input id="search_deal_property" type="submit" class="btn btn-block btn-primary btn-flat" value="بحث" style="margin-top: 25px">        
            </div>
            <div class="row">
                <div class="col-md-3">

                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <table id="users_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
                        <thead>
                            <tr>
                                <th>اسم الموظف</th>
                                <th>اتصالات معلقة</th>
                                <th>اتصالات لم تتم</th>
                                <th>اتصالات تمت</th>
                                <th>زيارات معلقة</th>
                                <th>زيارات لم تتم</th>
                                <th>زيارات تمت</th>
                                <th>معاينات معلقة</th>
                                <th>معاينات لم تتم</th>
                                <th>معاينات تمت</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sales_notifications as $notes) { ?>
                                <tr class="text-center">
                            <input class="form-control" name="user_id" type="hidden" id="user_id" value="<?php echo $notes->user_id; ?>"/>

                            <td><?= $notes->username ?></td>
                            <td style="background-color: #EAC8B6"><?= $notes->call_wait ?></td>
                            <td style="background-color: #DEF4F1"><?= $notes->call_not_done ?></td>
                            <td style="background-color: #DCF29E"><?= $notes->call_done ?></td>
                            <td style="background-color: #EAC8B6"><?= $notes->visit_wait ?></td>
                            <td style="background-color: #DEF4F1"><?= $notes->visit_not_done ?></td>
                            <td style="background-color: #DCF29E"><?= $notes->visit_done ?></td>
                            <td style="background-color: #EAC8B6"><?= $notes->view_wait ?></td>
                            <td style="background-color: #DEF4F1"><?= $notes->view_not_done ?></td>
                            <td style="background-color: #DCF29E"><?= $notes->view_done ?></td>
                            <td><a class="btn btn-info" href="<?php echo base_url('notifications?user_id=' . $notes->user_id . '&from_date=' . $from_date . '&to_date=' . $to_date) ?>">تفاصيل</a></td>
                            </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div> <!-- /.col -->
                <div class="col-md-5" id="deals_data"></div>
                <div class="col-md-4" id="follow_data"></div>
            </div>   
        </form>     
    </div> <!-- /.box-body -->
</div>
<script>
    // min_date 
    $('#min_date_picker').datepicker({
        altField: "#min_date_picker",
        altFormat: "yy-mm-dd",
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
        dateFormat: "yy-mm-dd",
        firstDay: 0,
        isRTL: true,
        showMonthAfterYear: false
    });

    // max date
    $('#max_date_picker').datepicker({
        altField: "#max_date_picker",
        altFormat: "yy-mm-dd",
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
        dateFormat: "yy-mm-dd",
        firstDay: 0,
        isRTL: true,
        showMonthAfterYear: false
    });
</script> 