$(document).ready(function(){
    $('.category-menu-item').click(function(){
        $(this).toggleClass('in').next().slideToggle()
    })
})