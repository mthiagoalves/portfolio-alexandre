<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src="/js/cursor-script.js"></script>
<script>
    function toggleNavbar() {
        var navbar = document.querySelector('.opacity-load-nav');
        var navbarToggler = document.querySelector('.navbar-toggler');
        var navbarTogglerLocalTIme = document.querySelector('.opacity-navbar-local-time');

        if (navbarToggler.classList.contains('collapsed')) {
            navbar.style.background = 'transparent';
            navbar.style.height = '';
            navbar.style.display = '';
            navbarTogglerLocalTIme.style.opacity = '';

        } else {
            navbar.style.height = '100vh';
            navbar.style.background = '#45454590';
            navbar.style.display = 'flex';
            navbar.style.alignItems = 'start';
            navbarTogglerLocalTIme.style.opacity = '1';
        }
    }

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        freeMode: true,
        spaceBetween: 15,
        initialSlide: 0,
        breakpoints: {
            1500: {
                slidesPerView: 4
            },
            1200: {
                slidesPerView: 3
            },
            850: {
                slidesPerView: 2,
            },
            450: {
                freeMode: false,
                slidesPerView: 2,
            },
            250: {
                freeMode: false,
                slidesPerView: 1
            }
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        const interBubble = document.querySelector('.interactive');
        let curX = 0;
        let curY = 0;
        let tgX = 0;
        let tgY = 0;

        function move() {
            curX += (tgX - curX) / 10;
            curY += (tgY - curY) / 10;
            interBubble.style.transform = `translate(${Math.round(curX)}px, ${Math.round(curY)}px)`;
            requestAnimationFrame(() => {
                move();
            });
        }

        window.addEventListener('mousemove', (event) => {
            tgX = event.clientX;
            tgY = event.clientY;
        });

        move();

        if (window.innerWidth > 1450) {
            var navbarHeight = document.querySelector('.navbar').offsetHeight;
            var footerContent = document.querySelector('.footer-content').offsetHeight;
            document.querySelector('.container-footer').style.height = (navbarHeight + footerContent + 80) +
                'px';
        }

        if (window.innerWidth > 756) {
            const containerDiv = document.querySelector('.give-margin');
            const sliderDiv = document.querySelector('.receive-margin');

            const marginLeftValue = window.getComputedStyle(containerDiv).marginLeft;

            const newMarginLeftValue = parseFloat(marginLeftValue) + 12;

            sliderDiv.style.marginLeft = `${newMarginLeftValue}px`;
        }
    });

    document.addEventListener("DOMContentLoaded", function() {
        var text = document.querySelector(".progress-text");
        var width = 0;
        var loader = document.querySelector('.preloader');
        const contentNav = document.querySelector(".opacity-load-nav");
        const contentBanner = document.querySelector(".opacity-load-banner");

        if (performance.navigation.type === 1) {
            loader.style.height = '100vh';
            contentNav.style.opacity = 0;
            contentBanner.style.opacity = 0;
            var id = setInterval(frame, 70);

            function frame() {
                if (width >= 100) {
                    clearInterval(id);

                    setTimeout(function() {
                        loader.style.opacity = 0;
                    }, 2000);
                    setTimeout(function() {
                        loader.style.display = 'none';
                        document.body.style.overflowY = 'visible';
                    }, 2500);
                } else {
                    width++;
                    text.style.opacity = 1;
                    if (width <= 33) {
                        if (width > 20) {
                            text.style.opacity = 0;
                        }

                    } else if (width > 33 && width < 93) {
                        if (width > 66 && width < 93) {
                            text.style.opacity = 0;
                        }
                    } else {
                        text.style.opacity = 1;
                    }
                    text.innerHTML = width + '%';
                    document.body.style.overflowY = 'hidden';

                    if (width == 100) {
                        setTimeout(function() {
                            contentNav.style.opacity = 1;
                            contentBanner.style.opacity = 1;
                        }, 1500);

                    }
                }
            }
        }
    });
</script>
