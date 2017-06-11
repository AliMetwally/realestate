<form method="post" action="<?= base_url('test/process')?>">
    name 1 <input name="names[]" type="text" />
    name 2 <input name="names[]" type="text" />
    name 3 <input name="names[]" type="text" />
    name 4 <input name="names[]" type="text" />
    
    address 1 <input name="address[]" type="text"/> 
    address 2 <input name="address[]" type="text"/> 
    address 3 <input name="address[]" type="text"/> 
    address 4 <input name="address[]" type="text"/> 
    
    <input type="submit" value="submit"/>
</form>