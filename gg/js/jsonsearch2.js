$(document).ready(function(){
  $('#search').click(function(){
   var id= $('#categorie_list').val();
   if(id != '')
   {
    $.ajax({
     url:"../controller/json2.php",
     method:"POST",
     data:{id:id},
     dataType:"JSON",
     success:function(data)
     {
      $('#categorie_details').css("display", "block");
      $('#id').text(data.id);
      $('#categorie').text(data.categorie);
      
     }
    })
   }
   else
   {
    
    alert("Please Select categorie");
    $('#categorie_details').css("display", "none");
   }
  });
 });