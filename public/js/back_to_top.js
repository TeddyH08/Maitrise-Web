$(document).ready(function() {
    // Show or hide the sticky footer button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $('.go_top').fadeIn(200);
        } else {
            $('.go_top').fadeOut(200);
        }
    });
    
    // Animate the scroll to top
    $('.go_top').click(function(event) {
        event.preventDefault();
        
        $('html, body').animate({scrollTop: 0}, 300);
    })
});