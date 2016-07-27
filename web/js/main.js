/*price range*/

 $('#sl2').slider();

	var RGBChange = function() {
	  $('#RGB').css('background', 'rgb('+r.getValue()+','+g.getValue()+','+b.getValue()+')')
	};	
		
/*scroll to top*/

$(document).ready(function(){

    $(".modal-content").on('click','.delete-item',function(){
        removeItem(this);
        return false;
    });

    $('.modal-content').on('click', '.clear-cart',function () {
        var href = $(this).attr('href');
        clearCart(href);
        return false;
    });


    $('.cart-show').on('click',function(){

        var href = $(this).attr('href');


        $.ajax({
            url: href,

            type:'GET',
            success : function(res){

                $(".modal-content").html(res);
                $('.modal').modal();

            },
            error : function(){
                alert("Error");
            }
        });


        return false;

    });


	$('.add-to-cart').on('click',function(){

	    var href = $(this).attr('href');
        var qty = $("#qty").val();

        $.ajax({
            url: href,
            data: {qty: qty},
            type:'GET',
            success : function(res){

                $(".modal-content").html(res);
                $('.modal').modal();

            },
            error : function(){
                alert("Error");
            }
        });


        return false;
    });



	$(".catalog").dcAccordion({
	    speed:300
    });

	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});
});

function clearCart(href)
{
    $.ajax({
        url: href,
        type:'GET',
        success : function(res){

            $(".modal-content").html(res);
            $('.modal').modal();

        },
        error : function(){
            alert("Error");
        }
    });
}


function removeItem(link){

    var href = $(link).attr('href');

    $.ajax({
        url: href,
        type:'GET',
        success : function(res){

            $(".modal-content").html(res);
            $('.modal').modal();
        },
        error : function(){
            alert("Error");
        }
    });
}
