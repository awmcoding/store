( function($) {

	$(document).ready(function() {

		$( '.store-nav a[href^="#"]' ).on( 'click', function( e ) {

			e.preventDefault();

			var _target = $( this ).attr( 'href' );

			$( 'html, body' ).animate( {
				'scrollTop' : ( $( _target ).offset().top - 126 )
			}, 'slow' );

		} );

		$('.select-change').click(function(){
			$('#orderby').val($(this).data('val')).trigger('change');
		})


		//mobile toggle function start
		function mobileToggle(e) {
			if ($(e).hasClass("active") == true) {
				$(e).animate({maxHeight: "70px"}, 300).removeClass("active");
			} else {
				$(e).animate({maxHeight: "100vh"}, 300).addClass("active");
			}
		};

		$(".mobile-toggle").on("click", function (target) {
			target.preventDefault();
			var e = $(".main-nav");
			mobileToggle(e);
		});
		//mobile toggle function end

		//mobile view listener start
		$(window).on("scroll", function () {
			mobileMenu();
		});

		$(window).on("load", function () {
			mobileMenu();
		});

		function mobileMenu() {
			var header = $("header"),
				headerHeight = $(header).outerHeight(),
				scrollPosition = $("body").scrollTop();
			nextSection = $(header).siblings("section")[0];

			if ((scrollPosition > 0)) {
				$(header).addClass("blured");
				$(nextSection).css("margin-top", headerHeight);
			}
			else if ((scrollPosition <= 0) && $(header).hasClass("blured"))  {
				$(nextSection).removeAttr("style");
				$(header).removeClass("blured");
			}
		};
		//mobile view listener end


		var itemsContainer = $(".subtitle.top").siblings(".items-container")[0],
			showItems = $(".subtitle.top"),
			hideItems = $(".subtitle.bottom");

		$(itemsContainer).css("display", "none");

		showItems.on("click", function () {
			$(this).hide();
			$(itemsContainer).slideToggle();
			$(hideItems).toggleClass("active");
		});

		hideItems.on("click", function () {
			$(showItems).show();
			$(itemsContainer).slideToggle();
			$(this).toggleClass("active");
		});

		$(".accordion-child").on("click", function (e) {
			window.location.href = e.target.href;
		});

		$("a.accardion-head").on("click", function (e) {
			if(e.target.className === "accardion-redirect"){
				var link = e.target.parentElement.href;
				window.location.href = link;
			}
		});

		$(".store-container aside").accordion({
			header: "a",
			collapsible: true
		});

		$(".product-details").accordion({
			collapsible: true,
			active: false,
			header: '.type'
		});

		// $(".inner-tabs .container").tabs({
		// 	active: 0
		// });

		$(".inspiration .container").tabs({
			active: 1
		});
		$(".recommendations .container").tabs({
			active: 1
		});

		$(".tab-slides").slick({
			rtl: true,
			dots: true,
			dotsClass: 'dots',
			autoplay: true,
			autoplaySpeed: 2000,
			arrows: false
		});


		$(".close-modal, .modal-bg").on("click", function () {
			$(".modal-bg, .modal").fadeOut();
		});

		$(".item-data a").on("click", function (e) {
			if ($(window).width() >= 1024) {
				e.preventDefault();
				$(".modal-bg, .modal").fadeIn();
				$('.main-photo').resize();
				$('.thumbnails').resize();
				$(".product-details").accordion("refresh");

				if(e.target.className.indexOf('clickable') !== -1){
					window.location.href=e.target.href;
				};
			};
		});

		$(".slides").slick({
			infinite: true,
			rtl: true,
			mobileFirst: true,
			prevArrow: ".left-arr",
			nextArrow: ".right-arr"
		});

		$(".main-slider .container").slick({
			rtl: true,
			dots: true,
			dotsClass: 'dots',
			autoplay: true,
			autoplaySpeed: 2000,
			arrows: false
		});

		//search box
		$(".search-panel a").on("click", function(e) {
			var target = $(".search-panel form");
			e.preventDefault();
			target.toggleClass("active");
			$(target).children("input").focus();
		});

		$("body").on("click", function(e) {
			if($(e.target).closest(".search-panel").length == 0) {
				$(".search-panel form").removeClass("active");
			};
		});

		//cart counters
		$('.less').on("click", (function () {
			var $input = $(this).siblings('input');
			var count = parseInt($input.val()) - 1;
			count = count < 1 ? 1 : count;
			$input.val(count);
			$input.change();
			return false;
		}));
		$('.more').on("click",(function () {
			var $input = $(this).siblings('input');
			$input.val(parseInt($input.val()) + 1);
			$input.change();
			return false;
		}));




		var elem = $('.item-count .counter .quantity input');
		$.each( elem, function( key, value ) {
			var t = $(this).parent().parent();
			var temp = $(this);
			$(this).parent().remove();
			t.append(temp);
		});



		//delete cart item start
		$(".remove-item").on("click", function() {
			$(this).parent(".selected-item").remove();
		});



		//product photos slider
		function photoSlider() {

			$('.main-photo').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
				fade: true,
				rtl: true,
				asNavFor: '.thumbnails'
			});

			$('.thumbnails').slick({
				slidesToShow: 4,
				rtl: true,
				slidesToScroll: 1,
				asNavFor: '.main-photo',
				dots: false,
				focusOnSelect: true,
				arrows: false,

			});
		};

		photoSlider();
		//product photos slider end

		$(".project-img").fancybox();

		$(".callback .container form .gform_body").removeClass('gform_body').addClass('fields');

		$(".gform_footer").removeClass('right_label gform_footer').addClass('custum_form_submit');

		$(".gform_button").addClass('btn brown');

		$('.callback .gform_button').on("click",function(e){

			setTimeout(function(){

				var errMessage = $('.container div.gform_wrapper ');
				if($(errMessage).hasClass('gform_validation_error')){
					$(errMessage).addClass('fields');
					$(".gform_footer").removeClass('right_label gform_footer').addClass('custum_form_submit');

					$(".gform_button").addClass('btn brown');
				}
			}, 1500);

		});




		$("a.to-cart").on("click",function(e){
			$(this).addClass('checked');

		});

		$(".slick-track a img").on("click",function(e){
			e.preventDefault();
			var x = $(this).attr('url');
			var t = $('.main-photo a.woocommerce-main-image img').attr('srcset');
			var img = $('.main-photo img').attr('srcset', x);

		});

		swapElements();

		function swapElements() {
			var elm1 = $('.switchable')[0];
			var elm2 = $('.switchable')[1];
			if(elm1 !== undefined && elm2 !== undefined){
				$(elm1).find('a').css('color', '#b69460');
				var parent1, next1,
					parent2, next2;

				parent1 = elm1.parentNode;
				next1   = elm1.nextSibling;
				parent2 = elm2.parentNode;
				next2   = elm2.nextSibling;

				parent1.insertBefore(elm2, next1);
				parent2.insertBefore(elm1, next2);
			}
		}

		$( ".single-switchable" ).each(function() {
			var url =window.location.href;
			url = decodeURIComponent(url);
			url = url.split('/');
			var text = $(this).find('a').text();
			text = text.replace(' ','-');
			if(text === url[4]){
				$(this).find('a').css('color', '#b69460');
			}
		});

		var add = 1;
		$("button.single_add_to_cart_button ").on("click",function(e){
			// e.preventDefault();
			console.log($('.woocommerce-variation-add-to-cart'));
			var bool = $('.woocommerce-variation').css('display');
			if(bool === 'block'){
				if(add === 1){
					e.preventDefault();
					add = 2;
				}
				var checked = $(this).find('a.to_cart');
				checked.removeClass('to_cart');
				checked.addClass('checked');
				if(add === 2)setTimeout(function(){
					add = 0;
					e.target.click();
				}, 500);
			}
		});

		$('.item').mouseenter(function() {
			var checked = $(this).find('a.change_image');
			if(checked !== undefined){
				checked.removeClass('change_image');
				checked.addClass('checked');
			}
		});

		$('.item').mouseleave(function() {
			console.log($(this));
			var checked = $(this).find('a.checked');
			if(checked !== undefined){
				checked.removeClass('checked');
				checked.addClass('change_image');
			}
		});

		var pageaUrl = window.location.pathname;
		var url = window.location.href;

		if(pageaUrl === '/shop/'){
			$('body').find('.accardion-head').removeClass('. ui-state-active');
		}

		$('body').find('.accardion-head').each(function(){
				$(this).removeClass('. ui-state-active');
		});

		$('body').find('.accardion-head').each(function(){
			var catHref = $( this ).attr('href');

			if(window.location.href === catHref){
				$(this).addClass('ui-state-active');
			}
		});


	});

} ) ( jQuery );

//map initialization
	function initMap() {

		var myLatLng = {
			lat: 31.424513,
			lng: 34.49256700000001
		};

		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 12,
			center: myLatLng,
			scrollwheel: false,
	    navigationControl: false,
	    mapTypeControl: false,
	    scaleControl: false,
	    draggable: false,
		});

		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			title: 'Our company',
			icon: map_icon+"/assets/images/pointer.png"
		});
	}

//
