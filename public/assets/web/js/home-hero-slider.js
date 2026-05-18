(function() {
    var sliders = document.querySelectorAll('.hsga-slider');
    if (!sliders.length) {
        return;
    }

    sliders.forEach(function(slider) {
        var track = slider.querySelector('.hsga-slides');
        var slides = slider.querySelectorAll('.hsga-slide');
        var indicators = slider.querySelectorAll('.hsga-slider-indicator');
        var prevButton = slider.querySelector('.hsga-slider-prev');
        var nextButton = slider.querySelector('.hsga-slider-next');
        var totalSlides = slides.length;
        var currentIndex = 0;
        var timer = null;
        var autoplayMs = Number(slider.getAttribute('data-autoplay-ms')) || 5000;
        var touchStartX = 0;
        var touchStartY = 0;

        if (totalSlides < 2) {
            if (prevButton) prevButton.style.display = 'none';
            if (nextButton) nextButton.style.display = 'none';
            indicators.forEach(function(indicator) {
                indicator.style.display = 'none';
            });
            return;
        }

        function updateSlider(index) {
            currentIndex = (index + totalSlides) % totalSlides;
            track.style.transform = 'translateX(-' + (currentIndex * 100) + '%)';

            indicators.forEach(function(indicator, dotIndex) {
                var isActive = dotIndex === currentIndex;
                indicator.classList.toggle('is-active', isActive);
                indicator.setAttribute('aria-selected', isActive ? 'true' : 'false');
            });
        }

        function nextSlide() {
            updateSlider(currentIndex + 1);
        }

        function prevSlide() {
            updateSlider(currentIndex - 1);
        }

        function stopAutoplay() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        function startAutoplay() {
            stopAutoplay();
            timer = setInterval(nextSlide, autoplayMs);
        }

        if (prevButton) {
            prevButton.addEventListener('click', function() {
                prevSlide();
                startAutoplay();
            });
        }

        if (nextButton) {
            nextButton.addEventListener('click', function() {
                nextSlide();
                startAutoplay();
            });
        }

        indicators.forEach(function(indicator) {
            indicator.addEventListener('click', function() {
                var to = Number(indicator.getAttribute('data-slide-to'));
                if (!Number.isNaN(to)) {
                    updateSlider(to);
                    startAutoplay();
                }
            });
        });

        slider.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowLeft') {
                event.preventDefault();
                prevSlide();
                startAutoplay();
            }

            if (event.key === 'ArrowRight') {
                event.preventDefault();
                nextSlide();
                startAutoplay();
            }
        });

        slider.addEventListener('mouseenter', stopAutoplay);
        slider.addEventListener('mouseleave', startAutoplay);
        slider.addEventListener('focusin', stopAutoplay);
        slider.addEventListener('focusout', startAutoplay);

        slider.addEventListener('touchstart', function(event) {
            if (!event.changedTouches || !event.changedTouches.length) {
                return;
            }
            touchStartX = event.changedTouches[0].clientX;
            touchStartY = event.changedTouches[0].clientY;
        }, {
            passive: true
        });

        slider.addEventListener('touchend', function(event) {
            if (!event.changedTouches || !event.changedTouches.length) {
                return;
            }

            var touchEndX = event.changedTouches[0].clientX;
            var touchEndY = event.changedTouches[0].clientY;
            var deltaX = touchEndX - touchStartX;
            var deltaY = touchEndY - touchStartY;

            if (Math.abs(deltaX) > 45 && Math.abs(deltaX) > Math.abs(deltaY)) {
                if (deltaX < 0) {
                    nextSlide();
                } else {
                    prevSlide();
                }
                startAutoplay();
            }
        }, {
            passive: true
        });

        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                stopAutoplay();
            } else {
                startAutoplay();
            }
        });

        updateSlider(0);
        startAutoplay();
    });
})();
