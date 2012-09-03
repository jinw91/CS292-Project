
$(document).ready(handler);

function handler() {
    
    $('#submit').click( function() {
    
    
              
          //    { from:document.getElementById('from').value,to:document.getElementById('to')}.value,
        
        var queryString="from="+document.getElementById('from').value+"&to="+document.getElementById('to').value;
        $.ajax(
            {
                type:"GET",
                url:"slots.php?"+queryString,
                datatype:"json",
                
            }
            
        ).done( function(json) {
           var jsonobj=$.parseJSON(json);
            $.each(jsonobj,function(key,value) {
                $('#availableslots').append("<li>"+value['endtime']+"</li>");
            });
            
            });
      
                       
        }
    
    );
    
    $('#availableslots').on('click','li' function( ));
    
    
} 
