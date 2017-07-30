<div class="container">
    <table id="property-grid" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Property type</th>
                <th>key number</th>
                <th>owner name</th>
                <th>owner phone</th>
                <th>area name</th>
                <th>price</th>
                <th>installments</th>
                <th>floor</th>
                <th>area</th>
                <th>status</th>
            </tr>
        </thead>
    </table>
</div>


<script>
    $(function(){
        var base_url = "<?= base_url();?>";
        var property_table = $('#property-grid').DataTable({
            "processing":true,
            "serverSide":true,
            "searching": false,
            "info": false,
            "lengthChange": false,
            "autoWidth": false,
            "order":[],
            "ajax":{
                url:base_url+"search_property/propertyGrid",
                type:"POST"
            },
            "columnDefs":[
                {
                    "targets":[0,10],
                    "orderable":false
                }
            ]
        });
    });
</script>