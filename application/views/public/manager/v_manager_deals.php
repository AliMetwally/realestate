<!-- the main row -->
<div class="row">
            
    <!-- users follow ups -->
    <section class="col-md-12">
        <?php
            $data['users_data'] = $users_data;
            $this->load->view('segment/sales/v_all_users');
        ?>
    </section>
    
</div> <!-- end of main row -->