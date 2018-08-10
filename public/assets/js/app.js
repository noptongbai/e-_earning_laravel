$(document).ready(function()
       {
        $("#form_submit").click(function()
        {
            $("#target_form").submit();
        });
         $("#category_submit").click(function()
        {
            $("#category_form").submit();
        });
         $(".new_category").click(function()
         {
         	var id=event.target.id;
         	var pieces = id.split("-");
         	var name = $('#club-id').val().trim();
         	$("#category_form").prop( 'action','/blog/public/teacher/'+ name +'/forum/category/' +pieces[2]  +'/new')
         });
          $(".new_category2").click(function()
         {
            $("#category_form").prop( 'action','/blog/public/admin/new/multiple')
         });
        $(".delete_category").click(function(event)
        {
            var name = $('#club-id').val().trim();
        	$("#btn_delete_category").prop('href','/blog/public/teacher/'+ name +'/forum/category/' +event.target.id  +'/delete');
        });
       
       
        
});