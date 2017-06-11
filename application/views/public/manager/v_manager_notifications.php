<!-- the main row -->
<div class="row">
    <!-- the right column -->
    <section class="col-md-12">
        <!-- display the towers as data table -->
        <?php
            $data['daily_notifications'] = $daily_notifications;
            $this->load->view('segment/manager/v_sales_notifications', $data);
        ?>
    </section> <!-- end of the right column -->
        
    <!-- users follow ups -->
<!--    <section class="col-md-12">
        <?php
            //$data['users_data'] = $users_data;
            //$this->load->view('segment/sales/v_all_users');
        ?>
    </section>-->
    <!-- display the daily work of sales -->
    <section class="col-md-12">
        <?php
            $data['daily_notification_manager'] = $daily_notification_manager;
            $this->load->view('segment/manager/v_manager_notifications', $data);
        ?>  
    </section>
    
</div> <!-- end of main row -->