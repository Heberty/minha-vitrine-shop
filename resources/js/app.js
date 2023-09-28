require('./bootstrap');

$(document).ready(function(){

	$('#btnDeleteAllCart').on('click', event, function() {
		event.preventDefault();

		Swal.fire({
			title: 'Certeza que deseja esvaziar o carrinho?',
			showDenyButton: true,
			// showCancelButton: true,
			confirmButtonText: `Sim`,
			denyButtonText: `Não`,
		  }).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
			  Swal.fire('Carrinho esvaziado', '', 'success')
			  window.location = '/deletar-todos-os-itens';
			} else if (result.isDenied) {
			  Swal.fire('O carrinho foi mantido!', '', 'info')
			}
		  })
	});

	$(window).bind('scroll', function () {
        if ($(window).scrollTop() > 400) {
            $('.cart-float').addClass('fixed');
        } else {
            $('.cart-float').removeClass('fixed');
        }
    });

	$('[data-fancybox="produtos"]').fancybox({
		// Options will go here
	});

	if($('#message').hasClass('alert-success') || $('.alert-danger').hasClass('alert')){
		$('#welcome').addClass('d-none');
	}

	if($(window).width() < 992) {

		$('.menu-link').click(event, function(){
			event.preventDefault();
			$('.panel').toggleClass('push-panel');
		});

		$('#offers-carousel').owlCarousel( {
			dots: true,
			responsive: {
				0: {
					margin: 10,
					items: 1
				},
				576: {
					margin: 20,
					items: 1
				},
				768: {
					margin: 30,
					items: 2
				}
			}
		});

		$('#benefits-carousel').owlCarousel( {
			dots: false,
			items: 1,
			autoplay: true,
			loop: true,
			margin: 40,
			responsive: {
				768: {
					items: 2
				}
			} 
		});

	};

	$('#last-offers-carousel').owlCarousel({
		items: 3,
		stagePadding: 30,
		margin: 30,
		nav: false,
		responsive: {
			0: {
				items: 1,
				stagePadding: 50
			},
			576: {
				items: 2
			},
			1200: {
				items: 3
			}
		}
	});

	$('.gallery-carousel').owlCarousel({
		items: 3
	});

	$('.gallery-carousel-inner').owlCarousel({
		items: 1,
		responsive: {
			0: {
				nav: false,
			},
			992: {
				nav: true,
				/* navText: ['<img src="/images/seta-esquerda.png">', '<img src="/images/seta-direita.png">'], */
				dots: false
			}
		}
	});

	$('#slide-carousel').owlCarousel({
		items: 1,
		margin: 30,
		autoplay: true,
		loop: true,
		responsive: {
			0: {
				stagePadding: 50,
				margin: 7
			},
			576: {
				stagePadding: 80
			},
			768: {
				stagePadding: 120
			},
			992: {
				stagePadding: 200
			},
			1200: {
				stagePadding: 250
			},
			1700: {
				stagePadding: 345
			}
		}
	});

	$('#brands-carousel').owlCarousel({
		autoplay: true,
		autoplayTimeout: 2000,
		loop: true,
		dots: false,
		nav: false,
		margin: 30,
		responsive: {
			0: {
				items: 3
			},
			576: {
				items: 5
			},
			768: {
				items: 7
			},
			992: {
				items: 9
			}
		}
	});

	var SPMaskBehavior = function (val) {
	  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
	  onKeyPress: function(val, e, field, options) {
	      field.mask(SPMaskBehavior.apply({}, arguments), options);
	    }
	};

	$('.sp_celphones').mask(SPMaskBehavior, spOptions);

	$(window).scroll(function(){
		var topElement = $('#ofertas').offset().top;

		if($(window).scrollTop() >= topElement) {
			$('.header-site').addClass('header-fixed');
		} else {
			$('.header-site').removeClass('header-fixed');
		}
	});

	$(".click-scroll").click(function(e) {
        $(".panel").removeClass("push-panel");
        var linkHref = $(this).attr("href");
        var idElement = linkHref.substr(linkHref.indexOf("#"));
        $(".click-scroll")
            .parent()
            .removeClass("active");
        $(this)
            .parent()
            .addClass("active");
        $("html, body").animate(
            {
                scrollTop: $(idElement).offset().top - 80
            },
            1000
        );
        return false;
    });

    $('.close-welcome').click(event, function(){
    	event.preventDefault();

    	$('#welcome').fadeOut();
    });
});
