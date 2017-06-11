$(function (){
    
    $(document).on('click', '.btn-login', function (e){
       e.preventDefault();       
       var base_url = window.location.protocol + '//' + window.location.host+ '/realestate/';
       $.ajax({
            url: base_url + 'Main/checkLogin',
            type: 'POST',
            data: $('.user-login-form').serialize(),
            dataType: 'json',
            success: function(data) {
                if(data.status === 'danger')
                {
                    showNotification(data, '#notification-login');
                }
                else
                {
                    window.location = base_url + 'main/loginContiune';
                }
            }
       });
    });
    
});


