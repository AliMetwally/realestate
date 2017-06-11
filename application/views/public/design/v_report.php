<div class="row">
    <section class="col-md-12">
        <div class="box box-solid box-info">
            <div class="box-header with-border">
                <i class="fa fa-check-square-o"></i>
                <h3 class="box-title">إدخال الأعمال اليومية</h3>                 
            </div> <!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <form action="<?= base_url('reports/rep_designer') ?>" method="get">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label for="entry_date">تاريخ الإدخال</label>
                                    <input class="form-control" name="entry_date" id="entry_date" type="date" value="">
                                </div>                    
                            </div>
                        </div>
                        <div class="col-md-2">
                         <!--<input type="submit" class="btn btn-primary" value="حفظ">-->
                            <input id="search_deal_property" type="submit" class="btn btn-block btn-info btn-flat" value="طباعة التقرير" style="margin-top: 25px">        
                        </div>
                    </form>
                </div> <!-- /.row -->
            </div> <!-- /.box-body -->    
        </div> <!-- /.box -->
    </section> <!-- / section -->
</div> <!-- / .row-->