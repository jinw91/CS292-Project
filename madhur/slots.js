
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
                $('#availableslots').append("<li id='"+value['slotid']+"'>"+"Start Time:"+value['starttime']+"<br/>End time:"+value['endtime']+"<br/>Recruiter:"+value['interviewer']+"</li>");
            });
            
            });
      
                       
        }
    
    );
    
    $('#availableslots').on('click','li', function(event) {

		//alert("something");
		var listid=$(this).attr("id");
        $.ajax(
            {
                type:"POST",
                url:"bookslot.php",
		data: { slot: listid }, 
                
            }
            
        ).done( function(text) {
	
		if( text == "done" ) {
		alert("Your slot has been booked");
	}
//	alert(text);
            });
            
            });
		
		
	// });
    
    
} 
