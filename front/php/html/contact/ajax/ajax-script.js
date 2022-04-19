$(document).on('click','#fetchContact',function(e){
    $.ajax({    
      type: "GET",
      url: "http://exercice-tpa/rest-api/contact/read.php",             
      dataType: "json",                  
      success: function(data){                    
        // $("#table-container").html(data);
        // console.log(data);
        // $("#table-container").empty();
        var event_data = '';
       
        //event_data += '<th>Firstname</th>';
        $.each(data.contact, function(index, value){
           /*console.log(value);*/
           event_data += '<tr>';
           event_data += '<td>'+value.id+'</td>';
           event_data += '<td>'+value.firstname+'</td>';
           event_data += '</tr>';
        });
        $("#table-container").append(event_data);
        console.log(data);
      },
      error: function(d){
          /*console.log("error");*/
          alert("404. Please wait until the File is Loaded.");
      }
  });

    

  console.log("fetchContact");
  
});