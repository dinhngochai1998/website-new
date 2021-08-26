$('#header .ss-navbar-toggle').click(function(){
    $(this).parent().toggleClass('active');
});

//wow
new WOW().init();

if($(window).width() < 1200 ){
    $('#full-page').removeClass('full-page');
}

$('.ss-navbar-menu>ul>li>i').click(function(){
    $(this).next().toggleClass('active');
});

//slick
$('.slick-slider').slick({
    fade: true,
    cssEase: 'linear'
});

if ($('#full-page').hasClass('full-page')){
    new fullpage('.full-page', {
        autoScrolling: true,
        scrollHorizontally: true,
        navigation: true,
        navigationPosition: 'right',
        css3: true,
        responsiveWidth: 1200,
        afterResponsive: function (isResponsive) {
        },
        onLeave: function(index){
            if(index.index === 1){
                setTimeout(function(){ $('#service-slider').slick('slickGoTo', 0); }, 1000);
            }
            if(index.index === 2){
                setTimeout(function(){ $('#project-slider').slick('slickGoTo', 0); }, 1000);
            }
            if(index.index === 3){
                setTimeout(function(){ $('#highlight-slider').slick('slickGoTo', 0); }, 1000);
            }
            if(index.index === 5){
                setTimeout(function(){ $('#customer-slider').slick('slickGoTo', 0); }, 1000);
            }
            if(index.index === 6){
                setTimeout(function(){
                    $('.main-wrapper .section-contact .section-footer').removeClass('active');
                    $('.main-wrapper .section-contact .container-master').removeClass('active');
                }, 500);
            }
        }
    });
}


