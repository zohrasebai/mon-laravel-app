//
  
// Template Name: Expoge - Multipurpose Business HTML Template
// Version 1.0
// Author: themetrading
// Email: themetrading@gmail.com
// Developed By: themetrading
// First Release: 25 June 2020
// Author URL: www.themetrading.com

//----------------------------------------------------------------

//	Cache jQuery Selector
//  Auto active class adding with navigation
//  dropdown submenu on hover in desktopand dropdown sub menu on click in mobile
//  Search Bar Main Menu
//  Navbar Fixed to top
//  Put slider space for nav not in mini screen
//  Elements Animation
//  Fact Counter For Achivement Counting
//  Partners One
//  Team Slider
//  Service Slider
//  Testimonial One
//  Testimonial Two
//  History Timeline
//  Scroll Top
//  Focus input 
//	Show pass
//  Porfolio Filtering Click Events
//  Portfolio Masonary Gallery
//  filter items on button click
//  LightBox / Fancybox
//----------------------------------------------------------------

(function ($) {
    "use strict";

	//	Cache jQuery Selector
	//------------------------------------------------
	var	$body 					= $("body"),
		$window   			   	= $(window),
		$dropdown  			   	= $('.dropdown-toggle'),
		galleryWrapper          = $('.gallery'),
        portfolioFilterBtn      = galleryWrapper.find('.gallery-navbar  li'),
        portfolioCobbles       	= $('.grid-item'),
        $contact 				= $('#contact-form');

        $body.scrollspy({
	    target: ".navbar-collapse",
	    offset:20
	  });

    //  Auto active class adding with navigation
	//------------------------------------------------
    $window.on('load', function() {
        var current = location.pathname;
        var $path = current.substring(current.lastIndexOf('/') + 1);
        $('#navbarSupportedContent li a').each(function(e) {
            var $this = $(this);
            // if the current path is like this link, make it active
            if ($path == $this.attr('href')) {
                $this.parent('li').addClass('active');
            } else if ($path == '') {
                $('.navbar-nav > li:first-child').addClass('active');
            }
        })
    });

	// dropdown submenu on hover in desktopand dropdown sub menu on click in mobile
	//---------------------------------------------------------------------------------
	$('#navbarSupportedContent').each(function() {
		$dropdown.on('click', function(){
			if($window.width() < 992){
				if($(this).parent('.dropdown').hasClass('visible')){
					$(this).parent('.dropdown').children('.dropdown-menu').first().stop(true, true).slideUp(300);
					$(this).parent('.dropdown').removeClass('visible');
				}
				else{
					$(this).parent('.dropdown').children('.dropdown-menu').stop(true, true).slideDown(300);
					$(this).parent('.dropdown').addClass('visible');
				}
			}
		});
		
		$window.on('resize', function(){
			if($window.width() > 991){
				$('.dropdown-menu').removeAttr('style');
				$('.dropdown ').removeClass('visible');
			}
		});
		
	});

	// Search Bar Main Menu
	//--------------------------------------------
	$(document).ready(function() {
		$('.search-field .fa-search').click(function() {
				$('.search-field .search').addClass('show');
				$('.search-field .fa-search').css({
						'display': 'none'
				});
				$('.search-field .fa-times').css({
						'display': 'block'
				});
		});
		$('.search-field .fa-times').click(function() {
				$('.search-field .search').removeClass('show').val('');
				$('.search-field .fa-times').css({
						'display': 'none'
				});
				$('.search-field .fa-search').css({
						'display': 'block'
				});

		});
	});

	// Navbar Fixed to top
	//--------------------------------------------
    $window.on("scroll",function () {

      var bodyScroll = $window.scrollTop(),
        navbar = $("header");
		if(bodyScroll > 200){
			navbar.addClass("header-fixed");
		}else{
			navbar.removeClass("header-fixed");
		}

    });

	// Put slider space for nav not in mini screen
	//--------------------------------------------
	if(document.querySelector('.nav-on-top') !== null) {
		var get_height = jQuery('.nav-on-top').height();
		if(get_height > 0 && $window.width() > 992){
			jQuery('.nav-on-top').next().css('margin-top', get_height);
		}
		$window.on('resize', function(){
			if($window.width() < 992){
				jQuery('.nav-on-top').next().css('margin-top', '0');
			}
			else {
				jQuery('.nav-on-top').next().css('margin-top', get_height);
			}
		});
 	}
	 if(document.querySelector('.nav-on-banner') !== null) {
		var get_height = jQuery('.nav-on-banner').height();
		if(get_height > 0 && $window.width() > 992){
			jQuery('.page-banner').css('padding-top', get_height);
		}
		$window.on('resize', function(){
			if($window.width() < 992){
				jQuery('.page-banner').css('padding-top', '0');
			}
			else {
				jQuery('.page-banner').css('padding-top', get_height);
			}
		});
	}
    
	// Elements Animation
	//--------------------------------------------
	if($('.wow').length){
		var wow = new WOW(
		  {
			boxClass:     'wow',      // animated element css class (default is wow)
			animateClass: 'animated', // animation css class (default is animated)
			offset:       0,          // distance to the element when triggering the animation (default is 0)
			mobile:       true,       // trigger animations on mobile devices (default is true)
			live:         true       // act on asynchronously loaded content (default is true)
		  }
		);
		wow.init();
	}

	// Fact Counter For Achivement Counting
	//--------------------------------------------
	function factCounter() {
		if($('.fact-counter').length){
			$('.fact-counter .count.animated').each(function() {
		
				var $t = $(this),
					n = $t.find(".count-num").attr("data-stop"),
					r = parseInt($t.find(".count-num").attr("data-speed"), 10);
					
				if (!$t.hasClass("counted")) {
					$t.addClass("counted");
					$({
						countNum: $t.find(".count-text").text()
					}).animate({
						countNum: n
					}, {
						duration: r,
						easing: "linear",
						step: function() {
							$t.find(".count-num").text(Math.floor(this.countNum));
						},
						complete: function() {
							$t.find(".count-num").text(this.countNum);
						}
					});
				}	
			});
		}
	}

	$window.on('scroll', function() {
		factCounter();
	});

 	// Partners One
	//--------------------------------------------
	$('.partners-1').owlCarousel({
	    loop: true,
	    autoplay:false,
	    smartSpeed:1500,
	    autoplayTimeout:5000,
	    autoplayHoverPause:true,
	    margin: 0,
	    dots: false,
	    responsive:{

	        0:{
	          items:2
	        },
	        600:{
	          items:3
	        },
	        1024:{
	          items:4
	        },
	        1200:{
	          items:5
	        }
	    }  
	});

 	// Team Slider
	//--------------------------------------------
	$('.team-slider-1').owlCarousel({
	    loop: true,
	    autoplay:false,
	    smartSpeed:1500,
	    autoplayTimeout:5000,
	    autoplayHoverPause:true,
	    margin: 30,
	    dots: false,
	    nav: true,
	    navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],
	    responsive:{

	        0:{
	          items:1
	        },
	        600:{
	          items:2
	        },
	        1024:{
	          items:3
	        },
	        1200:{
	          items:3
	        }
	    }  
	});

 	// Service Slider
	//--------------------------------------------
	$('.service-slider').owlCarousel({
	    loop: true,
	    autoplay:false,
	    smartSpeed:1500,
	    autoplayTimeout:5000,
	    autoplayHoverPause:true,
	    margin: 30,
	    dots: false,
	    nav: true,
	    navText: ['<span class="fa fa-angle-left"></span>','<span class="fa fa-angle-right"></span>'],
	    responsive:{

	        0:{
	          items:1
	        },
	        600:{
	          items:1
	        },
	        1024:{
	          items:1
	        },
	        1200:{
	          items:1
	        }
	    }  
	});

    // Testimonial One
	//--------------------------------------------
	$('.testimonial-1').owlCarousel({
	    loop: true,
	    autoplay:false,
	    smartSpeed:1500,
	    autoplayTimeout:5000,
	    autoplayHoverPause:true,
	    margin: 30,
	    dots: true,
	    responsive:{

	        0:{
	          items:1
	        },
	        600:{
	          items:1
	        },
	        1024:{
	          items:1
	        },
	        1200:{
	          items:1
	        }
	    }  
	});

	// Testimonial Two
	//--------------------------------------------
	$('.testimonial-2, .testimonial-4').owlCarousel({
	     loop: true,
	     autoplay:false,
	     smartSpeed:1500,
	     autoplayTimeout:5000,
	     autoplayHoverPause:true,
	     margin: 30,
	     dots: true,
	     responsive:{

	        0:{
	          items:1
	        },
	        600:{
	          items:1
	        },
	        1024:{
	          items:2
	        },
	        1200:{
	          items:2
	        }
	      }
	      
	});

	// Testimonial Two
	//--------------------------------------------
	$('.slide-3').owlCarousel({
	     loop: true,
	     autoplay:false,
	     smartSpeed:1500,
	     autoplayTimeout:5000,
	     autoplayHoverPause:true,
	     margin: 30,
	     dots: true,
	     responsive:{

	        0:{
	          items:1
	        },
	        600:{
	          items:1
	        },
	        1024:{
	          items:2
	        },
	        1200:{
	          items:3
	        }
	      }
	      
	});

	// Slide 4
	//--------------------------------------------
	$('.slide-4').owlCarousel({
	     loop: true,
	     autoplay:false,
	     smartSpeed:1500,
	     autoplayTimeout:5000,
	     autoplayHoverPause:true,
	     margin: 30,
	     dots: true,
	     responsive:{

	        0:{
	          items:1
	        },
	        600:{
	          items:3
	        },
	        1024:{
	          items:3
	        },
	        1200:{
	          items:4
	        }
	      }
	      
	});

    // History Timeline
	//--------------------------------------------
	$('.history-timeline').owlCarousel({
	    loop: true,
	    autoplay:false,
	    smartSpeed:1500,
	    autoplayTimeout:5000,
	    autoplayHoverPause:false,
	    margin: 30,
	    dots: true,
	    responsive:{

	        0:{
	          items:1
	        },
	        600:{
	          items:1
	        },
	        1024:{
	          items:1
	        },
	        1200:{
	          items:1
	        }
	    }  
	});

	// Scroll Top
	//------------------------------------------------
	$(window).scroll(function(){ 
		if ($(this).scrollTop() > 500) { 
		  $('#scroll').fadeIn(); 
		} else { 
		  $('#scroll').fadeOut(); 
		} 
	}); 
	$('#scroll').click(function(){ 
		$("html, body").animate({ scrollTop: 0 }, 1000); 
		return false; 
	});


	// Focus input 
	//--------------------------------------------
	$('.form-control').each(function(){
	    $(this).on('blur', function(){
	        if($(this).val().trim() != "") {
	            $(this).addClass('has-val');
	        }
	        else {
	            $(this).removeClass('has-val');
	        }
	    })    
	})
	
    //	Show pass
    //--------------------------------------------
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('fa-eye');
            $(this).find('i').removeClass('fa-eye-off');
            showPass = 0;
        }
        
    });

    // Porfolio Filtering Click Events
    //------------------------------------------------
    portfolioFilterBtn.on("click", function() {
        portfolioFilterBtn.removeClass('active');
        $(this).addClass('active');
        return false;
    });

    // Portfolio Masonary Gallery
    //------------------------------------------------
    galleryWrapper.imagesLoaded(function() {
        var grid = $('.grid').isotope({
            itemSelector: '.grid-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.grid-item',
            }
        });

        // filter items on button click
        //------------------------------------------------
        portfolioFilterBtn.on('click', function() {
            var filterValue = $(this).attr('data-filter');
            grid.isotope({
                filter: filterValue
            });
        });
    });

	// LightBox / Fancybox
	//------------------------------------------------
	$('[data-fancybox="gallery"]').fancybox({
		animationEffect: "zoom-in-out",
		transitionEffect: "slide",
		transitionEffect: "slide",
	});

	//  Contact Form Validation
	//------------------------------------------------
	if($contact.length){
	    $contact.validate({  //#contact-form contact form id
	      rules: {
	        name: {
	          required: true    // Field name here
	        },
	        email: {
	          required: true, // Field name here
	          email: true
	        },
	        subject: {
	          required: true
	        },
	        message: {
	          required: true
	        }
	      },
	      
	      messages: {
	                name: "Please enter your Name", //Write here your error message that you want to show in contact form
	                email: "Please enter valid Email", //Write here your error message that you want to show in contact form
	                subject: "Please enter your Subject", //Write here your error message that you want to show in contact form
	                message: "Please write your Message" //Write here your error message that you want to show in contact form
	            },

	            submitHandler: function (form) {
	                $('#send').attr({'disabled' : 'true', 'value' : 'Sending...' });
	                $.ajax({
	                    type: "POST",
	                    url: "email.php",
	                    data: $(form).serialize(),
	                    success: function () {
	                        $('#send').removeAttr('disabled').attr('value', 'Send');
	                        $( "#success").slideDown( "slow" );
	                        setTimeout(function() {
	                        $( "#success").slideUp( "slow" );
	                        }, 5000);
	                        form.reset();
	                    },
	                    error: function() {
	                        $('#send').removeAttr('disabled').attr('value', 'Send');
	                        $( "#error").slideDown( "slow" );
	                        setTimeout(function() {
	                        $( "#error").slideUp( "slow" );
	                        }, 5000);
	                    }
	                });
	                return false; // required to block normal submit since you used ajax
	            }

	    });
	  }

})(jQuery);