<h3 class="page-header">
    التنبيهات اليومية
</h3>

<?php
// $daily_notifications is the passed variable 
// create the follow up rable 

if ($daily_notifications) {
    ?>

    <!-- start html code here  -->
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <!--<th>التاريخ</th>-->
                <th>نوع التنيه</th>
                <th>اسم العميل</th>
                <th>التليفون</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($daily_notifications as $row)
                {
                    echo '<tr>'; 
//                    echo "<td>$row->notification_date</td>";
                    echo "<td>$row->notification_name</td>";
                    echo "<td>$row->client_name</td>";
                    echo "<td>$row->client_phone</td>";
                    echo '</tr>'; 
                }
            ?>
        </tbody>
    </table>
        <?php }
 else {
     echo '<p>لا توجد بيانات للعرض</p>';
 }



