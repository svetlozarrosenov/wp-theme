import Swiper from 'swiper/js/swiper.min';

const $win = $(window);
const $doc = $(document);

$win.on('load', () => {
	/**
	 * Sliders Init
	 */
	$('.slider--features').each((i, elem) => {
		const sliderFeatures = $(elem).find('.swiper-container')[0];
		const slidesCount = $(elem).find('.slider__slide').length;

		if ( slidesCount > 4 || $win.width() < 768 ) {
			const featuresSlider = new Swiper(sliderFeatures, {
				slidesPerView: 1,
				navigation: {
					nextEl: $(elem).find('.swiper-button-next'),
					prevEl: $(elem).find('.swiper-button-prev'),
				},
				breakpoints: {
					768: {
						slidesPerView: 4,
					}
				}
			});
		} else {
			$(elem).addClass('slider--features-alt')
		}
	});
});

/**
 * Burger Button
 */
$('.btn-menu').on('click', function (event) {
	event.preventDefault(); 

	$(this).toggleClass('active');
	$('.wrapper').toggleClass('nav-active');
 });