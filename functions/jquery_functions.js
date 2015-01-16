$(document).ready(function(){
	chefWow.RequiredFields();
  chefWow.addRecipeToBook();
  chefWow.deleteRecipeFromBook();
});

chefWow = {
//functions for form validation

  //Disable button
	DisableButton: function() {
		$('.button').attr('disabled', 'disabled');
	},

  //Enable button
	EnableButton: function() {
		$('.button').removeAttr('disabled');
  },

  //Enable button if all required fields are filled in
  RequiredFields: function() {
    $(".required").keyup(function() {

      var readyToSubmit = false;
      
      $(".required").each(function() {
        if ($(this).val() == '') {
          readyToSubmit = true;
        }
      });

      readyToSubmit ? chefWow.DisableButton() : chefWow.EnableButton();
    });
  },

//recipe book functions

  addRecipeToBook: function(){
    $("#add-to-book").click(function(){
      var username = $("#username").val();
      var recipe_id = $("#recipe-id").val();
      $.ajax({           
        type: "POST",  
        url:"/Chef-Wow/functions/php_ajax_functions.php",  
        data: {
          username: username, 
          recipe_id: recipe_id
        },

        beforeSend: function()
        {                   
          $("#add-to-book").html("adding...")
        },

        success: function(resp)
        {
          $("#add-to-book").html("Recipe added to book!"),
          chefWow.DisableButton();
        },

        error: function(e)
        {  
          console.log('Error: ' + e);
          $("#add-to-book").html("Whoops! Try again later.")  
        }  
      });
    });
  },

  deleteRecipeFromBook: function(){
    $(".delete-from-book").click(function(){
      //many variables of the same name -- recipe id. need to specify 'this one'
      var username = $("#username").val();
      var recipe_id = $(this).data('id');

      $.ajax({           
        type: "POST",  
        url:"/Chef-Wow/functions/php_ajax_functions.php",  
        data: {
          username: username, 
          recipe_id_to_delete: recipe_id
        },

        beforeSend: function()
        {                   
          $("#delete-from-book").html("deleting")
        },

        success: function(resp)
        {
          $("li[id=" + recipe_id + "]").remove();
        },

        error: function(e)
        {  
          console.log('Error: ' + e);
          $(".delete-from-book").html("Whoops! Try again later.")  
        }  
      });
    });
  }  
}
  

