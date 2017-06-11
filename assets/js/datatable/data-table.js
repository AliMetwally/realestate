$(document).ready(function() {
                // Setup - add a text input to each footer cell
                $('#property-table thead tr#filterrow th').each(function() {
                    var title = $('#property-table thead th').eq($(this).index()).text();
                    $(this).html('<input type="text" placeholder="ابحث عن ' + title + '" />');
                });

                // DataTable
                var table = $('#property-table').DataTable({
                    responsive: {
                        details: {
                            type: 'column'
                        }
                    },
                    columnDefs: [{
                            className: 'control',
                            orderable: false,
                            targets: 0
                        }],
        order: [ 1, 'asc' ],
                    
                    orderCellsTop: true
                });

                // Apply the filter
                $("#property-table thead input").on('keyup change', function() {
                    table
                            .column($(this).parent().index() + ':visible')
                            .search(this.value)
                            .draw();
                });

                function stopPropagation(evt) {
                    if (evt.stopPropagation !== undefined) {
                        evt.stopPropagation();
                    } else {
                        evt.cancelBubble = true;
                    }
                }

            });