<!-- the main row -->
<div class="row">
    <!-- notification box-->
    <section class="col-md-12">
        <?php
            $data['daily_notifications'] = $daily_notifications;
            $this->load->view('segment/sales/dashboard/v_sales_notifications', $data);
        ?>
    </section>
    <section class="col-md-6">
        <?php
            $data['daily_notification_manager'] = $daily_notification_manager;
            $this->load->view('segment/manager/v_manager_notifications', $data);
        ?>
    </section>
    <!-- the new properties -->
    <section class="col-md-12">
        <?php
            $this->load->view('segment/sales/dashboard/v_new_properties');
        ?>
    </section>
</div> <!-- /.row -->