<div class="row">
    <section class="col-md-12">
        <div class="box box-solid box-primary">
            <div class="box-header with-border">
                <i class="fa fa-area-chart"></i>
                <h3 class="box-title">إدخال المناطق</h3>                 
            </div> <!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo base_url('supervisor/addArea'); ?>" method="get">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label for="state_id">المحافظة</label>
                            <select id="state_id" name="state_id" class="form-control state-dropdown"  >
                                <option value="0">اختر المحافظة</option>
                            </select>
                        </div>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">    
                        <div class="form-group col-md-4">
                            <label class="control-label" for="area_name">إسم المنطقة</label>
                            <input class="form-control" name="area_name" id="area_name" type="text">
                        </div>

                    </div>
                </div>

                <div class="col-md-2">
                    <!--<input type="submit" class="btn btn-primary" value="حفظ">-->
                    <input id="search_deal_property" type="submit"  class="btn btn-block btn-success btn-flat" value="حفظ" style="margin-top: 25px">        
                </div>
                </form>
            </div>
                </section>
            </div>

            <script>
                $(function () {
                    // load the lookups 
                    // 1. load the state of owner
                    var lst_state = "<?= base_url(); ?>dropdown/ddlState";
                    loadDropdown(lst_state, '.state-dropdown', 'state_id', 'state_name', 'اختار المحافظة');
                });
            </script>
