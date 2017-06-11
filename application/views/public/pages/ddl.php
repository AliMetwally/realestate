<h1>This is DropDown Test</h1>
<form method="post">
    <div class="form-group">
        <label class="control-label">List</label>
        <?php 
            $attr = array('class'=>'list-dropdown');
            echo form_dropdown('list',array('0'=>'one'),array('0'=>'one'),$attr);
        ?>
        <button id="test">load</button>
    </div>
    
</form>

<script>
    $(function(){
        
        $(document).on('ready', function(){
//            $.ajax({
//                type: 'POST',
//                url: "<?= base_url(); ?>dropdown/ddlState", // months data
//                data: {year: $('#years').val()}, // send parameter 
//                dataType: 'json',
//                success: function(data) {
//                    $('.list-dropdown').empty();
//                    $.each(data, function(index) {
//                        $('.list-dropdown').append("<option value=" + data[index].state_id + ">" + data[index].state_name + "</option>");
//                    });                    
//                }
//            });
        
        var url = "<?= base_url(); ?>dropdown/ddlState";
        var stateddl = '.list-dropdown';
        var key = 'state_id';
        var val = 'state_name';
        loadDropdown(url, stateddl, key, val);
        
        });
        
        
        
        
    });

</script>