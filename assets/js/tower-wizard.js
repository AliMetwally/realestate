$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });
    //--------------------------------------------------------------------------
    $(".next-step").click(function (e) {
        
        // get the button id
        var button_id = $(this).attr('id');        
        var base_url = window.location.protocol + '//' + window.location.host+ '/realestate/';
        var url ; // + controller function
        var notification;
        switch (button_id)
        {
            case "btn-tower-wizard-1":
                url = base_url + 'tower/checkTowerOwner';
                notification = '#tower-owner-notification';
                break;
            case "btn-tower-wizard-2":
                url = base_url + 'tower/checkTowrLocation';
                notification = '#tower-notification';
                break;
            case "btn-tower-wizard-3":
                url = base_url + 'tower/checkTowerDetails1';
                notification = '#tower-details_1-notification';
                break;
            case "btn-tower-wizard-4":
                url = base_url + 'tower/checkTowerUnits';
                notification = '#tower-details_2-notification';
                break;
            case "btn-tower-wizard-5":
                url = base_url + 'tower/checkTowerShops';
                notification = '#tower-shops-notification'; 
                break;
        }
        
        $.ajax({
            url: url,
            type: 'POST',
            data: $('#tower-form').serialize(),
            dataType:'json',
            success: function (data) {
                if (data.status === 'danger') {
                    showNotification(data, notification);
                }
                else
                {
                    // go to the next tab
                    var $active = $('.wizard .nav-tabs li.active');
                    $active.next().removeClass('disabled');
                    nextTab($active);                    
                }
            }
        });
    }); // next-step click
    //--------------------------------------------------------------------------
    // the button action
    $('#btn-tower-wizard-save').click(function (e){
        var button_id = $(this).attr('id');        
        var base_url = window.location.protocol + '//' + window.location.host+ '/realestate/';
        var url = base_url + 'tower/checkTowerFlat'; // + controller function
        var notification = "#tower-save-notification";
        
        $.ajax({
            url: url,
            type: 'POST',
            data: $('#tower-form').serialize(),
            dataType:'json',
            success: function (data) {
                if (data.status === 'danger') {
                    showNotification(data, notification);
                }
                else
                {
                    // save the tower process
                    showNotification(data, notification);
                    window.location = base_url + 'sales/addTower'; // redirect to the same page
                }
            }
        });
    });
        
    //--------------------------------------------------------------------------
    $(".prev-step").click(function (e) {

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