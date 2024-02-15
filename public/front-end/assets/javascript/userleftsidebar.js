
function userLeftSidebar() {
    $('body').toggleClass('activeleftsidebar')
}

// function to cart hover icon
$(document).ready(function(){
    $('#cart a.cart-heading i').hover(function(){
        $(this).css('background','#f16027');
    }, function(){
        $(this).css('background','#3abc9b');
    });
});


