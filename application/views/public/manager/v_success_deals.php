<div class="row">
    <section class="col-md-12">
        <div class="box box-solid box-danger">
            <div class="box-header with-border">
                <i class="fa fa-check-square-o"></i>
                 <h3 class="box-title">الصفقات الناجحة</h3>                 
            </div> <!-- /.box-header -->
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        if (!empty($success_deals)) {?>
                            <table id="success_deal_table" class="table table-bordered table-hover">
                            <thead>
                                <th>المندوب</th>
                                <th>الوحدة</th>
                                <th>اسم المالك</th>
                                <th>رقم المالك</th>
                                <th>اسم العميل</th>
                                <th>رقم العميل</th>
                                <th>user_id</th>
                                <th>deal_id</th>
                                <th>property_id</th>
                                <th>client_id</th>
                                <th></th>
                                
                            </thead>
                            <tbody>
                                <?php
                                foreach ($success_deals as $deal) { ?>
                                <tr>
                                    <td><?= $deal->username?></td>
                                    <td><?= $deal->property_name?></td>
                                    <td><?= $deal->owner_name?></td>
                                    <td><?= $deal->owner_phone?></td>
                                    <td><?= $deal->client_name?></td>
                                    <td><?= $deal->client_phone?></td>
                                    <td><?= $deal->user_id?></td>
                                    <td><?= $deal->deal_id?></td>
                                    <td><?= $deal->property_id?></td>
                                    <td><?= $deal->client_id?></td>
                                    
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dealModal">
                                            اضافة العمولة
                                        </button>    
                                    </td>
                                    </tr>
                                <?php } ?>
                                
                            </tbody>
                        </table>
                        <?php } // end if
                        else
                        {echo '<p>لا توجد بيانات للعرض</p>';}
                        ?>
                    </div> <!-- ./col-md-12 -->
                </div> <!-- /.row -->
            </div> <!-- /.box-body -->
            <!-- the modal data -->
            <form class="" method="get" action="<?= base_url('manager/addSuccessDeal')?>">
            <div class="modal fade" id="dealModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">اضافة تفاصيل عمولة البيع</h4>
                        </div>
                        <div class="modal-body">
                            <!-- deal info -->
                            <div class="row">
                                <div class="col-md-3"> <p> تم بيع الوحدة</p> </div>
                                <div class="col-md-9"> <p id="deal_property_name"> </p> </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2"> <p> بواسطة المندوب</p> </div>
                                <div class="col-md-2"> <p id="deal_sales_name"> </p> </div>
                                <div class="col-md-2"> <p> اسم المالك</p> </div>
                                <div class="col-md-2"> <p id="deal_owner_name"> </p> </div>
                                <div class="col-md-2"> <p> اسم المشتري</p> </div>
                                <div class="col-md-2"> <p id="deal_client_name"> </p> </div>
                            </div>
<!--                            <div class="row">
                                <div class="col-md-3"> <p> اسم المالك</p> </div>
                                <div class="col-md-9"> <p id="deal_owner_name"> </p> </div>
                            </div>-->
