/*
*     Functions for the add ingredient page  
*/


// Editing an ingredient will push it's name and unit to the 
// the fields, alter the text on the button to 'uppdatera'
// and scroll up to the top of the page
$(document).on('click', '.btn-edit', function(){
	var name = $(this).closest('.row').find('span.sing').text();
	var name_plural = $(this).closest('.row').find('span.plur').text();
	var id = $(this).data('id');
	$('#name-field').val(name);
	$('#name-plural-field').val(name_plural);
	$('#id-field').val(id);
	$('#submit-button').val("Uppdatera");
	scrolltop();
	$('#name-field').focus();
});
// Preventing submit when trying to delete an ingredient
// and presenting a confirm box
$(document).on('submit', '#delete-form', function(e){
	e.preventDefault();
	if(confirm("Vill du verkligen ta bort ingrediensen?")){
		this.submit();
	}
});

/*
*  Functions for the list page
*/

//$(document).on('click', '#filter-recipe-header', function(){
//	$('#filter-recipe-body').slideToggle('slow');
//});
$(document).on('click', '.minimizable-header', function(){
	$(this).siblings('.minimizable-body').slideToggle('medium','easeInCirc');
});


/*
*  Functions for the curl page
*/

// Preventing submit when trying to save recipe,
// Collecting all the ingredients in a JSON string and
// putting it as value in a hidden input.
// Then submitting if the user clicks ok.
$(document).on('submit', '#parse-recipe-form', function(e){
	e.preventDefault();
	
	var inputs = $('.curl-datalist-input');
	var ingredients = $('#curl-ingredient-list option');
	var jsonstring = $('#i-json-text').val();
	var iobj = JSON.parse(jsonstring);

	for(var key in iobj[0].items){
		//för varje input, byta ut  data-itemid till det som matchar
		Array.from(ingredients).forEach(function(ent, index, array){
			if($(inputs[key]).val().toUpperCase() == $(ent).val().toUpperCase()) {
				$(inputs[key]).attr('data-itemid', $(ent).attr('data-itemid'));
				$(inputs[key]).attr('value', $(ent).val());
			}
				
		});
		
		iobj[0].items[key].id = $(inputs[key]).attr('data-itemid');
	}
	
	$('#i-json-text').val(JSON.stringify(iobj));

	if(confirm("Är du säker på att du är klar?")){
		this.submit();
	}
});


//Showing or hiding the plus-buttons beside the input fields depending on match in ingredient list
$(document).on('input', ".curl-datalist-input", function () {
    var val = this.value;
    var check = 0;
    
    $('#curl-ingredient-list').find('option').each(function(){
        if(this.value.toUpperCase().indexOf(val.toUpperCase()) > -1) {
        	check = 1;
        }
    });
    
    if(!check){
 		$(this).closest('.row').find('button').removeClass('invisible');
 	} else {
 		$(this).closest('.row').find('button').addClass('invisible');
 	}
 	
});

$(document).on('click', '.plus-button', function(){
	var val = $(this).closest('.row').find('input').val();
	
	$('#add-ingredient-input').val(val);
	$('#add-ingredient-refresh-form').submit();
});



/* 
*  Functions for the add recipe page 
*/

$(document).ready(function(){
	makeDraggable();
	//TODO: Move??
	scrollPageSelectors(100);		// Only for the list page
	
	var ratingSet = 0;
	$('.rate-symbol').hover(function(e){
		if(!ratingSet){
			o = (e.type === "mouseenter")? 1 : 0.2;
			$(this).prevAll('.rate-symbol').css('opacity', o);
			$(this).css('opacity', o);
		}
	});
	$('.rate-symbol').click(function(){
		$('.rate-symbol').css('opacity', 0.2);
		$(this).prevAll('.rate-symbol').css('opacity', 1);
		$(this).css('opacity', 1);
		ratingSet = true;
		$('#rating-input').val($(this).data('rating'));
	});
});

$(window).on('scroll', function(){
	scrollPageSelectors(100);
});


// Bring out the popup for selecting ingredients
$(document).on('click', '#add-ingredient-button', function(){
	$('.on-top#ingredient-picker').slideDown();
	$('#add-recipe-form input, #descr-text, .selected-ingredient').attr("disabled", true);
	scrolltop();
	$('input#ingredient-name').focus();
});
// Bring out the popup for adding headers
$(document).on('click', '#add-header-button', function(){
	$('.on-top#header-creator').slideDown();
	$('#add-recipe-form input, #descr-text, .selected-ingredient').attr("disabled", true);
	scrolltop();
	$('input#header-name').focus();
});

// Bring out the popup for adding headers
$(document).on('click', '#btn-rating, div#rating-div', function(){
	$('.on-top#rating-jumbo').slideDown();
	scrolltop();
});

// Close the open popup
$(document).on('click', '.on-top #close-button', function(){
	$(this).parents('.on-top').slideUp();
	$('#add-recipe-form input, #descr-text, .selected-ingredient').attr("disabled", false);
	
	$("#add-ingredient-list-div a").css({display: ""});
});

//Function for adding a row in the passed panel
function addRow(panel, node){
	$(node).insertAfter('.ingredient-entry:last');
}

