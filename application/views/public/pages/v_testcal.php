
<html>
    <head>
        <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
        <!--<link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap-rtl.css');?>">-->
        
        <!--date picker-->
        <link rel="stylesheet" href="<?= base_url('assets/datepicker/css/bootstrap-datepicker.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/datepicker/css/bootstrap-datepicker.standalone.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/datepicker/css/bootstrap-datepicker3.min.css'); ?>">
        <link rel="stylesheet" href="<?= base_url('assets/datepicker/css/bootstrap-datepicker3.standalone.min.css'); ?>">   

        <script src="<?= base_url('assets/js/lib/jquery.min.js'); ?>"></script>
        <script src="<?= base_url('assets/js/lib/bootstrap-rtl.js'); ?>"></script>
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

        <!--date picker scripts--> 
        <script src="<?= base_url('assets/datepicker/js/bootstrap-datepicker.min.js'); ?>" charset="UTF-8"></script>
        <script src="<?= base_url('assets/datepicker/locales/bootstrap-datepicker.ar.min.js'); ?>"></script>
        
        <style>
            .datepicker.datepicker-rtl {
    right: auto
}
            </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form>
                        <div style="width: 500px;">
                            <div class="input-group date">
                                <input type="text" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(function (){
                
                $.fn.datepicker.dates['ar'] = {
        days: ["الأحد", "الاثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة", "السبت", "الأحد"],
        daysShort: ["أحد", "اثنين", "ثلاثاء", "أربعاء", "خميس", "جمعة", "سبت", "أحد"],
        daysMin: ["ح", "ن", "ث", "ع", "خ", "ج", "س", "ح"],
        months: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
        monthsShort: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
        today: "هذا اليوم",
        rtl: true
    };  
                
               $('.input-group.date').datepicker({
                format: "dd/mm/yyyy",
                todayBtn: "linked",
                orientation: "bottom auto"
//            language: "ar"
            }); 
            });
        </script>
    </body>
</html>