<!--                            <div class="row">
                                <div class="col-md-3"> <p> اسم المشتري</p> </div>
                                <div class="col-md-9"> <p id="deal_client_name"> </p> </div>
                            </div>-->
                            <div class="panel panel-success">
                                <!-- Default panel contents -->
                                <div class="panel-heading">تفاصيل البيع</div>
                                <div class="panel-body">
                                    
                                        <!-- current_sales -->
                                        <input type="hidden" id="current_sales_id">
                                        <input type="hidden" name="deal_id" id="deal_id">
                                        <input type="hidden" name="property_id" id="property_id">
                                       
                                        <div class="row">
                                            <!-- deal_price -->
                                        <div class="form-group col-md-12">
                                            <label class="control-label" for="deal_price">سعر البيع</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">بالجنيه</span>
                                                <input class="form-control" name="deal_price" id="deal_price" type="text">
                                            </div>
                                        </div>
                                        </div>
                                        
                                        <div class="row">
                                            <!-- deal_comm percentage -->
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="deal_comm">العمولة الكلية</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">%</span>
                                                <input class="form-control" name="deal_comm" id="deal_comm" type="text">
                                            </div>
                                        </div> <!-- /.row -->
                                        
                                        <!-- deal_comm amount -->
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="deal_comm_amount"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">بالجنيه</span>
                                                <input class="form-control" name="deal_comm_amount" id="deal_comm_amount" type="text">
                                            </div>
                                        </div>
                                        </div> <!-- /.row -->
                                        
                                        <div class="row">
                                            <!-- sales_comm -->
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="sales_comm">عمولة الكلية للمندوبين</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">%</span>
                                                <input class="form-control" name="sales_comm" id="sales_comm" type="text">
                                            </div>
                                        </div>
                                        
                                         <!-- sales_comm_amount -->
                                        <div class="form-group col-md-6">
                                            <label class="control-label" for="sales_comm_amount"></label>
                                            <div class="input-group">
                                                <span class="input-group-addon">بالجنيه</span>
                                                <input class="form-control" name="sales_comm_amount" id="sales_comm_amount" type="text" readonly=""> 
                                            </div>
                                        </div>
                                        </div> <!-- /.row -->
                                        
                                        <!-- the sales commission share -->
                                        <div class="row">
                                            <!-- sales name -->
                                            <div class="form-group col-md-4">
                                                <label class="control-label" for="sales_name">المندوب</label>
                                                <select class="form-control user-dropdown" name="sales_name[]" id="sales_name" type="text"></select>
                                            </div>
                                            <!-- sales_share_commission -->
                                            <div class="form-group col-md-3">
                                            <label class="control-label" for="sales_share_comm">النسبة</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">%</span>
                                                <input class="form-control" name="sales_share_comm[]" id="sales_share_comm" type="text">
                                            </div>
                                            </div>
                                            
                                            <!-- sales_share_amount -->
                                            <div class="form-group col-md-5">
                                            <label class="control-label" for="sales_share_amount">المبلغ</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">بالجنيه</span>
                                                <input class="form-control" name="sales_share_amount[]" id="sales_share_amount" type="text" readonly="">
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <!-- second sales -->
                                        <div class="row">
                                            <!-- sales name -->
                                            <div class="form-group col-md-4">
                                                <label class="control-label" for="sales_name">المندوب</label>
                                                <select class="form-control user-dropdown" name="sales_name[]" id="sales_name" type="text"></select>
                                            </div>
                                            <!-- sales_share_commission -->
                                            <div class="form-group col-md-3">
                                            <label class="control-label" for="sales_share_comm">النسبة</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">%</span>
                                                <input class="form-control" name="sales_share_comm[]" id="sales_share_comm2" type="text">
                                            </div>
                                            </div>
                                            
                                            <!-- sales_share_amount -->
                                            <div class="form-group col-md-5">
                                            <label class="control-label" for="sales_share_amount">المبلغ</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">بالجنيه</span>
                                                <input class="form-control" name="sales_share_amount[]" id="sales_share_amount2" type="text" readonly="">
                                            </div>
                                            </div>
                                        </div>
                                        
                                        <!-- third sales -->
                                        <div class="row">
                                            <!-- sales name -->
                                            <div class="form-group col-md-4">
                                                <label class="control-label" for="sales_name">المندوب</label>
                                                <select class="form-control user-dropdown" name="sales_name[]" id="sales_name" type="text"></select>
                                            </div>
                                            <!-- sales_share_commission -->
                                            <div class="form-group col-md-3">
                                            <label class="control-label" for="sales_share_comm">النسبة</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">%</span>
                                                <input class="form-control" name="sales_share_comm[]" id="sales_share_comm3" type="text">
                                            </div>
                                            </div>
                                            
                                            <!-- sales_share_amount -->
                                            <div class="form-group col-md-5">
                                            <label class="control-label" for="sales_share_amount">المبلغ</label>
                                            <div class="input-group">
                                                <span class="input-group-addon">بالجنيه</span>
                                                <input class="form-control" name="sales_share_amount[]" id="sales_share_amount3" type="text" readonly="">
                                            </div>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div> <!-- /.panel -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="حفظ">
                            <!--<button type="button" class="btn btn-success pull-right">اضافة مندوب</button>-->
                        </div>
                    </div>
                </div>
            </div> <!-- end of modal -->
            </form>

        </div> <!-- /.box -->
    </section> <!-- / section -->
</div> <!-- / .row-->

