$(document).ready(function(){
    
    $('#submit').on('click', function(e){

        e.preventDefault();

        var url     = $('#username-search form').attr('action') + "?username=" + $('#username').val();
        var element = "#message";

        load(url, function(xhr) {
            
            if ( xhr.responseText == "exists" ) {

                /*
                * Remove "hidden" class 
                * Append the error class
                */
                $(element).removeClass('hidden alert-success').addClass('alert alert-danger');
                
                /*
                * Append the error mesage
                */
                $(element).html('Sorry, the username is already existing');

                /*
                * When the message box appears, suggest usernames
                */
                if ($('#message').hasClass('alert-danger')) {
                    
                    $('#suggestions').removeClass('hidden');

                    var url     = window.location.pathname + "suggest?username=" + $('#username').val();
                    
                    load(url, function(xhr){
                        var obj = jQuery.parseJSON(xhr.responseText);
                        
                        var text = "You can try using this usernames instead: " + obj;
                        $('#suggestions').html(text);
                    });
                };                

            }else{
                
                /*
                * Appen "hidden" class to the suggestion field and empty it
                */
                $('#suggestions').addClass('hidden').html('');

                /*
                * Remove "hidden" class 
                * Append the success class
                */
                $(element).removeClass('hidden alert-danger').addClass('alert alert-success');
                
                /*
                * Append the success mesage
                */
                $(element).html('Congratulations, you can use this username!');
            };
        });

        return false;
    });
});

function load(url, callback)
{  
    var xhr;
      
    if(typeof XMLHttpRequest !== 'undefined') xhr = new XMLHttpRequest();  
    else {  
        var versions = ["MSXML2.XmlHttp.5.0",   
                        "MSXML2.XmlHttp.4.0",  
                        "MSXML2.XmlHttp.3.0",   
                        "MSXML2.XmlHttp.2.0",  
                        "Microsoft.XmlHttp"]  

         for(var i = 0, len = versions.length; i < len; i++) {  
            try {  
                xhr = new ActiveXObject(versions[i]);  
                break;  
            }  
            catch(e){}  
         } // end for  
    }  
      
    xhr.onreadystatechange = ensureReadiness;  
      
    function ensureReadiness() {  
        if(xhr.readyState < 4) {  
            return;  
        }  
          
        if(xhr.status !== 200) {  
            return;  
        }  

        // all is well    
        if(xhr.readyState === 4) {  
            callback(xhr);  
        }             
    }  
      
    xhr.open('GET', url, true);  
    xhr.send('');
}