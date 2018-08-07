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

$('.menu-li').on('click', function() {
    var url = $(this).children('a').attr('href');
    $(location).attr("href", url);
});

/*$(window).scroll(function() {
    $('.navbar-white').css({ 'opacity': '0.8' });
});*/

$(window).scroll(function(event) {
    var scroll = $(window).scrollTop();
    if (scroll == 0) {
        $('.navbar-white').css({ 'opacity': '1.0' });
        $('.navbar-white').css({ "height": "100px" });
        $('.navbar-white').children('div').css({ 'padding-top': "10px" });
    } else {
        $('.navbar-white').css({ 'opacity': '0.7' });
        $('.navbar-white').css({ "height": "60px" });
        $('.navbar-white').children('div').css({ 'padding-top': "0" });
    }
});

$(document).ready(function() {
    var URLActual = "" + window.location;
    URLCargar = URLActual.split('#');
    URLCargar = URLCargar[1];
    renderHTML(URLCargar);
});