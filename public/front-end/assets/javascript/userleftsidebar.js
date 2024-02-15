
function userLeftSidebar() {
    $('body').toggleClass('activeleftsidebar')
}

// function to cart hover icon
$(document).ready(function(){
    $('.nh_cart_quantity_icon a.cart-heading i').hover(function(){
        $(this).css('background','#f16027');
    }, function(){
        $(this).css('background','#3abc9b');
    });
});


