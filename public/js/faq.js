$(document).ready(function() {
    $('.panel-heading-faq').click(function(){
        $(this).toggleClass('in').next().slideToggle()
    })
})