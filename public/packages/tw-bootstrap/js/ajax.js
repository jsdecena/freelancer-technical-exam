$(document).ready(function(){
    $('button').on('click', function(e){

        e.preventDefault();
        
        $.ajax({
            url     : $('form').attr('action'),
            method  : 'POST',
            data    : { username : $('#username').val() },
            dataType: 'json',
            success : function(data){

                if (data.length == undefined) {
                    $('#username-suggest').html('<p class="alert alert-danger">'+data.message+'</p>');
                    return false;
                };

                var resp = '<p>Suggested username:</p><ul class="alert alert-success">';

                if (data.length > 0) {
                    
                    for (var i = 0; i < data.length; i++) {
                        resp += '<li style="display:inline; padding:0 5px;">'+data[i]+'</li>';
                    };
                    resp += '</ul>';

                    $('#username-suggest').html(resp);
                }
            },
            error : function(data)
            {
                var obj = jQuery.parseJSON(data);
                $('#username-suggest').html('<p class="alert alert-danger">'+obj.message+'</p>');
            }
        });

        return false;
    });
});