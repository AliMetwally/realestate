<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                تسجيل العمليات اليومية
            </div> <!-- / box-header -->

            <form action="<?= base_url('client/saveCall'); ?>" id="call-form" method="post"> <!-- client_status -->
                <div class="box-body">
                    <div class="row">
                        <!-- client phone -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="client_phone">رقم العميل</label>
                                <input class="form-control" name="client_phone" id="client_phone" type="text" onkeyup="sync()">                                
                            </div>
                        </div>
                        <!-- client status -->
                        <input type="hidden" id="client_status" name="client_status" value="" />
                        <!-- current_deal -->
                        <input type="hidden" id="current_deal" name="current_deal" value="" />

                        <!-- first name -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="first_name">الاسم الاول</label>
                                <input class="form-control" name="first_name" id="first_name" type="text">                            
                            </div>
                        </div>

                        <!-- second name -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="last_name">الاسم الثاني</label>
                                <input class="form-control" name="last_name" id="last_name" type="text">                               
                            </div>
                        </div>

                        <!-- the client type -->
                        <div class="col-md-3">                            
                            <p id="client_type" style="margin: 20px 0; padding: 10px 15px"></p>
                        </div>
                    </div>
                    <div class="row">
                        <!-- address -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="client_state_id">المحافظة</label>
                                <select id="client_state_id" name="client_state_id" class="form-control client-state-dropdown">                        
                                </select>                             
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="client_area_id">المنطقة</label>
                                <select id="client_area_id" name="client_area_id" type="text" class="form-control client-area-dropdown">                        
                                </select>                             
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="client_flag">المنطقة</label>
                                <select id="client_flag" name="client_flag" type="text" class="form-control">                        
                                    <option value="1">عميل جاد</option>
                                    <option value="2">عميل غير جاد</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- property row -->
                    <div class="row">
                        <!-- property modal -->
                        <div class="col-md-4">
                            <button style="padding: 10px 12px;" type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">
                                اختيار الوحدة موضوع العملية
                            </button>

                        </div>

                        <!-- property id -->
                        <input type="hidden" name="property_id" id="property_id"/>
                        <div class="col-md-8">
                            <p class="alert alert-success" style="padding: 10px;" id="property_name"></p>
                        </div>
                    </div> <!-- /.row of property -->

                    <!-- follow up data -->
                    <div class="row" style="margin: 30px 0">
                        <div class="col-md-6">
                            <!-- who call -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="who_call">من المتصل</label>
                                    <select id="who_call" name="who_call" class="form-control">                        
                                        <option value="1">المندوب</option>
                                        <option value="2">العميل</option>                                
                                    </select>                            
                                </div>
                            </div>
                            <!-- follow_up_type -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="follow_up_type">نوع المتابعة</label>
                                    <select id="follow_up_type" name="follow_up_type" type="text" class="form-control follow_up_type-dropdown">                        
                                    </select>                        
                                </div>
                            </div>
                            <!-- follow_up_date -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label" for="follow_date_picker">تاريخ المتابعة</label>
                                    <input class="form-control" name="follow_date_picker" id="follow_date_picker" type="text" readonly="readonly"  style="background:white;">
                                    <input type="hidden" id="follow_up_date" name="follow_up_date"/>                      
                                </div>
                            </div>

                            <!-- deal_status -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deal_status">حالة العملية</label>
                                    <select id="deal_status" name="deal_status" type="text" class="form-control deal_status-dropdown">                        
                                    </select>
                                </div>
                            </div>
                        </div> <!-- /.col -->

                        <div class="col-md-6">
                            <!-- follow-up -->
                            <div class="form-group">
                                <label class="control-label" for="follow_up">النتيجة</label>
                                <textarea rows="4" class="form-control" name="follow_up" id="follow_up" type="text"></textarea>
                            </div>

                        </div>
                    </div> <!-- / .row follow up data -->

                    <!-- notification data -->
                    <div class="row">
                        <!-- notification type -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="notification_type">نوع التنبيه</label>
                                <select class="form-control notification_type-dropdown" name="notification_type" id="notification_type" type="text"></select>                          
                            </div>
                        </div>

                        <!-- notification date -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label" for="notification_date_picker">تاريخ التنبيه</label>
                                <input class="form-control" name="notification_date_picker" id="notification_date_picker" type="text" readonly="readonly"  style="background:white;">
                                <input type="hidden" id="notification_date" name="notification_date"/>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <input type="submit" class="btn btn-block btn-success btn-flat" style="margin-top: 25px" value="حفظ البيانات"/>
                        </div>
                    </div>
                </div> <!-- /.box-body -->
            </form> <!-- /form -->
            <!-- not to make form inside form -->
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">اختيار الوحدة موضوع العملية</h4>
                        </div>
                        <div class="modal-body">
                            <!-- property deal  -->
                            <?php $this->load->view('segment/deals/search_property_segment'); ?>
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-default" data-dismiss="modal">اغلاق</a>                                            
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- / box -->
    </div> <!-- / .col -->
