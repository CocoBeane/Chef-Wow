$(document).ready(function(){
	chefWow.RequiredFields();
});

chefWow = {
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
  }
}
  