<!-- the success confirmed deals  -->
<div class="row">
    <section class="col-md-12">
        <div class="box box-solid box-success">
            <div class="box-header with-border">
                <i class="fa fa-check-square-o"></i>
                 <h3 class="box-title">الصفقات التي تم اعتمادها</h3>                 
            </div> <!-- /.box-header -->
            
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                            if (!empty($confirmed_deals)) {?>
                             
                             <table id="confirmed_deals_table" class="table table-bordered table-hover">
                                 <thead>
                                     <tr>
                                         <th>المندوب</th>
                                         <th>الوحدة</th>
                                         <th colspan="2">عمولة الشركة</th>
                                         <th colspan="2">عمولة المندوبين</th>
                                         <th colspan="2">المشتري</th>
                                         <th colspan="2">البائع</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        foreach ($confirmed_deals as $confirmed_deal)
                                        { ?>
                                     <tr>
                                         <td><?= $confirmed_deal->username?></td>                                         
                                         <td><?= $confirmed_deal->property_name?></td>                                         
                                         <td><?= $confirmed_deal->deal_comm?></td>                                         
                                         <td><?= $confirmed_deal->deal_precent . '%'?></td>                                         
                                         <td><?= $confirmed_deal->sales_comm?></td>                                         
                                         <td><?= $confirmed_deal->sales_precent. '%'?></td>                                         
                                         <td><?= $confirmed_deal->client_name?></td>                                         
                                         <td><?= $confirmed_deal->client_phone?></td>                                         
                                         <td><?= $confirmed_deal->owner_name?></td>                                         
                                         <td><?= $confirmed_deal->owner_phone?></td>                                         
                                     </tr>
                                        <?php } // end of for         
                                     ?>
                                 </tbody>
                             </table>
                            <?php }
                            else
                            {echo '<p>لا توجد بيانات للعرض</p>';}
                        ?>
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!-- /.box-body -->
        </div><!-- /.box -->
    </section>
</div>
<!-- datatable script -->
<script>
    $(function (){
        
        var success_deals_table = $('#success_deal_table').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": false,
            "autoWidth": false,
            "columnDefs": [{
                    "targets": [6,7,8,9],
                    "visible": false,
                    "searchable": false
                }]
        }); // end of data table
        
        
        $('#success_deal_table tbody').on('click', 'tr', function (){
            var dealRow = success_deals_table.row(this).data();            
            $('#deal_property_name').text(dealRow[1]); // the property name            
            $('#deal_sales_name').text(dealRow[0]); // the sales name            
            $('#deal_owner_name').text(dealRow[2]); // the owner name            
            $('#deal_client_name').text(dealRow[4]); // the client name
            $('#current_sales_id').val(dealRow[6]); // the current sales id
            $('#deal_id').val(dealRow[7]); // set the deal_id
            $('#property_id').val(dealRow[8]); // set the deal_id
            
             // load the users
        var lst_users = "<?= base_url(); ?>dropdown/ddlUsers";
        loadDropdown(lst_users, '.user-dropdown', 'user_id', 'username', 'اختر المستخدم');
        $('#sales_name').val($('#current_sales_id').val());
        
        });
        
       
    }); // end of jquery
</script>


<!-- script for commission -->
<script>
    // this function calculate the percentage amount 
    function get_amount(total_amount,percentage, result_input)
    {
        var total = $(total_amount).val();
        var percent = $(percentage).val();
        $(result_input).val(Math.round((percent/100) * total));
    }
    
    $(function (){
            // get the total deal amount
           $('#deal_comm').blur(function (){
           get_amount('#deal_price', this, '#deal_comm_amount');
       });
       // get the percent of the comm_money
       $('#deal_comm_amount').blur(function (){
           var percent = ($(this).val()/ $('#deal_price').val()) *100;
           $('#deal_comm').val(percent);
       });
       
        // get all sales commission amount
       $('#sales_comm').blur(function (){
           get_amount('#deal_price', this, '#sales_comm_amount');
       });
       
       // get individual sales commession
       $('#sales_share_comm').blur(function ()
       {
           get_amount('#sales_comm_amount', this, '#sales_share_amount');
       });
       
       // get individual sales commession 2
       $('#sales_share_comm2').blur(function ()
       {
           get_amount('#sales_comm_amount', this, '#sales_share_amount2');
       });
       
       // get individual sales commession 3
       $('#sales_share_comm3').blur(function ()
       {
           get_amount('#sales_comm_amount', this, '#sales_share_amount3');
       });
       
       // reload all values when change the value of the deal_price
       $('#deal_price').blur(function (){
           get_amount('#deal_price','#deal_comm' , '#deal_comm_amount');
           get_amount('#deal_price', '#sales_comm', '#sales_comm_amount');
           get_amount('#sales_comm_amount', '#sales_share_comm', '#sales_share_amount'); // first sales comm
           get_amount('#sales_comm_amount', '#sales_share_comm2', '#sales_share_amount2'); // first sales comm
           get_amount('#sales_comm_amount', '#sales_share_comm3', '#sales_share_amount3'); // first sales comm
       });
       
             
       
    }); // end of jquery 
</script>