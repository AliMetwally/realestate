<script src="<?php echo base_url('assets/js/lib/jquery.min.js'); ?>"></script>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="text-center">
                <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> المميزات و المرافق
            </h4>
        </div>
        <div class="panel-body">
            <div class="message_box">
                <?php
                if (isset($success) && strlen($success)) {
                    echo '<div class="success">';
                    echo '<p>' . $success->row() . '</p>';
                    echo '</div>';
                }

                if (isset($errors) && strlen($errors)) {
                    echo '<div class="error">';
                    echo '<p>' . $errors->row() . '</p>';
                    echo '</div>';
                }

                if (validation_errors()) {
                    echo validation_errors('<div class="error">', '</div>');
                }
                ?>
            </div>
            <div>
                <?php
                echo form_open_multipart($this->uri->uri_string(), array('id' => 'upload-file-form'));
                ?>
                <fieldset>
                    <section>
                        <label>التحميل من المجلد ...</label>
                        <label>
                            <input type="file" name="upload_file1[]" id="upload_file1" readonly="true"/>
                        </label>
                        <div id="moreImageUpload"></div>
                        <div style="clear:both;"></div>
                        <div id="moreImageUploadLink" style="display:none;margin-left: 10px;">
                            <a href="javascript:void(0);" id="attachMore">إضافة صورة آخرى</a>
                        </div>
                    </section>
                </fieldset>
                <footer>
                    <input type="submit" name="file_upload" value="Upload"/>
                </footer>
            </div>  
        </div>
    </div> 
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("input[id^='upload_file']").each(function() {
            var id = parseInt(this.id.replace("upload_file", ""));
            $("#upload_file" + id).change(function() {
                if ($("#upload_file" + id).val() !== "") {
                    $("#moreImageUploadLink").show();
                }
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var upload_number = 2;
        $('#attachMore').click(function() {
            //add more file
            var moreUploadTag = '';
            moreUploadTag += '<div class="element"><label for="upload_file"' + upload_number + '>Upload File ' + upload_number + '</label>';
            moreUploadTag += '<input type="file" id="upload_file' + upload_number + '" name="upload_file' + upload_number + '"/>';
            moreUploadTag += '&nbsp;<a href="javascript:del_file(' + upload_number + ')" style="cursor:pointer;" onclick="return confirm(\"هل تريد إلغاء الملف ?\")">Delete ' + upload_number + '</a></div>';
            $('<dl id="delete_file' + upload_number + '">' + moreUploadTag + '</dl>').fadeIn('slow').appendTo('#moreImageUpload');
            upload_number++;
        });
    });
</script>
<script type="text/javascript">
    function del_file(eleId) {
        var ele = document.getElementById("delete_file" + eleId);
        ele.parentNode.removeChild(ele);
    }
</script>
