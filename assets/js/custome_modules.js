
function showNotification(data, notificationPlaceholder, preserveInput) {
	var notificationClass = 'alert alert-' + data.status;

	var notification = '<div class="' + notificationClass + '">';
	notification += '<span>' + data.message + '</span>';
	notification += '</div>';

	$(notificationPlaceholder).html(notification).fadeIn(200).delay(2500).fadeOut(500);

	if(data.status !== 'danger' && !preserveInput) {
		clearInput();
	}
}

function clearInput() {
	$('form').find('input[type=text], input[type=password], input[type=number], input[type=email], textarea', '').val('');
	$('span.clear-input').text('');
}


function loadDropdown(url, ddl_placeholder, key, value, default_entry,selected_option)
{
    
    $.ajax({
        type: 'POST',
        async:   false,
        url:url,           
        dataType: 'json',
        success: function (data) {
            $(ddl_placeholder).empty();
            $(ddl_placeholder).append("<option value=" + 0 + ">" + default_entry + "</option>"); 
            $.each(data, function (index){
                if (data[index][key] === selected_option){
               $(ddl_placeholder).append("<option value=" + data[index][key] + " selected=" + "selected" + "> " + data[index][value] + "</option>");
                } else {
                    $(ddl_placeholder).append("<option value=" + data[index][key] + "> " + data[index][value] + "</option>");
                }
            });
        }
    });
}

function loadDropdownTower(url, ddl_placeholder, key, value, default_entry,not_tower )
{
    
    $.ajax({
        type: 'POST',
        async:   false,
        url:url,           
        dataType: 'json',
        success: function (data) {
            $(ddl_placeholder).empty();
            $(ddl_placeholder).append("<option value=" + 0 + ">" + default_entry + "</option>"); 
            $(ddl_placeholder).append("<option value=" + null + ">" + not_tower + "</option>"); 
            $.each(data, function (index){
               $(ddl_placeholder).append("<option value=" + data[index][key] + ">" + data[index][value] + "</option>"); 
            });
        }
    });
}

function loadDropdownNotification(url, ddl_placeholder, key, value, default_entry,not_tower )
{
    
    $.ajax({
        type: 'POST',
        async:   true,
        url:url,           
        dataType: 'json',
        success: function (data) {
            $(ddl_placeholder).empty();
            $(ddl_placeholder).append("<option value=" + 0 + ">" + default_entry + "</option>"); 
            $(ddl_placeholder).append("<option value=" + null + ">" + not_tower + "</option>"); 
            $.each(data, function (index){
               $(ddl_placeholder).append("<option value=" + data[index][key] + ">" + data[index][value] + "</option>"); 
            });
        }
    });
}

function renderGaugeRadio(gauge_name , key, value)
    {
        var radiobtn = '<div  class="col-xs-12 col-sm-4  col-md-4">';
            radiobtn += '<label class="radio-inline" for= "'+gauge_name + key + '">';
            radiobtn += '<input type="radio" name="' + gauge_name + '" id="' +gauge_name + key +'" value="'+key+'"/>';
            radiobtn += value + '</label> </div>';
            
        
        return radiobtn;
    }
    
// this work for batches like in tower
function renderGaugeRadioArray(gauge_name , key, value, index)
    {
        var radiobtn = '<div  class="col-xs-12 col-sm-4  col-md-4">';
            radiobtn += '<label class="radio-inline" for= "'+gauge_name + key + '">';
            radiobtn += '<input type="radio" name="' + gauge_name + '['+index+']" id="' +gauge_name + key +'" value="'+key+'"/>';
            radiobtn += value + '</label> </div>';
            
        
        return radiobtn;
    }
    
    function generateGaugeRadio(url, placeholder, gauge_name, key, value)
    {
        $.ajax({
            type: 'POST',
            url:url,
            dataType: 'json',
            success: function (data) {
                $(placeholder).empty();
                $.each(data, function (index){                    
                    $(placeholder).append(renderGaugeRadio(gauge_name, data[index][key], data[index][value]));
                });
            }
        });
    }
    
    /*
     * this function to generate a tapped based on the number of
     * parameters 
     * -----------
     * number of units : the number which generate the tabs 
     * type of units : which represent the tab id
     * unit label : the arabic title of the tab 
     * unit data : the data segment which will represented as a view 
     *              data unit is the fields which descrip the unit 
     */
    function generatePropertyTabs (num_of_units, unit_type, unit_label, unit_data)
    {
        var tabs_layout = '';
        // build the tabs 
        tabs_layout += '<ul class="nav nav-tabs" role="tablist">\n\n';
        for (var i = 1; i <= num_of_units; i++) {
            if (i === 1) {
                tabs_layout += '<li role="presentation" class="active"><a href="#'+unit_type+i+'" aria-controls="'+unit_type+i+'" role="tab" data-toggle="tab">'+unit_label+i+'</a></li>\n';
            }
            else
            {
                tabs_layout += '<li role="presentation"><a href="#'+unit_type+i+'" aria-controls="'+unit_type+i+'" role="tab" data-toggle="tab">'+unit_label+i+'</a></li>\n';
            }
            // end of if            
        }// end of for loop
        tabs_layout += '</ul>';
        
        // build the pans 
        tabs_layout += '<div class="tab-content">';
        for (var i = 1; i <= num_of_units; i++) {
            if (i === 1) {
                tabs_layout += '<div role="tabpanel" class="tab-pane active" id="'+unit_type+i+'">'+unit_data+' </div>';
            }
            else
            {
                tabs_layout += '<div role="tabpanel" class="tab-pane" id="'+unit_type+i+'">'+unit_data+' </div>';
            } // end of if 
        }// end of for loop
        
        tabs_layout += '</div>';
        
        return tabs_layout;
    }