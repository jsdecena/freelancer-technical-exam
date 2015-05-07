$(document).ready(function(){
    $('button').on('click', function(e){

        e.preventDefault();
        
        $.ajax({
            url     : $('form').attr('action'),
            method  : 'POST',
            data    : { username : $('#username').val() },
            dataType: 'json',
            success : function(data){
                var resp = '<p>Suggested username:</p><ul class="alert alert-success">';
                
                console.log(data.length);

                if (data.length > 0) {
                    
                    for (var i = 0; i < data.length; i++) {
                        resp += '<li style="display:inline; padding:0 5px;">'+data[i]+'</li>';
                    };
                    resp += '</ul>';

                    $('#username-suggest').html(resp);
                }
            }
        });

        return false;
    });
});