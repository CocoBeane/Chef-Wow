$(document).ready(function(){
	addNew.ShowCorrectAddForm();
	addNew.AddIngredientToRecipe();
	addNew.RemoveIngredientFromRecipe();
	addNew.CreateHiddenIngredientField();
});	

addNew = {

//Add New page functions

	//Show correct add new page depending on drop-down selection
	ShowCorrectAddForm: function() {
		$('#NewItem').change(function(){

		var selectedValue = $('#NewItem').val();
    		switch (selectedValue) {
      		case "Ingredient":
      			location.reload();
        		window.open("http://localhost/Chef-Wow/admin/add_new_ingredient.php");
        		break;
      	case "Recipe":
        		location.reload();
        		window.open("http://localhost/Chef-Wow/admin/add_new_recipe.php");
        		break;
      	default:
        		addNew.HideAll();
        		break;
      }
    });  
  },

//Recipe page functions

	//Add ingredient to ingredient list if both fields are filled out
	AddIngredientToRecipe: function(){
		$('#AddIngredientToList').click (function () {
			if ($('#IngredientAmount').val() != "" && $('#SelectIngredient').val() != "") {
				var IngredientAndAmount = $('#IngredientAmount').val() + " - " + $('#SelectIngredient').val();
				var IngredientDbId = $('option:selected').attr('db_id');
				var ListEntry = "<div class='ListedIngredient' db_id=" + IngredientDbId + ">" + IngredientAndAmount +" <a href='' class=Delete id='DeleteItem'>(-)</a></div>";
				
				$('#IngredientsList').append(ListEntry);
			} else {
				alert("Please provide both an ingredient and an amount"); 
			};
		})
	},

	//Remove selected ingredient from ingredient list
	RemoveIngredientFromRecipe: function(){
		$('#IngredientsList').on('click', '#DeleteItem', function (e) {
			e.preventDefault();
			$(this).parent().remove();
		})
	},	


	//Create hidden fields for ingredients on submit
	CreateHiddenIngredientField: function(){
		$(':submit').click(function() {	
			var number = 0	
			$('.ListedIngredient').each (function(number) {
				var number = number++
				var IngredientPieces = $(this).text().split(" - ");
				var ingredientDatabaseId = $(this).attr("db_id");
				$('<input>').attr({
	    			type: "hidden",
	    			id: "hidden_ingredient_" + number,
	    			name: "hidden_ingredient_" + number,
	    			value: IngredientPieces[0].trim() + "##" + IngredientPieces[1].trim().slice(0,-4) + "##" + ingredientDatabaseId
				}).appendTo($('#new_recipe'));
			});
		})
	},
}