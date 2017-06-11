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
                    echo '<p>' . $success . '</p>';
                    echo '</div>';
                }

                if (isset($errors) && strlen($errors)) {
                    echo '<div class="error">';
                    echo '<p>' . $errors . '</p>';
                    echo '</div>';
                }

                if (validation_errors()) {
                    echo validation_errors('<div class="error">', '</div>');
                }
                ?>
            </div>
    <h1>Upload multiple files</h1>
    <?php echo form_open_multipart();?>
      
      <?php echo form_upload('uploadedimages[]','','multiple'); ?>
      <br />
      <br />
      <?php echo form_submit('submit','Upload');?>
    <?php echo form_close();?>
        </div>
    </div>