</div> <!-- end of row -->

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                بيانات متابعة العميل
            </div> <!-- / box-header -->

            <div class="box-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#current_client_tab" data-toggle="tab" aria-expanded="true">متابعات العميل</a></li>
                        <li class=""><a href="#shared_client_tab" data-toggle="tab" aria-expanded="false">العمليات المشركة</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="current_client_tab">

                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="shared_client_tab">

                        </div><!-- /.tab-pane -->                        
                    </div><!-- /.tab-content -->
                </div>
            </div> <!-- /.box-body -->

        </div> <!-- / .box -->
    </div> <!-- / .col -->
</div> <!-- / .row follow up tabs -->
<!-- validation script -->
<script>
    $(function () {
        $('#call-form').bootstrapValidator({
            trigger: 'blur',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                client_phone: {
                    message: 'The username is not valid',
                    validators: {
                        notEmpty: {
                            message: "رقم العميل مطلوب"
                        }
                    }
                } // end of client phone
                , first_name: {
                    validators: {
                        notEmpty: {
                            message: "الاسم الاول مطلوب"
                        }
                    }
                } // end of first_name
                , last_name: {
                    validators: {
                        notEmpty: {
                            message: "الاسم الثاني مطلوب"
                        }
                    }
                } // end of last_name
                , client_state_id: {
                    validators: {
                        greaterThan: {
                            value: 1,
                            message: "لابد من اختيار المحافظة"
                        }
                    }
                } // end of client_state_id
                , follow_up_type: {
                    validators: {
                        greaterThan: {
                            value: 1,
                            message: "لابد من اختيار نوع المتابعة"
                        }
                    }
                } // end of follow_up_type
                , deal_status: {
                    validators: {
                        greaterThan: {
                            value: 1,
                            message: "لابد من اختيار نوع العملية"
                        }
                    }
                } // end of deal_status
                , follow_up: {
                    validators: {
                        notEmpty: {
                            message: "لابد من ادخال النتيجة"
                        }
                    }
                } // end of follow_up
                , follow_date_picker: {
                    validators: {
                        notEmpty: {
                            message: "لابد من ادخال تاريخ المتابعة"
                        }
                    }
                }// end of follow_up_date
                , property_id: {
                    validators: {
                        notEmpty: {
                            message: "لابد من ادخال بيانات الوحدة"
                        }
                    }
                }
            } // end of fileds
        }); // end of validation function
    });
</script>

