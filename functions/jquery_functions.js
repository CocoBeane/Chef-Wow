$(document).ready(function(){
	chefWow.RequiredFields();
});

chefWow = {
	DisableButton: function() {
		$('#button').attr('disabled', 'disabled');
	},

	EnableButton: function() {
		$('#button').removeAttr('disabled');
  },

  RequiredFields: function() {
    $('.required').keyup(function() {

      var empty = false;
      
      $('.required').each(function() {
        if ($(this).val() == '') {
          empty = true;
        }
      });

      empty ? chefWow.DisableButton() : chefWow.EnableButton();
      //if (empty) {
      //  chefWow.DisableButton();
      //} else {
      //  chefWow.EnableButton();
      //}
    });
  }
}