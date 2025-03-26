$(document).ready(function() {
    setTimeout(function() {$(".contenido_principal").fadeOut(0);}, 0);
    setTimeout(function() {$(".pantalla").fadeOut(0);}, 0);
    setTimeout(function() {$(".pantalla").fadeIn(500);}, 100);
    setTimeout(function() {$(".pantalla").fadeOut(700);}, 500);
    setTimeout(function() {$(".contenido_principal").fadeIn(500);}, 1000);

    $slides = $('.slides');
    $slides.bind('contentchanged', function() {
        animate($slides);
    });
    animate($slides);
});

function animate($slides) {
    var slidesLength = $slides.find('li').length;
    if (slidesLength > 3) {
        $slides.find('li:nth-last-child(-n+3)').clone().prependTo($slides);
        $slides.addClass('animate');
        $slides.css('animation-duration', slidesLength * 4 + 's');
    }
}
