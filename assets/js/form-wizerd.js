
$(document).ready(function() {
                //Initialize tooltips
                $('.nav-tabs > li a[title]').tooltip();

                //Wizard
                $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {

                    var $target = $(e.target);

                    if ($target.parent().hasClass('disabled')) {
                        return false;
                    }
                });
                //--------------------------------------------------------------
                $(".next-step").click(function(e) {
                    console.log($(this).attr('id'));
                    // get the button id 
                    var button_id = $(this).attr('id');
                    var skip = $(this).data("action");
                    var base_url = window.location.protocol + '//' + window.location.host+ '/realestate/';
                    var url;
                    var notification;
                    switch (button_id)
                    {
                        case "btn-wizard-1":
                            url = base_url + "property/checkPropertyOwner";
                            notification = '#property-owner-notification';
                            break;                           
                        case "btn-wizard-2":
                            url = base_url + "property/checkProperty";
                            notification = '#property-notification';
                            break;
                        case "btn-wizard-3":
                            url = base_url + "property/checkPropertyLayout";
                            notification = '#property-layout-notification';
                            break;
                        case "btn-wizard-4":
                            url = base_url + "property/checkPropertyDetails";
                            notification = '#property-details-notification';
                            break;
//                        case "btn-wizard-4":
//                            url = base_url + "property/checkPropertyDetails";
//                            notification = '#property-details-notification';
//                            break;                        
                    }
                    
                $.ajax({
                url: url, // var
                type: 'POST',
                data: $('#property-form').serialize(),
                dataType:'json',
                success: function(data) {
                if(data.status === 'danger')
                {
                    showNotification(data, notification); // var
                }
                else
                {
                    var $active = $('.wizard .nav-tabs li.active');
                    $active.next().removeClass('disabled');
                    nextTab($active);
                }
            }
            });
                   
           });
           //-------------------------------------------------------------------
                $('#btn-wizard-save').click(function (e){
                    var base_url = window.location.protocol + '//' + window.location.host+ '/realestate/';
                    var url = base_url + "property/checkPropertyPayment";
                    var notification = "#property-save-notification";
                    $.ajax({
                url: url, // var
                type: 'POST',
                data: $('#property-form').serialize(),
                dataType:'json',
                success: function(data) {
                    console.log(data);
                if(data.status === 'danger')
                {
                    showNotification(data, notification); // var
                }
                else
                {
                    showNotification(data, notification);
                    window.location = base_url + 'upload_files/upload_images/'+data.property_id;
                }
            }
            });
                });
           //-------------------------------------------------------------------
           $(".skip-step").click(function(e) {
                    var $active = $('.wizard .nav-tabs li.active');
                    $active.next().removeClass('disabled');
                    nextTab($active);
                });
                
                $(".prev-step").click(function(e) {

                    var $active = $('.wizard .nav-tabs li.active');
                    prevTab($active);

                });
            });

            function nextTab(elem) {
                $(elem).next().find('a[data-toggle="tab"]').click();
            }
            function prevTab(elem) {
                $(elem).prev().find('a[data-toggle="tab"]').click();
            }