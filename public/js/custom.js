

$( document ).ready(function() {
	console.log('Huele a peligro');
	$( ".createIngredient" ).on( "click", function( event ) {
		var ingre = $( this );
			console.log('Huele a createIngredient');
		$('#ingredient_id').val(ingre.attr('id'));
		$('#ingredient_name').val(ingre.attr('name'));
		$('#ingredient_code').val(ingre.attr('code'));
  		$( this ).off( event );
	});

	$( ".deleteIngredient" ).on( "click", function( event ) {
		var ingre = $( this );
			console.log('Huele a deleteIngredient');
		$('#delete_id').val(ingre.attr('id'));
		$('#delete_name').text(ingre.attr('name'));
  		$( this ).off( event );
	});
	$( ".deleteProduct" ).on( "click", function( event ) {
		var ingre = $( this );
			console.log('Huele a deleteProduct');
		$('#delete_id').val(ingre.attr('id'));
		$('#delete_name').text(ingre.attr('name'));
  		$( this ).off( event );
	});
});

console.log('Salio')
