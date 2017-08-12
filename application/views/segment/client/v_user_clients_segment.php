<div class="row">
    <!-- clients of user -->
    <section class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <i class="fa fa-users"></i>
                <p class="box-title">العملاء</p>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div><!-- /.box-tools -->
            </div> <!-- / box-header -->

            <div class="box-body">
                <form target="_blank" method="get" action="<?= base_url('reports/rep_client_follow')?>">
                <div class="row">
                    <?php
                    // in case of manage only
                        if ($this->session->role == 1) {
                            ?> 
                            <!-- search the client name -->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label" for="filter_sales" >المندوب</label>                                    
                                    <select type="text" class="form-control user-dropdown rep_client_data" name="filter_sales" id="filter_sales"></select>                                    
                                </div> <!-- / .form-group -->
                            </div>
                        <?php } ?>
                </div>
                
                <div class="row">
                    
                    <div class="col-md-3">                        
                        <!-- search the client name -->
                        <div class="form-group">
                            <label class="control-label" for="filter_client_name" >اسم العميل</label>                                
                            <input type="text" class="form-control" name="filter_client_name" id="filter_client_name" />                                
                        </div> <!-- / .form-group -->                                                
                    </div>

                    <div class="col-md-3">
                        <!-- search the client phone -->

                        <div class="form-group">
                            <label class="control-label" for="filter_client_phone" >تليفون العميل</label>                                
                            <input type="text" class="form-control" name="filter_client_phone" id="filter_client_phone" />                                
                        </div> <!-- / .form-group -->
                    </div>

                    
                        <!-- search rang min -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class=" control-label" for="min_date_picker" >التاريخ من</label>
                                
                                    <input type="text" class="form-control rep_client_data" name="min_date_picker" id="min_date_picker" />
                                    <input type="hidden" class="form-control" name="min_date" id="min_date" />
                                
                            </div> <!-- / .form-group -->
                        </div>

                        <!-- search rang max -->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label" for="max_date_picker" >التاريخ إلي</label>
                                
                                    <input type="text" class="form-control rep_client_data" name="max_date_picker" id="max_date_picker" />
                                    <input type="hidden" class="form-control" name="max_date" id="max_date" />
                                
                            </div> <!-- / .form-group -->
                        </div>
                        
                        <!-- search rang max -->
                        
                        <!--نوع العميل-->
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="control-label" for="filter_client_flag" >نوع العميل</label>
                                <select type="text" class="form-control" name="filter_client_flag" id="filter_client_flag">
                                    <option value="0">اختر نوع العميل</option>
                                    <option value="1">عميل جاد</option>
                                    <option value="2">عميل غير جاد</option>
                                </select>
                            </div> <!-- / .form-group -->
                        </div>
                    </div>
                <!-- row of button -->
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        <input type="submit" value="طباعة التقرير" id="rep_client_follow" class="btn btn-block btn-success btn-flat">
                    </div>
                </div><!-- /.row  -->
                </form>
            </div> <!-- /.box-body  -->


                <!-- the clients data -->
                <table id="client_table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>user_id</th>
                            <th>client_id</th>
                            <th>deal_id</th>
                            <th>اسم العميل</th>
                            <th>تليفون</th>
                            <th>نوع العميل</th>
                            <th>تاريخ العملية</th>
                            <th>date number</th>
                            <th>حالة العملية</th>
                            <th>الوحدة المحددة</th>
                            <!--<th> اخر متابعة</th>-->
                            <th>المندوب</th>
                            <!--<th>تقييم العميل</th>-->
                            <th>client_flag</th>
                            <th>نوع العميل</th>
                        </tr>
                    </thead> <!-- / thead -->
                    <tbody>
                        <?php
                        foreach ($user_clients as $client) {
                            $deal_create_date = new DateTime($client->deal_created_date);
//                            $last_follow_date = new DateTime($client->last_follow_date);
                            
                            
                        
                            switch ($client->client_flag )
                            {   
                                case 1: $client_flg = "عميل جاد";
                                break;
                                case 2: $client_flg = "عميل غير جاد";
                                break;
                            }
                            
                            ?>
                        <tr class="" data-toggle="modal" data-target="#myModal">
                                <td><?= $client->user_id ?></td>
                                <td><?= $client->client_id ?></td>
                                <td><?= $client->deal_id ?></td>
                                <td><?= $client->client_name ?></td>
                                <td><?= $client->client_phone ?></td>
                                <td><?= $client->client_status_name ?></td>
                                <td><?= date_format($deal_create_date, 'Y/m/d') ?></td>
                                <td><?= date_format($deal_create_date, 'Ymd') ?></td>
                                <td><?= $client->status_name ?></td>
                                <td><?= $client->property_name ?></td>
                                <!--<td><?= date_format($last_follow_date, 'Y/m/d') ?></td>-->
                                <td><?= $client->username ?></td>                                
<!--                                <td><?= $client->client_rank ?></td> -->
                                <td><?= $client->client_flag?></td>
                                <td><?= $client_flg ?></td>                                
                            </tr>
<?php } // end of for  ?>
                    </tbody> <!-- tbody -->
                </table> <!-- / table -->
            </div> <!-- / .box-body -->
        </div> <!-- / .box -->
    </section> <!-- / section -->

    <!-- modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">
                    <?php
                    $role = $this->session->role;
                    if ($role == 3) {
                        $this->load->view('segment/client/v_client_follow_segment');
                    } elseif ($role == 1) {
                        $this->load->view('segment/client/v_manager_follow_segment');
                    }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>                    
                </div>
            </div>
        </div>
    </div> <!-- end of modal -->

