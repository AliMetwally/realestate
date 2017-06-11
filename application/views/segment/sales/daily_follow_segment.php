<h3 class="page-header">
    المتابعات والاتصالات اليومية
</h3>



<form class="form-inline well col-md-12" method="post" action="<?= base_url('sales') ?>">
    <div class="form-group">
        <label for="follow_up_from_date" class="col-md-4">التاريخ من</label>

        <input type="text" value="<?= $follow_up_from_date ?>" class="form-control follow_date_picker" name="follow_up_from_date" id="follow_up_from_date">                

    </div>

    <div class="form-group">
        <label for="follow_up_to_date" class="col-md-4">التاريخ إلي</label>

        <input type="text" value="<?= $follow_up_to_date ?>" class="form-control follow_date_picker" name="follow_up_to_date" id="follow_up_to_date">                

    </div>
    <button type="submit" id="get_follow_date" class="btn btn-primary">عرض البيانات</button>
</form>


<?php
// $daily_work is the passed variable 
// create the follow up rable 

if ($daily_work) {
    ?>

    <!-- start html code here  -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>من المتصل</th>
                <th>التاريخ</th>
                <th>نوع المتابعة</th>
                <th>اسم العميل</th>
                <th>النتيجة</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($daily_work as $row)
                {
                    echo '<tr>'; 
                    echo "<td>$row->who_call_name</td>";
                    echo "<td>$row->follow_up_date</td>";
                    echo "<td>$row->follow_up_name</td>";
                    echo "<td>$row->client_name</td>";
                    echo "<td>$row->follow_up</td>";
                    echo '</tr>'; 
                }
            ?>
        </tbody>
    </table>
        <?php }
 else {
     echo '<p>لا توجد بيانات للعرض</p>';
 }
        ?>



        <script>
            $(function (){
                $('.follow_date_picker').datepicker({                
                closeText: "إغلاق",
                prevText: "&#x3C;السابق",
                nextText: "التالي&#x3E;",
                currentText: "اليوم",
                monthNames: [ "يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو",
                "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر" ],
                monthNamesShort: [ "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12" ],
                dayNames: [ "الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت" ],
                dayNamesShort: [ "أحد", "اثنين", "ثلاثاء", "أربعاء", "خميس", "جمعة", "سبت" ],
                dayNamesMin: [ "ح", "ن", "ث", "ر", "خ", "ج", "س" ],
                weekHeader: "أسبوع",
                dateFormat: "dd/mm/yy",
                firstDay: 0,
                isRTL: true,
                showMonthAfterYear: false  
        });
            });
        </script>



