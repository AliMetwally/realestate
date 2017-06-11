<!-- the main row -->
<div class="row">
    <!-- the right column -->
    <section class="col-md-12">
        <!-- display the towers as data table -->
        <?php
            $data['towers_data'] = $towers_data;
            $this->load->view('segment/display_tower/v_all_towers_segment', $data);
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
            $data['sales_statistics'] = $sales_statistics;
            $this->load->view('segment/manager/v_sales_statistics_segment', $data);
        ?>  
    </section>
    <section class="col-md-12">
        <?php
            $data['sales_notifications'] = $sales_notifications;
            $this->load->view('segment/manager/v_sales_statistics_notifications', $data);
        ?>  
    </section>
</div> <!-- end of main row -->