</div> <!-- / .row -->

<!-- datepicker script -->
<script>
    // min_date 
        $('#min_date_picker').datepicker({
            altField: "#min_date",
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

<script>
    var base_url = "<?= base_url();?>";
    $(function () {
        
        // load the users
        var lst_users = "<?= base_url(); ?>dropdown/ddlUsers";
        loadDropdown(lst_users, '.user-dropdown', 'user_id', 'username', 'اختر المستخدم');
        
        // rang filter search
       
        
        var client_table = $('#client_table').DataTable({
            "lengthChange": false,
            "info": false,
            "columnDefs": [{
                    "targets": [0, 1, 2, 7,11],
                    "visible": false,
                    "searchable": true
                }]
        });
        
         

        
        $('#client_table tbody').on('click', 'tr', function () {
            // hight light the row            
            //$(this).siblings().removeClass('danger');
            //$(this).addClass('danger');
            // row data 
            var clientRow = client_table.row(this).data();
            // client_id clientRow[1]
            $('#myModalLabel').text(clientRow[3] + ' / ' + clientRow[5] + ' / ' + clientRow[4]);
            // note that this ajax update the v_client_follow_segment
            // get the current sales client follow 
            $.ajax({
                url :base_url+'client/current_client_follow/' + clientRow[1],
                type: 'GEt',
                async: false,
                success: function (current_follow) {
                        $('#current_client_tab').html(current_follow);
                    }
            }); 
            
            // get the shared sales client follow 
            // note that this ajax update the v_client_follow_segment
            $.ajax({
                    url: base_url+'client/shared_client_follow/' + clientRow[1],
                    type: 'GET',
                    async: false,
                    success: function (shared_follow) {
                        $('#shared_client_tab').html(shared_follow);
                            }
            });
            
            // note that this ajax update the v_manager_follow_segment
            $.ajax({
                    url: base_url+'client/client_all_follow_up/' + clientRow[1],
                    type: 'GET',
                    async: false,
                    success: function (all_follow) {
                        $('#manager_client_tab').html(all_follow);
                            }
            });
            
        });

        // search the client phone
        $('#filter_client_phone').keyup(function () {
            client_table.column(4).search(this.value).draw();
        });

        // search the client name
        $('#filter_client_name').keyup(function () {
            client_table.column(3).search(this.value).draw();
        });
        
         // search the client name
        $('#filter_sales').change(function () {
            console.log($('#filter_sales option:selected').text());
            client_table.column(11).search($('#filter_sales option:selected').text()).draw();
        });
        
        /*
         * Remove Action related to Client Rank
        $('#filter_client_rank').change(function () {
            console.log($('#filter_client_rank option:selected').val());
            client_table.column(12).search($('#filter_client_rank option:selected').val()).draw();
        });
        */
        $('#filter_client_flag').change(function () {
            console.log($('#filter_client_flag option:selected').val());
            client_table.column(13).search($('#filter_client_flag option:selected').val()).draw();
        });
         $.fn.dataTable.ext.search.push(
        function( settings, data, dataIndex ) {
        var min = parseInt( $('#min_date').val() );
        var max = parseInt( $('#max_date').val() );
        var date_number = parseFloat( data[7] ) || 0; // use data for the date_number column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && date_number <= max ) ||
             ( min <= date_number   && isNaN( max ) ) ||
             ( min <= date_number   && date_number <= max ) )
        {
            return true;
        }
        return false;
    }
    );
    
    // Event listener to the two range filtering inputs to redraw on input
    $('#min_date_picker, #max_date_picker').change( function() {
        client_table.draw();
    } );
    
    

        // hide the default search input
        $('#client_table_filter').addClass('hidden');

    }); // end of jquery;
</script>