// Preventing submit when trying to save recipe,
// Collectin all the ingredients in a JSON string and
// putting it as value in a hidden input.
// Then submitting if the user clicks ok.
$(document).on('submit', '#add-recipe-form', function(e){
	e.preventDefault();
	if(confirm("Är du säker på att du är klar?")){
		var entries = $('.ingredient-array-item');
		var obj={};
		var lastheader = "default";
		var segindex = -1;
		var itemindex = 0;
		Array.from(entries).forEach(function(ent, index, arr){
			
				if($(ent).data("header")){
					lastheader = $(ent).data("header");
					obj[++segindex] = {'title':lastheader, 'items':{}};
					itemindex=0;
				}else if($(ent).data("index")){
					if (index == 0){
						obj[++segindex] = {'title':lastheader, 'items':{}};
						console.log("ingen rubrik");
						itemindex=0;
					}
					var datta = $(ent).data("index");
					var amount = $(ent).data("amount");
					obj[segindex]['items'][itemindex++] = {'id':String(datta), 'amount':String(amount)};
				}					
		});
		json=JSON.stringify(obj);
		$('#i-json-hidden').val(json);
		this.submit();
	}
});

// Placing the clicked row in the text-field
$(document).on('click', '.ingredient-list-entry', function() {
	$('#ingredient-name').val($(this).html());
	$('#ingredient-name').attr("data-index",$(this).data('index'));
});
// Adding the selected ingredient to the list
$(document).on('click', '#confirm-ingredient-button', function() {
	var name=$('#ingredient-name').val();
	a = $('#add-ingredient-list-div').children('a');
	for (i = 0; i < a.length; i++) {
		if(!name.toUpperCase().localeCompare($(a[i]).html().toUpperCase())){

			var index=$(a[i]).data('index');
			var amount=$('#ingredient-amount').val();
			var node="<li data-index='"+index+"' data-amount='"+amount+"' class='list-group-item ingredient-array-item'>"+amount+" "+name+"</li>";
		
			$('#ingredient-name').val("");
			$('#ingredient-amount').val("");
			$(this).parents('.on-top').slideUp();
			$("#add-ingredient-list-div a").css({display: ""});
			//reenable the form
			$('#add-recipe-form input, #descr-text, .selected-ingredient').attr("disabled", false);
			var parent = $('#ingredient-list-ul').find('ul.sub-connectable-ul').last();
			if(parent.length < 1){
				parent = $('#ingredient-list-ul');
			}
			$(parent).append(node);
			makeDraggable();
			scrollbottom();
			return;
		}
	}
	alert('Ingrediensen finns ej');
});
// Adding the entered header
$(document).on('click', '#confirm-header-button', function() {

	var name=$('#header-name').val();
	var node="\
		<ul class='list-group sub-ul'>\
			<li data-header='" + name + "' class='list-group-item active handle-item ingredient-array-item'>\
				<strong>" + name + "</strong>\
			</li>\
			<ul class='list-group connectable-list sub-connectable-ul'>\
			</ul>\
		</ul>";
	
	$('#header-name').val("");
	$(this).parents('.on-top').slideUp();
	//reenable the form
	$('#add-recipe-form input, #descr-text, .selected-ingredient').attr("disabled", false);
	$('#ingredient-list-ul').append(node);
	makeDraggable();
	scrollbottom();
});
//Draggable functions
function makeDraggable(){
	$('.connectable-list').sortable({
		connectWith: '.connectable-list',
		classes : {
		"ui-sortable-helper": "dragged-block"}
	}).disableSelection();
	
	$('.sub-ul').sortable({
		handle: '.handle-item'
	
	}).disableSelection();
	
	$( "#droppable" ).droppable({
      classes: {
		"ui-droppable-active": "btn-warning btn-remove-active",
		"ui-droppable-hover": "btn-danger"
	  },
	  drop: function( event, ui ) {
		$(ui.draggable).remove();
      }
    });
}



// Filtering the list from the input in the new recipe form
$(document).on('keyup', '#ingredient-name', function() {
	list = $('#add-ingredient-list-div');
	filterFromInput(this, list, 'a');
});

// Filtering the list from the input in the add ingredient form
$(document).on('keyup', '#name-field', function() {
	list = $('#ingredient-list-div');
	childElems = $("h4")
	filterFromInput(this, list, childElems);
});

function filterFromInput(inputField, listDiv, childElements){
	    // Declare variables
    var filter, ul, li, a, i;
    filter = $(inputField).val().toUpperCase();
    div = $(listDiv);
    a = div.children(childElements);
	// Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < a.length; i++) {
        cur = $(a[i]);
		if ($(cur).html().toUpperCase().indexOf(filter) > -1) {
            $(a[i]).css({display: ""});
        } else {
            $(a[i]).css({display:"none"});
        }
    }
}

function scrolltop(){
	$('html, body').stop().animate({ scrollTop : 0 }, 1000, 'swing');
}
function scrollbottom(){
	$('html, body').stop().animate({ scrollTop : $(document).height() }, 1000, 'swing');
}

function scrollPageSelectors(offset){
		var y = $(this).scrollTop() + offset;
		$('.scrollable-item').css('top', y);
}

//Signup functions
/*$(document).on('keyup', '#repeat-pass-input', function() {
	var primary_pass = $('#pass-input').val();
	if($(this).val != primary_pass){
		$(this).addClass('has-error');
		console.log(this);
	} else {
		console.log("stämmer");
		$(this).removeClass('has-error');
	}
});
*/
