$("#btn-menu").on('click', function() {
    if ($('.div-menu').css('margin-left') == '0px') {
        $('.div-menu').animate({ 'margin-left': "-3000px" }, '5000');
    } else {
        $('.div-menu').animate({ 'margin-left': "0px" }, '5000');
    }

});




$(".div-section").hover(function() {
    $(this).animate({ 'height': "100%" });
    $(this).css({ 'border': "5px solid white" });
}, function() {
    $(this).css({ 'border': "none" });
    $(this).animate({ 'height': "50%" });
});