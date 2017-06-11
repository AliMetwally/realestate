<!-- the client follow up -->
<div class="row">
    <section class="col-md-12">
        <div class="box box-primary">
            
            <div class="box-header with-border">
                <?php foreach($client_info as $client){?>
                    
                <h4 class="modal-title"><?= $client->first_name.' '. $client->second_name.' / '. $client->client_phone?></h4>
                <?php }?>
            </div> <!-- / box-header -->
            
            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#current_client_tab" data-toggle="tab" aria-expanded="true">متابعات العميل</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="current_client_tab">
                            <table id="tower_table" class="table table-bordered table-hover dataTable" role="grid">  <!-- aria-describedby="example2_info" -->                     
                        <thead>
                            <tr>
                                <th>  #</th>
                                <th>الموظف</th>
                                <th>التاريخ</th>
                                <th>نوع التنبيه</th>
                                <th>البيان</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if ($client_follow){
                            foreach ($client_follow as $follow) {
                                $follow_up_date = new DateTime($follow->follow_up_date);
                                ?>
                                <tr>
                                    <td><?= $follow->follow_up_id ?></td>
                                    <td><?= $follow->username ?></td>
                                    <td width="80px"><?= date_format($follow_up_date,'d-m-Y') ?></td>
                                    <td width="100px"><?= $follow->follow_up_desc_name ?></td>
                                    <td><?= $follow->follow_up ?></td>
                                

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

                        </div><!-- /.tab-pane -->               
                    </div><!-- /.tab-content -->
                </div>
            </div> <!-- /.box-body -->
            
        </div> <!-- / .box -->
    </section>
</div> <!-- / .row -->