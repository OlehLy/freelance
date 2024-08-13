// Global 
const $header = $('header'),
	$root = $(':root'),
	$html = $('html'),
	$burger = $('.header_burger'),
	$bar = $('.bar'),
	$titles = $('._anim-title');



// no skroll
var block = $('<div>').css({'height':'50px','width':'50px'}),
	indicator = $('<div>').css({'height':'200px'});

$('body').append(block.append(indicator));
var w1 = $('div', block).innerWidth();    
block.css('overflow-y', 'scroll');
var w2 = $('div', block).innerWidth();
$(block).remove();

var scrollbar = w1 - w2;

$root.css('--scroll', scrollbar + 'px');



// Ready
$(document).ready(function () {
	// Media
	$(window).resize(media);

	media();


	// Animating numbers
	$('.about_num_title span').each(function () {
		animateNumber($(this));
	});


	// Scroll animation
	scroll_animation();


	// Break the text into words
	
	$titles.each(function () {
		breackText(this);
	})
})


// Scroll
$(window).scroll(function () {
	var winowScroll = $(this).scrollTop();
})




/*
*			███████╗██╗░░░██╗███╗░░██╗░█████╗░░██████╗
*			██╔════╝██║░░░██║████╗░██║██╔══██╗██╔════╝
*			█████╗░░██║░░░██║██╔██╗██║██║░░╚═╝╚█████╗░
*			██╔══╝░░██║░░░██║██║╚████║██║░░██╗░╚═══██╗
*			██║░░░░░╚██████╔╝██║░╚███║╚█████╔╝██████╔╝
*			╚═╝░░░░░░╚═════╝░╚═╝░░╚══╝░╚════╝░╚═════╝░
*/


// Media
function media() {
	var windowWidth = $(window).width(),
		thresholdWidth;

	$root.css({
		'--header': $header.height() + 'px',
		'--dvh': $(window).height() + 'px'
	});

	thresholdWidth = 770;
	moveElements($('#nav-desktop'), $('#nav-table'), windowWidth, thresholdWidth);
}

function moveElements($source, $destination, windowWidth, thresholdWidth) {
	if (windowWidth <= thresholdWidth - scrollbar) {
		$source.children().detach().prependTo($destination);
	} else {
		$destination.children().detach().prependTo($source);
	}
}



// Animating numbers
function animateNumber(e) {
  const observer = new IntersectionObserver(
    (entries) => {
      if (entries[0].isIntersecting) {
        setTimeout(() => {
          const targetValue = parseFloat($(e).text());
          const isInteger = Number.isInteger(targetValue);
          const decimalPlaces = isInteger ? 0 : targetValue.toString().split(".")[1].length;

          $({ numberValue: 0 }).animate(
            { numberValue: targetValue },
            {
              duration: 2000,
              easing: "linear",
              step: function (now, fx) {
                if (isInteger) {
                  $(e).text(Math.ceil(now).toLocaleString());
                } else {
                  $(e).text(now.toFixed(decimalPlaces).toLocaleString());
                }
              },
            }
          );
          observer.disconnect();
        }, $(e).attr('data-delay'));
      }
    },
    { threshold: 0.1 }
  );

  observer.observe($(e)[0]);
}




// Faq
function faqToggle(trigger) {
  const $trigger = $(trigger);
  const $content = $trigger.siblings();
  const $faqList = $trigger.closest('.faq_net');

  $trigger.toggleClass('active');
  $content.slideToggle();

  $faqList.find('.faq_trigger').not($trigger).removeClass('active').siblings().slideUp();

	setTimeout(function() {
		$('html, body').animate({
				scrollTop: $trigger.offset().top - 20
		}, 0);
	}, 450);
}



// Team more
function teamToggle(trigger) {
	const $trigger = $(trigger);
	const $wrapper = $trigger.closest('.team_li');
	const $text = $wrapper.find('.team_text p:not(:first-child)');

	$trigger.toggleClass('_white');
	$wrapper.toggleClass('active');
	$text.slideToggle();
}



// Bar
function bar_toggle() {
	$burger.toggleClass('active');
	$bar.slideToggle().toggleClass('active');
	$html.toggleClass('hidden');
}
function bar_close() {
	$burger.removeClass('active');
	$bar.slideUp().removeClass('active');
	$html.removeClass('hidden');
}



// Scroll to element
function scroll_to(e) {
	if ($(e).length != 0) {
		
	}
}


// Scroll animation
function scroll_animation() {
	const animItems = document.querySelectorAll('.__anim');

	if (animItems.length > 0) {
		window.addEventListener('scroll', animOnScroll);
		function animOnScroll() {
			for (let index = 0; index < animItems.length; index++) {
				const animItem = animItems[index];
				const animItemHeight = animItem.offsetHeight;
				const animItemOffset = offset(animItem).top;
				const animStart = 4;

				let animItemPoint = window.innerHeight - animItemHeight + 100;
				if (animItemHeight > window.innerHeight) {
					animItemPoint = window.innerHeight - window.innerHeight / animStart;
				}
				if (animItem.classList.contains('_anim_wis')) {
					animItemPoint = animItemOffset - window.innerHeight;

					if (pageYOffset > animItemPoint) {
						animItem.classList.add('_anim_act');
					}
				} else {
					if ((pageYOffset > animItemOffset - animItemPoint) && pageYOffset < (animItemOffset + animItemHeight)) {
						animItem.classList.add('_anim_act');
					}
				}
			}
		}

		function offset(el) {
			const rect = el.getBoundingClientRect(),
				scrollLeft = window.pageXOffset || document.documentElement.scrollLeft;
				scrollTop = window.pageXOffset || document.documentElement.scrollTop;
			return {top: rect.top + scrollTop, left: rect.left + scrollLeft}
		}

		setTimeout(() => {
			animOnScroll();
		}, 300);
	};
}



// Break the text into words
function breackText(element) {
    const $element = $(element);
    const words = $element.text().split(' ');
    let dalay = 0;

    let wrappedContent = '';
    words.forEach(function(word) {
    		dalay += 130;
        wrappedContent += `<span style="transition-delay: ${dalay}ms">${word}</span>`;
    });

    $element.html(wrappedContent);
}



// Cookie
function funCookie(element) {
	const $element = $(element);

	$element.fadeOut();
}