$(document).ready(function () {
    let thumbnails = document.getElementsByClassName('thumbnail')

    let activeImages = document.getElementsByClassName('active')

    for(var i=0; i<thumbnails.length; i++){

        thumbnails[i].addEventListener('mouseover',function () {
            this.classList.add('actove')
            document.getElementById('featured').src = this.src
        })
    }
    $('.de-slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.de-slider-nav'
    });

    $('.de-slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.de-slider-for',
        arrows: true,
        centerMode: true,
        focusOnSelect: true
    });

    $(".lang-current").click(function () {
        $(this).toggleClass("circle-svg");
        // console.log($(this).find('.lang-list').fadeToggle());
    });
    try {
        $('.edit-profile-select,.custom-select').customSelect()
    } catch (e) {

    }
    $('.payment-element').click(function () {
        $(this).toggleClass('payment-js')
    })
    $(".myClass").animate({top:100, left:200}, 3000);

    $('.section-two-block-item-img').hover(function () {
        $(this).toggleClass('section-two-korzina-js');
    });
    $('.nav-link a').hover(function () {
        $(this).toggleClass('link-js')
    });
    $('.image-gallery a').hover(function () {
        $(this).toggleClass('product-collection-js')
    });
    // $('').slick({
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     dots: true,
    //     arrows: false,
    //     variableWidth: false,
    //     autoplay: true,
    //     autoplaySpeed: 2000
    // });

    $('.main-slider').slick({
        dots: true,
        arrows: false,
        fade: true,
        // autoplay: true,
        // autoplaySpeed: 2000,
    });

    $('.header-slider').slick({
        dots: true,
        arrows: true,
        fade: true,
        // autoplay: true,
        // autoplaySpeed: 2000,
        prevArrow: `<button class="product-slider-arrow arrow-right">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 viewBox="0 0 47.255 47.255" style="enable-background:new 0 0 47.255 47.255;" xml:space="preserve">
<path d="M12.314,47.255c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l21.92-21.92l-21.92-21.92
c-0.391-0.391-0.391-1.023,0-1.414s1.023-0.391,1.414,0L35.648,22.92c0.391,0.391,0.391,1.023,0,1.414L13.021,46.962
C12.825,47.157,12.57,47.255,12.314,47.255z"/>
</svg>
        </button>`,
        nextArrow: `<button class="product-slider-arrow arrow-left">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
 viewBox="0 0 47.255 47.255" style="enable-background:new 0 0 47.255 47.255;" xml:space="preserve">
<path d="M12.314,47.255c-0.256,0-0.512-0.098-0.707-0.293c-0.391-0.391-0.391-1.023,0-1.414l21.92-21.92l-21.92-21.92
c-0.391-0.391-0.391-1.023,0-1.414s1.023-0.391,1.414,0L35.648,22.92c0.391,0.391,0.391,1.023,0,1.414L13.021,46.962
C12.825,47.157,12.57,47.255,12.314,47.255z"/>
</svg>
        </button>`,
    },WOW);
    wow = new WOW(
        {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0,          // default
            mobile:       true,       // default
            live:         false        // default

        }
    )
    wow.init();

    /* search modal */
    $('.social-item-button').click(function () {
        $('.search-modal').fadeIn();
    });
    function closeSerchModal(e){
        var target = $(e.target);
        if(target.is('.search-modal')){
            target.fadeOut();
        }
    }
    $('.search-modal').click( closeSerchModal );
    /* search modal */

    $navItems = $('.nav-items');
    $toggleCollapse=$('.toggle-collapse');

    $toggleCollapse.click(function () {
        $navItems.toggleClass('collapse');
    });
    $('.nav-close-icon').click(function () {
        $navItems.removeClass('collapse')
    })



});
(function ($) {
    // var sectionFirstTitle = $('.section-first-title');
    // TweenLite.to(sectionFirstTitle, 1, {opacity: 0, y: 50});
    // var i=0;
    var sliderDevider = $('.slider-devider');
    TweenLite.from(sliderDevider, 1, {
        autoAlpha: 0,
        x: 200,
        easy:Power1.easyInOut,
        onStart: onStart,
        onUpdate: onUpdate,
        onComplete: onComplete,
    });
    function onStart() {
        console.log('animaton started');
    }
    function onUpdate() {
        // console.log('animaton is in progress');
        // sliderDevider.text(i++)
    }
    function onComplete() {
        console.log('animaton completed');
    }

    var sliderText = $('.slider-text');
    TweenLite.from(sliderText, 1, {
        autoAlpha: 0,
        x: 200,
        easy:Power1.easyInOut});
})(jQuery);