<script>
    $(function () {
        var base_url = "<?= base_url() ?>";
        // notification_date
        $('#notification_date_picker').datepicker({
            altField: "#notification_date",
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
            dateFormat: "dd/mm/yy",
            firstDay: 0,
            isRTL: true,
            showMonthAfterYear: false
        });

        // follow_up_date        
        $('#follow_date_picker').datepicker({
            maxDate: "0",
            altField: "#follow_up_date",
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
            dateFormat: "dd/mm/yy",
            firstDay: 0,
            isRTL: true,
            showMonthAfterYear: false
        });
        $("#follow_date_picker").datepicker('setDate', new Date());

        // get the client status
        $('#client_phone').blur(function () {
            // reset all values
            $('#client_type').empty();
            $('#client_status').empty();
            $('#first_name').val('');
            $('#last_name').val('');
            $('#client_state_id').val(0);
            $('#client_area_id').empty();
            $('#property_name').html('');
            $('#follow_up').text('');
            $('#client_type').html('');

            $('#client_follow_data').html('');
            // call the ajax section
            var client_id; // save the client id to use it out side the scope
            $.ajax({
                url: base_url + 'client/client_status',
                type: 'GET',
                data: $('#client_phone').serialize(),
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    $('#client_type').addClass("alert alert-success");
                    $('#client_type').text('نوع العميل : ' + data.type_text);
                    $('#current_client_tab').empty();
                    // set the client status
                    $('#client_status').val(data.client_type);
                    // proeprty_name
                    $('#property_name').text(data.proprety_name);
                    // current_deal 
                    $('#current_deal').val(data.current_deal);
                    // in case of current client
                    if (data.client_type == 2 || data.client_type == 3)
                    {
                        client_id = data.client_info.client_id;  // save the client id to use it out side the scope
                        $('#first_name').val(data.client_info.first_name);
                        $('#last_name').val(data.client_info.second_name);

                        if (data.client_info.state_id) // check the country
                        {
                            $('#client_state_id').val(data.client_info.state_id);
                            // load the area based on the state
                            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + data.client_info.state_id;
                            loadDropdown(lst_area, '.client-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
                            $('#client_area_id').val(data.client_info.area_id);
                            // get the property name 
                        }
                        $('#who_call').focus();
                        //console.log('client/client_follow_up/'+data.client_info.client_id);
                        // get the client follow

                    } // end of if client_type

                    // get the client follow up
                    $.ajax({
                        url: base_url + 'client/current_client_follow/' + client_id,
                        type: 'GET',
                        async: false,
                        success: function (current_follow) {

                            $('#current_client_tab').html(current_follow);
                        }
                    });

                    $.ajax({
                        url: base_url + 'client/shared_client_follow/' + client_id,
                        type: 'GET',
                        async: false,
                        success: function (shared_follow) {

                            $('#shared_client_tab').html(shared_follow);
                        }
                    });

                } // end of blur success
            });
        }); // end of blur event


        // 1. load the state of owner
        var lst_state = "<?= base_url(); ?>dropdown/ddlState";
        loadDropdown(lst_state, '.client-state-dropdown', 'state_id', 'state_name', 'اختار المحافظة');

        // 2. load the area basd on state
        $('#client_state_id').change(function () {
            var state_id = $('#client_state_id').val();
            var lst_area = "<?= base_url(); ?>dropdown/ddlArea/" + state_id;
            loadDropdown(lst_area, '.client-area-dropdown', 'area_id', 'area_name', 'اختار المنطقة');
        });

        // 3. load follow_up_type
        var lst_follow_up = "<?= base_url(); ?>dropdown/ddlFollowUpType";
        loadDropdown(lst_follow_up, '.follow_up_type-dropdown', 'follow_up_type', 'follow_up_name', 'اختار نوع المتابعة');

        // 4. load deal_status
        var lst_deal_status = "<?= base_url(); ?>dropdown/ddlDealStatus";
        loadDropdown(lst_deal_status, '.deal_status-dropdown', 'deal_status', 'status_name', 'اختار حالة العملية');

        // 5. load follow_up_type
        var lst_notification_type = "<?= base_url(); ?>dropdown/ddlFollowUpType";
        loadDropdown(lst_notification_type, '.notification_type-dropdown', 'follow_up_type', 'follow_up_name', 'اختار نوع التنبيه');

    }); // end of jquery 
</script>
<script>
function sync()
{
  var n1 = document.getElementById('client_phone');
  var n2 = document.getElementById('client_phone_empty');
  n2.value = n1.value;
}
</script>