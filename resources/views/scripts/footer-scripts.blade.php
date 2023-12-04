<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
    function toggleNavbar() {
        var navbar = document.querySelector('.opacity-load-nav');
        var navbarToggler = document.querySelector('.navbar-toggler');

        if (navbarToggler.classList.contains('collapsed')) {
            navbar.style.background = 'transparent';
            navbar.style.height = '';
            navbar.style.display = '';
        } else {
            navbar.style.height = '100vh';
            navbar.style.background = '#45454590';
            navbar.style.display = 'flex';
            navbar.style.alignItems = 'start';
        }
    }

    let isLeftHidden = false;

    document.querySelector('.container-text-in-mobile').addEventListener('click', function() {
        const divLeft = document.querySelector('.div-text-left-in-mobile');
        const divRight = document.querySelector('.div-text-right-in-mobile');

        if (isLeftHidden) {
            divLeft.style.left = '0';
            divRight.style.left = '100vw';
        } else {
            divLeft.style.left = '-100vw';
            divRight.style.left = '0';
        }

        isLeftHidden = !isLeftHidden;
    });


    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        freeMode: true,
        spaceBetween: 15,
        initialSlide: 0,
        breakpoints: {
            1400: {
                slidesPerView: 4
            },
            1200: {
                slidesPerView: 3
            },
            850: {
                slidesPerView: 2,
            },
            450: {
                slidesPerView: 2,
            },
            250: {
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
    });

    document.addEventListener("DOMContentLoaded", function() {
        var text = document.querySelector(".progress-text");
        var width = 0;
        var loader = document.getElementById('preloader');
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
                        text.style.textAlign = 'left';
                        if (width > 20) {
                            text.style.opacity = 0;
                        }

                    } else if (width > 33 && width < 93) {
                        text.style.textAlign = 'center';
                        if (width > 66 && width < 93) {
                            text.style.opacity = 0;
                        }
                    } else {
                        text.style.textAlign = 'right';
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
