<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    function toggleNavbar() {
        var navbar = document.querySelector('.opacity-load-nav');
        var navbarContent = document.querySelector('.navbar');
        var navbarToggler = document.querySelector('.navbar-toggler');
        var navbarTogglerLocalTIme = document.querySelector('.opacity-navbar-local-time');

        if (navbarToggler.classList.contains('collapsed')) {
            navbarContent.style.background = 'transparent';
            navbarContent.style.height = '';
            navbar.style.display = '';
            navbarTogglerLocalTIme.style.opacity = '0';
            navbarTogglerLocalTIme.style.position = 'absolute';
            navbarTogglerLocalTIme.style.top = '-500px';

        } else {
            navbarContent.style.height = '100vh';
            navbarContent.style.background = '#01001bfa';
            navbar.style.display = 'flex';
            navbar.style.alignItems = 'center';
            navbarTogglerLocalTIme.style.opacity = '1';
            navbarTogglerLocalTIme.style.position = 'static';
            navbarTogglerLocalTIme.style.marginBottom = '30px';

            atualizarHora();

            setInterval(atualizarHora, 1000);
        }
    }

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 15,
        freeMode: true,
        loop: true,
        speed: 5000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
            pauseOnMouseEnter: true,
        },
        grabCursor: true,
        breakpoints: {
            1550: {
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
                slidesPerView: 1,
            }
        },
    });

    document.addEventListener("DOMContentLoaded", function() {
        var text = document.querySelector(".progress-text");
        var width = 0;
        var loader = document.querySelector('.preloader');
        const contentNav = document.querySelector(".opacity-load-nav");
        const contentBanner = document.querySelector(".opacity-load-banner");
        const contentLogo = document.querySelector(".navbar-brand");
        const navbarToggle = document.querySelector(".navbar-toggler");

        if (performance.navigation.type === 1 || !localStorage.getItem('firstVisit') && window.location.pathname === '/') {
            localStorage.setItem('firstVisit', 'true');
            loader.style.height = '100vh';
            loader.style.opacity = 1;
            contentNav.style.opacity = 0;
            navbarToggle.style.opacity = 0;
            contentLogo.style.opacity = 1;
            contentBanner.style.opacity = 0;
            var id = setInterval(frame, 70);

            function frame() {
                if (width >= 100) {
                    clearInterval(id);

                    setTimeout(function() {
                        loader.style.opacity = 0;
                    }, 2000);
                    setTimeout(function() {
                        loader.remove();
                        document.body.style.overflowY = 'visible';
                        executeAfterLoader();
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
                            navbarToggle.style.opacity = 1;
                        }, 1500);

                    }
                }
            }
        } else {
            executeAfterLoader();
        }

        function executeAfterLoader() {
            var navbar = document.querySelector('.navbar-top');
            var scrollDown = document.querySelector('.text-scroll-banner');
            var footer = document.querySelector('.navbar-footer');

            var lastScrollTop = 0;
            var isTimeoutSet = false;

            window.addEventListener('scroll', function() {
                var scrollTop = window.scrollY;

                if (scrollTop > lastScrollTop && window.innerHeight + window.scrollY < document.body
                    .offsetHeight) {
                    navbar.style.opacity = '0';
                    navbar.style.pointerEvents = 'none';
                    if(window.innerWidth < 756 && !isTimeoutSet) {
                            setTimeout(function() {
                                navbar.style.paddingTop = '3rem';
                                isTimeoutSet = false;
                            }, 1000);

                            isTimeoutSet = true;
                    }
                    if (window.location.pathname != '/work') {
                        scrollDown.style.opacity = '0';
                    }

                } else if (scrollTop < lastScrollTop) {
                    navbar.style.opacity = '0';
                    navbar.style.pointerEvents = 'none';
                    if (window.innerWidth < 756 && !isTimeoutSet) {
                        setTimeout(function() {
                            navbar.style.paddingTop = '1rem';
                            isTimeoutSet = false;
                        }, 1000);

                        isTimeoutSet = true;
                    }

                    if (window.location.pathname != '/work') {
                        scrollDown.style.opacity = '0';
                    }
                }

                if (scrollTop === 0 || (window.innerHeight + window.scrollY) >= document.body
                    .offsetHeight) {
                    navbar.style.opacity = '1';
                    navbar.style.pointerEvents = 'all';
                    if (window.location.pathname != '/work') {
                        scrollDown.style.opacity = '1';
                    }
                }


                lastScrollTop = scrollTop;
            });

        }

        var navbarHeight = document.querySelector('.navbar').offsetHeight;
        var divWidth = document.querySelector('.give-width').offsetWidth;

        if (window.innerWidth < 756) {
            document.querySelector('.footer-content').style.marginTop = 100 +
                'px';
            document.querySelector('.receive-width').style.width = divWidth +
                'px';
        } else if (window.innerWidth < 1450) {
            document.querySelector('.footer-content').style.marginTop = (navbarHeight + 15) +
                'px';
                document.querySelector('.receive-width').style.width = '';
        } else {
            document.querySelector('.footer-content').style.marginTop = (navbarHeight + 51) +
                'px';
                document.querySelector('.fixed-footer-bottom').style.width = '';
        }

        if (window.innerWidth > 756 && window.location.pathname === '/') {
            const containerDiv = document.querySelector('.give-margin');
            const sliderDiv = document.querySelector('.receive-margin');

            const marginLeftValue = window.getComputedStyle(containerDiv).marginLeft;

            const newMarginLeftValue = parseFloat(marginLeftValue) + 12;

            sliderDiv.style.paddingLeft = `${newMarginLeftValue}px`;
            sliderDiv.style.paddingRight = `${newMarginLeftValue}px`;
        } else if (window.innerWidth < 756 && window.location.pathname === '/') {
            const sliderDiv = document.querySelector('.receive-margin');
            sliderDiv.style.paddingLeft = `30px`;
            sliderDiv.style.paddingRight = `30px`;
        }
    });

    // Função para atualizar a hora no formato AM/PM
    function atualizarHora() {
        // Obtenha a referência do elemento <p> pelo ID
        var paragrafo = document.querySelector(".text-hours");

        // Obtenha a hora atual
        var data = new Date();
        var hora = data.getHours();
        var minutos = data.getMinutes();

        // Determine se é AM ou PM
        var periodo = hora >= 12 ? "PM" : "AM";

        // Converta a hora para o formato de 12 horas
        hora = hora % 12 || 12;

        // Formate os minutos e segundos para garantir que tenham dois dígitos
        minutos = minutos < 10 ? "0" + minutos : minutos;

        // Atualize o conteúdo do <p> com a hora atual no formato AM/PM
        paragrafo.innerHTML = hora + ":" + minutos + " " + periodo + ' - GMT+1';
    }
</script>

<script>
    (function() {
        const t = document.createElement("link").relList;
        if (t && t.supports && t.supports("modulepreload")) return;
        for (const r of document.querySelectorAll('link[rel="modulepreload"]')) i(r);
        new MutationObserver(r => {
            for (const s of r)
                if (s.type === "childList")
                    for (const o of s.addedNodes) o.tagName === "LINK" && o.rel === "modulepreload" && i(o)
        }).observe(document, {
            childList: !0,
            subtree: !0
        });

        function e(r) {
            const s = {};
            return r.integrity && (s.integrity = r.integrity), r.referrerPolicy && (s.referrerPolicy = r
                    .referrerPolicy), r.crossOrigin === "use-credentials" ? s.credentials = "include" : r
                .crossOrigin === "anonymous" ? s.credentials = "omit" : s.credentials = "same-origin", s
        }

        function i(r) {
            if (r.ep) return;
            r.ep = !0;
            const s = e(r);
            fetch(r.href, s)
        }
    })();

    let Ge = Float32Array;

    function Bt(n, t, e) {
        const i = new Ge(3);
        return n && (i[0] = n), t && (i[1] = t), e && (i[2] = e), i
    }

    function Cs(n, t, e) {
        return e = e || new Ge(3), e[0] = n[0] - t[0], e[1] = n[1] - t[1], e[2] = n[2] - t[2], e
    }

    function _n(n, t, e) {
        e = e || new Ge(3);
        const i = n[2] * t[0] - n[0] * t[2],
            r = n[0] * t[1] - n[1] * t[0];
        return e[0] = n[1] * t[2] - n[2] * t[1], e[1] = i, e[2] = r, e
    }

    function ei(n, t) {
        t = t || new Ge(3);
        const e = n[0] * n[0] + n[1] * n[1] + n[2] * n[2],
            i = Math.sqrt(e);
        return i > 1e-5 ? (t[0] = n[0] / i, t[1] = n[1] / i, t[2] = n[2] / i) : (t[0] = 0, t[1] = 0, t[2] = 0), t
    }
    let $ = Float32Array;

    function Ps(n) {
        const t = $;
        return $ = n, t
    }

    function ks(n, t) {
        return t = t || new $(16), t[0] = -n[0], t[1] = -n[1], t[2] = -n[2], t[3] = -n[3], t[4] = -n[4], t[5] = -n[5],
            t[6] = -n[6], t[7] = -n[7], t[8] = -n[8], t[9] = -n[9], t[10] = -n[10], t[11] = -n[11], t[12] = -n[12], t[
                13] = -n[13], t[14] = -n[14], t[15] = -n[15], t
    }

    function Fs() {
        return new $(16).fill(0)
    }

    function In(n, t) {
        return t = t || new $(16), t[0] = n[0], t[1] = n[1], t[2] = n[2], t[3] = n[3], t[4] = n[4], t[5] = n[5], t[6] =
            n[6], t[7] = n[7], t[8] = n[8], t[9] = n[9], t[10] = n[10], t[11] = n[11], t[12] = n[12], t[13] = n[13], t[
                14] = n[14], t[15] = n[15], t
    }

    function Bn(n) {
        return n = n || new $(16), n[0] = 1, n[1] = 0, n[2] = 0, n[3] = 0, n[4] = 0, n[5] = 1, n[6] = 0, n[7] = 0, n[
            8] = 0, n[9] = 0, n[10] = 1, n[11] = 0, n[12] = 0, n[13] = 0, n[14] = 0, n[15] = 1, n
    }

    function Ms(n, t) {
        if (t = t || new $(16), t === n) {
            let y;
            return y = n[1], n[1] = n[4], n[4] = y, y = n[2], n[2] = n[8], n[8] = y, y = n[3], n[3] = n[12], n[12] = y,
                y = n[6], n[6] = n[9], n[9] = y, y = n[7], n[7] = n[13], n[13] = y, y = n[11], n[11] = n[14], n[14] = y,
                t
        }
        const e = n[0 * 4 + 0],
            i = n[0 * 4 + 1],
            r = n[0 * 4 + 2],
            s = n[0 * 4 + 3],
            o = n[1 * 4 + 0],
            a = n[1 * 4 + 1],
            l = n[1 * 4 + 2],
            u = n[1 * 4 + 3],
            c = n[2 * 4 + 0],
            h = n[2 * 4 + 1],
            f = n[2 * 4 + 2],
            d = n[2 * 4 + 3],
            g = n[3 * 4 + 0],
            _ = n[3 * 4 + 1],
            m = n[3 * 4 + 2],
            p = n[3 * 4 + 3];
        return t[0] = e, t[1] = o, t[2] = c, t[3] = g, t[4] = i, t[5] = a, t[6] = h, t[7] = _, t[8] = r, t[9] = l, t[
            10] = f, t[11] = m, t[12] = s, t[13] = u, t[14] = d, t[15] = p, t
    }

    function Ln(n, t) {
        t = t || new $(16);
        const e = n[0 * 4 + 0],
            i = n[0 * 4 + 1],
            r = n[0 * 4 + 2],
            s = n[0 * 4 + 3],
            o = n[1 * 4 + 0],
            a = n[1 * 4 + 1],
            l = n[1 * 4 + 2],
            u = n[1 * 4 + 3],
            c = n[2 * 4 + 0],
            h = n[2 * 4 + 1],
            f = n[2 * 4 + 2],
            d = n[2 * 4 + 3],
            g = n[3 * 4 + 0],
            _ = n[3 * 4 + 1],
            m = n[3 * 4 + 2],
            p = n[3 * 4 + 3],
            y = f * p,
            v = m * d,
            A = l * p,
            x = m * u,
            E = l * d,
            T = f * u,
            w = r * p,
            b = m * s,
            S = r * d,
            C = f * s,
            F = r * u,
            D = l * s,
            O = c * _,
            k = g * h,
            z = o * _,
            R = g * a,
            I = o * h,
            ht = c * a,
            ft = e * _,
            bt = g * i,
            _t = e * h,
            Gt = c * i,
            et = e * a,
            dt = o * i,
            un = y * a + x * h + E * _ - (v * a + A * h + T * _),
            cn = v * i + w * h + C * _ - (y * i + b * h + S * _),
            hn = A * i + b * a + F * _ - (x * i + w * a + D * _),
            fn = T * i + S * a + D * h - (E * i + C * a + F * h),
            j = 1 / (e * un + o * cn + c * hn + g * fn);
        return t[0] = j * un, t[1] = j * cn, t[2] = j * hn, t[3] = j * fn, t[4] = j * (v * o + A * c + T * g - (y * o +
            x * c + E * g)), t[5] = j * (y * e + b * c + S * g - (v * e + w * c + C * g)), t[6] = j * (x * e + w *
            o + D * g - (A * e + b * o + F * g)), t[7] = j * (E * e + C * o + F * c - (T * e + S * o + D * c)), t[
            8] = j * (O * u + R * d + I * p - (k * u + z * d + ht * p)), t[9] = j * (k * s + ft * d + Gt * p - (O *
            s +
            bt * d + _t * p)), t[10] = j * (z * s + bt * u + et * p - (R * s + ft * u + dt * p)), t[11] = j * (ht *
            s + _t * u + dt * d - (I * s + Gt * u + et * d)), t[12] = j * (z * f + ht * m + k * l - (I * m + O * l +
            R * f)), t[13] = j * (_t * m + O * r + bt * f - (ft * f + Gt * m + k * r)), t[14] = j * (ft * l + dt *
            m + R * r - (et * m + z * r + bt * l)), t[15] = j * (et * f + I * r + Gt * l - (_t * l + dt * f + ht *
            r)), t
    }

    function Ds(n, t, e) {
        e = e || new $(16);
        const i = n[0],
            r = n[1],
            s = n[2],
            o = n[3],
            a = n[4 + 0],
            l = n[4 + 1],
            u = n[4 + 2],
            c = n[4 + 3],
            h = n[8 + 0],
            f = n[8 + 1],
            d = n[8 + 2],
            g = n[8 + 3],
            _ = n[12 + 0],
            m = n[12 + 1],
            p = n[12 + 2],
            y = n[12 + 3],
            v = t[0],
            A = t[1],
            x = t[2],
            E = t[3],
            T = t[4 + 0],
            w = t[4 + 1],
            b = t[4 + 2],
            S = t[4 + 3],
            C = t[8 + 0],
            F = t[8 + 1],
            D = t[8 + 2],
            O = t[8 + 3],
            k = t[12 + 0],
            z = t[12 + 1],
            R = t[12 + 2],
            I = t[12 + 3];
        return e[0] = i * v + a * A + h * x + _ * E, e[1] = r * v + l * A + f * x + m * E, e[2] = s * v + u * A + d *
            x + p * E, e[3] = o * v + c * A + g * x + y * E, e[4] = i * T + a * w + h * b + _ * S, e[5] = r * T + l *
            w + f * b + m * S, e[6] = s * T + u * w + d * b + p * S, e[7] = o * T + c * w + g * b + y * S, e[8] = i *
            C + a * F + h * D + _ * O, e[9] = r * C + l * F + f * D + m * O, e[10] = s * C + u * F + d * D + p * O, e[
                11] = o * C + c * F + g * D + y * O, e[12] = i * k + a * z + h * R + _ * I, e[13] = r * k + l * z + f *
            R + m * I, e[14] = s * k + u * z + d * R + p * I, e[15] = o * k + c * z + g * R + y * I, e
    }

    function Os(n, t, e) {
        return e = e || Bn(), n !== e && (e[0] = n[0], e[1] = n[1], e[2] = n[2], e[3] = n[3], e[4] = n[4], e[5] = n[5],
                e[6] = n[6], e[7] = n[7], e[8] = n[8], e[9] = n[9], e[10] = n[10], e[11] = n[11]), e[12] = t[0], e[13] =
            t[1], e[14] = t[2], e[15] = 1, e
    }

    function Rs(n, t) {
        return t = t || Bt(), t[0] = n[12], t[1] = n[13], t[2] = n[14], t
    }

    function zs(n, t, e) {
        e = e || Bt();
        const i = t * 4;
        return e[0] = n[i + 0], e[1] = n[i + 1], e[2] = n[i + 2], e
    }

    function Is(n, t, e, i) {
        i !== n && (i = In(n, i));
        const r = e * 4;
        return i[r + 0] = t[0], i[r + 1] = t[1], i[r + 2] = t[2], i
    }

    function Bs(n, t, e, i, r) {
        r = r || new $(16);
        const s = Math.tan(Math.PI * .5 - .5 * n),
            o = 1 / (e - i);
        return r[0] = s / t, r[1] = 0, r[2] = 0, r[3] = 0, r[4] = 0, r[5] = s, r[6] = 0, r[7] = 0, r[8] = 0, r[9] = 0,
            r[10] = (e + i) * o, r[11] = -1, r[12] = 0, r[13] = 0, r[14] = e * i * o * 2, r[15] = 0, r
    }

    function Ls(n, t, e, i, r, s, o) {
        return o = o || new $(16), o[0] = 2 / (t - n), o[1] = 0, o[2] = 0, o[3] = 0, o[4] = 0, o[5] = 2 / (i - e), o[
                6] = 0, o[7] = 0, o[8] = 0, o[9] = 0, o[10] = 2 / (r - s), o[11] = 0, o[12] = (t + n) / (n - t), o[13] =
            (
                i + e) / (e - i), o[14] = (s + r) / (r - s), o[15] = 1, o
    }

    function $s(n, t, e, i, r, s, o) {
        o = o || new $(16);
        const a = t - n,
            l = i - e,
            u = r - s;
        return o[0] = 2 * r / a, o[1] = 0, o[2] = 0, o[3] = 0, o[4] = 0, o[5] = 2 * r / l, o[6] = 0, o[7] = 0, o[8] = (
            n + t) / a, o[9] = (i + e) / l, o[10] = s / u, o[11] = -1, o[12] = 0, o[13] = 0, o[14] = r * s / u, o[
            15] = 0, o
    }
    let Ot, Ht, Pt;

    function Us(n, t, e, i) {
        return i = i || new $(16), Ot = Ot || Bt(), Ht = Ht || Bt(), Pt = Pt || Bt(), ei(Cs(n, t, Pt), Pt), ei(_n(e, Pt,
                Ot), Ot), ei(_n(Pt, Ot, Ht), Ht), i[0] = Ot[0], i[1] = Ot[1], i[2] = Ot[2], i[3] = 0, i[4] = Ht[0], i[
                5] = Ht[1], i[6] = Ht[2], i[7] = 0, i[8] = Pt[0], i[9] = Pt[1], i[10] = Pt[2], i[11] = 0, i[12] = n[0],
            i[
                13] = n[1], i[14] = n[2], i[15] = 1, i
    }

    function Ns(n, t) {
        return t = t || new $(16), t[0] = 1, t[1] = 0, t[2] = 0, t[3] = 0, t[4] = 0, t[5] = 1, t[6] = 0, t[7] = 0, t[
            8] = 0, t[9] = 0, t[10] = 1, t[11] = 0, t[12] = n[0], t[13] = n[1], t[14] = n[2], t[15] = 1, t
    }

    function Vs(n, t, e) {
        e = e || new $(16);
        const i = t[0],
            r = t[1],
            s = t[2],
            o = n[0],
            a = n[1],
            l = n[2],
            u = n[3],
            c = n[1 * 4 + 0],
            h = n[1 * 4 + 1],
            f = n[1 * 4 + 2],
            d = n[1 * 4 + 3],
            g = n[2 * 4 + 0],
            _ = n[2 * 4 + 1],
            m = n[2 * 4 + 2],
            p = n[2 * 4 + 3],
            y = n[3 * 4 + 0],
            v = n[3 * 4 + 1],
            A = n[3 * 4 + 2],
            x = n[3 * 4 + 3];
        return n !== e && (e[0] = o, e[1] = a, e[2] = l, e[3] = u, e[4] = c, e[5] = h, e[6] = f, e[7] = d, e[8] = g, e[
            9] = _, e[10] = m, e[11] = p), e[12] = o * i + c * r + g * s + y, e[13] = a * i + h * r + _ * s + v, e[
            14] = l * i + f * r + m * s + A, e[15] = u * i + d * r + p * s + x, e
    }

    function Ys(n, t) {
        t = t || new $(16);
        const e = Math.cos(n),
            i = Math.sin(n);
        return t[0] = 1, t[1] = 0, t[2] = 0, t[3] = 0, t[4] = 0, t[5] = e, t[6] = i, t[7] = 0, t[8] = 0, t[9] = -i, t[
            10] = e, t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1, t
    }

    function Gs(n, t, e) {
        e = e || new $(16);
        const i = n[4],
            r = n[5],
            s = n[6],
            o = n[7],
            a = n[8],
            l = n[9],
            u = n[10],
            c = n[11],
            h = Math.cos(t),
            f = Math.sin(t);
        return e[4] = h * i + f * a, e[5] = h * r + f * l, e[6] = h * s + f * u, e[7] = h * o + f * c, e[8] = h * a -
            f * i, e[9] = h * l - f * r, e[10] = h * u - f * s, e[11] = h * c - f * o, n !== e && (e[0] = n[0], e[1] =
                n[1], e[2] = n[2], e[3] = n[3], e[12] = n[12], e[13] = n[13], e[14] = n[14], e[15] = n[15]), e
    }

    function Hs(n, t) {
        t = t || new $(16);
        const e = Math.cos(n),
            i = Math.sin(n);
        return t[0] = e, t[1] = 0, t[2] = -i, t[3] = 0, t[4] = 0, t[5] = 1, t[6] = 0, t[7] = 0, t[8] = i, t[9] = 0, t[
            10] = e, t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1, t
    }

    function Xs(n, t, e) {
        e = e || new $(16);
        const i = n[0 * 4 + 0],
            r = n[0 * 4 + 1],
            s = n[0 * 4 + 2],
            o = n[0 * 4 + 3],
            a = n[2 * 4 + 0],
            l = n[2 * 4 + 1],
            u = n[2 * 4 + 2],
            c = n[2 * 4 + 3],
            h = Math.cos(t),
            f = Math.sin(t);
        return e[0] = h * i - f * a, e[1] = h * r - f * l, e[2] = h * s - f * u, e[3] = h * o - f * c, e[8] = h * a +
            f * i, e[9] = h * l + f * r, e[10] = h * u + f * s, e[11] = h * c + f * o, n !== e && (e[4] = n[4], e[5] =
                n[5], e[6] = n[6], e[7] = n[7], e[12] = n[12], e[13] = n[13], e[14] = n[14], e[15] = n[15]), e
    }

    function Ws(n, t) {
        t = t || new $(16);
        const e = Math.cos(n),
            i = Math.sin(n);
        return t[0] = e, t[1] = i, t[2] = 0, t[3] = 0, t[4] = -i, t[5] = e, t[6] = 0, t[7] = 0, t[8] = 0, t[9] = 0, t[
            10] = 1, t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1, t
    }

    function qs(n, t, e) {
        e = e || new $(16);
        const i = n[0 * 4 + 0],
            r = n[0 * 4 + 1],
            s = n[0 * 4 + 2],
            o = n[0 * 4 + 3],
            a = n[1 * 4 + 0],
            l = n[1 * 4 + 1],
            u = n[1 * 4 + 2],
            c = n[1 * 4 + 3],
            h = Math.cos(t),
            f = Math.sin(t);
        return e[0] = h * i + f * a, e[1] = h * r + f * l, e[2] = h * s + f * u, e[3] = h * o + f * c, e[4] = h * a -
            f * i, e[5] = h * l - f * r, e[6] = h * u - f * s, e[7] = h * c - f * o, n !== e && (e[8] = n[8], e[9] = n[
                9], e[10] = n[10], e[11] = n[11], e[12] = n[12], e[13] = n[13], e[14] = n[14], e[15] = n[15]), e
    }

    function js(n, t, e) {
        e = e || new $(16);
        let i = n[0],
            r = n[1],
            s = n[2];
        const o = Math.sqrt(i * i + r * r + s * s);
        i /= o, r /= o, s /= o;
        const a = i * i,
            l = r * r,
            u = s * s,
            c = Math.cos(t),
            h = Math.sin(t),
            f = 1 - c;
        return e[0] = a + (1 - a) * c, e[1] = i * r * f + s * h, e[2] = i * s * f - r * h, e[3] = 0, e[4] = i * r * f -
            s * h, e[5] = l + (1 - l) * c, e[6] = r * s * f + i * h, e[7] = 0, e[8] = i * s * f + r * h, e[9] = r * s *
            f - i * h, e[10] = u + (1 - u) * c, e[11] = 0, e[12] = 0, e[13] = 0, e[14] = 0, e[15] = 1, e
    }

    function Ks(n, t, e, i) {
        i = i || new $(16);
        let r = t[0],
            s = t[1],
            o = t[2];
        const a = Math.sqrt(r * r + s * s + o * o);
        r /= a, s /= a, o /= a;
        const l = r * r,
            u = s * s,
            c = o * o,
            h = Math.cos(e),
            f = Math.sin(e),
            d = 1 - h,
            g = l + (1 - l) * h,
            _ = r * s * d + o * f,
            m = r * o * d - s * f,
            p = r * s * d - o * f,
            y = u + (1 - u) * h,
            v = s * o * d + r * f,
            A = r * o * d + s * f,
            x = s * o * d - r * f,
            E = c + (1 - c) * h,
            T = n[0],
            w = n[1],
            b = n[2],
            S = n[3],
            C = n[4],
            F = n[5],
            D = n[6],
            O = n[7],
            k = n[8],
            z = n[9],
            R = n[10],
            I = n[11];
        return i[0] = g * T + _ * C + m * k, i[1] = g * w + _ * F + m * z, i[2] = g * b + _ * D + m * R, i[3] = g * S +
            _ * O + m * I, i[4] = p * T + y * C + v * k, i[5] = p * w + y * F + v * z, i[6] = p * b + y * D + v * R, i[
                7] = p * S + y * O + v * I, i[8] = A * T + x * C + E * k, i[9] = A * w + x * F + E * z, i[10] = A * b +
            x * D + E * R, i[11] = A * S + x * O + E * I, n !== i && (i[12] = n[12], i[13] = n[13], i[14] = n[14], i[
                15] = n[15]), i
    }

    function Qs(n, t) {
        return t = t || new $(16), t[0] = n[0], t[1] = 0, t[2] = 0, t[3] = 0, t[4] = 0, t[5] = n[1], t[6] = 0, t[7] = 0,
            t[8] = 0, t[9] = 0, t[10] = n[2], t[11] = 0, t[12] = 0, t[13] = 0, t[14] = 0, t[15] = 1, t
    }

    function Zs(n, t, e) {
        e = e || new $(16);
        const i = t[0],
            r = t[1],
            s = t[2];
        return e[0] = i * n[0 * 4 + 0], e[1] = i * n[0 * 4 + 1], e[2] = i * n[0 * 4 + 2], e[3] = i * n[0 * 4 + 3], e[
                4] = r * n[1 * 4 + 0], e[5] = r * n[1 * 4 + 1], e[6] = r * n[1 * 4 + 2], e[7] = r * n[1 * 4 + 3], e[8] =
            s *
            n[2 * 4 + 0], e[9] = s * n[2 * 4 + 1], e[10] = s * n[2 * 4 + 2], e[11] = s * n[2 * 4 + 3], n !== e && (e[
                12] = n[12], e[13] = n[13], e[14] = n[14], e[15] = n[15]), e
    }

    function Js(n, t, e) {
        e = e || Bt();
        const i = t[0],
            r = t[1],
            s = t[2],
            o = i * n[0 * 4 + 3] + r * n[1 * 4 + 3] + s * n[2 * 4 + 3] + n[3 * 4 + 3];
        return e[0] = (i * n[0 * 4 + 0] + r * n[1 * 4 + 0] + s * n[2 * 4 + 0] + n[3 * 4 + 0]) / o, e[1] = (i * n[0 * 4 +
            1] + r * n[1 * 4 + 1] + s * n[2 * 4 + 1] + n[3 * 4 + 1]) / o, e[2] = (i * n[0 * 4 + 2] + r * n[1 * 4 +
            2] + s * n[2 * 4 + 2] + n[3 * 4 + 2]) / o, e
    }

    function to(n, t, e) {
        e = e || Bt();
        const i = t[0],
            r = t[1],
            s = t[2];
        return e[0] = i * n[0 * 4 + 0] + r * n[1 * 4 + 0] + s * n[2 * 4 + 0], e[1] = i * n[0 * 4 + 1] + r * n[1 * 4 +
            1] + s * n[2 * 4 + 1], e[2] = i * n[0 * 4 + 2] + r * n[1 * 4 + 2] + s * n[2 * 4 + 2], e
    }

    function eo(n, t, e) {
        e = e || Bt();
        const i = Ln(n),
            r = t[0],
            s = t[1],
            o = t[2];
        return e[0] = r * i[0 * 4 + 0] + s * i[0 * 4 + 1] + o * i[0 * 4 + 2], e[1] = r * i[1 * 4 + 0] + s * i[1 * 4 +
            1] + o * i[1 * 4 + 2], e[2] = r * i[2 * 4 + 0] + s * i[2 * 4 + 1] + o * i[2 * 4 + 2], e
    }
    var dn = Object.freeze({
        __proto__: null,
        axisRotate: Ks,
        axisRotation: js,
        copy: In,
        create: Fs,
        frustum: $s,
        getAxis: zs,
        getTranslation: Rs,
        identity: Bn,
        inverse: Ln,
        lookAt: Us,
        multiply: Ds,
        negate: ks,
        ortho: Ls,
        perspective: Bs,
        rotateX: Gs,
        rotateY: Xs,
        rotateZ: qs,
        rotationX: Ys,
        rotationY: Hs,
        rotationZ: Ws,
        scale: Zs,
        scaling: Qs,
        setAxis: Is,
        setDefaultType: Ps,
        setTranslation: Os,
        transformDirection: to,
        transformNormal: eo,
        transformPoint: Js,
        translate: Vs,
        translation: Ns,
        transpose: Ms
    });
    const Fi = 5120,
        be = 5121,
        Mi = 5122,
        Di = 5123,
        Oi = 5124,
        Ri = 5125,
        zi = 5126,
        io = 32819,
        no = 32820,
        ro = 33635,
        so = 5131,
        oo = 33640,
        ao = 35899,
        lo = 35902,
        uo = 36269,
        co = 34042,
        $n = {};
    {
        const n = $n;
        n[Fi] = Int8Array, n[be] = Uint8Array, n[Mi] = Int16Array, n[Di] = Uint16Array, n[Oi] = Int32Array, n[Ri] =
            Uint32Array, n[zi] = Float32Array, n[io] = Uint16Array, n[no] = Uint16Array, n[ro] = Uint16Array, n[so] =
            Uint16Array, n[oo] = Uint32Array, n[ao] = Uint32Array, n[lo] = Uint32Array, n[uo] = Uint32Array, n[co] =
            Uint32Array
    }

    function Un(n) {
        if (n instanceof Int8Array) return Fi;
        if (n instanceof Uint8Array || n instanceof Uint8ClampedArray) return be;
        if (n instanceof Int16Array) return Mi;
        if (n instanceof Uint16Array) return Di;
        if (n instanceof Int32Array) return Oi;
        if (n instanceof Uint32Array) return Ri;
        if (n instanceof Float32Array) return zi;
        throw new Error("unsupported typed array type")
    }

    function Nn(n) {
        if (n === Int8Array) return Fi;
        if (n === Uint8Array || n === Uint8ClampedArray) return be;
        if (n === Int16Array) return Mi;
        if (n === Uint16Array) return Di;
        if (n === Int32Array) return Oi;
        if (n === Uint32Array) return Ri;
        if (n === Float32Array) return zi;
        throw new Error("unsupported typed array type")
    }

    function ho(n) {
        const t = $n[n];
        if (!t) throw new Error("unknown gl type");
        return t
    }
    const _i = typeof SharedArrayBuffer < "u" ? function(t) {
        return t && t.buffer && (t.buffer instanceof ArrayBuffer || t.buffer instanceof SharedArrayBuffer)
    } : function(t) {
        return t && t.buffer && t.buffer instanceof ArrayBuffer
    };

    function fo(...n) {
        console.error(...n)
    }
    const pn = new Map;

    function Vn(n, t) {
        if (!n || typeof n != "object") return !1;
        let e = pn.get(t);
        e || (e = new WeakMap, pn.set(t, e));
        let i = e.get(n);
        if (i === void 0) {
            const r = Object.prototype.toString.call(n);
            i = r.substring(8, r.length - 1) === t, e.set(n, i)
        }
        return i
    }

    function _o(n, t) {
        return typeof WebGLBuffer < "u" && Vn(t, "WebGLBuffer")
    }

    function Yn(n, t) {
        return typeof WebGLTexture < "u" && Vn(t, "WebGLTexture")
    }
    const Gn = 35044,
        Kt = 34962,
        po = 34963,
        go = 34660,
        mo = 5120,
        yo = 5121,
        vo = 5122,
        xo = 5123,
        Ao = 5124,
        bo = 5125,
        Hn = 5126,
        Xn = {
            attribPrefix: ""
        };

    function wo(n, t, e, i, r) {
        n.bindBuffer(t, e), n.bufferData(t, i, r || Gn)
    }

    function Wn(n, t, e, i) {
        if (_o(n, t)) return t;
        e = e || Kt;
        const r = n.createBuffer();
        return wo(n, e, r, t, i), r
    }

    function qn(n) {
        return n === "indices"
    }

    function To(n) {
        return n === Int8Array || n === Uint8Array
    }

    function Eo(n) {
        return n.length ? n : n.data
    }
    const So = /coord|texture/i,
        Co = /color|colour/i;

    function Po(n, t) {
        let e;
        if (So.test(n) ? e = 2 : Co.test(n) ? e = 4 : e = 3, t % e > 0) throw new Error(
            `Can not guess numComponents for attribute '${n}'. Tried ${e} but ${t} values is not evenly divisible by ${e}. You should specify it.`
        );
        return e
    }

    function ko(n, t, e) {
        return n.numComponents || n.size || Po(t, e || Eo(n).length)
    }

    function jn(n, t) {
        if (_i(n)) return n;
        if (_i(n.data)) return n.data;
        Array.isArray(n) && (n = {
            data: n
        });
        let e = n.type ? Ii(n.type) : void 0;
        return e || (qn(t) ? e = Uint16Array : e = Float32Array), new e(n.data)
    }

    function Fo(n) {
        return typeof n == "number" ? n : n ? Nn(n) : Hn
    }

    function Ii(n) {
        return typeof n == "number" ? ho(n) : n || Float32Array
    }

    function Mo(n, t) {
        return {
            buffer: t.buffer,
            numValues: 2 * 3 * 4,
            type: Fo(t.type),
            arrayType: Ii(t.type)
        }
    }

    function Do(n, t) {
        const e = t.data || t,
            i = Ii(t.type),
            r = e * i.BYTES_PER_ELEMENT,
            s = n.createBuffer();
        return n.bindBuffer(Kt, s), n.bufferData(Kt, r, t.drawType || Gn), {
            buffer: s,
            numValues: e,
            type: Nn(i),
            arrayType: i
        }
    }

    function Oo(n, t, e) {
        const i = jn(t, e);
        return {
            arrayType: i.constructor,
            buffer: Wn(n, i, void 0, t.drawType),
            type: Un(i),
            numValues: 0
        }
    }

    function Ro(n, t) {
        const e = {};
        return Object.keys(t).forEach(function(i) {
            if (!qn(i)) {
                const r = t[i],
                    s = r.attrib || r.name || r.attribName || Xn.attribPrefix + i;
                if (r.value) {
                    if (!Array.isArray(r.value) && !_i(r.value)) throw new Error(
                        "array.value is not array or typedarray");
                    e[s] = {
                        value: r.value
                    }
                } else {
                    let o;
                    r.buffer && r.buffer instanceof WebGLBuffer ? o = Mo : typeof r == "number" || typeof r
                        .data == "number" ? o = Do : o = Oo;
                    const {
                        buffer: a,
                        type: l,
                        numValues: u,
                        arrayType: c
                    } = o(n, r, i), h = r.normalize !== void 0 ? r.normalize : To(c), f = ko(r, i, u);
                    e[s] = {
                        buffer: a,
                        numComponents: f,
                        type: l,
                        normalize: h,
                        stride: r.stride || 0,
                        offset: r.offset || 0,
                        divisor: r.divisor === void 0 ? void 0 : r.divisor,
                        drawType: r.drawType
                    }
                }
            }
        }), n.bindBuffer(Kt, null), e
    }

    function zo(n, t) {
        return t === mo || t === yo ? 1 : t === vo || t === xo ? 2 : t === Ao || t === bo || t === Hn ? 4 : 0
    }
    const ii = ["position", "positions", "a_position"];

    function Io(n, t) {
        let e, i;
        for (i = 0; i < ii.length && (e = ii[i], !(e in t || (e = Xn.attribPrefix + e, e in t))); ++i);
        i === ii.length && (e = Object.keys(t)[0]);
        const r = t[e];
        if (!r.buffer) return 1;
        n.bindBuffer(Kt, r.buffer);
        const s = n.getBufferParameter(Kt, go);
        n.bindBuffer(Kt, null);
        const o = zo(n, r.type),
            a = s / o,
            l = r.numComponents || r.size,
            u = a / l;
        if (u % 1 !== 0) throw new Error(`numComponents ${l} not correct for length ${length}`);
        return u
    }

    function Kn(n, t, e) {
        const i = Ro(n, t),
            r = Object.assign({}, e || {});
        r.attribs = Object.assign({}, e ? e.attribs : {}, i);
        const s = t.indices;
        if (s) {
            const o = jn(s, "indices");
            r.indices = Wn(n, o, po), r.numElements = o.length, r.elementType = Un(o)
        } else r.numElements || (r.numElements = Io(n, r.attribs));
        return r
    }

    function Bi(n) {
        return !!n.texStorage2D
    }
    const Bo = function() {
            const n = {},
                t = {};

            function e(i) {
                const r = i.constructor.name;
                if (!n[r]) {
                    for (const s in i)
                        if (typeof i[s] == "number") {
                            const o = t[i[s]];
                            t[i[s]] = o ? `${o} | ${s}` : s
                        } n[r] = !0
                }
            }
            return function(r, s) {
                return e(r), t[s] || (typeof s == "number" ? `0x${s.toString(16)}` : s)
            }
        }(),
        Li = fo;

    function Qn(n) {
        return typeof document < "u" && document.getElementById ? document.getElementById(n) : null
    }
    const ze = 33984,
        He = 34962,
        Lo = 34963,
        $o = 35713,
        Uo = 35714,
        No = 35632,
        Vo = 35633,
        Yo = 35981,
        Zn = 35718,
        Go = 35721,
        Ho = 35971,
        Xo = 35382,
        Wo = 35396,
        qo = 35398,
        jo = 35392,
        Ko = 35395,
        Xe = 5126,
        Jn = 35664,
        tr = 35665,
        er = 35666,
        $i = 5124,
        ir = 35667,
        nr = 35668,
        rr = 35669,
        sr = 35670,
        or = 35671,
        ar = 35672,
        lr = 35673,
        ur = 35674,
        cr = 35675,
        hr = 35676,
        Qo = 35678,
        Zo = 35680,
        Jo = 35679,
        ta = 35682,
        ea = 35685,
        ia = 35686,
        na = 35687,
        ra = 35688,
        sa = 35689,
        oa = 35690,
        aa = 36289,
        la = 36292,
        ua = 36293,
        Ui = 5125,
        fr = 36294,
        _r = 36295,
        dr = 36296,
        ca = 36298,
        ha = 36299,
        fa = 36300,
        _a = 36303,
        da = 36306,
        pa = 36307,
        ga = 36308,
        ma = 36311,
        We = 3553,
        qe = 34067,
        Ni = 32879,
        je = 35866,
        P = {};

    function pr(n, t) {
        return P[t].bindPoint
    }

    function ya(n, t) {
        return function(e) {
            n.uniform1f(t, e)
        }
    }

    function va(n, t) {
        return function(e) {
            n.uniform1fv(t, e)
        }
    }

    function xa(n, t) {
        return function(e) {
            n.uniform2fv(t, e)
        }
    }

    function Aa(n, t) {
        return function(e) {
            n.uniform3fv(t, e)
        }
    }

    function ba(n, t) {
        return function(e) {
            n.uniform4fv(t, e)
        }
    }

    function gr(n, t) {
        return function(e) {
            n.uniform1i(t, e)
        }
    }

    function mr(n, t) {
        return function(e) {
            n.uniform1iv(t, e)
        }
    }

    function yr(n, t) {
        return function(e) {
            n.uniform2iv(t, e)
        }
    }

    function vr(n, t) {
        return function(e) {
            n.uniform3iv(t, e)
        }
    }

    function xr(n, t) {
        return function(e) {
            n.uniform4iv(t, e)
        }
    }

    function wa(n, t) {
        return function(e) {
            n.uniform1ui(t, e)
        }
    }

    function Ta(n, t) {
        return function(e) {
            n.uniform1uiv(t, e)
        }
    }

    function Ea(n, t) {
        return function(e) {
            n.uniform2uiv(t, e)
        }
    }

    function Sa(n, t) {
        return function(e) {
            n.uniform3uiv(t, e)
        }
    }

    function Ca(n, t) {
        return function(e) {
            n.uniform4uiv(t, e)
        }
    }

    function Pa(n, t) {
        return function(e) {
            n.uniformMatrix2fv(t, !1, e)
        }
    }

    function ka(n, t) {
        return function(e) {
            n.uniformMatrix3fv(t, !1, e)
        }
    }

    function Fa(n, t) {
        return function(e) {
            n.uniformMatrix4fv(t, !1, e)
        }
    }

    function Ma(n, t) {
        return function(e) {
            n.uniformMatrix2x3fv(t, !1, e)
        }
    }

    function Da(n, t) {
        return function(e) {
            n.uniformMatrix3x2fv(t, !1, e)
        }
    }

    function Oa(n, t) {
        return function(e) {
            n.uniformMatrix2x4fv(t, !1, e)
        }
    }

    function Ra(n, t) {
        return function(e) {
            n.uniformMatrix4x2fv(t, !1, e)
        }
    }

    function za(n, t) {
        return function(e) {
            n.uniformMatrix3x4fv(t, !1, e)
        }
    }

    function Ia(n, t) {
        return function(e) {
            n.uniformMatrix4x3fv(t, !1, e)
        }
    }

    function J(n, t, e, i) {
        const r = pr(n, t);
        return Bi(n) ? function(s) {
            let o, a;
            !s || Yn(n, s) ? (o = s, a = null) : (o = s.texture, a = s.sampler), n.uniform1i(i, e), n.activeTexture(
                ze + e), n.bindTexture(r, o), n.bindSampler(e, a)
        } : function(s) {
            n.uniform1i(i, e), n.activeTexture(ze + e), n.bindTexture(r, s)
        }
    }

    function tt(n, t, e, i, r) {
        const s = pr(n, t),
            o = new Int32Array(r);
        for (let a = 0; a < r; ++a) o[a] = e + a;
        return Bi(n) ? function(a) {
            n.uniform1iv(i, o), a.forEach(function(l, u) {
                n.activeTexture(ze + o[u]);
                let c, h;
                !l || Yn(n, l) ? (c = l, h = null) : (c = l.texture, h = l.sampler), n.bindSampler(e, h), n
                    .bindTexture(s, c)
            })
        } : function(a) {
            n.uniform1iv(i, o), a.forEach(function(l, u) {
                n.activeTexture(ze + o[u]), n.bindTexture(s, l)
            })
        }
    }
    P[Xe] = {
        Type: Float32Array,
        size: 4,
        setter: ya,
        arraySetter: va
    };
    P[Jn] = {
        Type: Float32Array,
        size: 8,
        setter: xa,
        cols: 2
    };
    P[tr] = {
        Type: Float32Array,
        size: 12,
        setter: Aa,
        cols: 3
    };
    P[er] = {
        Type: Float32Array,
        size: 16,
        setter: ba,
        cols: 4
    };
    P[$i] = {
        Type: Int32Array,
        size: 4,
        setter: gr,
        arraySetter: mr
    };
    P[ir] = {
        Type: Int32Array,
        size: 8,
        setter: yr,
        cols: 2
    };
    P[nr] = {
        Type: Int32Array,
        size: 12,
        setter: vr,
        cols: 3
    };
    P[rr] = {
        Type: Int32Array,
        size: 16,
        setter: xr,
        cols: 4
    };
    P[Ui] = {
        Type: Uint32Array,
        size: 4,
        setter: wa,
        arraySetter: Ta
    };
    P[fr] = {
        Type: Uint32Array,
        size: 8,
        setter: Ea,
        cols: 2
    };
    P[_r] = {
        Type: Uint32Array,
        size: 12,
        setter: Sa,
        cols: 3
    };
    P[dr] = {
        Type: Uint32Array,
        size: 16,
        setter: Ca,
        cols: 4
    };
    P[sr] = {
        Type: Uint32Array,
        size: 4,
        setter: gr,
        arraySetter: mr
    };
    P[or] = {
        Type: Uint32Array,
        size: 8,
        setter: yr,
        cols: 2
    };
    P[ar] = {
        Type: Uint32Array,
        size: 12,
        setter: vr,
        cols: 3
    };
    P[lr] = {
        Type: Uint32Array,
        size: 16,
        setter: xr,
        cols: 4
    };
    P[ur] = {
        Type: Float32Array,
        size: 32,
        setter: Pa,
        rows: 2,
        cols: 2
    };
    P[cr] = {
        Type: Float32Array,
        size: 48,
        setter: ka,
        rows: 3,
        cols: 3
    };
    P[hr] = {
        Type: Float32Array,
        size: 64,
        setter: Fa,
        rows: 4,
        cols: 4
    };
    P[ea] = {
        Type: Float32Array,
        size: 32,
        setter: Ma,
        rows: 2,
        cols: 3
    };
    P[ia] = {
        Type: Float32Array,
        size: 32,
        setter: Oa,
        rows: 2,
        cols: 4
    };
    P[na] = {
        Type: Float32Array,
        size: 48,
        setter: Da,
        rows: 3,
        cols: 2
    };
    P[ra] = {
        Type: Float32Array,
        size: 48,
        setter: za,
        rows: 3,
        cols: 4
    };
    P[sa] = {
        Type: Float32Array,
        size: 64,
        setter: Ra,
        rows: 4,
        cols: 2
    };
    P[oa] = {
        Type: Float32Array,
        size: 64,
        setter: Ia,
        rows: 4,
        cols: 3
    };
    P[Qo] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: We
    };
    P[Zo] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: qe
    };
    P[Jo] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: Ni
    };
    P[ta] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: We
    };
    P[aa] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: je
    };
    P[la] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: je
    };
    P[ua] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: qe
    };
    P[ca] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: We
    };
    P[ha] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: Ni
    };
    P[fa] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: qe
    };
    P[_a] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: je
    };
    P[da] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: We
    };
    P[pa] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: Ni
    };
    P[ga] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: qe
    };
    P[ma] = {
        Type: null,
        size: 0,
        setter: J,
        arraySetter: tt,
        bindPoint: je
    };

    function Ke(n, t) {
        return function(e) {
            if (e.value) switch (n.disableVertexAttribArray(t), e.value.length) {
                case 4:
                    n.vertexAttrib4fv(t, e.value);
                    break;
                case 3:
                    n.vertexAttrib3fv(t, e.value);
                    break;
                case 2:
                    n.vertexAttrib2fv(t, e.value);
                    break;
                case 1:
                    n.vertexAttrib1fv(t, e.value);
                    break;
                default:
                    throw new Error("the length of a float constant value must be between 1 and 4!")
            } else n.bindBuffer(He, e.buffer), n.enableVertexAttribArray(t), n.vertexAttribPointer(t, e
                    .numComponents || e.size, e.type || Xe, e.normalize || !1, e.stride || 0, e.offset || 0), n
                .vertexAttribDivisor && n.vertexAttribDivisor(t, e.divisor || 0)
        }
    }

    function Vt(n, t) {
        return function(e) {
            if (e.value)
                if (n.disableVertexAttribArray(t), e.value.length === 4) n.vertexAttrib4iv(t, e.value);
                else throw new Error("The length of an integer constant value must be 4!");
            else n.bindBuffer(He, e.buffer), n.enableVertexAttribArray(t), n.vertexAttribIPointer(t, e
                    .numComponents || e.size, e.type || $i, e.stride || 0, e.offset || 0), n.vertexAttribDivisor &&
                n.vertexAttribDivisor(t, e.divisor || 0)
        }
    }

    function Qe(n, t) {
        return function(e) {
            if (e.value)
                if (n.disableVertexAttribArray(t), e.value.length === 4) n.vertexAttrib4uiv(t, e.value);
                else throw new Error("The length of an unsigned integer constant value must be 4!");
            else n.bindBuffer(He, e.buffer), n.enableVertexAttribArray(t), n.vertexAttribIPointer(t, e
                    .numComponents || e.size, e.type || Ui, e.stride || 0, e.offset || 0), n.vertexAttribDivisor &&
                n.vertexAttribDivisor(t, e.divisor || 0)
        }
    }

    function Vi(n, t, e) {
        const i = e.size,
            r = e.count;
        return function(s) {
            n.bindBuffer(He, s.buffer);
            const o = s.size || s.numComponents || i,
                a = o / r,
                l = s.type || Xe,
                c = P[l].size * o,
                h = s.normalize || !1,
                f = s.offset || 0,
                d = c / r;
            for (let g = 0; g < r; ++g) n.enableVertexAttribArray(t + g), n.vertexAttribPointer(t + g, a, l, h, c,
                f + d * g), n.vertexAttribDivisor && n.vertexAttribDivisor(t + g, s.divisor || 0)
        }
    }
    const H = {};
    H[Xe] = {
        size: 4,
        setter: Ke
    };
    H[Jn] = {
        size: 8,
        setter: Ke
    };
    H[tr] = {
        size: 12,
        setter: Ke
    };
    H[er] = {
        size: 16,
        setter: Ke
    };
    H[$i] = {
        size: 4,
        setter: Vt
    };
    H[ir] = {
        size: 8,
        setter: Vt
    };
    H[nr] = {
        size: 12,
        setter: Vt
    };
    H[rr] = {
        size: 16,
        setter: Vt
    };
    H[Ui] = {
        size: 4,
        setter: Qe
    };
    H[fr] = {
        size: 8,
        setter: Qe
    };
    H[_r] = {
        size: 12,
        setter: Qe
    };
    H[dr] = {
        size: 16,
        setter: Qe
    };
    H[sr] = {
        size: 4,
        setter: Vt
    };
    H[or] = {
        size: 8,
        setter: Vt
    };
    H[ar] = {
        size: 12,
        setter: Vt
    };
    H[lr] = {
        size: 16,
        setter: Vt
    };
    H[ur] = {
        size: 4,
        setter: Vi,
        count: 2
    };
    H[cr] = {
        size: 9,
        setter: Vi,
        count: 3
    };
    H[hr] = {
        size: 16,
        setter: Vi,
        count: 4
    };
    const Ba = /ERROR:\s*\d+:(\d+)/gi;

    function La(n, t = "", e = 0) {
        const i = [...t.matchAll(Ba)],
            r = new Map(i.map((s, o) => {
                const a = parseInt(s[1]),
                    l = i[o + 1],
                    u = l ? l.index : t.length,
                    c = t.substring(s.index, u);
                return [a - 1, c]
            }));
        return n.split(`
`).map((s, o) => {
            const a = r.get(o);
            return `${o+1+e}: ${s}${a?`

^^^ ${a}`:""}`
        }).join(`
`)
    }
    const gn = /^[ \t]*\n/;

    function Ar(n) {
        let t = 0;
        return gn.test(n) && (t = 1, n = n.replace(gn, "")), {
            lineOffset: t,
            shaderSource: n
        }
    }

    function $a(n, t) {
        return n.errorCallback(t), n.callback && setTimeout(() => {
            n.callback(`${t}
${n.errors.join(`
`)}`)
        }), null
    }

    function Ua(n, t, e, i) {
        if (i = i || Li, !n.getShaderParameter(e, $o)) {
            const s = n.getShaderInfoLog(e),
                {
                    lineOffset: o,
                    shaderSource: a
                } = Ar(n.getShaderSource(e)),
                l = `${La(a,s,o)}
Error compiling ${Bo(n,t)}: ${s}`;
            return i(l), l
        }
        return ""
    }

    function Yi(n, t, e) {
        let i, r, s;
        if (typeof t == "function" && (e = t, t = void 0), typeof n == "function") e = n, n = void 0;
        else if (n && !Array.isArray(n)) {
            const u = n;
            e = u.errorCallback, n = u.attribLocations, i = u.transformFeedbackVaryings, r = u.transformFeedbackMode,
                s = u.callback
        }
        const o = e || Li,
            a = [],
            l = {
                errorCallback(u, ...c) {
                    a.push(u), o(u, ...c)
                },
                transformFeedbackVaryings: i,
                transformFeedbackMode: r,
                callback: s,
                errors: a
            };
        {
            let u = {};
            Array.isArray(n) ? n.forEach(function(c, h) {
                u[c] = t ? t[h] : h
            }) : u = n || {}, l.attribLocations = u
        }
        return l
    }
    const Na = ["VERTEX_SHADER", "FRAGMENT_SHADER"];

    function Va(n, t) {
        if (t.indexOf("frag") >= 0) return No;
        if (t.indexOf("vert") >= 0) return Vo
    }

    function Ya(n, t, e) {
        const i = n.getAttachedShaders(t);
        for (const r of i) e.has(r) && n.deleteShader(r);
        n.deleteProgram(t)
    }
    const Ga = (n = 0) => new Promise(t => setTimeout(t, n));

    function Ha(n, t, e) {
        const i = n.createProgram(),
            {
                attribLocations: r,
                transformFeedbackVaryings: s,
                transformFeedbackMode: o
            } = Yi(e);
        for (let a = 0; a < t.length; ++a) {
            let l = t[a];
            if (typeof l == "string") {
                const u = Qn(l),
                    c = u ? u.text : l;
                let h = n[Na[a]];
                u && u.type && (h = Va(n, u.type) || h), l = n.createShader(h), n.shaderSource(l, Ar(c).shaderSource), n
                    .compileShader(l), n.attachShader(i, l)
            }
        }
        Object.entries(r).forEach(([a, l]) => n.bindAttribLocation(i, l, a));
        {
            let a = s;
            a && (a.attribs && (a = a.attribs), Array.isArray(a) || (a = Object.keys(a)), n.transformFeedbackVaryings(i,
                a, o || Yo))
        }
        return n.linkProgram(i), i
    }

    function Xa(n, t, e, i, r) {
        const s = Yi(e, i, r),
            o = new Set(t),
            a = Ha(n, t, s);

        function l(u, c) {
            const h = qa(u, c, s.errorCallback);
            return h && Ya(u, c, o), h
        }
        if (s.callback) {
            Wa(n, a).then(() => {
                const u = l(n, a);
                s.callback(u, u ? void 0 : a)
            });
            return
        }
        return l(n, a) ? void 0 : a
    }
    async function Wa(n, t) {
        const e = n.getExtension("KHR_parallel_shader_compile"),
            i = e ? (s, o) => s.getProgramParameter(o, e.COMPLETION_STATUS_KHR) : () => !0;
        let r = 0;
        do await Ga(r), r = 1e3 / 60; while (!i(n, t))
    }

    function qa(n, t, e) {
        if (e = e || Li, !n.getProgramParameter(t, Uo)) {
            const r = n.getProgramInfoLog(t);
            e(`Error in program linking: ${r}`);
            const o = n.getAttachedShaders(t).map(a => Ua(n, n.getShaderParameter(a, n.SHADER_TYPE), a, e));
            return `${r}
${o.filter(a=>a).join(`
`)}`
        }
    }

    function ja(n, t, e, i, r) {
        return Xa(n, t, e, i, r)
    }

    function br(n) {
        const t = n.name;
        return t.startsWith("gl_") || t.startsWith("webgl_")
    }
    const Ka = /(\.|\[|]|\w+)/g,
        Qa = n => n >= "0" && n <= "9";

    function Za(n, t, e, i) {
        const r = n.split(Ka).filter(a => a !== "");
        let s = 0,
            o = "";
        for (;;) {
            const a = r[s++];
            o += a;
            const l = Qa(a[0]),
                u = l ? parseInt(a) : a;
            if (l && (o += r[s++]), s === r.length) {
                e[u] = t;
                break
            } else {
                const h = r[s++],
                    f = h === "[",
                    d = e[u] || (f ? [] : {});
                e[u] = d, e = d, i[o] = i[o] || function(g) {
                    return function(_) {
                        wr(g, _)
                    }
                }(d), o += h
            }
        }
    }

    function Ja(n, t) {
        let e = 0;

        function i(a, l, u) {
            const c = l.name.endsWith("[0]"),
                h = l.type,
                f = P[h];
            if (!f) throw new Error(`unknown type: 0x${h.toString(16)}`);
            let d;
            if (f.bindPoint) {
                const g = e;
                e += l.size, c ? d = f.arraySetter(n, h, g, u, l.size) : d = f.setter(n, h, g, u, l.size)
            } else f.arraySetter && c ? d = f.arraySetter(n, u) : d = f.setter(n, u);
            return d.location = u, d
        }
        const r = {},
            s = {},
            o = n.getProgramParameter(t, Zn);
        for (let a = 0; a < o; ++a) {
            const l = n.getActiveUniform(t, a);
            if (br(l)) continue;
            let u = l.name;
            u.endsWith("[0]") && (u = u.substr(0, u.length - 3));
            const c = n.getUniformLocation(t, l.name);
            if (c) {
                const h = i(t, l, c);
                r[u] = h, Za(u, h, s, r)
            }
        }
        return r
    }

    function tl(n, t) {
        const e = {},
            i = n.getProgramParameter(t, Ho);
        for (let r = 0; r < i; ++r) {
            const s = n.getTransformFeedbackVarying(t, r);
            e[s.name] = {
                index: r,
                type: s.type,
                size: s.size
            }
        }
        return e
    }

    function el(n, t) {
        const e = n.getProgramParameter(t, Zn),
            i = [],
            r = [];
        for (let a = 0; a < e; ++a) {
            r.push(a), i.push({});
            const l = n.getActiveUniform(t, a);
            i[a].name = l.name
        } [
            ["UNIFORM_TYPE", "type"],
            ["UNIFORM_SIZE", "size"],
            ["UNIFORM_BLOCK_INDEX", "blockNdx"],
            ["UNIFORM_OFFSET", "offset"]
        ].forEach(function(a) {
            const l = a[0],
                u = a[1];
            n.getActiveUniforms(t, r, n[l]).forEach(function(c, h) {
                i[h][u] = c
            })
        });
        const s = {},
            o = n.getProgramParameter(t, Xo);
        for (let a = 0; a < o; ++a) {
            const l = n.getActiveUniformBlockName(t, a),
                u = {
                    index: n.getUniformBlockIndex(t, l),
                    usedByVertexShader: n.getActiveUniformBlockParameter(t, a, Wo),
                    usedByFragmentShader: n.getActiveUniformBlockParameter(t, a, qo),
                    size: n.getActiveUniformBlockParameter(t, a, jo),
                    uniformIndices: n.getActiveUniformBlockParameter(t, a, Ko)
                };
            u.used = u.usedByVertexShader || u.usedByFragmentShader, s[l] = u
        }
        return {
            blockSpecs: s,
            uniformData: i
        }
    }

    function wr(n, t) {
        for (const e in t) {
            const i = n[e];
            typeof i == "function" ? i(t[e]) : wr(n[e], t[e])
        }
    }

    function Qt(n, ...t) {
        const e = n.uniformSetters || n,
            i = t.length;
        for (let r = 0; r < i; ++r) {
            const s = t[r];
            if (Array.isArray(s)) {
                const o = s.length;
                for (let a = 0; a < o; ++a) Qt(e, s[a])
            } else
                for (const o in s) {
                    const a = e[o];
                    a && a(s[o])
                }
        }
    }

    function il(n, t) {
        const e = {},
            i = n.getProgramParameter(t, Go);
        for (let r = 0; r < i; ++r) {
            const s = n.getActiveAttrib(t, r);
            if (br(s)) continue;
            const o = n.getAttribLocation(t, s.name),
                a = H[s.type],
                l = a.setter(n, o, a);
            l.location = o, e[s.name] = l
        }
        return e
    }

    function nl(n, t) {
        for (const e in t) {
            const i = n[e];
            i && i(t[e])
        }
    }

    function Tr(n, t, e) {
        e.vertexArrayObject ? n.bindVertexArray(e.vertexArrayObject) : (nl(t.attribSetters || t, e.attribs), e
            .indices && n.bindBuffer(Lo, e.indices))
    }

    function mn(n, t) {
        const e = Ja(n, t),
            i = il(n, t),
            r = {
                program: t,
                uniformSetters: e,
                attribSetters: i
            };
        return Bi(n) && (r.uniformBlockSpec = el(n, t), r.transformFeedbackInfo = tl(n, t)), r
    }
    const rl = /\s|{|}|;/;

    function Er(n, t, e, i, r) {
        const s = Yi(e, i, r),
            o = [];
        if (t = t.map(function(u) {
                if (!rl.test(u)) {
                    const c = Qn(u);
                    if (c) u = c.text;
                    else {
                        const h = `no element with id: ${u}`;
                        s.errorCallback(h), o.push(h)
                    }
                }
                return u
            }), o.length) return $a(s, "");
        const a = s.callback;
        a && (s.callback = (u, c) => {
            a(u, u ? void 0 : mn(n, c))
        });
        const l = ja(n, t, s);
        return l ? mn(n, l) : null
    }
    const sl = 4,
        yn = 5123;

    function Sr(n, t, e, i, r, s) {
        e = e === void 0 ? sl : e;
        const o = t.indices,
            a = t.elementType,
            l = i === void 0 ? t.numElements : i;
        r = r === void 0 ? 0 : r, a || o ? s !== void 0 ? n.drawElementsInstanced(e, l, a === void 0 ? yn : t
                .elementType, r, s) : n.drawElements(e, l, a === void 0 ? yn : t.elementType, r) : s !== void 0 ? n
            .drawArraysInstanced(e, r, l, s) : n.drawArrays(e, r, l)
    }

    function ol(n, t) {
        t = t || 1, t = Math.max(0, t);
        const e = n.clientWidth * t | 0,
            i = n.clientHeight * t | 0;
        return n.width !== e || n.height !== i ? (n.width = e, n.height = i, !0) : !1
    }
    class al {
        constructor(t) {
            this.gl = t, this.y = 0, this.isActive = this.canScroll, document.onscroll = e => this.onScroll(e)
        }
        onScroll(t) {
            this.isActive && (this.y = window.scrollY * this.gl.vp.px)
        }
        resize(t) {
            this.gl = t, this.isActive = this.canScroll, this.y = window.scrollY * this.gl.vp.px
        }
        get canScroll() {
            return document.documentElement.scrollHeight > window.innerHeight
        }
    }
    class ll {
        constructor(t, e = {
            z: -9,
            fov: .6,
            near: 1,
            far: 1024
        }) {
            e.fov = ul(35), this.camera = e
        }
        get(t) {
            return this.camera.mat = dn.translate(dn.perspective(this.camera.fov, t.canvas.width / t.canvas.height,
                this.camera.near, this.camera.far), [0, 0, this.camera.z]), this.camera
        }
    }

    function ul(n) {
        return n * Math.PI / 180
    }
    /**
     * lil-gui
     * https://lil-gui.georgealways.com
     * @version 0.18.1
     * @author George Michael Brower
     * @license MIT
     */
    class Et {
        constructor(t, e, i, r, s = "div") {
            this.parent = t, this.object = e, this.property = i, this._disabled = !1, this._hidden = !1, this
                .initialValue = this.getValue(), this.domElement = document.createElement("div"), this.domElement
                .classList.add("controller"), this.domElement.classList.add(r), this.$name = document.createElement(
                    "div"), this.$name.classList.add("name"), Et.nextNameID = Et.nextNameID || 0, this.$name.id =
                `lil-gui-name-${++Et.nextNameID}`, this.$widget = document.createElement(s), this.$widget.classList
                .add("widget"), this.$disable = this.$widget, this.domElement.appendChild(this.$name), this
                .domElement.appendChild(this.$widget), this.parent.children.push(this), this.parent.controllers
                .push(this), this.parent.$children.appendChild(this.domElement), this._listenCallback = this
                ._listenCallback.bind(this), this.name(i)
        }
        name(t) {
            return this._name = t, this.$name.innerHTML = t, this
        }
        onChange(t) {
            return this._onChange = t, this
        }
        _callOnChange() {
            this.parent._callOnChange(this), this._onChange !== void 0 && this._onChange.call(this, this
                .getValue()), this._changed = !0
        }
        onFinishChange(t) {
            return this._onFinishChange = t, this
        }
        _callOnFinishChange() {
            this._changed && (this.parent._callOnFinishChange(this), this._onFinishChange !== void 0 && this
                ._onFinishChange.call(this, this.getValue())), this._changed = !1
        }
        reset() {
            return this.setValue(this.initialValue), this._callOnFinishChange(), this
        }
        enable(t = !0) {
            return this.disable(!t)
        }
        disable(t = !0) {
            return t === this._disabled ? this : (this._disabled = t, this.domElement.classList.toggle("disabled",
                t), this.$disable.toggleAttribute("disabled", t), this)
        }
        show(t = !0) {
            return this._hidden = !t, this.domElement.style.display = this._hidden ? "none" : "", this
        }
        hide() {
            return this.show(!1)
        }
        options(t) {
            const e = this.parent.add(this.object, this.property, t);
            return e.name(this._name), this.destroy(), e
        }
        min(t) {
            return this
        }
        max(t) {
            return this
        }
        step(t) {
            return this
        }
        decimals(t) {
            return this
        }
        listen(t = !0) {
            return this._listening = t, this._listenCallbackID !== void 0 && (cancelAnimationFrame(this
                    ._listenCallbackID), this._listenCallbackID = void 0), this._listening && this
                ._listenCallback(), this
        }
        _listenCallback() {
            this._listenCallbackID = requestAnimationFrame(this._listenCallback);
            const t = this.save();
            t !== this._listenPrevValue && this.updateDisplay(), this._listenPrevValue = t
        }
        getValue() {
            return this.object[this.property]
        }
        setValue(t) {
            return this.object[this.property] = t, this._callOnChange(), this.updateDisplay(), this
        }
        updateDisplay() {
            return this
        }
        load(t) {
            return this.setValue(t), this._callOnFinishChange(), this
        }
        save() {
            return this.getValue()
        }
        destroy() {
            this.listen(!1), this.parent.children.splice(this.parent.children.indexOf(this), 1), this.parent
                .controllers.splice(this.parent.controllers.indexOf(this), 1), this.parent.$children.removeChild(
                    this.domElement)
        }
    }
    class cl extends Et {
        constructor(t, e, i) {
            super(t, e, i, "boolean", "label"), this.$input = document.createElement("input"), this.$input
                .setAttribute("type", "checkbox"), this.$input.setAttribute("aria-labelledby", this.$name.id), this
                .$widget.appendChild(this.$input), this.$input.addEventListener("change", () => {
                    this.setValue(this.$input.checked), this._callOnFinishChange()
                }), this.$disable = this.$input, this.updateDisplay()
        }
        updateDisplay() {
            return this.$input.checked = this.getValue(), this
        }
    }

    function di(n) {
        let t, e;
        return (t = n.match(/(#|0x)?([a-f0-9]{6})/i)) ? e = t[2] : (t = n.match(
                /rgb\(\s*(\d*)\s*,\s*(\d*)\s*,\s*(\d*)\s*\)/)) ? e = parseInt(t[1]).toString(16).padStart(2, 0) +
            parseInt(t[2]).toString(16).padStart(2, 0) + parseInt(t[3]).toString(16).padStart(2, 0) : (t = n.match(
                /^#?([a-f0-9])([a-f0-9])([a-f0-9])$/i)) && (e = t[1] + t[1] + t[2] + t[2] + t[3] + t[3]), e ? "#" + e :
            !1
    }
    const hl = {
            isPrimitive: !0,
            match: n => typeof n == "string",
            fromHexString: di,
            toHexString: di
        },
        we = {
            isPrimitive: !0,
            match: n => typeof n == "number",
            fromHexString: n => parseInt(n.substring(1), 16),
            toHexString: n => "#" + n.toString(16).padStart(6, 0)
        },
        fl = {
            isPrimitive: !1,
            match: n => Array.isArray(n),
            fromHexString(n, t, e = 1) {
                const i = we.fromHexString(n);
                t[0] = (i >> 16 & 255) / 255 * e, t[1] = (i >> 8 & 255) / 255 * e, t[2] = (i & 255) / 255 * e
            },
            toHexString([n, t, e], i = 1) {
                i = 255 / i;
                const r = n * i << 16 ^ t * i << 8 ^ e * i << 0;
                return we.toHexString(r)
            }
        },
        _l = {
            isPrimitive: !1,
            match: n => Object(n) === n,
            fromHexString(n, t, e = 1) {
                const i = we.fromHexString(n);
                t.r = (i >> 16 & 255) / 255 * e, t.g = (i >> 8 & 255) / 255 * e, t.b = (i & 255) / 255 * e
            },
            toHexString({
                r: n,
                g: t,
                b: e
            }, i = 1) {
                i = 255 / i;
                const r = n * i << 16 ^ t * i << 8 ^ e * i << 0;
                return we.toHexString(r)
            }
        },
        dl = [hl, we, fl, _l];

    function pl(n) {
        return dl.find(t => t.match(n))
    }
    class gl extends Et {
        constructor(t, e, i, r) {
            super(t, e, i, "color"), this.$input = document.createElement("input"), this.$input.setAttribute("type",
                    "color"), this.$input.setAttribute("tabindex", -1), this.$input.setAttribute("aria-labelledby",
                    this.$name.id), this.$text = document.createElement("input"), this.$text.setAttribute("type",
                    "text"), this.$text.setAttribute("spellcheck", "false"), this.$text.setAttribute(
                    "aria-labelledby", this.$name.id), this.$display = document.createElement("div"), this.$display
                .classList.add("display"), this.$display.appendChild(this.$input), this.$widget.appendChild(this
                    .$display), this.$widget.appendChild(this.$text), this._format = pl(this.initialValue), this
                ._rgbScale = r, this._initialValueHexString = this.save(), this._textFocused = !1, this.$input
                .addEventListener("input", () => {
                    this._setValueFromHexString(this.$input.value)
                }), this.$input.addEventListener("blur", () => {
                    this._callOnFinishChange()
                }), this.$text.addEventListener("input", () => {
                    const s = di(this.$text.value);
                    s && this._setValueFromHexString(s)
                }), this.$text.addEventListener("focus", () => {
                    this._textFocused = !0, this.$text.select()
                }), this.$text.addEventListener("blur", () => {
                    this._textFocused = !1, this.updateDisplay(), this._callOnFinishChange()
                }), this.$disable = this.$text, this.updateDisplay()
        }
        reset() {
            return this._setValueFromHexString(this._initialValueHexString), this
        }
        _setValueFromHexString(t) {
            if (this._format.isPrimitive) {
                const e = this._format.fromHexString(t);
                this.setValue(e)
            } else this._format.fromHexString(t, this.getValue(), this._rgbScale), this._callOnChange(), this
                .updateDisplay()
        }
        save() {
            return this._format.toHexString(this.getValue(), this._rgbScale)
        }
        load(t) {
            return this._setValueFromHexString(t), this._callOnFinishChange(), this
        }
        updateDisplay() {
            return this.$input.value = this._format.toHexString(this.getValue(), this._rgbScale), this
                ._textFocused || (this.$text.value = this.$input.value.substring(1)), this.$display.style
                .backgroundColor = this.$input.value, this
        }
    }
    class ni extends Et {
        constructor(t, e, i) {
            super(t, e, i, "function"), this.$button = document.createElement("button"), this.$button.appendChild(
                this.$name), this.$widget.appendChild(this.$button), this.$button.addEventListener("click",
                r => {
                    r.preventDefault(), this.getValue().call(this.object), this._callOnChange()
                }), this.$button.addEventListener("touchstart", () => {}, {
                passive: !0
            }), this.$disable = this.$button
        }
    }
    class ml extends Et {
        constructor(t, e, i, r, s, o) {
            super(t, e, i, "number"), this._initInput(), this.min(r), this.max(s);
            const a = o !== void 0;
            this.step(a ? o : this._getImplicitStep(), a), this.updateDisplay()
        }
        decimals(t) {
            return this._decimals = t, this.updateDisplay(), this
        }
        min(t) {
            return this._min = t, this._onUpdateMinMax(), this
        }
        max(t) {
            return this._max = t, this._onUpdateMinMax(), this
        }
        step(t, e = !0) {
            return this._step = t, this._stepExplicit = e, this
        }
        updateDisplay() {
            const t = this.getValue();
            if (this._hasSlider) {
                let e = (t - this._min) / (this._max - this._min);
                e = Math.max(0, Math.min(e, 1)), this.$fill.style.width = e * 100 + "%"
            }
            return this._inputFocused || (this.$input.value = this._decimals === void 0 ? t : t.toFixed(this
                ._decimals)), this
        }
        _initInput() {
            this.$input = document.createElement("input"), this.$input.setAttribute("type", "number"), this.$input
                .setAttribute("step", "any"), this.$input.setAttribute("aria-labelledby", this.$name.id), this
                .$widget.appendChild(this.$input), this.$disable = this.$input;
            const t = () => {
                    let p = parseFloat(this.$input.value);
                    isNaN(p) || (this._stepExplicit && (p = this._snap(p)), this.setValue(this._clamp(p)))
                },
                e = p => {
                    const y = parseFloat(this.$input.value);
                    isNaN(y) || (this._snapClampSetValue(y + p), this.$input.value = this.getValue())
                },
                i = p => {
                    p.code === "Enter" && this.$input.blur(), p.code === "ArrowUp" && (p.preventDefault(), e(this
                        ._step * this._arrowKeyMultiplier(p))), p.code === "ArrowDown" && (p.preventDefault(),
                        e(this._step * this._arrowKeyMultiplier(p) * -1))
                },
                r = p => {
                    this._inputFocused && (p.preventDefault(), e(this._step * this._normalizeMouseWheel(p)))
                };
            let s = !1,
                o, a, l, u, c;
            const h = 5,
                f = p => {
                    o = p.clientX, a = l = p.clientY, s = !0, u = this.getValue(), c = 0, window.addEventListener(
                        "mousemove", d), window.addEventListener("mouseup", g)
                },
                d = p => {
                    if (s) {
                        const y = p.clientX - o,
                            v = p.clientY - a;
                        Math.abs(v) > h ? (p.preventDefault(), this.$input.blur(), s = !1, this._setDraggingStyle(!
                            0, "vertical")) : Math.abs(y) > h && g()
                    }
                    if (!s) {
                        const y = p.clientY - l;
                        c -= y * this._step * this._arrowKeyMultiplier(p), u + c > this._max ? c = this._max - u :
                            u + c < this._min && (c = this._min - u), this._snapClampSetValue(u + c)
                    }
                    l = p.clientY
                },
                g = () => {
                    this._setDraggingStyle(!1, "vertical"), this._callOnFinishChange(), window.removeEventListener(
                        "mousemove", d), window.removeEventListener("mouseup", g)
                },
                _ = () => {
                    this._inputFocused = !0
                },
                m = () => {
                    this._inputFocused = !1, this.updateDisplay(), this._callOnFinishChange()
                };
            this.$input.addEventListener("input", t), this.$input.addEventListener("keydown", i), this.$input
                .addEventListener("wheel", r, {
                    passive: !1
                }), this.$input.addEventListener("mousedown", f), this.$input.addEventListener("focus", _), this
                .$input.addEventListener("blur", m)
        }
        _initSlider() {
            this._hasSlider = !0, this.$slider = document.createElement("div"), this.$slider.classList.add(
                    "slider"), this.$fill = document.createElement("div"), this.$fill.classList.add("fill"), this
                .$slider.appendChild(this.$fill), this.$widget.insertBefore(this.$slider, this.$input), this
                .domElement.classList.add("hasSlider");
            const t = (p, y, v, A, x) => (p - y) / (v - y) * (x - A) + A,
                e = p => {
                    const y = this.$slider.getBoundingClientRect();
                    let v = t(p, y.left, y.right, this._min, this._max);
                    this._snapClampSetValue(v)
                },
                i = p => {
                    this._setDraggingStyle(!0), e(p.clientX), window.addEventListener("mousemove", r), window
                        .addEventListener("mouseup", s)
                },
                r = p => {
                    e(p.clientX)
                },
                s = () => {
                    this._callOnFinishChange(), this._setDraggingStyle(!1), window.removeEventListener("mousemove",
                        r), window.removeEventListener("mouseup", s)
                };
            let o = !1,
                a, l;
            const u = p => {
                    p.preventDefault(), this._setDraggingStyle(!0), e(p.touches[0].clientX), o = !1
                },
                c = p => {
                    p.touches.length > 1 || (this._hasScrollBar ? (a = p.touches[0].clientX, l = p.touches[0]
                        .clientY, o = !0) : u(p), window.addEventListener("touchmove", h, {
                        passive: !1
                    }), window.addEventListener("touchend", f))
                },
                h = p => {
                    if (o) {
                        const y = p.touches[0].clientX - a,
                            v = p.touches[0].clientY - l;
                        Math.abs(y) > Math.abs(v) ? u(p) : (window.removeEventListener("touchmove", h), window
                            .removeEventListener("touchend", f))
                    } else p.preventDefault(), e(p.touches[0].clientX)
                },
                f = () => {
                    this._callOnFinishChange(), this._setDraggingStyle(!1), window.removeEventListener("touchmove",
                        h), window.removeEventListener("touchend", f)
                },
                d = this._callOnFinishChange.bind(this),
                g = 400;
            let _;
            const m = p => {
                if (Math.abs(p.deltaX) < Math.abs(p.deltaY) && this._hasScrollBar) return;
                p.preventDefault();
                const v = this._normalizeMouseWheel(p) * this._step;
                this._snapClampSetValue(this.getValue() + v), this.$input.value = this.getValue(), clearTimeout(
                    _), _ = setTimeout(d, g)
            };
            this.$slider.addEventListener("mousedown", i), this.$slider.addEventListener("touchstart", c, {
                passive: !1
            }), this.$slider.addEventListener("wheel", m, {
                passive: !1
            })
        }
        _setDraggingStyle(t, e = "horizontal") {
            this.$slider && this.$slider.classList.toggle("active", t), document.body.classList.toggle(
                "lil-gui-dragging", t), document.body.classList.toggle(`lil-gui-${e}`, t)
        }
        _getImplicitStep() {
            return this._hasMin && this._hasMax ? (this._max - this._min) / 1e3 : .1
        }
        _onUpdateMinMax() {
            !this._hasSlider && this._hasMin && this._hasMax && (this._stepExplicit || this.step(this
                ._getImplicitStep(), !1), this._initSlider(), this.updateDisplay())
        }
        _normalizeMouseWheel(t) {
            let {
                deltaX: e,
                deltaY: i
            } = t;
            return Math.floor(t.deltaY) !== t.deltaY && t.wheelDelta && (e = 0, i = -t.wheelDelta / 120, i *= this
                ._stepExplicit ? 1 : 10), e + -i
        }
        _arrowKeyMultiplier(t) {
            let e = this._stepExplicit ? 1 : 10;
            return t.shiftKey ? e *= 10 : t.altKey && (e /= 10), e
        }
        _snap(t) {
            const e = Math.round(t / this._step) * this._step;
            return parseFloat(e.toPrecision(15))
        }
        _clamp(t) {
            return t < this._min && (t = this._min), t > this._max && (t = this._max), t
        }
        _snapClampSetValue(t) {
            this.setValue(this._clamp(this._snap(t)))
        }
        get _hasScrollBar() {
            const t = this.parent.root.$children;
            return t.scrollHeight > t.clientHeight
        }
        get _hasMin() {
            return this._min !== void 0
        }
        get _hasMax() {
            return this._max !== void 0
        }
    }
    class yl extends Et {
        constructor(t, e, i, r) {
            super(t, e, i, "option"), this.$select = document.createElement("select"), this.$select.setAttribute(
                    "aria-labelledby", this.$name.id), this.$display = document.createElement("div"), this.$display
                .classList.add("display"), this._values = Array.isArray(r) ? r : Object.values(r), this._names =
                Array.isArray(r) ? r : Object.keys(r), this._names.forEach(s => {
                    const o = document.createElement("option");
                    o.innerHTML = s, this.$select.appendChild(o)
                }), this.$select.addEventListener("change", () => {
                    this.setValue(this._values[this.$select.selectedIndex]), this._callOnFinishChange()
                }), this.$select.addEventListener("focus", () => {
                    this.$display.classList.add("focus")
                }), this.$select.addEventListener("blur", () => {
                    this.$display.classList.remove("focus")
                }), this.$widget.appendChild(this.$select), this.$widget.appendChild(this.$display), this.$disable =
                this.$select, this.updateDisplay()
        }
        updateDisplay() {
            const t = this.getValue(),
                e = this._values.indexOf(t);
            return this.$select.selectedIndex = e, this.$display.innerHTML = e === -1 ? t : this._names[e], this
        }
    }
    class vl extends Et {
        constructor(t, e, i) {
            super(t, e, i, "string"), this.$input = document.createElement("input"), this.$input.setAttribute(
                    "type", "text"), this.$input.setAttribute("aria-labelledby", this.$name.id), this.$input
                .addEventListener("input", () => {
                    this.setValue(this.$input.value)
                }), this.$input.addEventListener("keydown", r => {
                    r.code === "Enter" && this.$input.blur()
                }), this.$input.addEventListener("blur", () => {
                    this._callOnFinishChange()
                }), this.$widget.appendChild(this.$input), this.$disable = this.$input, this.updateDisplay()
        }
        updateDisplay() {
            return this.$input.value = this.getValue(), this
        }
    }
    const xl = `.lil-gui {
    display: none !important;
  font-family: var(--font-family);
  font-size: var(--font-size);
  line-height: 1;
  font-weight: normal;
  font-style: normal;
  text-align: left;
  background-color: var(--background-color);
  color: var(--text-color);
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  --background-color: #1f1f1f;
  --text-color: #ebebeb;
  --title-background-color: #111111;
  --title-text-color: #ebebeb;
  --widget-color: #424242;
  --hover-color: #4f4f4f;
  --focus-color: #595959;
  --number-color: #2cc9ff;
  --string-color: #a2db3c;
  --font-size: 11px;
  --input-font-size: 11px;
  --font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
  --font-family-mono: Menlo, Monaco, Consolas, "Droid Sans Mono", monospace;
  --padding: 4px;
  --spacing: 4px;
  --widget-height: 20px;
  --title-height: calc(var(--widget-height) + var(--spacing) * 1.25);
  --name-width: 45%;
  --slider-knob-width: 2px;
  --slider-input-width: 27%;
  --color-input-width: 27%;
  --slider-input-min-width: 45px;
  --color-input-min-width: 45px;
  --folder-indent: 7px;
  --widget-padding: 0 0 0 3px;
  --widget-border-radius: 2px;
  --checkbox-size: calc(0.75 * var(--widget-height));
  --scrollbar-width: 5px;
}
.lil-gui, .lil-gui * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
.lil-gui.root {
  width: var(--width, 245px);
  display: flex;
  flex-direction: column;
}
.lil-gui.root > .title {
  background: var(--title-background-color);
  color: var(--title-text-color);
}
.lil-gui.root > .children {
  overflow-x: hidden;
  overflow-y: auto;
}
.lil-gui.root > .children::-webkit-scrollbar {
  width: var(--scrollbar-width);
  height: var(--scrollbar-width);
  background: var(--background-color);
}
.lil-gui.root > .children::-webkit-scrollbar-thumb {
  border-radius: var(--scrollbar-width);
  background: var(--focus-color);
}
@media (pointer: coarse) {
  .lil-gui.allow-touch-styles {
    --widget-height: 28px;
    --padding: 6px;
    --spacing: 6px;
    --font-size: 13px;
    --input-font-size: 16px;
    --folder-indent: 10px;
    --scrollbar-width: 7px;
    --slider-input-min-width: 50px;
    --color-input-min-width: 65px;
  }
}
.lil-gui.force-touch-styles {
  --widget-height: 28px;
  --padding: 6px;
  --spacing: 6px;
  --font-size: 13px;
  --input-font-size: 16px;
  --folder-indent: 10px;
  --scrollbar-width: 7px;
  --slider-input-min-width: 50px;
  --color-input-min-width: 65px;
}
.lil-gui.autoPlace {
  max-height: 100%;
  position: fixed;
  top: 0;
  right: 15px;
  z-index: 1001;
}

.lil-gui .controller {
  display: flex;
  align-items: center;
  padding: 0 var(--padding);
  margin: var(--spacing) 0;
}
.lil-gui .controller.disabled {
  opacity: 0.5;
}
.lil-gui .controller.disabled, .lil-gui .controller.disabled * {
  pointer-events: none !important;
}
.lil-gui .controller > .name {
  min-width: var(--name-width);
  flex-shrink: 0;
  white-space: pre;
  padding-right: var(--spacing);
  line-height: var(--widget-height);
}
.lil-gui .controller .widget {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
  min-height: var(--widget-height);
}
.lil-gui .controller.string input {
  color: var(--string-color);
}
.lil-gui .controller.boolean .widget {
  cursor: pointer;
}
.lil-gui .controller.color .display {
  width: 100%;
  height: var(--widget-height);
  border-radius: var(--widget-border-radius);
  position: relative;
}
@media (hover: hover) {
  .lil-gui .controller.color .display:hover:before {
    content: " ";
    display: block;
    position: absolute;
    border-radius: var(--widget-border-radius);
    border: 1px solid #fff9;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
  }
}
.lil-gui .controller.color input[type=color] {
  opacity: 0;
  width: 100%;
  height: 100%;
  cursor: pointer;
}
.lil-gui .controller.color input[type=text] {
  margin-left: var(--spacing);
  font-family: var(--font-family-mono);
  min-width: var(--color-input-min-width);
  width: var(--color-input-width);
  flex-shrink: 0;
}
.lil-gui .controller.option select {
  opacity: 0;
  position: absolute;
  width: 100%;
  max-width: 100%;
}
.lil-gui .controller.option .display {
  position: relative;
  pointer-events: none;
  border-radius: var(--widget-border-radius);
  height: var(--widget-height);
  line-height: var(--widget-height);
  max-width: 100%;
  overflow: hidden;
  word-break: break-all;
  padding-left: 0.55em;
  padding-right: 1.75em;
  background: var(--widget-color);
}
@media (hover: hover) {
  .lil-gui .controller.option .display.focus {
    background: var(--focus-color);
  }
}
.lil-gui .controller.option .display.active {
  background: var(--focus-color);
}
.lil-gui .controller.option .display:after {
  font-family: "lil-gui";
  content: "↕";
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  padding-right: 0.375em;
}
.lil-gui .controller.option .widget,
.lil-gui .controller.option select {
  cursor: pointer;
}
@media (hover: hover) {
  .lil-gui .controller.option .widget:hover .display {
    background: var(--hover-color);
  }
}
.lil-gui .controller.number input {
  color: var(--number-color);
}
.lil-gui .controller.number.hasSlider input {
  margin-left: var(--spacing);
  width: var(--slider-input-width);
  min-width: var(--slider-input-min-width);
  flex-shrink: 0;
}
.lil-gui .controller.number .slider {
  width: 100%;
  height: var(--widget-height);
  background-color: var(--widget-color);
  border-radius: var(--widget-border-radius);
  padding-right: var(--slider-knob-width);
  overflow: hidden;
  cursor: ew-resize;
  touch-action: pan-y;
}
@media (hover: hover) {
  .lil-gui .controller.number .slider:hover {
    background-color: var(--hover-color);
  }
}
.lil-gui .controller.number .slider.active {
  background-color: var(--focus-color);
}
.lil-gui .controller.number .slider.active .fill {
  opacity: 0.95;
}
.lil-gui .controller.number .fill {
  height: 100%;
  border-right: var(--slider-knob-width) solid var(--number-color);
  box-sizing: content-box;
}

.lil-gui-dragging .lil-gui {
  --hover-color: var(--widget-color);
}
.lil-gui-dragging * {
  cursor: ew-resize !important;
}

.lil-gui-dragging.lil-gui-vertical * {
  cursor: ns-resize !important;
}

.lil-gui .title {
  height: var(--title-height);
  line-height: calc(var(--title-height) - 4px);
  font-weight: 600;
  padding: 0 var(--padding);
  -webkit-tap-highlight-color: transparent;
  cursor: pointer;
  outline: none;
  text-decoration-skip: objects;
}
.lil-gui .title:before {
  font-family: "lil-gui";
  content: "▾";
  padding-right: 2px;
  display: inline-block;
}
.lil-gui .title:active {
  background: var(--title-background-color);
  opacity: 0.75;
}
@media (hover: hover) {
  body:not(.lil-gui-dragging) .lil-gui .title:hover {
    background: var(--title-background-color);
    opacity: 0.85;
  }
  .lil-gui .title:focus {
    text-decoration: underline var(--focus-color);
  }
}
.lil-gui.root > .title:focus {
  text-decoration: none !important;
}
.lil-gui.closed > .title:before {
  content: "▸";
}
.lil-gui.closed > .children {
  transform: translateY(-7px);
  opacity: 0;
}
.lil-gui.closed:not(.transition) > .children {
  display: none;
}
.lil-gui.transition > .children {
  transition-duration: 300ms;
  transition-property: height, opacity, transform;
  transition-timing-function: cubic-bezier(0.2, 0.6, 0.35, 1);
  overflow: hidden;
  pointer-events: none;
}
.lil-gui .children:empty:before {
  content: "Empty";
  padding: 0 var(--padding);
  margin: var(--spacing) 0;
  display: block;
  height: var(--widget-height);
  font-style: italic;
  line-height: var(--widget-height);
  opacity: 0.5;
}
.lil-gui.root > .children > .lil-gui > .title {
  border: 0 solid var(--widget-color);
  border-width: 1px 0;
  transition: border-color 300ms;
}
.lil-gui.root > .children > .lil-gui.closed > .title {
  border-bottom-color: transparent;
}
.lil-gui + .controller {
  border-top: 1px solid var(--widget-color);
  margin-top: 0;
  padding-top: var(--spacing);
}
.lil-gui .lil-gui .lil-gui > .title {
  border: none;
}
.lil-gui .lil-gui .lil-gui > .children {
  border: none;
  margin-left: var(--folder-indent);
  border-left: 2px solid var(--widget-color);
}
.lil-gui .lil-gui .controller {
  border: none;
}

.lil-gui input {
  -webkit-tap-highlight-color: transparent;
  border: 0;
  outline: none;
  font-family: var(--font-family);
  font-size: var(--input-font-size);
  border-radius: var(--widget-border-radius);
  height: var(--widget-height);
  background: var(--widget-color);
  color: var(--text-color);
  width: 100%;
}
@media (hover: hover) {
  .lil-gui input:hover {
    background: var(--hover-color);
  }
  .lil-gui input:active {
    background: var(--focus-color);
  }
}
.lil-gui input:disabled {
  opacity: 1;
}
.lil-gui input[type=text],
.lil-gui input[type=number] {
  padding: var(--widget-padding);
}
.lil-gui input[type=text]:focus,
.lil-gui input[type=number]:focus {
  background: var(--focus-color);
}
.lil-gui input::-webkit-outer-spin-button,
.lil-gui input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}
.lil-gui input[type=number] {
  -moz-appearance: textfield;
}
.lil-gui input[type=checkbox] {
  appearance: none;
  -webkit-appearance: none;
  height: var(--checkbox-size);
  width: var(--checkbox-size);
  border-radius: var(--widget-border-radius);
  text-align: center;
  cursor: pointer;
}
.lil-gui input[type=checkbox]:checked:before {
  font-family: "lil-gui";
  content: "✓";
  font-size: var(--checkbox-size);
  line-height: var(--checkbox-size);
}
@media (hover: hover) {
  .lil-gui input[type=checkbox]:focus {
    box-shadow: inset 0 0 0 1px var(--focus-color);
  }
}
.lil-gui button {
  -webkit-tap-highlight-color: transparent;
  outline: none;
  cursor: pointer;
  font-family: var(--font-family);
  font-size: var(--font-size);
  color: var(--text-color);
  width: 100%;
  height: var(--widget-height);
  text-transform: none;
  background: var(--widget-color);
  border-radius: var(--widget-border-radius);
  border: 1px solid var(--widget-color);
  text-align: center;
  line-height: calc(var(--widget-height) - 4px);
}
@media (hover: hover) {
  .lil-gui button:hover {
    background: var(--hover-color);
    border-color: var(--hover-color);
  }
  .lil-gui button:focus {
    border-color: var(--focus-color);
  }
}
.lil-gui button:active {
  background: var(--focus-color);
}

@font-face {
  font-family: "lil-gui";
  src: url("data:application/font-woff;charset=utf-8;base64,d09GRgABAAAAAAUsAAsAAAAACJwAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAABHU1VCAAABCAAAAH4AAADAImwmYE9TLzIAAAGIAAAAPwAAAGBKqH5SY21hcAAAAcgAAAD0AAACrukyyJBnbHlmAAACvAAAAF8AAACEIZpWH2hlYWQAAAMcAAAAJwAAADZfcj2zaGhlYQAAA0QAAAAYAAAAJAC5AHhobXR4AAADXAAAABAAAABMAZAAAGxvY2EAAANsAAAAFAAAACgCEgIybWF4cAAAA4AAAAAeAAAAIAEfABJuYW1lAAADoAAAASIAAAIK9SUU/XBvc3QAAATEAAAAZgAAAJCTcMc2eJxVjbEOgjAURU+hFRBK1dGRL+ALnAiToyMLEzFpnPz/eAshwSa97517c/MwwJmeB9kwPl+0cf5+uGPZXsqPu4nvZabcSZldZ6kfyWnomFY/eScKqZNWupKJO6kXN3K9uCVoL7iInPr1X5baXs3tjuMqCtzEuagm/AAlzQgPAAB4nGNgYRBlnMDAysDAYM/gBiT5oLQBAwuDJAMDEwMrMwNWEJDmmsJwgCFeXZghBcjlZMgFCzOiKOIFAB71Bb8AeJy1kjFuwkAQRZ+DwRAwBtNQRUGKQ8OdKCAWUhAgKLhIuAsVSpWz5Bbkj3dEgYiUIszqWdpZe+Z7/wB1oCYmIoboiwiLT2WjKl/jscrHfGg/pKdMkyklC5Zs2LEfHYpjcRoPzme9MWWmk3dWbK9ObkWkikOetJ554fWyoEsmdSlt+uR0pCJR34b6t/TVg1SY3sYvdf8vuiKrpyaDXDISiegp17p7579Gp3p++y7HPAiY9pmTibljrr85qSidtlg4+l25GLCaS8e6rRxNBmsnERunKbaOObRz7N72ju5vdAjYpBXHgJylOAVsMseDAPEP8LYoUHicY2BiAAEfhiAGJgZWBgZ7RnFRdnVJELCQlBSRlATJMoLV2DK4glSYs6ubq5vbKrJLSbGrgEmovDuDJVhe3VzcXFwNLCOILB/C4IuQ1xTn5FPilBTj5FPmBAB4WwoqAHicY2BkYGAA4sk1sR/j+W2+MnAzpDBgAyEMQUCSg4EJxAEAwUgFHgB4nGNgZGBgSGFggJMhDIwMqEAYAByHATJ4nGNgAIIUNEwmAABl3AGReJxjYAACIQYlBiMGJ3wQAEcQBEV4nGNgZGBgEGZgY2BiAAEQyQWEDAz/wXwGAAsPATIAAHicXdBNSsNAHAXwl35iA0UQXYnMShfS9GPZA7T7LgIu03SSpkwzYTIt1BN4Ak/gKTyAeCxfw39jZkjymzcvAwmAW/wgwHUEGDb36+jQQ3GXGot79L24jxCP4gHzF/EIr4jEIe7wxhOC3g2TMYy4Q7+Lu/SHuEd/ivt4wJd4wPxbPEKMX3GI5+DJFGaSn4qNzk8mcbKSR6xdXdhSzaOZJGtdapd4vVPbi6rP+cL7TGXOHtXKll4bY1Xl7EGnPtp7Xy2n00zyKLVHfkHBa4IcJ2oD3cgggWvt/V/FbDrUlEUJhTn/0azVWbNTNr0Ens8de1tceK9xZmfB1CPjOmPH4kitmvOubcNpmVTN3oFJyjzCvnmrwhJTzqzVj9jiSX911FjeAAB4nG3HMRKCMBBA0f0giiKi4DU8k0V2GWbIZDOh4PoWWvq6J5V8If9NVNQcaDhyouXMhY4rPTcG7jwYmXhKq8Wz+p762aNaeYXom2n3m2dLTVgsrCgFJ7OTmIkYbwIbC6vIB7WmFfAAAA==") format("woff");
}`;

    function Al(n) {
        const t = document.createElement("style");
        t.innerHTML = n;
        const e = document.querySelector("head link[rel=stylesheet], head style");
        e ? document.head.insertBefore(t, e) : document.head.appendChild(t)
    }
    let vn = !1;
    class Gi {
        constructor({
            parent: t,
            autoPlace: e = t === void 0,
            container: i,
            width: r,
            title: s = "Controls",
            closeFolders: o = !1,
            injectStyles: a = !0,
            touchStyles: l = !0
        } = {}) {
            if (this.parent = t, this.root = t ? t.root : this, this.children = [], this.controllers = [], this
                .folders = [], this._closed = !1, this._hidden = !1, this.domElement = document.createElement(
                    "div"), this.domElement.classList.add("lil-gui"), this.$title = document.createElement("div"),
                this
                .$title.classList.add("title"), this.$title.setAttribute("role", "button"), this.$title
                .setAttribute("aria-expanded", !0), this.$title.setAttribute("tabindex", 0), this.$title
                .addEventListener("click", () => this.openAnimated(this._closed)), this.$title.addEventListener(
                    "keydown", u => {
                        (u.code === "Enter" || u.code === "Space") && (u.preventDefault(), this.$title.click())
                    }), this.$title.addEventListener("touchstart", () => {}, {
                    passive: !0
                }), this.$children = document.createElement("div"), this.$children.classList.add("children"), this
                .domElement.appendChild(this.$title), this.domElement.appendChild(this.$children), this.title(s),
                l && this.domElement.classList.add("allow-touch-styles"), this.parent) {
                this.parent.children.push(this), this.parent.folders.push(this), this.parent.$children.appendChild(
                    this.domElement);
                return
            }
            this.domElement.classList.add("root"), !vn && a && (Al(xl), vn = !0), i ? i.appendChild(this
                    .domElement) : e && (this.domElement.classList.add("autoPlace"), document.body.appendChild(this
                    .domElement)), r && this.domElement.style.setProperty("--width", r + "px"), this._closeFolders =
                o, this.domElement.addEventListener("keydown", u => u.stopPropagation()), this.domElement
                .addEventListener("keyup", u => u.stopPropagation())
        }
        add(t, e, i, r, s) {
            if (Object(i) === i) return new yl(this, t, e, i);
            const o = t[e];
            switch (typeof o) {
                case "number":
                    return new ml(this, t, e, i, r, s);
                case "boolean":
                    return new cl(this, t, e);
                case "string":
                    return new vl(this, t, e);
                case "function":
                    return new ni(this, t, e)
            }
            console.error(`gui.add failed
	property:`, e, `
	object:`, t, `
	value:`, o)
        }
        addColor(t, e, i = 1) {
            return new gl(this, t, e, i)
        }
        addFolder(t) {
            const e = new Gi({
                parent: this,
                title: t
            });
            return this.root._closeFolders && e.close(), e
        }
        load(t, e = !0) {
            return t.controllers && this.controllers.forEach(i => {
                i instanceof ni || i._name in t.controllers && i.load(t.controllers[i._name])
            }), e && t.folders && this.folders.forEach(i => {
                i._title in t.folders && i.load(t.folders[i._title])
            }), this
        }
        save(t = !0) {
            const e = {
                controllers: {},
                folders: {}
            };
            return this.controllers.forEach(i => {
                if (!(i instanceof ni)) {
                    if (i._name in e.controllers) throw new Error(
                        `Cannot save GUI with duplicate property "${i._name}"`);
                    e.controllers[i._name] = i.save()
                }
            }), t && this.folders.forEach(i => {
                if (i._title in e.folders) throw new Error(
                    `Cannot save GUI with duplicate folder "${i._title}"`);
                e.folders[i._title] = i.save()
            }), e
        }
        open(t = !0) {
            return this._setClosed(!t), this.$title.setAttribute("aria-expanded", !this._closed), this.domElement
                .classList.toggle("closed", this._closed), this
        }
        close() {
            return this.open(!1)
        }
        _setClosed(t) {
            this._closed !== t && (this._closed = t, this._callOnOpenClose(this))
        }
        show(t = !0) {
            return this._hidden = !t, this.domElement.style.display = this._hidden ? "none" : "", this
        }
        hide() {
            return this.show(!1)
        }
        openAnimated(t = !0) {
            return this._setClosed(!t), this.$title.setAttribute("aria-expanded", !this._closed),
                requestAnimationFrame(() => {
                    const e = this.$children.clientHeight;
                    this.$children.style.height = e + "px", this.domElement.classList.add("transition");
                    const i = s => {
                        s.target === this.$children && (this.$children.style.height = "", this.domElement
                            .classList.remove("transition"), this.$children.removeEventListener(
                                "transitionend", i))
                    };
                    this.$children.addEventListener("transitionend", i);
                    const r = t ? this.$children.scrollHeight : 0;
                    this.domElement.classList.toggle("closed", !t), requestAnimationFrame(() => {
                        this.$children.style.height = r + "px"
                    })
                }), this
        }
        title(t) {
            return this._title = t, this.$title.innerHTML = t, this
        }
        reset(t = !0) {
            return (t ? this.controllersRecursive() : this.controllers).forEach(i => i.reset()), this
        }
        onChange(t) {
            return this._onChange = t, this
        }
        _callOnChange(t) {
            this.parent && this.parent._callOnChange(t), this._onChange !== void 0 && this._onChange.call(this, {
                object: t.object,
                property: t.property,
                value: t.getValue(),
                controller: t
            })
        }
        onFinishChange(t) {
            return this._onFinishChange = t, this
        }
        _callOnFinishChange(t) {
            this.parent && this.parent._callOnFinishChange(t), this._onFinishChange !== void 0 && this
                ._onFinishChange.call(this, {
                    object: t.object,
                    property: t.property,
                    value: t.getValue(),
                    controller: t
                })
        }
        onOpenClose(t) {
            return this._onOpenClose = t, this
        }
        _callOnOpenClose(t) {
            this.parent && this.parent._callOnOpenClose(t), this._onOpenClose !== void 0 && this._onOpenClose.call(
                this, t)
        }
        destroy() {
            this.parent && (this.parent.children.splice(this.parent.children.indexOf(this), 1), this.parent.folders
                    .splice(this.parent.folders.indexOf(this), 1)), this.domElement.parentElement && this.domElement
                .parentElement.removeChild(this.domElement), Array.from(this.children).forEach(t => t.destroy())
        }
        controllersRecursive() {
            let t = Array.from(this.controllers);
            return this.folders.forEach(e => {
                t = t.concat(e.controllersRecursive())
            }), t
        }
        foldersRecursive() {
            let t = Array.from(this.folders);
            return this.folders.forEach(e => {
                t = t.concat(e.foldersRecursive())
            }), t
        }
    }
    const bl = Gi;
    var wl = `attribute vec4 position;

varying vec2 v_xy;

void main() {
  gl_Position = position;
  v_xy = position.xy;
}`,
        Tl = `precision mediump float;

uniform vec2 u_res;
uniform float u_time;
uniform vec2 u_mouse;
varying vec2 v_xy;

uniform vec4 u_params;
uniform vec4 u_params2;
uniform vec4 u_altparams;

uniform vec3 u_color;
uniform vec3 u_color2;

uniform float u_mode;
uniform float u_swap;

const float MPI = 6.28318530718;

vec3 palette( in float t, in vec3 a, in vec3 b, in vec3 c, in vec3 d ){
    return a + b * cos( 6.28318 * ( c * t + d));
}

vec3 hueShift( vec3 color, float hueAdjust ){

    const vec3  kRGBToYPrime = vec3 (0.299, 0.587, 0.114);
    const vec3  kRGBToI      = vec3 (0.596, -0.275, -0.321);
    const vec3  kRGBToQ      = vec3 (0.212, -0.523, 0.311);

    const vec3  kYIQToR     = vec3 (1.0, 0.956, 0.621);
    const vec3  kYIQToG     = vec3 (1.0, -0.272, -0.647);
    const vec3  kYIQToB     = vec3 (1.0, -1.107, 1.704);

    float   YPrime  = dot (color, kRGBToYPrime);
    float   I       = dot (color, kRGBToI);
    float   Q       = dot (color, kRGBToQ);
    float   hue     = atan (Q, I);
    float   chroma  = sqrt (I * I + Q * Q);

    hue += hueAdjust;

    Q = chroma * sin (hue);
    I = chroma * cos (hue);

    vec3    yIQ   = vec3 (YPrime, I, Q);

    return vec3( dot (yIQ, kYIQToR), dot (yIQ, kYIQToG), dot (yIQ, kYIQToB) );

}

vec4 permute(vec4 x){return mod(((x*34.0)+1.0)*x, 289.0);}
vec4 taylorInvSqrt(vec4 r){return 1.79284291400159 - 0.85373472095314 * r;}
vec3 fade(vec3 t) {return t*t*t*(t*(t*6.0-15.0)+10.0);}

float cnoise(vec3 P){
  vec3 Pi0 = floor(P);
  vec3 Pi1 = Pi0 + vec3(1.0);
  Pi0 = mod(Pi0, 289.0);
  Pi1 = mod(Pi1, 289.0);
  vec3 Pf0 = fract(P);
  vec3 Pf1 = Pf0 - vec3(1.0);
  vec4 ix = vec4(Pi0.x, Pi1.x, Pi0.x, Pi1.x);
  vec4 iy = vec4(Pi0.yy, Pi1.yy);
  vec4 iz0 = Pi0.zzzz;
  vec4 iz1 = Pi1.zzzz;

  vec4 ixy = permute(permute(ix) + iy);
  vec4 ixy0 = permute(ixy + iz0);
  vec4 ixy1 = permute(ixy + iz1);

  vec4 gx0 = ixy0 / 7.0;
  vec4 gy0 = fract(floor(gx0) / 7.0) - 0.5;
  gx0 = fract(gx0);
  vec4 gz0 = vec4(0.5) - abs(gx0) - abs(gy0);
  vec4 sz0 = step(gz0, vec4(0.0));
  gx0 -= sz0 * (step(0.0, gx0) - 0.5);
  gy0 -= sz0 * (step(0.0, gy0) - 0.5);

  vec4 gx1 = ixy1 / 7.0;
  vec4 gy1 = fract(floor(gx1) / 7.0) - 0.5;
  gx1 = fract(gx1);
  vec4 gz1 = vec4(0.5) - abs(gx1) - abs(gy1);
  vec4 sz1 = step(gz1, vec4(0.0));
  gx1 -= sz1 * (step(0.0, gx1) - 0.5);
  gy1 -= sz1 * (step(0.0, gy1) - 0.5);

  vec3 g000 = vec3(gx0.x,gy0.x,gz0.x);
  vec3 g100 = vec3(gx0.y,gy0.y,gz0.y);
  vec3 g010 = vec3(gx0.z,gy0.z,gz0.z);
  vec3 g110 = vec3(gx0.w,gy0.w,gz0.w);
  vec3 g001 = vec3(gx1.x,gy1.x,gz1.x);
  vec3 g101 = vec3(gx1.y,gy1.y,gz1.y);
  vec3 g011 = vec3(gx1.z,gy1.z,gz1.z);
  vec3 g111 = vec3(gx1.w,gy1.w,gz1.w);

  vec4 norm0 = taylorInvSqrt(vec4(dot(g000, g000), dot(g010, g010), dot(g100, g100), dot(g110, g110)));
  g000 *= norm0.x;
  g010 *= norm0.y;
  g100 *= norm0.z;
  g110 *= norm0.w;
  vec4 norm1 = taylorInvSqrt(vec4(dot(g001, g001), dot(g011, g011), dot(g101, g101), dot(g111, g111)));
  g001 *= norm1.x;
  g011 *= norm1.y;
  g101 *= norm1.z;
  g111 *= norm1.w;

  float n000 = dot(g000, Pf0);
  float n100 = dot(g100, vec3(Pf1.x, Pf0.yz));
  float n010 = dot(g010, vec3(Pf0.x, Pf1.y, Pf0.z));
  float n110 = dot(g110, vec3(Pf1.xy, Pf0.z));
  float n001 = dot(g001, vec3(Pf0.xy, Pf1.z));
  float n101 = dot(g101, vec3(Pf1.x, Pf0.y, Pf1.z));
  float n011 = dot(g011, vec3(Pf0.x, Pf1.yz));
  float n111 = dot(g111, Pf1);

  vec3 fade_xyz = fade(Pf0);
  vec4 n_z = mix(vec4(n000, n100, n010, n110), vec4(n001, n101, n011, n111), fade_xyz.z);
  vec2 n_yz = mix(n_z.xy, n_z.zw, fade_xyz.y);
  float n_xyz = mix(n_yz.x, n_yz.y, fade_xyz.x);
  return 2.2 * n_xyz;
}

const vec3 col1 = vec3(0.5, 0.5, 0.5);
const vec3 col2 = vec3(0.5, 0.5, 0.5);
const vec3 col3 = vec3(1.0, 1.0, 1.0);


void main() {

 float MULT_X = u_params.x;
 float MULT_Y = u_params.y;
 float HUE = u_params.z;
 float BRIGHTNESS = u_params.w;
 float MOUSE_BRIGHTNESS = u_params2.x;
 float SCALE = mix(u_params2.y, u_altparams.x, u_swap);
 float NOISE_FACTOR = u_params2.z;
 float BW = mix(u_params2.w, u_altparams.y, u_swap);



  vec2 uv = gl_FragCoord.xy / u_res;
  vec2 scale_uv = uv;
  scale_uv -= vec2(.5);
  scale_uv *= SCALE;


  float noise = cnoise(vec3(scale_uv, u_time)) * NOISE_FACTOR;


  float c_d = distance(scale_uv.x, .5);
  c_d = smoothstep(0., .6, c_d);
  vec2 m_uv = scale_uv * (c_d + cos(scale_uv.x * MULT_X) * noise - sin(scale_uv.y * MULT_Y) * noise);


  scale_uv += vec2(.5);


  vec3 current_color = mix(u_color, u_color2, u_swap);
  vec3 col = palette(
    u_time + cos((m_uv.x) + (m_uv.y)),
    col1, col2, col2, current_color
  );


  float dist = distance(m_uv, u_mouse * SCALE/2.);

  dist = 1. - dist;
  dist = smoothstep(.3, 1., dist);

  vec3 shift_col = hueShift(col, sin(u_time * MPI));

  col = mix(
    col,
    shift_col * col + (dist * MOUSE_BRIGHTNESS),
    dist
  );



  col = hueShift(col, HUE);
  col *= BRIGHTNESS;

  float bw_col = (col.r + col.g + col.b) * .3;
  col = mix(col, vec3(bw_col), BW);



  if (u_mode > .5) {
    col = vec3(1.) - col;
  }

  gl_FragColor.rgb =  col;
  gl_FragColor.a = 1.;
}`;
    const El = [wl, Tl];

    function kt(n) {
        if (n === void 0) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
        return n
    }

    function Cr(n, t) {
        n.prototype = Object.create(t.prototype), n.prototype.constructor = n, n.__proto__ = t
    }
    /*!
     * GSAP 3.11.5
     * https://greensock.com
     *
     * @license Copyright 2008-2023, GreenSock. All rights reserved.
     * Subject to the terms at https://greensock.com/standard-license or for
     * Club GreenSock members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var ut = {
            autoSleep: 120,
            force3D: "auto",
            nullTargetWarn: 1,
            units: {
                lineHeight: ""
            }
        },
        ue = {
            duration: .5,
            overwrite: !1,
            delay: 0
        },
        Hi, Q, G, mt = 1e8,
        L = 1 / mt,
        pi = Math.PI * 2,
        Sl = pi / 4,
        Cl = 0,
        Pr = Math.sqrt,
        Pl = Math.cos,
        kl = Math.sin,
        W = function(t) {
            return typeof t == "string"
        },
        V = function(t) {
            return typeof t == "function"
        },
        Mt = function(t) {
            return typeof t == "number"
        },
        Xi = function(t) {
            return typeof t > "u"
        },
        Ct = function(t) {
            return typeof t == "object"
        },
        nt = function(t) {
            return t !== !1
        },
        Wi = function() {
            return typeof window < "u"
        },
        Me = function(t) {
            return V(t) || W(t)
        },
        kr = typeof ArrayBuffer == "function" && ArrayBuffer.isView || function() {},
        Z = Array.isArray,
        gi = /(?:-?\.?\d|\.)+/gi,
        Fr = /[-+=.]*\d+[.e\-+]*\d*[e\-+]*\d*/g,
        re = /[-+=.]*\d+[.e-]*\d*[a-z%]*/g,
        ri = /[-+=.]*\d+\.?\d*(?:e-|e\+)?\d*/gi,
        Mr = /[+-]=-?[.\d]+/,
        Dr = /[^,'"\[\]\s]+/gi,
        Fl = /^[+\-=e\s\d]*\d+[.\d]*([a-z]*|%)\s*$/i,
        U, gt, mi, qi, ct = {},
        Ie = {},
        Or, Rr = function(t) {
            return (Ie = ee(t, ct)) && ot
        },
        ji = function(t, e) {
            return console.warn("Invalid property", t, "set to", e, "Missing plugin? gsap.registerPlugin()")
        },
        Be = function(t, e) {
            return !e && console.warn(t)
        },
        zr = function(t, e) {
            return t && (ct[t] = e) && Ie && (Ie[t] = e) || ct
        },
        Te = function() {
            return 0
        },
        Ml = {
            suppressEvents: !0,
            isStart: !0,
            kill: !1
        },
        De = {
            suppressEvents: !0,
            kill: !1
        },
        Dl = {
            suppressEvents: !0
        },
        Ki = {},
        Lt = [],
        yi = {},
        Ir, at = {},
        si = {},
        xn = 30,
        Oe = [],
        Qi = "",
        Zi = function(t) {
            var e = t[0],
                i, r;
            if (Ct(e) || V(e) || (t = [t]), !(i = (e._gsap || {}).harness)) {
                for (r = Oe.length; r-- && !Oe[r].targetTest(e););
                i = Oe[r]
            }
            for (r = t.length; r--;) t[r] && (t[r]._gsap || (t[r]._gsap = new os(t[r], i))) || t.splice(r, 1);
            return t
        },
        Zt = function(t) {
            return t._gsap || Zi(yt(t))[0]._gsap
        },
        Br = function(t, e, i) {
            return (i = t[e]) && V(i) ? t[e]() : Xi(i) && t.getAttribute && t.getAttribute(e) || i
        },
        rt = function(t, e) {
            return (t = t.split(",")).forEach(e) || t
        },
        Y = function(t) {
            return Math.round(t * 1e5) / 1e5 || 0
        },
        q = function(t) {
            return Math.round(t * 1e7) / 1e7 || 0
        },
        oe = function(t, e) {
            var i = e.charAt(0),
                r = parseFloat(e.substr(2));
            return t = parseFloat(t), i === "+" ? t + r : i === "-" ? t - r : i === "*" ? t * r : t / r
        },
        Ol = function(t, e) {
            for (var i = e.length, r = 0; t.indexOf(e[r]) < 0 && ++r < i;);
            return r < i
        },
        Le = function() {
            var t = Lt.length,
                e = Lt.slice(0),
                i, r;
            for (yi = {}, Lt.length = 0, i = 0; i < t; i++) r = e[i], r && r._lazy && (r.render(r._lazy[0], r._lazy[1],
                !0)._lazy = 0)
        },
        Lr = function(t, e, i, r) {
            Lt.length && !Q && Le(), t.render(e, i, r || Q && e < 0 && (t._initted || t._startAt)), Lt.length && !Q &&
                Le()
        },
        $r = function(t) {
            var e = parseFloat(t);
            return (e || e === 0) && (t + "").match(Dr).length < 2 ? e : W(t) ? t.trim() : t
        },
        Ur = function(t) {
            return t
        },
        xt = function(t, e) {
            for (var i in e) i in t || (t[i] = e[i]);
            return t
        },
        Rl = function(t) {
            return function(e, i) {
                for (var r in i) r in e || r === "duration" && t || r === "ease" || (e[r] = i[r])
            }
        },
        ee = function(t, e) {
            for (var i in e) t[i] = e[i];
            return t
        },
        An = function n(t, e) {
            for (var i in e) i !== "__proto__" && i !== "constructor" && i !== "prototype" && (t[i] = Ct(e[i]) ? n(t[
                i] || (t[i] = {}), e[i]) : e[i]);
            return t
        },
        $e = function(t, e) {
            var i = {},
                r;
            for (r in t) r in e || (i[r] = t[r]);
            return i
        },
        ve = function(t) {
            var e = t.parent || U,
                i = t.keyframes ? Rl(Z(t.keyframes)) : xt;
            if (nt(t.inherit))
                for (; e;) i(t, e.vars.defaults), e = e.parent || e._dp;
            return t
        },
        zl = function(t, e) {
            for (var i = t.length, r = i === e.length; r && i-- && t[i] === e[i];);
            return i < 0
        },
        Nr = function(t, e, i, r, s) {
            i === void 0 && (i = "_first"), r === void 0 && (r = "_last");
            var o = t[r],
                a;
            if (s)
                for (a = e[s]; o && o[s] > a;) o = o._prev;
            return o ? (e._next = o._next, o._next = e) : (e._next = t[i], t[i] = e), e._next ? e._next._prev = e : t[
                r] = e, e._prev = o, e.parent = e._dp = t, e
        },
        Ze = function(t, e, i, r) {
            i === void 0 && (i = "_first"), r === void 0 && (r = "_last");
            var s = e._prev,
                o = e._next;
            s ? s._next = o : t[i] === e && (t[i] = o), o ? o._prev = s : t[r] === e && (t[r] = s), e._next = e._prev =
                e.parent = null
        },
        Ut = function(t, e) {
            t.parent && (!e || t.parent.autoRemoveChildren) && t.parent.remove(t), t._act = 0
        },
        Jt = function(t, e) {
            if (t && (!e || e._end > t._dur || e._start < 0))
                for (var i = t; i;) i._dirty = 1, i = i.parent;
            return t
        },
        Il = function(t) {
            for (var e = t.parent; e && e.parent;) e._dirty = 1, e.totalDuration(), e = e.parent;
            return t
        },
        vi = function(t, e, i, r) {
            return t._startAt && (Q ? t._startAt.revert(De) : t.vars.immediateRender && !t.vars.autoRevert || t._startAt
                .render(e, !0, r))
        },
        Bl = function n(t) {
            return !t || t._ts && n(t.parent)
        },
        bn = function(t) {
            return t._repeat ? ce(t._tTime, t = t.duration() + t._rDelay) * t : 0
        },
        ce = function(t, e) {
            var i = Math.floor(t /= e);
            return t && i === t ? i - 1 : i
        },
        Ue = function(t, e) {
            return (t - e._start) * e._ts + (e._ts >= 0 ? 0 : e._dirty ? e.totalDuration() : e._tDur)
        },
        Je = function(t) {
            return t._end = q(t._start + (t._tDur / Math.abs(t._ts || t._rts || L) || 0))
        },
        ti = function(t, e) {
            var i = t._dp;
            return i && i.smoothChildTiming && t._ts && (t._start = q(i._time - (t._ts > 0 ? e / t._ts : ((t._dirty ? t
                .totalDuration() : t._tDur) - e) / -t._ts)), Je(t), i._dirty || Jt(i, t)), t
        },
        Vr = function(t, e) {
            var i;
            if ((e._time || e._initted && !e._dur) && (i = Ue(t.rawTime(), e), (!e._dur || Fe(0, e.totalDuration(), i) -
                    e._tTime > L) && e.render(i, !0)), Jt(t, e)._dp && t._initted && t._time >= t._dur && t._ts) {
                if (t._dur < t.duration())
                    for (i = t; i._dp;) i.rawTime() >= 0 && i.totalTime(i._tTime), i = i._dp;
                t._zTime = -L
            }
        },
        wt = function(t, e, i, r) {
            return e.parent && Ut(e), e._start = q((Mt(i) ? i : i || t !== U ? pt(t, i, e) : t._time) + e._delay), e
                ._end = q(e._start + (e.totalDuration() / Math.abs(e.timeScale()) || 0)), Nr(t, e, "_first", "_last", t
                    ._sort ? "_start" : 0), xi(e) || (t._recent = e), r || Vr(t, e), t._ts < 0 && ti(t, t._tTime), t
        },
        Yr = function(t, e) {
            return (ct.ScrollTrigger || ji("scrollTrigger", e)) && ct.ScrollTrigger.create(e, t)
        },
        Gr = function(t, e, i, r, s) {
            if (tn(t, e, s), !t._initted) return 1;
            if (!i && t._pt && !Q && (t._dur && t.vars.lazy !== !1 || !t._dur && t.vars.lazy) && Ir !== lt.frame)
                return Lt.push(t), t._lazy = [s, r], 1
        },
        Ll = function n(t) {
            var e = t.parent;
            return e && e._ts && e._initted && !e._lock && (e.rawTime() < 0 || n(e))
        },
        xi = function(t) {
            var e = t.data;
            return e === "isFromStart" || e === "isStart"
        },
        $l = function(t, e, i, r) {
            var s = t.ratio,
                o = e < 0 || !e && (!t._start && Ll(t) && !(!t._initted && xi(t)) || (t._ts < 0 || t._dp._ts < 0) && !
                    xi(t)) ? 0 : 1,
                a = t._rDelay,
                l = 0,
                u, c, h;
            if (a && t._repeat && (l = Fe(0, t._tDur, e), c = ce(l, a), t._yoyo && c & 1 && (o = 1 - o), c !== ce(t
                    ._tTime, a) && (s = 1 - o, t.vars.repeatRefresh && t._initted && t.invalidate())), o !== s || Q ||
                r || t._zTime === L || !e && t._zTime) {
                if (!t._initted && Gr(t, e, r, i, l)) return;
                for (h = t._zTime, t._zTime = e || (i ? L : 0), i || (i = e && !h), t.ratio = o, t._from && (o = 1 - o),
                    t._time = 0, t._tTime = l, u = t._pt; u;) u.r(o, u.d), u = u._next;
                e < 0 && vi(t, e, i, !0), t._onUpdate && !i && vt(t, "onUpdate"), l && t._repeat && !i && t.parent &&
                    vt(t, "onRepeat"), (e >= t._tDur || e < 0) && t.ratio === o && (o && Ut(t, 1), !i && !Q && (vt(t,
                        o ? "onComplete" : "onReverseComplete", !0), t._prom && t._prom()))
            } else t._zTime || (t._zTime = e)
        },
        Ul = function(t, e, i) {
            var r;
            if (i > e)
                for (r = t._first; r && r._start <= i;) {
                    if (r.data === "isPause" && r._start > e) return r;
                    r = r._next
                } else
                    for (r = t._last; r && r._start >= i;) {
                        if (r.data === "isPause" && r._start < e) return r;
                        r = r._prev
                    }
        },
        he = function(t, e, i, r) {
            var s = t._repeat,
                o = q(e) || 0,
                a = t._tTime / t._tDur;
            return a && !r && (t._time *= o / t._dur), t._dur = o, t._tDur = s ? s < 0 ? 1e10 : q(o * (s + 1) + t
                ._rDelay * s) : o, a > 0 && !r && ti(t, t._tTime = t._tDur * a), t.parent && Je(t), i || Jt(t
                .parent, t), t
        },
        wn = function(t) {
            return t instanceof it ? Jt(t) : he(t, t._dur)
        },
        Nl = {
            _start: 0,
            endTime: Te,
            totalDuration: Te
        },
        pt = function n(t, e, i) {
            var r = t.labels,
                s = t._recent || Nl,
                o = t.duration() >= mt ? s.endTime(!1) : t._dur,
                a, l, u;
            return W(e) && (isNaN(e) || e in r) ? (l = e.charAt(0), u = e.substr(-1) === "%", a = e.indexOf("="), l ===
                "<" || l === ">" ? (a >= 0 && (e = e.replace(/=/, "")), (l === "<" ? s._start : s.endTime(s
                    ._repeat >= 0)) + (parseFloat(e.substr(1)) || 0) * (u ? (a < 0 ? s : i).totalDuration() /
                    100 : 1)) : a < 0 ? (e in r || (r[e] = o), r[e]) : (l = parseFloat(e.charAt(a - 1) + e.substr(
                    a + 1)), u && i && (l = l / 100 * (Z(i) ? i[0] : i).totalDuration()), a > 1 ? n(t, e.substr(
                    0, a - 1), i) + l : o + l)) : e == null ? o : +e
        },
        xe = function(t, e, i) {
            var r = Mt(e[1]),
                s = (r ? 2 : 1) + (t < 2 ? 0 : 1),
                o = e[s],
                a, l;
            if (r && (o.duration = e[1]), o.parent = i, t) {
                for (a = o, l = i; l && !("immediateRender" in a);) a = l.vars.defaults || {}, l = nt(l.vars.inherit) &&
                    l.parent;
                o.immediateRender = nt(a.immediateRender), t < 2 ? o.runBackwards = 1 : o.startAt = e[s - 1]
            }
            return new X(e[0], o, e[s + 1])
        },
        Yt = function(t, e) {
            return t || t === 0 ? e(t) : e
        },
        Fe = function(t, e, i) {
            return i < t ? t : i > e ? e : i
        },
        K = function(t, e) {
            return !W(t) || !(e = Fl.exec(t)) ? "" : e[1]
        },
        Vl = function(t, e, i) {
            return Yt(i, function(r) {
                return Fe(t, e, r)
            })
        },
        Ai = [].slice,
        Hr = function(t, e) {
            return t && Ct(t) && "length" in t && (!e && !t.length || t.length - 1 in t && Ct(t[0])) && !t.nodeType &&
                t !== gt
        },
        Yl = function(t, e, i) {
            return i === void 0 && (i = []), t.forEach(function(r) {
                var s;
                return W(r) && !e || Hr(r, 1) ? (s = i).push.apply(s, yt(r)) : i.push(r)
            }) || i
        },
        yt = function(t, e, i) {
            return G && !e && G.selector ? G.selector(t) : W(t) && !i && (mi || !fe()) ? Ai.call((e || qi)
                .querySelectorAll(t), 0) : Z(t) ? Yl(t, i) : Hr(t) ? Ai.call(t, 0) : t ? [t] : []
        },
        bi = function(t) {
            return t = yt(t)[0] || Be("Invalid scope") || {},
                function(e) {
                    var i = t.current || t.nativeElement || t;
                    return yt(e, i.querySelectorAll ? i : i === t ? Be("Invalid scope") || qi.createElement("div") : t)
                }
        },
        Xr = function(t) {
            return t.sort(function() {
                return .5 - Math.random()
            })
        },
        Wr = function(t) {
            if (V(t)) return t;
            var e = Ct(t) ? t : {
                    each: t
                },
                i = te(e.ease),
                r = e.from || 0,
                s = parseFloat(e.base) || 0,
                o = {},
                a = r > 0 && r < 1,
                l = isNaN(r) || a,
                u = e.axis,
                c = r,
                h = r;
            return W(r) ? c = h = {
                    center: .5,
                    edges: .5,
                    end: 1
                } [r] || 0 : !a && l && (c = r[0], h = r[1]),
                function(f, d, g) {
                    var _ = (g || e).length,
                        m = o[_],
                        p, y, v, A, x, E, T, w, b;
                    if (!m) {
                        if (b = e.grid === "auto" ? 0 : (e.grid || [1, mt])[1], !b) {
                            for (T = -mt; T < (T = g[b++].getBoundingClientRect().left) && b < _;);
                            b--
                        }
                        for (m = o[_] = [], p = l ? Math.min(b, _) * c - .5 : r % b, y = b === mt ? 0 : l ? _ * h / b -
                            .5 : r / b | 0, T = 0, w = mt, E = 0; E < _; E++) v = E % b - p, A = y - (E / b | 0), m[E] =
                            x = u ? Math.abs(u === "y" ? A : v) : Pr(v * v + A * A), x > T && (T = x), x < w && (w = x);
                        r === "random" && Xr(m), m.max = T - w, m.min = w, m.v = _ = (parseFloat(e.amount) ||
                                parseFloat(e.each) * (b > _ ? _ - 1 : u ? u === "y" ? _ / b : b : Math.max(b, _ / b)) ||
                                0) * (r === "edges" ? -1 : 1), m.b = _ < 0 ? s - _ : s, m.u = K(e.amount || e.each) ||
                            0, i = i && _ < 0 ? ns(i) : i
                    }
                    return _ = (m[f] - m.min) / m.max || 0, q(m.b + (i ? i(_) : _) * m.v) + m.u
                }
        },
        wi = function(t) {
            var e = Math.pow(10, ((t + "").split(".")[1] || "").length);
            return function(i) {
                var r = q(Math.round(parseFloat(i) / t) * t * e);
                return (r - r % 1) / e + (Mt(i) ? 0 : K(i))
            }
        },
        qr = function(t, e) {
            var i = Z(t),
                r, s;
            return !i && Ct(t) && (r = i = t.radius || mt, t.values ? (t = yt(t.values), (s = !Mt(t[0])) && (r *= r)) :
                t = wi(t.increment)), Yt(e, i ? V(t) ? function(o) {
                return s = t(o), Math.abs(s - o) <= r ? s : o
            } : function(o) {
                for (var a = parseFloat(s ? o.x : o), l = parseFloat(s ? o.y : 0), u = mt, c = 0, h = t.length,
                        f, d; h--;) s ? (f = t[h].x - a, d = t[h].y - l, f = f * f + d * d) : f = Math.abs(t[
                    h] - a), f < u && (u = f, c = h);
                return c = !r || u <= r ? t[c] : o, s || c === o || Mt(o) ? c : c + K(o)
            } : wi(t))
        },
        jr = function(t, e, i, r) {
            return Yt(Z(t) ? !e : i === !0 ? !!(i = 0) : !r, function() {
                return Z(t) ? t[~~(Math.random() * t.length)] : (i = i || 1e-5) && (r = i < 1 ? Math.pow(10, (
                    i + "").length - 2) : 1) && Math.floor(Math.round((t - i / 2 + Math.random() * (e - t +
                    i * .99)) / i) * i * r) / r
            })
        },
        Gl = function() {
            for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++) e[i] = arguments[i];
            return function(r) {
                return e.reduce(function(s, o) {
                    return o(s)
                }, r)
            }
        },
        Hl = function(t, e) {
            return function(i) {
                return t(parseFloat(i)) + (e || K(i))
            }
        },
        Xl = function(t, e, i) {
            return Qr(t, e, 0, 1, i)
        },
        Kr = function(t, e, i) {
            return Yt(i, function(r) {
                return t[~~e(r)]
            })
        },
        Wl = function n(t, e, i) {
            var r = e - t;
            return Z(t) ? Kr(t, n(0, t.length), e) : Yt(i, function(s) {
                return (r + (s - t) % r) % r + t
            })
        },
        ql = function n(t, e, i) {
            var r = e - t,
                s = r * 2;
            return Z(t) ? Kr(t, n(0, t.length - 1), e) : Yt(i, function(o) {
                return o = (s + (o - t) % s) % s || 0, t + (o > r ? s - o : o)
            })
        },
        Ee = function(t) {
            for (var e = 0, i = "", r, s, o, a; ~(r = t.indexOf("random(", e));) o = t.indexOf(")", r), a = t.charAt(r +
                7) === "[", s = t.substr(r + 7, o - r - 7).match(a ? Dr : gi), i += t.substr(e, r - e) + jr(a ? s :
                +s[0], a ? 0 : +s[1], +s[2] || 1e-5), e = o + 1;
            return i + t.substr(e, t.length - e)
        },
        Qr = function(t, e, i, r, s) {
            var o = e - t,
                a = r - i;
            return Yt(s, function(l) {
                return i + ((l - t) / o * a || 0)
            })
        },
        jl = function n(t, e, i, r) {
            var s = isNaN(t + e) ? 0 : function(d) {
                return (1 - d) * t + d * e
            };
            if (!s) {
                var o = W(t),
                    a = {},
                    l, u, c, h, f;
                if (i === !0 && (r = 1) && (i = null), o) t = {
                    p: t
                }, e = {
                    p: e
                };
                else if (Z(t) && !Z(e)) {
                    for (c = [], h = t.length, f = h - 2, u = 1; u < h; u++) c.push(n(t[u - 1], t[u]));
                    h--, s = function(g) {
                        g *= h;
                        var _ = Math.min(f, ~~g);
                        return c[_](g - _)
                    }, i = e
                } else r || (t = ee(Z(t) ? [] : {}, t));
                if (!c) {
                    for (l in e) Ji.call(a, t, l, "get", e[l]);
                    s = function(g) {
                        return rn(g, a) || (o ? t.p : t)
                    }
                }
            }
            return Yt(i, s)
        },
        Tn = function(t, e, i) {
            var r = t.labels,
                s = mt,
                o, a, l;
            for (o in r) a = r[o] - e, a < 0 == !!i && a && s > (a = Math.abs(a)) && (l = o, s = a);
            return l
        },
        vt = function(t, e, i) {
            var r = t.vars,
                s = r[e],
                o = G,
                a = t._ctx,
                l, u, c;
            if (s) return l = r[e + "Params"], u = r.callbackScope || t, i && Lt.length && Le(), a && (G = a), c = l ? s
                .apply(u, l) : s.call(u), G = o, c
        },
        me = function(t) {
            return Ut(t), t.scrollTrigger && t.scrollTrigger.kill(!!Q), t.progress() < 1 && vt(t, "onInterrupt"), t
        },
        se, Zr = [],
        Jr = function(t) {
            if (!Wi()) {
                Zr.push(t);
                return
            }
            t = !t.name && t.default || t;
            var e = t.name,
                i = V(t),
                r = e && !i && t.init ? function() {
                    this._props = []
                } : t,
                s = {
                    init: Te,
                    render: rn,
                    add: Ji,
                    kill: hu,
                    modifier: cu,
                    rawVars: 0
                },
                o = {
                    targetTest: 0,
                    get: 0,
                    getSetter: nn,
                    aliases: {},
                    register: 0
                };
            if (fe(), t !== r) {
                if (at[e]) return;
                xt(r, xt($e(t, s), o)), ee(r.prototype, ee(s, $e(t, o))), at[r.prop = e] = r, t.targetTest && (Oe.push(
                    r), Ki[e] = 1), e = (e === "css" ? "CSS" : e.charAt(0).toUpperCase() + e.substr(1)) + "Plugin"
            }
            zr(e, r), t.register && t.register(ot, r, st)
        },
        B = 255,
        ye = {
            aqua: [0, B, B],
            lime: [0, B, 0],
            silver: [192, 192, 192],
            black: [0, 0, 0],
            maroon: [128, 0, 0],
            teal: [0, 128, 128],
            blue: [0, 0, B],
            navy: [0, 0, 128],
            white: [B, B, B],
            olive: [128, 128, 0],
            yellow: [B, B, 0],
            orange: [B, 165, 0],
            gray: [128, 128, 128],
            purple: [128, 0, 128],
            green: [0, 128, 0],
            red: [B, 0, 0],
            pink: [B, 192, 203],
            cyan: [0, B, B],
            transparent: [B, B, B, 0]
        },
        oi = function(t, e, i) {
            return t += t < 0 ? 1 : t > 1 ? -1 : 0, (t * 6 < 1 ? e + (i - e) * t * 6 : t < .5 ? i : t * 3 < 2 ? e + (i -
                e) * (2 / 3 - t) * 6 : e) * B + .5 | 0
        },
        ts = function(t, e, i) {
            var r = t ? Mt(t) ? [t >> 16, t >> 8 & B, t & B] : 0 : ye.black,
                s, o, a, l, u, c, h, f, d, g;
            if (!r) {
                if (t.substr(-1) === "," && (t = t.substr(0, t.length - 1)), ye[t]) r = ye[t];
                else if (t.charAt(0) === "#") {
                    if (t.length < 6 && (s = t.charAt(1), o = t.charAt(2), a = t.charAt(3), t = "#" + s + s + o + o +
                            a + a + (t.length === 5 ? t.charAt(4) + t.charAt(4) : "")), t.length === 9) return r =
                        parseInt(t.substr(1, 6), 16), [r >> 16, r >> 8 & B, r & B, parseInt(t.substr(7), 16) / 255];
                    t = parseInt(t.substr(1), 16), r = [t >> 16, t >> 8 & B, t & B]
                } else if (t.substr(0, 3) === "hsl") {
                    if (r = g = t.match(gi), !e) l = +r[0] % 360 / 360, u = +r[1] / 100, c = +r[2] / 100, o = c <= .5 ?
                        c * (u + 1) : c + u - c * u, s = c * 2 - o, r.length > 3 && (r[3] *= 1), r[0] = oi(l + 1 / 3, s,
                            o), r[1] = oi(l, s, o), r[2] = oi(l - 1 / 3, s, o);
                    else if (~t.indexOf("=")) return r = t.match(Fr), i && r.length < 4 && (r[3] = 1), r
                } else r = t.match(gi) || ye.transparent;
                r = r.map(Number)
            }
            return e && !g && (s = r[0] / B, o = r[1] / B, a = r[2] / B, h = Math.max(s, o, a), f = Math.min(s, o, a),
                c = (h + f) / 2, h === f ? l = u = 0 : (d = h - f, u = c > .5 ? d / (2 - h - f) : d / (h + f), l =
                    h === s ? (o - a) / d + (o < a ? 6 : 0) : h === o ? (a - s) / d + 2 : (s - o) / d + 4, l *= 60),
                r[0] = ~~(l + .5), r[1] = ~~(u * 100 + .5), r[2] = ~~(c * 100 + .5)), i && r.length < 4 && (r[3] =
                1), r
        },
        es = function(t) {
            var e = [],
                i = [],
                r = -1;
            return t.split($t).forEach(function(s) {
                var o = s.match(re) || [];
                e.push.apply(e, o), i.push(r += o.length + 1)
            }), e.c = i, e
        },
        En = function(t, e, i) {
            var r = "",
                s = (t + r).match($t),
                o = e ? "hsla(" : "rgba(",
                a = 0,
                l, u, c, h;
            if (!s) return t;
            if (s = s.map(function(f) {
                    return (f = ts(f, e, 1)) && o + (e ? f[0] + "," + f[1] + "%," + f[2] + "%," + f[3] : f.join(
                        ",")) + ")"
                }), i && (c = es(t), l = i.c, l.join(r) !== c.c.join(r)))
                for (u = t.replace($t, "1").split(re), h = u.length - 1; a < h; a++) r += u[a] + (~l.indexOf(a) ? s
                    .shift() || o + "0,0,0,0)" : (c.length ? c : s.length ? s : i).shift());
            if (!u)
                for (u = t.split($t), h = u.length - 1; a < h; a++) r += u[a] + s[a];
            return r + u[h]
        },
        $t = function() {
            var n = "(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#(?:[0-9a-f]{3,4}){1,2}\\b",
                t;
            for (t in ye) n += "|" + t + "\\b";
            return new RegExp(n + ")", "gi")
        }(),
        Kl = /hsl[a]?\(/,
        is = function(t) {
            var e = t.join(" "),
                i;
            if ($t.lastIndex = 0, $t.test(e)) return i = Kl.test(e), t[1] = En(t[1], i), t[0] = En(t[0], i, es(t[1])), !
                0
        },
        Se, lt = function() {
            var n = Date.now,
                t = 500,
                e = 33,
                i = n(),
                r = i,
                s = 1e3 / 240,
                o = s,
                a = [],
                l, u, c, h, f, d, g = function _(m) {
                    var p = n() - r,
                        y = m === !0,
                        v, A, x, E;
                    if (p > t && (i += p - e), r += p, x = r - i, v = x - o, (v > 0 || y) && (E = ++h.frame, f = x - h
                            .time * 1e3, h.time = x = x / 1e3, o += v + (v >= s ? 4 : s - v), A = 1), y || (l = u(_)),
                        A)
                        for (d = 0; d < a.length; d++) a[d](x, f, E, m)
                };
            return h = {
                time: 0,
                frame: 0,
                tick: function() {
                    g(!0)
                },
                deltaRatio: function(m) {
                    return f / (1e3 / (m || 60))
                },
                wake: function() {
                    Or && (!mi && Wi() && (gt = mi = window, qi = gt.document || {}, ct.gsap = ot, (gt
                            .gsapVersions || (gt.gsapVersions = [])).push(ot.version), Rr(Ie || gt
                            .GreenSockGlobals || !gt.gsap && gt || {}), c = gt.requestAnimationFrame, Zr
                        .forEach(Jr)), l && h.sleep(), u = c || function(m) {
                        return setTimeout(m, o - h.time * 1e3 + 1 | 0)
                    }, Se = 1, g(2))
                },
                sleep: function() {
                    (c ? gt.cancelAnimationFrame : clearTimeout)(l), Se = 0, u = Te
                },
                lagSmoothing: function(m, p) {
                    t = m || 1 / 0, e = Math.min(p || 33, t)
                },
                fps: function(m) {
                    s = 1e3 / (m || 240), o = h.time * 1e3 + s
                },
                add: function(m, p, y) {
                    var v = p ? function(A, x, E, T) {
                        m(A, x, E, T), h.remove(v)
                    } : m;
                    return h.remove(m), a[y ? "unshift" : "push"](v), fe(), v
                },
                remove: function(m, p) {
                    ~(p = a.indexOf(m)) && a.splice(p, 1) && d >= p && d--
                },
                _listeners: a
            }, h
        }(),
        fe = function() {
            return !Se && lt.wake()
        },
        M = {},
        Ql = /^[\d.\-M][\d.\-,\s]/,
        Zl = /["']/g,
        Jl = function(t) {
            for (var e = {}, i = t.substr(1, t.length - 3).split(":"), r = i[0], s = 1, o = i.length, a, l, u; s <
                o; s++) l = i[s], a = s !== o - 1 ? l.lastIndexOf(",") : l.length, u = l.substr(0, a), e[r] = isNaN(u) ?
                u.replace(Zl, "").trim() : +u, r = l.substr(a + 1).trim();
            return e
        },
        tu = function(t) {
            var e = t.indexOf("(") + 1,
                i = t.indexOf(")"),
                r = t.indexOf("(", e);
            return t.substring(e, ~r && r < i ? t.indexOf(")", i + 1) : i)
        },
        eu = function(t) {
            var e = (t + "").split("("),
                i = M[e[0]];
            return i && e.length > 1 && i.config ? i.config.apply(null, ~t.indexOf("{") ? [Jl(e[1])] : tu(t).split(",")
                .map($r)) : M._CE && Ql.test(t) ? M._CE("", t) : i
        },
        ns = function(t) {
            return function(e) {
                return 1 - t(1 - e)
            }
        },
        rs = function n(t, e) {
            for (var i = t._first, r; i;) i instanceof it ? n(i, e) : i.vars.yoyoEase && (!i._yoyo || !i._repeat) && i
                ._yoyo !== e && (i.timeline ? n(i.timeline, e) : (r = i._ease, i._ease = i._yEase, i._yEase = r, i
                    ._yoyo = e)), i = i._next
        },
        te = function(t, e) {
            return t && (V(t) ? t : M[t] || eu(t)) || e
        },
        ie = function(t, e, i, r) {
            i === void 0 && (i = function(l) {
                return 1 - e(1 - l)
            }), r === void 0 && (r = function(l) {
                return l < .5 ? e(l * 2) / 2 : 1 - e((1 - l) * 2) / 2
            });
            var s = {
                    easeIn: e,
                    easeOut: i,
                    easeInOut: r
                },
                o;
            return rt(t, function(a) {
                M[a] = ct[a] = s, M[o = a.toLowerCase()] = i;
                for (var l in s) M[o + (l === "easeIn" ? ".in" : l === "easeOut" ? ".out" : ".inOut")] = M[a +
                    "." + l] = s[l]
            }), s
        },
        ss = function(t) {
            return function(e) {
                return e < .5 ? (1 - t(1 - e * 2)) / 2 : .5 + t((e - .5) * 2) / 2
            }
        },
        ai = function n(t, e, i) {
            var r = e >= 1 ? e : 1,
                s = (i || (t ? .3 : .45)) / (e < 1 ? e : 1),
                o = s / pi * (Math.asin(1 / r) || 0),
                a = function(c) {
                    return c === 1 ? 1 : r * Math.pow(2, -10 * c) * kl((c - o) * s) + 1
                },
                l = t === "out" ? a : t === "in" ? function(u) {
                    return 1 - a(1 - u)
                } : ss(a);
            return s = pi / s, l.config = function(u, c) {
                return n(t, u, c)
            }, l
        },
        li = function n(t, e) {
            e === void 0 && (e = 1.70158);
            var i = function(o) {
                    return o ? --o * o * ((e + 1) * o + e) + 1 : 0
                },
                r = t === "out" ? i : t === "in" ? function(s) {
                    return 1 - i(1 - s)
                } : ss(i);
            return r.config = function(s) {
                return n(t, s)
            }, r
        };
    rt("Linear,Quad,Cubic,Quart,Quint,Strong", function(n, t) {
        var e = t < 5 ? t + 1 : t;
        ie(n + ",Power" + (e - 1), t ? function(i) {
            return Math.pow(i, e)
        } : function(i) {
            return i
        }, function(i) {
            return 1 - Math.pow(1 - i, e)
        }, function(i) {
            return i < .5 ? Math.pow(i * 2, e) / 2 : 1 - Math.pow((1 - i) * 2, e) / 2
        })
    });
    M.Linear.easeNone = M.none = M.Linear.easeIn;
    ie("Elastic", ai("in"), ai("out"), ai());
    (function(n, t) {
        var e = 1 / t,
            i = 2 * e,
            r = 2.5 * e,
            s = function(a) {
                return a < e ? n * a * a : a < i ? n * Math.pow(a - 1.5 / t, 2) + .75 : a < r ? n * (a -= 2.25 /
                    t) * a + .9375 : n * Math.pow(a - 2.625 / t, 2) + .984375
            };
        ie("Bounce", function(o) {
            return 1 - s(1 - o)
        }, s)
    })(7.5625, 2.75);
    ie("Expo", function(n) {
        return n ? Math.pow(2, 10 * (n - 1)) : 0
    });
    ie("Circ", function(n) {
        return -(Pr(1 - n * n) - 1)
    });
    ie("Sine", function(n) {
        return n === 1 ? 1 : -Pl(n * Sl) + 1
    });
    ie("Back", li("in"), li("out"), li());
    M.SteppedEase = M.steps = ct.SteppedEase = {
        config: function(t, e) {
            t === void 0 && (t = 1);
            var i = 1 / t,
                r = t + (e ? 0 : 1),
                s = e ? 1 : 0,
                o = 1 - L;
            return function(a) {
                return ((r * Fe(0, o, a) | 0) + s) * i
            }
        }
    };
    ue.ease = M["quad.out"];
    rt("onComplete,onUpdate,onStart,onRepeat,onReverseComplete,onInterrupt", function(n) {
        return Qi += n + "," + n + "Params,"
    });
    var os = function(t, e) {
            this.id = Cl++, t._gsap = this, this.target = t, this.harness = e, this.get = e ? e.get : Br, this.set = e ?
                e.getSetter : nn
        },
        _e = function() {
            function n(e) {
                this.vars = e, this._delay = +e.delay || 0, (this._repeat = e.repeat === 1 / 0 ? -2 : e.repeat || 0) &&
                    (this._rDelay = e.repeatDelay || 0, this._yoyo = !!e.yoyo || !!e.yoyoEase), this._ts = 1, he(this, +
                        e.duration, 1, 1), this.data = e.data, G && (this._ctx = G, G.data.push(this)), Se || lt.wake()
            }
            var t = n.prototype;
            return t.delay = function(i) {
                return i || i === 0 ? (this.parent && this.parent.smoothChildTiming && this.startTime(this._start +
                    i - this._delay), this._delay = i, this) : this._delay
            }, t.duration = function(i) {
                return arguments.length ? this.totalDuration(this._repeat > 0 ? i + (i + this._rDelay) * this
                    ._repeat : i) : this.totalDuration() && this._dur
            }, t.totalDuration = function(i) {
                return arguments.length ? (this._dirty = 0, he(this, this._repeat < 0 ? i : (i - this._repeat * this
                    ._rDelay) / (this._repeat + 1))) : this._tDur
            }, t.totalTime = function(i, r) {
                if (fe(), !arguments.length) return this._tTime;
                var s = this._dp;
                if (s && s.smoothChildTiming && this._ts) {
                    for (ti(this, i), !s._dp || s.parent || Vr(s, this); s && s.parent;) s.parent._time !== s
                        ._start + (s._ts >= 0 ? s._tTime / s._ts : (s.totalDuration() - s._tTime) / -s._ts) && s
                        .totalTime(s._tTime, !0), s = s.parent;
                    !this.parent && this._dp.autoRemoveChildren && (this._ts > 0 && i < this._tDur || this._ts <
                        0 && i > 0 || !this._tDur && !i) && wt(this._dp, this, this._start - this._delay)
                }
                return (this._tTime !== i || !this._dur && !r || this._initted && Math.abs(this._zTime) === L || !
                    i && !this._initted && (this.add || this._ptLookup)) && (this._ts || (this._pTime = i), Lr(
                    this, i, r)), this
            }, t.time = function(i, r) {
                return arguments.length ? this.totalTime(Math.min(this.totalDuration(), i + bn(this)) % (this._dur +
                    this._rDelay) || (i ? this._dur : 0), r) : this._time
            }, t.totalProgress = function(i, r) {
                return arguments.length ? this.totalTime(this.totalDuration() * i, r) : this.totalDuration() ? Math
                    .min(1, this._tTime / this._tDur) : this.ratio
            }, t.progress = function(i, r) {
                return arguments.length ? this.totalTime(this.duration() * (this._yoyo && !(this.iteration() & 1) ?
                        1 - i : i) + bn(this), r) : this.duration() ? Math.min(1, this._time / this._dur) : this
                    .ratio
            }, t.iteration = function(i, r) {
                var s = this.duration() + this._rDelay;
                return arguments.length ? this.totalTime(this._time + (i - 1) * s, r) : this._repeat ? ce(this
                    ._tTime, s) + 1 : 1
            }, t.timeScale = function(i) {
                if (!arguments.length) return this._rts === -L ? 0 : this._rts;
                if (this._rts === i) return this;
                var r = this.parent && this._ts ? Ue(this.parent._time, this) : this._tTime;
                return this._rts = +i || 0, this._ts = this._ps || i === -L ? 0 : this._rts, this.totalTime(Fe(-Math
                    .abs(this._delay), this._tDur, r), !0), Je(this), Il(this)
            }, t.paused = function(i) {
                return arguments.length ? (this._ps !== i && (this._ps = i, i ? (this._pTime = this._tTime || Math
                    .max(-this._delay, this.rawTime()), this._ts = this._act = 0) : (fe(), this._ts =
                    this._rts, this.totalTime(this.parent && !this.parent.smoothChildTiming ? this
                        .rawTime() : this._tTime || this._pTime, this.progress() === 1 && Math.abs(this
                            ._zTime) !== L && (this._tTime -= L)))), this) : this._ps
            }, t.startTime = function(i) {
                if (arguments.length) {
                    this._start = i;
                    var r = this.parent || this._dp;
                    return r && (r._sort || !this.parent) && wt(r, this, i - this._delay), this
                }
                return this._start
            }, t.endTime = function(i) {
                return this._start + (nt(i) ? this.totalDuration() : this.duration()) / Math.abs(this._ts || 1)
            }, t.rawTime = function(i) {
                var r = this.parent || this._dp;
                return r ? i && (!this._ts || this._repeat && this._time && this.totalProgress() < 1) ? this
                    ._tTime % (this._dur + this._rDelay) : this._ts ? Ue(r.rawTime(i), this) : this._tTime : this
                    ._tTime
            }, t.revert = function(i) {
                i === void 0 && (i = Dl);
                var r = Q;
                return Q = i, (this._initted || this._startAt) && (this.timeline && this.timeline.revert(i), this
                        .totalTime(-.01, i.suppressEvents)), this.data !== "nested" && i.kill !== !1 && this.kill(),
                    Q = r, this
            }, t.globalTime = function(i) {
                for (var r = this, s = arguments.length ? i : r.rawTime(); r;) s = r._start + s / (r._ts || 1), r =
                    r._dp;
                return !this.parent && this._sat ? this._sat.vars.immediateRender ? -1 : this._sat.globalTime(i) : s
            }, t.repeat = function(i) {
                return arguments.length ? (this._repeat = i === 1 / 0 ? -2 : i, wn(this)) : this._repeat === -2 ?
                    1 / 0 : this._repeat
            }, t.repeatDelay = function(i) {
                if (arguments.length) {
                    var r = this._time;
                    return this._rDelay = i, wn(this), r ? this.time(r) : this
                }
                return this._rDelay
            }, t.yoyo = function(i) {
                return arguments.length ? (this._yoyo = i, this) : this._yoyo
            }, t.seek = function(i, r) {
                return this.totalTime(pt(this, i), nt(r))
            }, t.restart = function(i, r) {
                return this.play().totalTime(i ? -this._delay : 0, nt(r))
            }, t.play = function(i, r) {
                return i != null && this.seek(i, r), this.reversed(!1).paused(!1)
            }, t.reverse = function(i, r) {
                return i != null && this.seek(i || this.totalDuration(), r), this.reversed(!0).paused(!1)
            }, t.pause = function(i, r) {
                return i != null && this.seek(i, r), this.paused(!0)
            }, t.resume = function() {
                return this.paused(!1)
            }, t.reversed = function(i) {
                return arguments.length ? (!!i !== this.reversed() && this.timeScale(-this._rts || (i ? -L : 0)),
                    this) : this._rts < 0
            }, t.invalidate = function() {
                return this._initted = this._act = 0, this._zTime = -L, this
            }, t.isActive = function() {
                var i = this.parent || this._dp,
                    r = this._start,
                    s;
                return !!(!i || this._ts && this._initted && i.isActive() && (s = i.rawTime(!0)) >= r && s < this
                    .endTime(!0) - L)
            }, t.eventCallback = function(i, r, s) {
                var o = this.vars;
                return arguments.length > 1 ? (r ? (o[i] = r, s && (o[i + "Params"] = s), i === "onUpdate" && (this
                    ._onUpdate = r)) : delete o[i], this) : o[i]
            }, t.then = function(i) {
                var r = this;
                return new Promise(function(s) {
                    var o = V(i) ? i : Ur,
                        a = function() {
                            var u = r.then;
                            r.then = null, V(o) && (o = o(r)) && (o.then || o === r) && (r.then = u), s(o),
                                r.then = u
                        };
                    r._initted && r.totalProgress() === 1 && r._ts >= 0 || !r._tTime && r._ts < 0 ? a() : r
                        ._prom = a
                })
            }, t.kill = function() {
                me(this)
            }, n
        }();
    xt(_e.prototype, {
        _time: 0,
        _start: 0,
        _end: 0,
        _tTime: 0,
        _tDur: 0,
        _dirty: 0,
        _repeat: 0,
        _yoyo: !1,
        parent: null,
        _initted: !1,
        _rDelay: 0,
        _ts: 1,
        _dp: 0,
        ratio: 0,
        _zTime: -L,
        _prom: 0,
        _ps: !1,
        _rts: 1
    });
    var it = function(n) {
        Cr(t, n);

        function t(i, r) {
            var s;
            return i === void 0 && (i = {}), s = n.call(this, i) || this, s.labels = {}, s.smoothChildTiming = !!i
                .smoothChildTiming, s.autoRemoveChildren = !!i.autoRemoveChildren, s._sort = nt(i.sortChildren),
                U && wt(i.parent || U, kt(s), r), i.reversed && s.reverse(), i.paused && s.paused(!0), i
                .scrollTrigger && Yr(kt(s), i.scrollTrigger), s
        }
        var e = t.prototype;
        return e.to = function(r, s, o) {
            return xe(0, arguments, this), this
        }, e.from = function(r, s, o) {
            return xe(1, arguments, this), this
        }, e.fromTo = function(r, s, o, a) {
            return xe(2, arguments, this), this
        }, e.set = function(r, s, o) {
            return s.duration = 0, s.parent = this, ve(s).repeatDelay || (s.repeat = 0), s.immediateRender = !!s
                .immediateRender, new X(r, s, pt(this, o), 1), this
        }, e.call = function(r, s, o) {
            return wt(this, X.delayedCall(0, r, s), o)
        }, e.staggerTo = function(r, s, o, a, l, u, c) {
            return o.duration = s, o.stagger = o.stagger || a, o.onComplete = u, o.onCompleteParams = c, o
                .parent = this, new X(r, o, pt(this, l)), this
        }, e.staggerFrom = function(r, s, o, a, l, u, c) {
            return o.runBackwards = 1, ve(o).immediateRender = nt(o.immediateRender), this.staggerTo(r, s, o, a,
                l, u, c)
        }, e.staggerFromTo = function(r, s, o, a, l, u, c, h) {
            return a.startAt = o, ve(a).immediateRender = nt(a.immediateRender), this.staggerTo(r, s, a, l, u,
                c, h)
        }, e.render = function(r, s, o) {
            var a = this._time,
                l = this._dirty ? this.totalDuration() : this._tDur,
                u = this._dur,
                c = r <= 0 ? 0 : q(r),
                h = this._zTime < 0 != r < 0 && (this._initted || !u),
                f, d, g, _, m, p, y, v, A, x, E, T;
            if (this !== U && c > l && r >= 0 && (c = l), c !== this._tTime || o || h) {
                if (a !== this._time && u && (c += this._time - a, r += this._time - a), f = c, A = this._start,
                    v = this._ts, p = !v, h && (u || (a = this._zTime), (r || !s) && (this._zTime = r)), this
                    ._repeat) {
                    if (E = this._yoyo, m = u + this._rDelay, this._repeat < -1 && r < 0) return this.totalTime(
                        m * 100 + r, s, o);
                    if (f = q(c % m), c === l ? (_ = this._repeat, f = u) : (_ = ~~(c / m), _ && _ === c / m &&
                            (f = u, _--), f > u && (f = u)), x = ce(this._tTime, m), !a && this._tTime && x !==
                        _ && this._tTime - x * m - this._dur <= 0 && (x = _), E && _ & 1 && (f = u - f, T = 1),
                        _ !== x && !this._lock) {
                        var w = E && x & 1,
                            b = w === (E && _ & 1);
                        if (_ < x && (w = !w), a = w ? 0 : u, this._lock = 1, this.render(a || (T ? 0 : q(_ *
                                m)), s, !u)._lock = 0, this._tTime = c, !s && this.parent && vt(this,
                                "onRepeat"), this.vars.repeatRefresh && !T && (this.invalidate()._lock = 1),
                            a && a !== this._time || p !== !this._ts || this.vars.onRepeat && !this.parent && !
                            this._act) return this;
                        if (u = this._dur, l = this._tDur, b && (this._lock = 2, a = w ? u : -1e-4, this.render(
                                a, !0), this.vars.repeatRefresh && !T && this.invalidate()), this._lock = 0, !
                            this._ts && !p) return this;
                        rs(this, T)
                    }
                }
                if (this._hasPause && !this._forcing && this._lock < 2 && (y = Ul(this, q(a), q(f)), y && (c -=
                        f - (f = y._start))), this._tTime = c, this._time = f, this._act = !v, this._initted ||
                    (this._onUpdate = this.vars.onUpdate, this._initted = 1, this._zTime = r, a = 0), !a && f &&
                    !s && !_ && (vt(this, "onStart"), this._tTime !== c)) return this;
                if (f >= a && r >= 0)
                    for (d = this._first; d;) {
                        if (g = d._next, (d._act || f >= d._start) && d._ts && y !== d) {
                            if (d.parent !== this) return this.render(r, s, o);
                            if (d.render(d._ts > 0 ? (f - d._start) * d._ts : (d._dirty ? d.totalDuration() : d
                                    ._tDur) + (f - d._start) * d._ts, s, o), f !== this._time || !this._ts && !
                                p) {
                                y = 0, g && (c += this._zTime = -L);
                                break
                            }
                        }
                        d = g
                    } else {
                        d = this._last;
                        for (var S = r < 0 ? r : f; d;) {
                            if (g = d._prev, (d._act || S <= d._end) && d._ts && y !== d) {
                                if (d.parent !== this) return this.render(r, s, o);
                                if (d.render(d._ts > 0 ? (S - d._start) * d._ts : (d._dirty ? d
                                        .totalDuration() : d._tDur) + (S - d._start) * d._ts, s, o || Q && (
                                        d
                                        ._initted || d._startAt)), f !== this._time || !this._ts && !p) {
                                    y = 0, g && (c += this._zTime = S ? -L : L);
                                    break
                                }
                            }
                            d = g
                        }
                    }
                if (y && !s && (this.pause(), y.render(f >= a ? 0 : -L)._zTime = f >= a ? 1 : -1, this._ts))
                    return this._start = A, Je(this), this.render(r, s, o);
                this._onUpdate && !s && vt(this, "onUpdate", !0), (c === l && this._tTime >= this
                        .totalDuration() || !c && a) && (A === this._start || Math.abs(v) !== Math.abs(this
                        ._ts)) &&
                    (this._lock || ((r || !u) && (c === l && this._ts > 0 || !c && this._ts < 0) && Ut(this, 1),
                        !s && !(r < 0 && !a) && (c || a || !l) && (vt(this, c === l && r >= 0 ?
                            "onComplete" : "onReverseComplete", !0), this._prom && !(c < l && this
                            .timeScale() > 0) && this._prom())))
            }
            return this
        }, e.add = function(r, s) {
            var o = this;
            if (Mt(s) || (s = pt(this, s, r)), !(r instanceof _e)) {
                if (Z(r)) return r.forEach(function(a) {
                    return o.add(a, s)
                }), this;
                if (W(r)) return this.addLabel(r, s);
                if (V(r)) r = X.delayedCall(0, r);
                else return this
            }
            return this !== r ? wt(this, r, s) : this
        }, e.getChildren = function(r, s, o, a) {
            r === void 0 && (r = !0), s === void 0 && (s = !0), o === void 0 && (o = !0), a === void 0 && (a = -
                mt);
            for (var l = [], u = this._first; u;) u._start >= a && (u instanceof X ? s && l.push(u) : (o && l
                .push(u), r && l.push.apply(l, u.getChildren(!0, s, o)))), u = u._next;
            return l
        }, e.getById = function(r) {
            for (var s = this.getChildren(1, 1, 1), o = s.length; o--;)
                if (s[o].vars.id === r) return s[o]
        }, e.remove = function(r) {
            return W(r) ? this.removeLabel(r) : V(r) ? this.killTweensOf(r) : (Ze(this, r), r === this
                ._recent && (this._recent = this._last), Jt(this))
        }, e.totalTime = function(r, s) {
            return arguments.length ? (this._forcing = 1, !this._dp && this._ts && (this._start = q(lt.time - (
                    this._ts > 0 ? r / this._ts : (this.totalDuration() - r) / -this._ts))), n.prototype
                .totalTime.call(this, r, s), this._forcing = 0, this) : this._tTime
        }, e.addLabel = function(r, s) {
            return this.labels[r] = pt(this, s), this
        }, e.removeLabel = function(r) {
            return delete this.labels[r], this
        }, e.addPause = function(r, s, o) {
            var a = X.delayedCall(0, s || Te, o);
            return a.data = "isPause", this._hasPause = 1, wt(this, a, pt(this, r))
        }, e.removePause = function(r) {
            var s = this._first;
            for (r = pt(this, r); s;) s._start === r && s.data === "isPause" && Ut(s), s = s._next
        }, e.killTweensOf = function(r, s, o) {
            for (var a = this.getTweensOf(r, o), l = a.length; l--;) Rt !== a[l] && a[l].kill(r, s);
            return this
        }, e.getTweensOf = function(r, s) {
            for (var o = [], a = yt(r), l = this._first, u = Mt(s), c; l;) l instanceof X ? Ol(l._targets, a) &&
                (u ? (!Rt || l._initted && l._ts) && l.globalTime(0) <= s && l.globalTime(l.totalDuration()) >
                    s : !s || l.isActive()) && o.push(l) : (c = l.getTweensOf(a, s)).length && o.push.apply(o,
                    c), l = l._next;
            return o
        }, e.tweenTo = function(r, s) {
            s = s || {};
            var o = this,
                a = pt(o, r),
                l = s,
                u = l.startAt,
                c = l.onStart,
                h = l.onStartParams,
                f = l.immediateRender,
                d, g = X.to(o, xt({
                    ease: s.ease || "none",
                    lazy: !1,
                    immediateRender: !1,
                    time: a,
                    overwrite: "auto",
                    duration: s.duration || Math.abs((a - (u && "time" in u ? u.time : o._time)) / o
                        .timeScale()) || L,
                    onStart: function() {
                        if (o.pause(), !d) {
                            var m = s.duration || Math.abs((a - (u && "time" in u ? u.time : o
                                ._time)) / o.timeScale());
                            g._dur !== m && he(g, m, 0, 1).render(g._time, !0, !0), d = 1
                        }
                        c && c.apply(g, h || [])
                    }
                }, s));
            return f ? g.render(0) : g
        }, e.tweenFromTo = function(r, s, o) {
            return this.tweenTo(s, xt({
                startAt: {
                    time: pt(this, r)
                }
            }, o))
        }, e.recent = function() {
            return this._recent
        }, e.nextLabel = function(r) {
            return r === void 0 && (r = this._time), Tn(this, pt(this, r))
        }, e.previousLabel = function(r) {
            return r === void 0 && (r = this._time), Tn(this, pt(this, r), 1)
        }, e.currentLabel = function(r) {
            return arguments.length ? this.seek(r, !0) : this.previousLabel(this._time + L)
        }, e.shiftChildren = function(r, s, o) {
            o === void 0 && (o = 0);
            for (var a = this._first, l = this.labels, u; a;) a._start >= o && (a._start += r, a._end += r), a =
                a._next;
            if (s)
                for (u in l) l[u] >= o && (l[u] += r);
            return Jt(this)
        }, e.invalidate = function(r) {
            var s = this._first;
            for (this._lock = 0; s;) s.invalidate(r), s = s._next;
            return n.prototype.invalidate.call(this, r)
        }, e.clear = function(r) {
            r === void 0 && (r = !0);
            for (var s = this._first, o; s;) o = s._next, this.remove(s), s = o;
            return this._dp && (this._time = this._tTime = this._pTime = 0), r && (this.labels = {}), Jt(this)
        }, e.totalDuration = function(r) {
            var s = 0,
                o = this,
                a = o._last,
                l = mt,
                u, c, h;
            if (arguments.length) return o.timeScale((o._repeat < 0 ? o.duration() : o.totalDuration()) / (o
                .reversed() ? -r : r));
            if (o._dirty) {
                for (h = o.parent; a;) u = a._prev, a._dirty && a.totalDuration(), c = a._start, c > l && o
                    ._sort && a._ts && !o._lock ? (o._lock = 1, wt(o, a, c - a._delay, 1)._lock = 0) : l = c,
                    c < 0 && a._ts && (s -= c, (!h && !o._dp || h && h.smoothChildTiming) && (o._start += c / o
                        ._ts, o._time -= c, o._tTime -= c), o.shiftChildren(-c, !1, -1 / 0), l = 0), a._end >
                    s && a._ts && (s = a._end), a = u;
                he(o, o === U && o._time > s ? o._time : s, 1, 1), o._dirty = 0
            }
            return o._tDur
        }, t.updateRoot = function(r) {
            if (U._ts && (Lr(U, Ue(r, U)), Ir = lt.frame), lt.frame >= xn) {
                xn += ut.autoSleep || 120;
                var s = U._first;
                if ((!s || !s._ts) && ut.autoSleep && lt._listeners.length < 2) {
                    for (; s && !s._ts;) s = s._next;
                    s || lt.sleep()
                }
            }
        }, t
    }(_e);
    xt(it.prototype, {
        _lock: 0,
        _hasPause: 0,
        _forcing: 0
    });
    var iu = function(t, e, i, r, s, o, a) {
            var l = new st(this._pt, t, e, 0, 1, fs, null, s),
                u = 0,
                c = 0,
                h, f, d, g, _, m, p, y;
            for (l.b = i, l.e = r, i += "", r += "", (p = ~r.indexOf("random(")) && (r = Ee(r)), o && (y = [i, r], o(y,
                    t, e), i = y[0], r = y[1]), f = i.match(ri) || []; h = ri.exec(r);) g = h[0], _ = r.substring(u, h
                .index), d ? d = (d + 1) % 5 : _.substr(-5) === "rgba(" && (d = 1), g !== f[c++] && (m = parseFloat(
                f[c - 1]) || 0, l._pt = {
                _next: l._pt,
                p: _ || c === 1 ? _ : ",",
                s: m,
                c: g.charAt(1) === "=" ? oe(m, g) - m : parseFloat(g) - m,
                m: d && d < 4 ? Math.round : 0
            }, u = ri.lastIndex);
            return l.c = u < r.length ? r.substring(u, r.length) : "", l.fp = a, (Mr.test(r) || p) && (l.e = 0), this
                ._pt = l, l
        },
        Ji = function(t, e, i, r, s, o, a, l, u, c) {
            V(r) && (r = r(s || 0, t, o));
            var h = t[e],
                f = i !== "get" ? i : V(h) ? u ? t[e.indexOf("set") || !V(t["get" + e.substr(3)]) ? e : "get" + e
                    .substr(3)](u) : t[e]() : h,
                d = V(h) ? u ? au : cs : en,
                g;
            if (W(r) && (~r.indexOf("random(") && (r = Ee(r)), r.charAt(1) === "=" && (g = oe(f, r) + (K(f) || 0), (g ||
                    g === 0) && (r = g))), !c || f !== r || Ti) return !isNaN(f * r) && r !== "" ? (g = new st(this._pt,
                    t, e, +f || 0, r - (f || 0), typeof h == "boolean" ? uu : hs, 0, d), u && (g.fp = u), a && g
                .modifier(a, this, t), this._pt = g) : (!h && !(e in t) && ji(e, r), iu.call(this, t, e, f, r,
                d, l || ut.stringFilter, u))
        },
        nu = function(t, e, i, r, s) {
            if (V(t) && (t = Ae(t, s, e, i, r)), !Ct(t) || t.style && t.nodeType || Z(t) || kr(t)) return W(t) ? Ae(t,
                s, e, i, r) : t;
            var o = {},
                a;
            for (a in t) o[a] = Ae(t[a], s, e, i, r);
            return o
        },
        as = function(t, e, i, r, s, o) {
            var a, l, u, c;
            if (at[t] && (a = new at[t]).init(s, a.rawVars ? e[t] : nu(e[t], r, s, o, i), i, r, o) !== !1 && (i._pt =
                    l = new st(i._pt, s, t, 0, 1, a.render, a, 0, a.priority), i !== se))
                for (u = i._ptLookup[i._targets.indexOf(s)], c = a._props.length; c--;) u[a._props[c]] = l;
            return a
        },
        Rt, Ti, tn = function n(t, e, i) {
            var r = t.vars,
                s = r.ease,
                o = r.startAt,
                a = r.immediateRender,
                l = r.lazy,
                u = r.onUpdate,
                c = r.onUpdateParams,
                h = r.callbackScope,
                f = r.runBackwards,
                d = r.yoyoEase,
                g = r.keyframes,
                _ = r.autoRevert,
                m = t._dur,
                p = t._startAt,
                y = t._targets,
                v = t.parent,
                A = v && v.data === "nested" ? v.vars.targets : y,
                x = t._overwrite === "auto" && !Hi,
                E = t.timeline,
                T, w, b, S, C, F, D, O, k, z, R, I, ht;
            if (E && (!g || !s) && (s = "none"), t._ease = te(s, ue.ease), t._yEase = d ? ns(te(d === !0 ? s : d, ue
                    .ease)) : 0, d && t._yoyo && !t._repeat && (d = t._yEase, t._yEase = t._ease, t._ease = d), t
                ._from = !E && !!r.runBackwards, !E || g && !r.stagger) {
                if (O = y[0] ? Zt(y[0]).harness : 0, I = O && r[O.prop], T = $e(r, Ki), p && (p._zTime < 0 && p
                        .progress(1), e < 0 && f && a && !_ ? p.render(-1, !0) : p.revert(f && m ? De : Ml), p._lazy = 0
                    ), o) {
                    if (Ut(t._startAt = X.set(y, xt({
                            data: "isStart",
                            overwrite: !1,
                            parent: v,
                            immediateRender: !0,
                            lazy: !p && nt(l),
                            startAt: null,
                            delay: 0,
                            onUpdate: u,
                            onUpdateParams: c,
                            callbackScope: h,
                            stagger: 0
                        }, o))), t._startAt._dp = 0, t._startAt._sat = t, e < 0 && (Q || !a && !_) && t._startAt.revert(
                            De), a && m && e <= 0 && i <= 0) {
                        e && (t._zTime = e);
                        return
                    }
                } else if (f && m && !p) {
                    if (e && (a = !1), b = xt({
                            overwrite: !1,
                            data: "isFromStart",
                            lazy: a && !p && nt(l),
                            immediateRender: a,
                            stagger: 0,
                            parent: v
                        }, T), I && (b[O.prop] = I), Ut(t._startAt = X.set(y, b)), t._startAt._dp = 0, t._startAt._sat =
                        t, e < 0 && (Q ? t._startAt.revert(De) : t._startAt.render(-1, !0)), t._zTime = e, !a) n(t
                        ._startAt, L, L);
                    else if (!e) return
                }
                for (t._pt = t._ptCache = 0, l = m && nt(l) || l && !m, w = 0; w < y.length; w++) {
                    if (C = y[w], D = C._gsap || Zi(y)[w]._gsap, t._ptLookup[w] = z = {}, yi[D.id] && Lt.length && Le(),
                        R = A === y ? w : A.indexOf(C), O && (k = new O).init(C, I || T, t, R, A) !== !1 && (t._pt = S =
                            new st(t._pt, C, k.name, 0, 1, k.render, k, 0, k.priority), k._props.forEach(function(ft) {
                                z[ft] = S
                            }), k.priority && (F = 1)), !O || I)
                        for (b in T) at[b] && (k = as(b, T, t, R, C, A)) ? k.priority && (F = 1) : z[b] = S = Ji.call(t,
                            C, b, "get", T[b], R, A, 0, r.stringFilter);
                    t._op && t._op[w] && t.kill(C, t._op[w]), x && t._pt && (Rt = t, U.killTweensOf(C, z, t.globalTime(
                        e)), ht = !t.parent, Rt = 0), t._pt && l && (yi[D.id] = 1)
                }
                F && _s(t), t._onInit && t._onInit(t)
            }
            t._onUpdate = u, t._initted = (!t._op || t._pt) && !ht, g && e <= 0 && E.render(mt, !0, !0)
        },
        ru = function(t, e, i, r, s, o, a) {
            var l = (t._pt && t._ptCache || (t._ptCache = {}))[e],
                u, c, h, f;
            if (!l)
                for (l = t._ptCache[e] = [], h = t._ptLookup, f = t._targets.length; f--;) {
                    if (u = h[f][e], u && u.d && u.d._pt)
                        for (u = u.d._pt; u && u.p !== e && u.fp !== e;) u = u._next;
                    if (!u) return Ti = 1, t.vars[e] = "+=0", tn(t, a), Ti = 0, 1;
                    l.push(u)
                }
            for (f = l.length; f--;) c = l[f], u = c._pt || c, u.s = (r || r === 0) && !s ? r : u.s + (r || 0) + o * u
                .c, u.c = i - u.s, c.e && (c.e = Y(i) + K(c.e)), c.b && (c.b = u.s + K(c.b))
        },
        su = function(t, e) {
            var i = t[0] ? Zt(t[0]).harness : 0,
                r = i && i.aliases,
                s, o, a, l;
            if (!r) return e;
            s = ee({}, e);
            for (o in r)
                if (o in s)
                    for (l = r[o].split(","), a = l.length; a--;) s[l[a]] = s[o];
            return s
        },
        ou = function(t, e, i, r) {
            var s = e.ease || r || "power1.inOut",
                o, a;
            if (Z(e)) a = i[t] || (i[t] = []), e.forEach(function(l, u) {
                return a.push({
                    t: u / (e.length - 1) * 100,
                    v: l,
                    e: s
                })
            });
            else
                for (o in e) a = i[o] || (i[o] = []), o === "ease" || a.push({
                    t: parseFloat(t),
                    v: e[o],
                    e: s
                })
        },
        Ae = function(t, e, i, r, s) {
            return V(t) ? t.call(e, i, r, s) : W(t) && ~t.indexOf("random(") ? Ee(t) : t
        },
        ls = Qi + "repeat,repeatDelay,yoyo,repeatRefresh,yoyoEase,autoRevert",
        us = {};
    rt(ls + ",id,stagger,delay,duration,paused,scrollTrigger", function(n) {
        return us[n] = 1
    });
    var X = function(n) {
        Cr(t, n);

        function t(i, r, s, o) {
            var a;
            typeof r == "number" && (s.duration = r, r = s, s = null), a = n.call(this, o ? r : ve(r)) || this;
            var l = a.vars,
                u = l.duration,
                c = l.delay,
                h = l.immediateRender,
                f = l.stagger,
                d = l.overwrite,
                g = l.keyframes,
                _ = l.defaults,
                m = l.scrollTrigger,
                p = l.yoyoEase,
                y = r.parent || U,
                v = (Z(i) || kr(i) ? Mt(i[0]) : "length" in r) ? [i] : yt(i),
                A, x, E, T, w, b, S, C;
            if (a._targets = v.length ? Zi(v) : Be("GSAP target " + i + " not found. https://greensock.com", !ut
                    .nullTargetWarn) || [], a._ptLookup = [], a._overwrite = d, g || f || Me(u) || Me(c)) {
                if (r = a.vars, A = a.timeline = new it({
                        data: "nested",
                        defaults: _ || {},
                        targets: y && y.data === "nested" ? y.vars.targets : v
                    }), A.kill(), A.parent = A._dp = kt(a), A._start = 0, f || Me(u) || Me(c)) {
                    if (T = v.length, S = f && Wr(f), Ct(f))
                        for (w in f) ~ls.indexOf(w) && (C || (C = {}), C[w] = f[w]);
                    for (x = 0; x < T; x++) E = $e(r, us), E.stagger = 0, p && (E.yoyoEase = p), C && ee(E, C), b =
                        v[x], E.duration = +Ae(u, kt(a), x, b, v), E.delay = (+Ae(c, kt(a), x, b, v) || 0) - a
                        ._delay, !f && T === 1 && E.delay && (a._delay = c = E.delay, a._start += c, E.delay = 0), A
                        .to(b, E, S ? S(x, b, v) : 0), A._ease = M.none;
                    A.duration() ? u = c = 0 : a.timeline = 0
                } else if (g) {
                    ve(xt(A.vars.defaults, {
                        ease: "none"
                    })), A._ease = te(g.ease || r.ease || "none");
                    var F = 0,
                        D, O, k;
                    if (Z(g)) g.forEach(function(z) {
                        return A.to(v, z, ">")
                    }), A.duration();
                    else {
                        E = {};
                        for (w in g) w === "ease" || w === "easeEach" || ou(w, g[w], E, g.easeEach);
                        for (w in E)
                            for (D = E[w].sort(function(z, R) {
                                    return z.t - R.t
                                }), F = 0, x = 0; x < D.length; x++) O = D[x], k = {
                                ease: O.e,
                                duration: (O.t - (x ? D[x - 1].t : 0)) / 100 * u
                            }, k[w] = O.v, A.to(v, k, F), F += k.duration;
                        A.duration() < u && A.to({}, {
                            duration: u - A.duration()
                        })
                    }
                }
                u || a.duration(u = A.duration())
            } else a.timeline = 0;
            return d === !0 && !Hi && (Rt = kt(a), U.killTweensOf(v), Rt = 0), wt(y, kt(a), s), r.reversed && a
                .reverse(), r.paused && a.paused(!0), (h || !u && !g && a._start === q(y._time) && nt(h) && Bl(kt(
                    a)) && y.data !== "nested") && (a._tTime = -L, a.render(Math.max(0, -c) || 0)), m && Yr(kt(a),
                    m), a
        }
        var e = t.prototype;
        return e.render = function(r, s, o) {
            var a = this._time,
                l = this._tDur,
                u = this._dur,
                c = r < 0,
                h = r > l - L && !c ? l : r < L ? 0 : r,
                f, d, g, _, m, p, y, v, A;
            if (!u) $l(this, r, s, o);
            else if (h !== this._tTime || !r || o || !this._initted && this._tTime || this._startAt && this
                ._zTime < 0 !== c) {
                if (f = h, v = this.timeline, this._repeat) {
                    if (_ = u + this._rDelay, this._repeat < -1 && c) return this.totalTime(_ * 100 + r, s, o);
                    if (f = q(h % _), h === l ? (g = this._repeat, f = u) : (g = ~~(h / _), g && g === h / _ &&
                            (f = u, g--), f > u && (f = u)), p = this._yoyo && g & 1, p && (A = this._yEase, f =
                            u - f), m = ce(this._tTime, _), f === a && !o && this._initted) return this._tTime =
                        h, this;
                    g !== m && (v && this._yEase && rs(v, p), this.vars.repeatRefresh && !p && !this._lock && (
                        this._lock = o = 1, this.render(q(_ * g), !0).invalidate()._lock = 0))
                }
                if (!this._initted) {
                    if (Gr(this, c ? r : f, o, s, h)) return this._tTime = 0, this;
                    if (a !== this._time) return this;
                    if (u !== this._dur) return this.render(r, s, o)
                }
                if (this._tTime = h, this._time = f, !this._act && this._ts && (this._act = 1, this._lazy = 0),
                    this.ratio = y = (A || this._ease)(f / u), this._from && (this.ratio = y = 1 - y), f && !
                    a && !s && !g && (vt(this, "onStart"), this._tTime !== h)) return this;
                for (d = this._pt; d;) d.r(y, d.d), d = d._next;
                v && v.render(r < 0 ? r : !f && p ? -L : v._dur * v._ease(f / this._dur), s, o) || this
                    ._startAt && (this._zTime = r), this._onUpdate && !s && (c && vi(this, r, s, o), vt(this,
                        "onUpdate")), this._repeat && g !== m && this.vars.onRepeat && !s && this.parent && vt(
                        this, "onRepeat"), (h === this._tDur || !h) && this._tTime === h && (c && !this
                        ._onUpdate && vi(this, r, !0, !0), (r || !u) && (h === this._tDur && this._ts > 0 || !
                            h && this._ts < 0) && Ut(this, 1), !s && !(c && !a) && (h || a || p) && (vt(this,
                            h === l ? "onComplete" : "onReverseComplete", !0), this._prom && !(h < l && this
                            .timeScale() > 0) && this._prom()))
            }
            return this
        }, e.targets = function() {
            return this._targets
        }, e.invalidate = function(r) {
            return (!r || !this.vars.runBackwards) && (this._startAt = 0), this._pt = this._op = this
                ._onUpdate = this._lazy = this.ratio = 0, this._ptLookup = [], this.timeline && this.timeline
                .invalidate(r), n.prototype.invalidate.call(this, r)
        }, e.resetTo = function(r, s, o, a) {
            Se || lt.wake(), this._ts || this.play();
            var l = Math.min(this._dur, (this._dp._time - this._start) * this._ts),
                u;
            return this._initted || tn(this, l), u = this._ease(l / this._dur), ru(this, r, s, o, a, u, l) ?
                this.resetTo(r, s, o, a) : (ti(this, 0), this.parent || Nr(this._dp, this, "_first", "_last",
                    this._dp._sort ? "_start" : 0), this.render(0))
        }, e.kill = function(r, s) {
            if (s === void 0 && (s = "all"), !r && (!s || s === "all")) return this._lazy = this._pt = 0, this
                .parent ? me(this) : this;
            if (this.timeline) {
                var o = this.timeline.totalDuration();
                return this.timeline.killTweensOf(r, s, Rt && Rt.vars.overwrite !== !0)._first || me(this), this
                    .parent && o !== this.timeline.totalDuration() && he(this, this._dur * this.timeline._tDur /
                        o, 0, 1), this
            }
            var a = this._targets,
                l = r ? yt(r) : a,
                u = this._ptLookup,
                c = this._pt,
                h, f, d, g, _, m, p;
            if ((!s || s === "all") && zl(a, l)) return s === "all" && (this._pt = 0), me(this);
            for (h = this._op = this._op || [], s !== "all" && (W(s) && (_ = {}, rt(s, function(y) {
                    return _[y] = 1
                }), s = _), s = su(a, s)), p = a.length; p--;)
                if (~l.indexOf(a[p])) {
                    f = u[p], s === "all" ? (h[p] = s, g = f, d = {}) : (d = h[p] = h[p] || {}, g = s);
                    for (_ in g) m = f && f[_], m && ((!("kill" in m.d) || m.d.kill(_) === !0) && Ze(this, m,
                        "_pt"), delete f[_]), d !== "all" && (d[_] = 1)
                } return this._initted && !this._pt && c && me(this), this
        }, t.to = function(r, s) {
            return new t(r, s, arguments[2])
        }, t.from = function(r, s) {
            return xe(1, arguments)
        }, t.delayedCall = function(r, s, o, a) {
            return new t(s, 0, {
                immediateRender: !1,
                lazy: !1,
                overwrite: !1,
                delay: r,
                onComplete: s,
                onReverseComplete: s,
                onCompleteParams: o,
                onReverseCompleteParams: o,
                callbackScope: a
            })
        }, t.fromTo = function(r, s, o) {
            return xe(2, arguments)
        }, t.set = function(r, s) {
            return s.duration = 0, s.repeatDelay || (s.repeat = 0), new t(r, s)
        }, t.killTweensOf = function(r, s, o) {
            return U.killTweensOf(r, s, o)
        }, t
    }(_e);
    xt(X.prototype, {
        _targets: [],
        _lazy: 0,
        _startAt: 0,
        _op: 0,
        _onInit: 0
    });
    rt("staggerTo,staggerFrom,staggerFromTo", function(n) {
        X[n] = function() {
            var t = new it,
                e = Ai.call(arguments, 0);
            return e.splice(n === "staggerFromTo" ? 5 : 4, 0, 0), t[n].apply(t, e)
        }
    });
    var en = function(t, e, i) {
            return t[e] = i
        },
        cs = function(t, e, i) {
            return t[e](i)
        },
        au = function(t, e, i, r) {
            return t[e](r.fp, i)
        },
        lu = function(t, e, i) {
            return t.setAttribute(e, i)
        },
        nn = function(t, e) {
            return V(t[e]) ? cs : Xi(t[e]) && t.setAttribute ? lu : en
        },
        hs = function(t, e) {
            return e.set(e.t, e.p, Math.round((e.s + e.c * t) * 1e6) / 1e6, e)
        },
        uu = function(t, e) {
            return e.set(e.t, e.p, !!(e.s + e.c * t), e)
        },
        fs = function(t, e) {
            var i = e._pt,
                r = "";
            if (!t && e.b) r = e.b;
            else if (t === 1 && e.e) r = e.e;
            else {
                for (; i;) r = i.p + (i.m ? i.m(i.s + i.c * t) : Math.round((i.s + i.c * t) * 1e4) / 1e4) + r, i = i
                    ._next;
                r += e.c
            }
            e.set(e.t, e.p, r, e)
        },
        rn = function(t, e) {
            for (var i = e._pt; i;) i.r(t, i.d), i = i._next
        },
        cu = function(t, e, i, r) {
            for (var s = this._pt, o; s;) o = s._next, s.p === r && s.modifier(t, e, i), s = o
        },
        hu = function(t) {
            for (var e = this._pt, i, r; e;) r = e._next, e.p === t && !e.op || e.op === t ? Ze(this, e, "_pt") : e
                .dep || (i = 1), e = r;
            return !i
        },
        fu = function(t, e, i, r) {
            r.mSet(t, e, r.m.call(r.tween, i, r.mt), r)
        },
        _s = function(t) {
            for (var e = t._pt, i, r, s, o; e;) {
                for (i = e._next, r = s; r && r.pr > e.pr;) r = r._next;
                (e._prev = r ? r._prev : o) ? e._prev._next = e: s = e, (e._next = r) ? r._prev = e : o = e, e = i
            }
            t._pt = s
        },
        st = function() {
            function n(e, i, r, s, o, a, l, u, c) {
                this.t = i, this.s = s, this.c = o, this.p = r, this.r = a || hs, this.d = l || this, this.set = u ||
                    en, this.pr = c || 0, this._next = e, e && (e._prev = this)
            }
            var t = n.prototype;
            return t.modifier = function(i, r, s) {
                this.mSet = this.mSet || this.set, this.set = fu, this.m = i, this.mt = s, this.tween = r
            }, n
        }();
    rt(Qi + "parent,duration,ease,delay,overwrite,runBackwards,startAt,yoyo,immediateRender,repeat,repeatDelay,data,paused,reversed,lazy,callbackScope,stringFilter,id,yoyoEase,stagger,inherit,repeatRefresh,keyframes,autoRevert,scrollTrigger",
        function(n) {
            return Ki[n] = 1
        });
    ct.TweenMax = ct.TweenLite = X;
    ct.TimelineLite = ct.TimelineMax = it;
    U = new it({
        sortChildren: !1,
        defaults: ue,
        autoRemoveChildren: !0,
        id: "root",
        smoothChildTiming: !0
    });
    ut.stringFilter = is;
    var de = [],
        Re = {},
        _u = [],
        Sn = 0,
        ui = function(t) {
            return (Re[t] || _u).map(function(e) {
                return e()
            })
        },
        Ei = function() {
            var t = Date.now(),
                e = [];
            t - Sn > 2 && (ui("matchMediaInit"), de.forEach(function(i) {
                var r = i.queries,
                    s = i.conditions,
                    o, a, l, u;
                for (a in r) o = gt.matchMedia(r[a]).matches, o && (l = 1), o !== s[a] && (s[a] = o, u = 1);
                u && (i.revert(), l && e.push(i))
            }), ui("matchMediaRevert"), e.forEach(function(i) {
                return i.onMatch(i)
            }), Sn = t, ui("matchMedia"))
        },
        ds = function() {
            function n(e, i) {
                this.selector = i && bi(i), this.data = [], this._r = [], this.isReverted = !1, e && this.add(e)
            }
            var t = n.prototype;
            return t.add = function(i, r, s) {
                V(i) && (s = r, r = i, i = V);
                var o = this,
                    a = function() {
                        var u = G,
                            c = o.selector,
                            h;
                        return u && u !== o && u.data.push(o), s && (o.selector = bi(s)), G = o, h = r.apply(o,
                            arguments), V(h) && o._r.push(h), G = u, o.selector = c, o.isReverted = !1, h
                    };
                return o.last = a, i === V ? a(o) : i ? o[i] = a : a
            }, t.ignore = function(i) {
                var r = G;
                G = null, i(this), G = r
            }, t.getTweens = function() {
                var i = [];
                return this.data.forEach(function(r) {
                    return r instanceof n ? i.push.apply(i, r.getTweens()) : r instanceof X && !(r.parent &&
                        r.parent.data === "nested") && i.push(r)
                }), i
            }, t.clear = function() {
                this._r.length = this.data.length = 0
            }, t.kill = function(i, r) {
                var s = this;
                if (i) {
                    var o = this.getTweens();
                    this.data.forEach(function(l) {
                        l.data === "isFlip" && (l.revert(), l.getChildren(!0, !0, !1).forEach(function(u) {
                            return o.splice(o.indexOf(u), 1)
                        }))
                    }), o.map(function(l) {
                        return {
                            g: l.globalTime(0),
                            t: l
                        }
                    }).sort(function(l, u) {
                        return u.g - l.g || -1
                    }).forEach(function(l) {
                        return l.t.revert(i)
                    }), this.data.forEach(function(l) {
                        return !(l instanceof _e) && l.revert && l.revert(i)
                    }), this._r.forEach(function(l) {
                        return l(i, s)
                    }), this.isReverted = !0
                } else this.data.forEach(function(l) {
                    return l.kill && l.kill()
                });
                if (this.clear(), r) {
                    var a = de.indexOf(this);
                    ~a && de.splice(a, 1)
                }
            }, t.revert = function(i) {
                this.kill(i || {})
            }, n
        }(),
        du = function() {
            function n(e) {
                this.contexts = [], this.scope = e
            }
            var t = n.prototype;
            return t.add = function(i, r, s) {
                Ct(i) || (i = {
                    matches: i
                });
                var o = new ds(0, s || this.scope),
                    a = o.conditions = {},
                    l, u, c;
                this.contexts.push(o), r = o.add("onMatch", r), o.queries = i;
                for (u in i) u === "all" ? c = 1 : (l = gt.matchMedia(i[u]), l && (de.indexOf(o) < 0 && de.push(o),
                    (a[u] = l.matches) && (c = 1), l.addListener ? l.addListener(Ei) : l.addEventListener(
                        "change", Ei)));
                return c && r(o), this
            }, t.revert = function(i) {
                this.kill(i || {})
            }, t.kill = function(i) {
                this.contexts.forEach(function(r) {
                    return r.kill(i, !0)
                })
            }, n
        }(),
        Ne = {
            registerPlugin: function() {
                for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++) e[i] = arguments[i];
                e.forEach(function(r) {
                    return Jr(r)
                })
            },
            timeline: function(t) {
                return new it(t)
            },
            getTweensOf: function(t, e) {
                return U.getTweensOf(t, e)
            },
            getProperty: function(t, e, i, r) {
                W(t) && (t = yt(t)[0]);
                var s = Zt(t || {}).get,
                    o = i ? Ur : $r;
                return i === "native" && (i = ""), t && (e ? o((at[e] && at[e].get || s)(t, e, i, r)) : function(a,
                    l, u) {
                    return o((at[a] && at[a].get || s)(t, a, l, u))
                })
            },
            quickSetter: function(t, e, i) {
                if (t = yt(t), t.length > 1) {
                    var r = t.map(function(c) {
                            return ot.quickSetter(c, e, i)
                        }),
                        s = r.length;
                    return function(c) {
                        for (var h = s; h--;) r[h](c)
                    }
                }
                t = t[0] || {};
                var o = at[e],
                    a = Zt(t),
                    l = a.harness && (a.harness.aliases || {})[e] || e,
                    u = o ? function(c) {
                        var h = new o;
                        se._pt = 0, h.init(t, i ? c + i : c, se, 0, [t]), h.render(1, h), se._pt && rn(1, se)
                    } : a.set(t, l);
                return o ? u : function(c) {
                    return u(t, l, i ? c + i : c, a, 1)
                }
            },
            quickTo: function(t, e, i) {
                var r, s = ot.to(t, ee((r = {}, r[e] = "+=0.1", r.paused = !0, r), i || {})),
                    o = function(l, u, c) {
                        return s.resetTo(e, l, u, c)
                    };
                return o.tween = s, o
            },
            isTweening: function(t) {
                return U.getTweensOf(t, !0).length > 0
            },
            defaults: function(t) {
                return t && t.ease && (t.ease = te(t.ease, ue.ease)), An(ue, t || {})
            },
            config: function(t) {
                return An(ut, t || {})
            },
            registerEffect: function(t) {
                var e = t.name,
                    i = t.effect,
                    r = t.plugins,
                    s = t.defaults,
                    o = t.extendTimeline;
                (r || "").split(",").forEach(function(a) {
                    return a && !at[a] && !ct[a] && Be(e + " effect requires " + a + " plugin.")
                }), si[e] = function(a, l, u) {
                    return i(yt(a), xt(l || {}, s), u)
                }, o && (it.prototype[e] = function(a, l, u) {
                    return this.add(si[e](a, Ct(l) ? l : (u = l) && {}, this), u)
                })
            },
            registerEase: function(t, e) {
                M[t] = te(e)
            },
            parseEase: function(t, e) {
                return arguments.length ? te(t, e) : M
            },
            getById: function(t) {
                return U.getById(t)
            },
            exportRoot: function(t, e) {
                t === void 0 && (t = {});
                var i = new it(t),
                    r, s;
                for (i.smoothChildTiming = nt(t.smoothChildTiming), U.remove(i), i._dp = 0, i._time = i._tTime = U
                    ._time, r = U._first; r;) s = r._next, (e || !(!r._dur && r instanceof X && r.vars
                    .onComplete === r._targets[0])) && wt(i, r, r._start - r._delay), r = s;
                return wt(U, i, 0), i
            },
            context: function(t, e) {
                return t ? new ds(t, e) : G
            },
            matchMedia: function(t) {
                return new du(t)
            },
            matchMediaRefresh: function() {
                return de.forEach(function(t) {
                    var e = t.conditions,
                        i, r;
                    for (r in e) e[r] && (e[r] = !1, i = 1);
                    i && t.revert()
                }) || Ei()
            },
            addEventListener: function(t, e) {
                var i = Re[t] || (Re[t] = []);
                ~i.indexOf(e) || i.push(e)
            },
            removeEventListener: function(t, e) {
                var i = Re[t],
                    r = i && i.indexOf(e);
                r >= 0 && i.splice(r, 1)
            },
            utils: {
                wrap: Wl,
                wrapYoyo: ql,
                distribute: Wr,
                random: jr,
                snap: qr,
                normalize: Xl,
                getUnit: K,
                clamp: Vl,
                splitColor: ts,
                toArray: yt,
                selector: bi,
                mapRange: Qr,
                pipe: Gl,
                unitize: Hl,
                interpolate: jl,
                shuffle: Xr
            },
            install: Rr,
            effects: si,
            ticker: lt,
            updateRoot: it.updateRoot,
            plugins: at,
            globalTimeline: U,
            core: {
                PropTween: st,
                globals: zr,
                Tween: X,
                Timeline: it,
                Animation: _e,
                getCache: Zt,
                _removeLinkedListItem: Ze,
                reverting: function() {
                    return Q
                },
                context: function(t) {
                    return t && G && (G.data.push(t), t._ctx = G), G
                },
                suppressOverwrites: function(t) {
                    return Hi = t
                }
            }
        };
    rt("to,from,fromTo,delayedCall,set,killTweensOf", function(n) {
        return Ne[n] = X[n]
    });
    lt.add(it.updateRoot);
    se = Ne.to({}, {
        duration: 0
    });
    var pu = function(t, e) {
            for (var i = t._pt; i && i.p !== e && i.op !== e && i.fp !== e;) i = i._next;
            return i
        },
        gu = function(t, e) {
            var i = t._targets,
                r, s, o;
            for (r in e)
                for (s = i.length; s--;) o = t._ptLookup[s][r], o && (o = o.d) && (o._pt && (o = pu(o, r)), o && o
                    .modifier && o.modifier(e[r], t, i[s], r))
        },
        ci = function(t, e) {
            return {
                name: t,
                rawVars: 1,
                init: function(r, s, o) {
                    o._onInit = function(a) {
                        var l, u;
                        if (W(s) && (l = {}, rt(s, function(c) {
                                return l[c] = 1
                            }), s = l), e) {
                            l = {};
                            for (u in s) l[u] = e(s[u]);
                            s = l
                        }
                        gu(a, s)
                    }
                }
            }
        },
        ot = Ne.registerPlugin({
            name: "attr",
            init: function(t, e, i, r, s) {
                var o, a, l;
                this.tween = i;
                for (o in e) l = t.getAttribute(o) || "", a = this.add(t, "setAttribute", (l || 0) + "", e[o],
                    r, s, 0, 0, o), a.op = o, a.b = l, this._props.push(o)
            },
            render: function(t, e) {
                for (var i = e._pt; i;) Q ? i.set(i.t, i.p, i.b, i) : i.r(t, i.d), i = i._next
            }
        }, {
            name: "endArray",
            init: function(t, e) {
                for (var i = e.length; i--;) this.add(t, i, t[i] || 0, e[i], 0, 0, 0, 0, 0, 1)
            }
        }, ci("roundProps", wi), ci("modifiers"), ci("snap", qr)) || Ne;
    X.version = it.version = ot.version = "3.11.5";
    Or = 1;
    Wi() && fe();
    M.Power0;
    M.Power1;
    M.Power2;
    M.Power3;
    M.Power4;
    M.Linear;
    M.Quad;
    M.Cubic;
    M.Quart;
    M.Quint;
    M.Strong;
    M.Elastic;
    M.Back;
    M.SteppedEase;
    M.Bounce;
    M.Sine;
    M.Expo;
    M.Circ;
    /*!
     * CSSPlugin 3.11.5
     * https://greensock.com
     *
     * Copyright 2008-2023, GreenSock. All rights reserved.
     * Subject to the terms at https://greensock.com/standard-license or for
     * Club GreenSock members, the agreement issued with that membership.
     * @author: Jack Doyle, jack@greensock.com
     */
    var Cn, zt, ae, sn, jt, Pn, on, mu = function() {
            return typeof window < "u"
        },
        Dt = {},
        qt = 180 / Math.PI,
        le = Math.PI / 180,
        ne = Math.atan2,
        kn = 1e8,
        an = /([A-Z])/g,
        yu = /(left|right|width|margin|padding|x)/i,
        vu = /[\s,\(]\S/,
        Tt = {
            autoAlpha: "opacity,visibility",
            scale: "scaleX,scaleY",
            alpha: "opacity"
        },
        Si = function(t, e) {
            return e.set(e.t, e.p, Math.round((e.s + e.c * t) * 1e4) / 1e4 + e.u, e)
        },
        xu = function(t, e) {
            return e.set(e.t, e.p, t === 1 ? e.e : Math.round((e.s + e.c * t) * 1e4) / 1e4 + e.u, e)
        },
        Au = function(t, e) {
            return e.set(e.t, e.p, t ? Math.round((e.s + e.c * t) * 1e4) / 1e4 + e.u : e.b, e)
        },
        bu = function(t, e) {
            var i = e.s + e.c * t;
            e.set(e.t, e.p, ~~(i + (i < 0 ? -.5 : .5)) + e.u, e)
        },
        ps = function(t, e) {
            return e.set(e.t, e.p, t ? e.e : e.b, e)
        },
        gs = function(t, e) {
            return e.set(e.t, e.p, t !== 1 ? e.b : e.e, e)
        },
        wu = function(t, e, i) {
            return t.style[e] = i
        },
        Tu = function(t, e, i) {
            return t.style.setProperty(e, i)
        },
        Eu = function(t, e, i) {
            return t._gsap[e] = i
        },
        Su = function(t, e, i) {
            return t._gsap.scaleX = t._gsap.scaleY = i
        },
        Cu = function(t, e, i, r, s) {
            var o = t._gsap;
            o.scaleX = o.scaleY = i, o.renderTransform(s, o)
        },
        Pu = function(t, e, i, r, s) {
            var o = t._gsap;
            o[e] = i, o.renderTransform(s, o)
        },
        N = "transform",
        At = N + "Origin",
        ku = function n(t, e) {
            var i = this,
                r = this.target,
                s = r.style;
            if (t in Dt) {
                if (this.tfm = this.tfm || {}, t !== "transform") t = Tt[t] || t, ~t.indexOf(",") ? t.split(",")
                    .forEach(function(o) {
                        return i.tfm[o] = Ft(r, o)
                    }) : this.tfm[t] = r._gsap.x ? r._gsap[t] : Ft(r, t);
                else return Tt.transform.split(",").forEach(function(o) {
                    return n.call(i, o, e)
                });
                if (this.props.indexOf(N) >= 0) return;
                r._gsap.svg && (this.svgo = r.getAttribute("data-svg-origin"), this.props.push(At, e, "")), t = N
            }(s || e) && this.props.push(t, e, s[t])
        },
        ms = function(t) {
            t.translate && (t.removeProperty("translate"), t.removeProperty("scale"), t.removeProperty("rotate"))
        },
        Fu = function() {
            var t = this.props,
                e = this.target,
                i = e.style,
                r = e._gsap,
                s, o;
            for (s = 0; s < t.length; s += 3) t[s + 1] ? e[t[s]] = t[s + 2] : t[s + 2] ? i[t[s]] = t[s + 2] : i
                .removeProperty(t[s].substr(0, 2) === "--" ? t[s] : t[s].replace(an, "-$1").toLowerCase());
            if (this.tfm) {
                for (o in this.tfm) r[o] = this.tfm[o];
                r.svg && (r.renderTransform(), e.setAttribute("data-svg-origin", this.svgo || "")), s = on(), (!s || !s
                    .isStart) && !i[N] && (ms(i), r.uncache = 1)
            }
        },
        ys = function(t, e) {
            var i = {
                target: t,
                props: [],
                revert: Fu,
                save: ku
            };
            return t._gsap || ot.core.getCache(t), e && e.split(",").forEach(function(r) {
                return i.save(r)
            }), i
        },
        vs, Ci = function(t, e) {
            var i = zt.createElementNS ? zt.createElementNS((e || "http://www.w3.org/1999/xhtml").replace(/^https/,
                "http"), t) : zt.createElement(t);
            return i.style ? i : zt.createElement(t)
        },
        St = function n(t, e, i) {
            var r = getComputedStyle(t);
            return r[e] || r.getPropertyValue(e.replace(an, "-$1").toLowerCase()) || r.getPropertyValue(e) || !i && n(t,
                pe(e) || e, 1) || ""
        },
        Fn = "O,Moz,ms,Ms,Webkit".split(","),
        pe = function(t, e, i) {
            var r = e || jt,
                s = r.style,
                o = 5;
            if (t in s && !i) return t;
            for (t = t.charAt(0).toUpperCase() + t.substr(1); o-- && !(Fn[o] + t in s););
            return o < 0 ? null : (o === 3 ? "ms" : o >= 0 ? Fn[o] : "") + t
        },
        Pi = function() {
            mu() && window.document && (Cn = window, zt = Cn.document, ae = zt.documentElement, jt = Ci("div") || {
                    style: {}
                }, Ci("div"), N = pe(N), At = N + "Origin", jt.style.cssText =
                "border-width:0;line-height:0;position:absolute;padding:0", vs = !!pe("perspective"), on = ot.core
                .reverting, sn = 1)
        },
        hi = function n(t) {
            var e = Ci("svg", this.ownerSVGElement && this.ownerSVGElement.getAttribute("xmlns") ||
                    "http://www.w3.org/2000/svg"),
                i = this.parentNode,
                r = this.nextSibling,
                s = this.style.cssText,
                o;
            if (ae.appendChild(e), e.appendChild(this), this.style.display = "block", t) try {
                o = this.getBBox(), this._gsapBBox = this.getBBox, this.getBBox = n
            } catch {} else this._gsapBBox && (o = this._gsapBBox());
            return i && (r ? i.insertBefore(this, r) : i.appendChild(this)), ae.removeChild(e), this.style.cssText = s,
                o
        },
        Mn = function(t, e) {
            for (var i = e.length; i--;)
                if (t.hasAttribute(e[i])) return t.getAttribute(e[i])
        },
        xs = function(t) {
            var e;
            try {
                e = t.getBBox()
            } catch {
                e = hi.call(t, !0)
            }
            return e && (e.width || e.height) || t.getBBox === hi || (e = hi.call(t, !0)), e && !e.width && !e.x && !e
                .y ? {
                    x: +Mn(t, ["x", "cx", "x1"]) || 0,
                    y: +Mn(t, ["y", "cy", "y1"]) || 0,
                    width: 0,
                    height: 0
                } : e
        },
        As = function(t) {
            return !!(t.getCTM && (!t.parentNode || t.ownerSVGElement) && xs(t))
        },
        Ce = function(t, e) {
            if (e) {
                var i = t.style;
                e in Dt && e !== At && (e = N), i.removeProperty ? ((e.substr(0, 2) === "ms" || e.substr(0, 6) ===
                        "webkit") && (e = "-" + e), i.removeProperty(e.replace(an, "-$1").toLowerCase())) : i
                    .removeAttribute(e)
            }
        },
        It = function(t, e, i, r, s, o) {
            var a = new st(t._pt, e, i, 0, 1, o ? gs : ps);
            return t._pt = a, a.b = r, a.e = s, t._props.push(i), a
        },
        Dn = {
            deg: 1,
            rad: 1,
            turn: 1
        },
        Mu = {
            grid: 1,
            flex: 1
        },
        Nt = function n(t, e, i, r) {
            var s = parseFloat(i) || 0,
                o = (i + "").trim().substr((s + "").length) || "px",
                a = jt.style,
                l = yu.test(e),
                u = t.tagName.toLowerCase() === "svg",
                c = (u ? "client" : "offset") + (l ? "Width" : "Height"),
                h = 100,
                f = r === "px",
                d = r === "%",
                g, _, m, p;
            return r === o || !s || Dn[r] || Dn[o] ? s : (o !== "px" && !f && (s = n(t, e, i, "px")), p = t.getCTM &&
                As(t), (d || o === "%") && (Dt[e] || ~e.indexOf("adius")) ? (g = p ? t.getBBox()[l ? "width" :
                    "height"] : t[c], Y(d ? s / g * h : s / 100 * g)) : (a[l ? "width" : "height"] = h + (f ? o :
                        r), _ = ~e.indexOf("adius") || r === "em" && t.appendChild && !u ? t : t.parentNode, p && (
                        _ = (
                            t.ownerSVGElement || {}).parentNode), (!_ || _ === zt || !_.appendChild) && (_ = zt
                        .body),
                    m = _._gsap, m && d && m.width && l && m.time === lt.time && !m.uncache ? Y(s / m.width * h) : (
                        (d || o === "%") && !Mu[St(_, "display")] && (a.position = St(t, "position")), _ === t && (a
                            .position = "static"), _.appendChild(jt), g = jt[c], _.removeChild(jt), a.position =
                        "absolute", l && d && (m = Zt(_), m.time = lt.time, m.width = _[c]), Y(f ? g * s / h : g &&
                            s ? h / g * s : 0))))
        },
        Ft = function(t, e, i, r) {
            var s;
            return sn || Pi(), e in Tt && e !== "transform" && (e = Tt[e], ~e.indexOf(",") && (e = e.split(",")[0])),
                Dt[e] && e !== "transform" ? (s = ke(t, r), s = e !== "transformOrigin" ? s[e] : s.svg ? s.origin : Ye(
                    St(t, At)) + " " + s.zOrigin + "px") : (s = t.style[e], (!s || s === "auto" || r || ~(s + "")
                    .indexOf("calc(")) && (s = Ve[e] && Ve[e](t, e, i) || St(t, e) || Br(t, e) || (e === "opacity" ?
                    1 : 0))), i && !~(s + "").trim().indexOf(" ") ? Nt(t, e, s, i) + i : s
        },
        Du = function(t, e, i, r) {
            if (!i || i === "none") {
                var s = pe(e, t, 1),
                    o = s && St(t, s, 1);
                o && o !== i ? (e = s, i = o) : e === "borderColor" && (i = St(t, "borderTopColor"))
            }
            var a = new st(this._pt, t.style, e, 0, 1, fs),
                l = 0,
                u = 0,
                c, h, f, d, g, _, m, p, y, v, A, x;
            if (a.b = i, a.e = r, i += "", r += "", r === "auto" && (t.style[e] = r, r = St(t, e) || r, t.style[e] = i),
                c = [i, r], is(c), i = c[0], r = c[1], f = i.match(re) || [], x = r.match(re) || [], x.length) {
                for (; h = re.exec(r);) m = h[0], y = r.substring(l, h.index), g ? g = (g + 1) % 5 : (y.substr(-5) ===
                    "rgba(" || y.substr(-5) === "hsla(") && (g = 1), m !== (_ = f[u++] || "") && (d = parseFloat(
                        _) || 0, A = _.substr((d + "").length), m.charAt(1) === "=" && (m = oe(d, m) + A), p =
                    parseFloat(m), v = m.substr((p + "").length), l = re.lastIndex - v.length, v || (v = v || ut
                        .units[e] || A, l === r.length && (r += v, a.e += v)), A !== v && (d = Nt(t, e, _, v) || 0),
                    a._pt = {
                        _next: a._pt,
                        p: y || u === 1 ? y : ",",
                        s: d,
                        c: p - d,
                        m: g && g < 4 || e === "zIndex" ? Math.round : 0
                    });
                a.c = l < r.length ? r.substring(l, r.length) : ""
            } else a.r = e === "display" && r === "none" ? gs : ps;
            return Mr.test(r) && (a.e = 0), this._pt = a, a
        },
        On = {
            top: "0%",
            bottom: "100%",
            left: "0%",
            right: "100%",
            center: "50%"
        },
        Ou = function(t) {
            var e = t.split(" "),
                i = e[0],
                r = e[1] || "50%";
            return (i === "top" || i === "bottom" || r === "left" || r === "right") && (t = i, i = r, r = t), e[0] = On[
                i] || i, e[1] = On[r] || r, e.join(" ")
        },
        Ru = function(t, e) {
            if (e.tween && e.tween._time === e.tween._dur) {
                var i = e.t,
                    r = i.style,
                    s = e.u,
                    o = i._gsap,
                    a, l, u;
                if (s === "all" || s === !0) r.cssText = "", l = 1;
                else
                    for (s = s.split(","), u = s.length; --u > -1;) a = s[u], Dt[a] && (l = 1, a = a ===
                        "transformOrigin" ? At : N), Ce(i, a);
                l && (Ce(i, N), o && (o.svg && i.removeAttribute("transform"), ke(i, 1), o.uncache = 1, ms(r)))
            }
        },
        Ve = {
            clearProps: function(t, e, i, r, s) {
                if (s.data !== "isFromStart") {
                    var o = t._pt = new st(t._pt, e, i, 0, 0, Ru);
                    return o.u = r, o.pr = -10, o.tween = s, t._props.push(i), 1
                }
            }
        },
        Pe = [1, 0, 0, 1, 0, 0],
        bs = {},
        ws = function(t) {
            return t === "matrix(1, 0, 0, 1, 0, 0)" || t === "none" || !t
        },
        Rn = function(t) {
            var e = St(t, N);
            return ws(e) ? Pe : e.substr(7).match(Fr).map(Y)
        },
        ln = function(t, e) {
            var i = t._gsap || Zt(t),
                r = t.style,
                s = Rn(t),
                o, a, l, u;
            return i.svg && t.getAttribute("transform") ? (l = t.transform.baseVal.consolidate().matrix, s = [l.a, l.b,
                l.c, l.d, l.e, l.f
            ], s.join(",") === "1,0,0,1,0,0" ? Pe : s) : (s === Pe && !t.offsetParent && t !== ae && !i.svg && (l =
                    r.display, r.display = "block", o = t.parentNode, (!o || !t.offsetParent) && (u = 1, a = t
                        .nextElementSibling, ae.appendChild(t)), s = Rn(t), l ? r.display = l : Ce(t, "display"),
                    u && (a ? o.insertBefore(t, a) : o ? o.appendChild(t) : ae.removeChild(t))), e && s.length > 6 ?
                [s[0], s[1], s[4], s[5], s[12], s[13]] : s)
        },
        ki = function(t, e, i, r, s, o) {
            var a = t._gsap,
                l = s || ln(t, !0),
                u = a.xOrigin || 0,
                c = a.yOrigin || 0,
                h = a.xOffset || 0,
                f = a.yOffset || 0,
                d = l[0],
                g = l[1],
                _ = l[2],
                m = l[3],
                p = l[4],
                y = l[5],
                v = e.split(" "),
                A = parseFloat(v[0]) || 0,
                x = parseFloat(v[1]) || 0,
                E, T, w, b;
            i ? l !== Pe && (T = d * m - g * _) && (w = A * (m / T) + x * (-_ / T) + (_ * y - m * p) / T, b = A * (-g /
                    T) + x * (d / T) - (d * y - g * p) / T, A = w, x = b) : (E = xs(t), A = E.x + (~v[0].indexOf("%") ?
                    A / 100 * E.width : A), x = E.y + (~(v[1] || v[0]).indexOf("%") ? x / 100 * E.height : x)), r ||
                r !== !1 && a.smooth ? (p = A - u, y = x - c, a.xOffset = h + (p * d + y * _) - p, a.yOffset = f + (p *
                    g + y * m) - y) : a.xOffset = a.yOffset = 0, a.xOrigin = A, a.yOrigin = x, a.smooth = !!r, a
                .origin = e, a.originIsAbsolute = !!i, t.style[At] = "0px 0px", o && (It(o, a, "xOrigin", u, A), It(o,
                    a, "yOrigin", c, x), It(o, a, "xOffset", h, a.xOffset), It(o, a, "yOffset", f, a.yOffset)), t
                .setAttribute("data-svg-origin", A + " " + x)
        },
        ke = function(t, e) {
            var i = t._gsap || new os(t);
            if ("x" in i && !e && !i.uncache) return i;
            var r = t.style,
                s = i.scaleX < 0,
                o = "px",
                a = "deg",
                l = getComputedStyle(t),
                u = St(t, At) || "0",
                c, h, f, d, g, _, m, p, y, v, A, x, E, T, w, b, S, C, F, D, O, k, z, R, I, ht, ft, bt, _t, Gt, et, dt;
            return c = h = f = _ = m = p = y = v = A = 0, d = g = 1, i.svg = !!(t.getCTM && As(t)), l.translate && ((l
                        .translate !== "none" || l.scale !== "none" || l.rotate !== "none") && (r[N] = (l.translate !==
                        "none" ? "translate3d(" + (l.translate + " 0 0").split(" ").slice(0, 3).join(", ") + ") " :
                        "") + (l.rotate !== "none" ? "rotate(" + l.rotate + ") " : "") + (l.scale !== "none" ?
                        "scale(" + l.scale.split(" ").join(",") + ") " : "") + (l[N] !== "none" ? l[N] : "")), r.scale =
                    r.rotate = r.translate = "none"), T = ln(t, i.svg), i.svg && (i.uncache ? (I = t.getBBox(), u = i
                    .xOrigin - I.x + "px " + (i.yOrigin - I.y) + "px", R = "") : R = !e && t.getAttribute(
                    "data-svg-origin"), ki(t, R || u, !!R || i.originIsAbsolute, i.smooth !== !1, T)), x = i.xOrigin ||
                0, E = i.yOrigin || 0, T !== Pe && (C = T[0], F = T[1], D = T[2], O = T[3], c = k = T[4], h = z = T[5],
                    T.length === 6 ? (d = Math.sqrt(C * C + F * F), g = Math.sqrt(O * O + D * D), _ = C || F ? ne(F,
                            C) * qt : 0, y = D || O ? ne(D, O) * qt + _ : 0, y && (g *= Math.abs(Math.cos(y * le))), i
                        .svg && (c -= x - (x * C + E * D), h -= E - (x * F + E * O))) : (dt = T[6], Gt = T[7], ft = T[
                            8], bt = T[9], _t = T[10], et = T[11], c = T[12], h = T[13], f = T[14], w = ne(dt, _t), m =
                        w *
                        qt, w && (b = Math.cos(-w), S = Math.sin(-w), R = k * b + ft * S, I = z * b + bt * S, ht = dt *
                            b + _t * S, ft = k * -S + ft * b, bt = z * -S + bt * b, _t = dt * -S + _t * b, et = Gt * -
                            S + et * b, k = R, z = I, dt = ht), w = ne(-D, _t), p = w * qt, w && (b = Math.cos(-w), S =
                            Math.sin(-w), R = C * b - ft * S, I = F * b - bt * S, ht = D * b - _t * S, et = O * S + et *
                            b, C = R, F = I, D = ht), w = ne(F, C), _ = w * qt, w && (b = Math.cos(w), S = Math.sin(w),
                            R = C * b + F * S, I = k * b + z * S, F = F * b - C * S, z = z * b - k * S, C = R, k = I),
                        m && Math.abs(m) + Math.abs(_) > 359.9 && (m = _ = 0, p = 180 - p), d = Y(Math.sqrt(C * C + F *
                            F + D * D)), g = Y(Math.sqrt(z * z + dt * dt)), w = ne(k, z), y = Math.abs(w) > 2e-4 ? w *
                        qt : 0, A = et ? 1 / (et < 0 ? -et : et) : 0), i.svg && (R = t.getAttribute("transform"), i
                        .forceCSS = t.setAttribute("transform", "") || !ws(St(t, N)), R && t.setAttribute("transform",
                            R))), Math.abs(y) > 90 && Math.abs(y) < 270 && (s ? (d *= -1, y += _ <= 0 ? 180 : -180, _ +=
                    _ <= 0 ? 180 : -180) : (g *= -1, y += y <= 0 ? 180 : -180)), e = e || i.uncache, i.x = c - ((i
                    .xPercent = c && (!e && i.xPercent || (Math.round(t.offsetWidth / 2) === Math.round(-c) ? -50 :
                        0))) ? t.offsetWidth * i.xPercent / 100 : 0) + o, i.y = h - ((i.yPercent = h && (!e && i
                        .yPercent || (Math.round(t.offsetHeight / 2) === Math.round(-h) ? -50 : 0))) ? t.offsetHeight *
                    i.yPercent / 100 : 0) + o, i.z = f + o, i.scaleX = Y(d), i.scaleY = Y(g), i.rotation = Y(_) + a, i
                .rotationX = Y(m) + a, i.rotationY = Y(p) + a, i.skewX = y + a, i.skewY = v + a, i
                .transformPerspective = A + o, (i.zOrigin = parseFloat(u.split(" ")[2]) || 0) && (r[At] = Ye(u)), i
                .xOffset = i.yOffset = 0, i.force3D = ut.force3D, i.renderTransform = i.svg ? Iu : vs ? Ts : zu, i
                .uncache = 0, i
        },
        Ye = function(t) {
            return (t = t.split(" "))[0] + " " + t[1]
        },
        fi = function(t, e, i) {
            var r = K(e);
            return Y(parseFloat(e) + parseFloat(Nt(t, "x", i + "px", r))) + r
        },
        zu = function(t, e) {
            e.z = "0px", e.rotationY = e.rotationX = "0deg", e.force3D = 0, Ts(t, e)
        },
        Xt = "0deg",
        ge = "0px",
        Wt = ") ",
        Ts = function(t, e) {
            var i = e || this,
                r = i.xPercent,
                s = i.yPercent,
                o = i.x,
                a = i.y,
                l = i.z,
                u = i.rotation,
                c = i.rotationY,
                h = i.rotationX,
                f = i.skewX,
                d = i.skewY,
                g = i.scaleX,
                _ = i.scaleY,
                m = i.transformPerspective,
                p = i.force3D,
                y = i.target,
                v = i.zOrigin,
                A = "",
                x = p === "auto" && t && t !== 1 || p === !0;
            if (v && (h !== Xt || c !== Xt)) {
                var E = parseFloat(c) * le,
                    T = Math.sin(E),
                    w = Math.cos(E),
                    b;
                E = parseFloat(h) * le, b = Math.cos(E), o = fi(y, o, T * b * -v), a = fi(y, a, -Math.sin(E) * -v), l =
                    fi(y, l, w * b * -v + v)
            }
            m !== ge && (A += "perspective(" + m + Wt), (r || s) && (A += "translate(" + r + "%, " + s + "%) "), (x ||
                o !== ge || a !== ge || l !== ge) && (A += l !== ge || x ? "translate3d(" + o + ", " + a + ", " +
                l + ") " : "translate(" + o + ", " + a + Wt), u !== Xt && (A += "rotate(" + u + Wt), c !== Xt && (
                A += "rotateY(" + c + Wt), h !== Xt && (A += "rotateX(" + h + Wt), (f !== Xt || d !== Xt) && (A +=
                "skew(" + f + ", " + d + Wt), (g !== 1 || _ !== 1) && (A += "scale(" + g + ", " + _ + Wt), y.style[
                N] = A || "translate(0, 0)"
        },
        Iu = function(t, e) {
            var i = e || this,
                r = i.xPercent,
                s = i.yPercent,
                o = i.x,
                a = i.y,
                l = i.rotation,
                u = i.skewX,
                c = i.skewY,
                h = i.scaleX,
                f = i.scaleY,
                d = i.target,
                g = i.xOrigin,
                _ = i.yOrigin,
                m = i.xOffset,
                p = i.yOffset,
                y = i.forceCSS,
                v = parseFloat(o),
                A = parseFloat(a),
                x, E, T, w, b;
            l = parseFloat(l), u = parseFloat(u), c = parseFloat(c), c && (c = parseFloat(c), u += c, l += c), l || u ?
                (l *= le, u *= le, x = Math.cos(l) * h, E = Math.sin(l) * h, T = Math.sin(l - u) * -f, w = Math.cos(l -
                    u) * f, u && (c *= le, b = Math.tan(u - c), b = Math.sqrt(1 + b * b), T *= b, w *= b, c && (b =
                    Math.tan(c), b = Math.sqrt(1 + b * b), x *= b, E *= b)), x = Y(x), E = Y(E), T = Y(T), w = Y(w)) : (
                    x = h, w = f, E = T = 0), (v && !~(o + "").indexOf("px") || A && !~(a + "").indexOf("px")) && (v =
                    Nt(d, "x", o, "px"), A = Nt(d, "y", a, "px")), (g || _ || m || p) && (v = Y(v + g - (g * x + _ *
                    T) + m), A = Y(A + _ - (g * E + _ * w) + p)), (r || s) && (b = d.getBBox(), v = Y(v + r / 100 * b
                    .width), A = Y(A + s / 100 * b.height)), b = "matrix(" + x + "," + E + "," + T + "," + w + "," + v +
                "," + A + ")", d.setAttribute("transform", b), y && (d.style[N] = b)
        },
        Bu = function(t, e, i, r, s) {
            var o = 360,
                a = W(s),
                l = parseFloat(s) * (a && ~s.indexOf("rad") ? qt : 1),
                u = l - r,
                c = r + u + "deg",
                h, f;
            return a && (h = s.split("_")[1], h === "short" && (u %= o, u !== u % (o / 2) && (u += u < 0 ? o : -o)),
                    h === "cw" && u < 0 ? u = (u + o * kn) % o - ~~(u / o) * o : h === "ccw" && u > 0 && (u = (u - o *
                        kn) % o - ~~(u / o) * o)), t._pt = f = new st(t._pt, e, i, r, u, xu), f.e = c, f.u = "deg", t
                ._props.push(i), f
        },
        zn = function(t, e) {
            for (var i in e) t[i] = e[i];
            return t
        },
        Lu = function(t, e, i) {
            var r = zn({}, i._gsap),
                s = "perspective,force3D,transformOrigin,svgOrigin",
                o = i.style,
                a, l, u, c, h, f, d, g;
            r.svg ? (u = i.getAttribute("transform"), i.setAttribute("transform", ""), o[N] = e, a = ke(i, 1), Ce(i, N),
                i.setAttribute("transform", u)) : (u = getComputedStyle(i)[N], o[N] = e, a = ke(i, 1), o[N] = u);
            for (l in Dt) u = r[l], c = a[l], u !== c && s.indexOf(l) < 0 && (d = K(u), g = K(c), h = d !== g ? Nt(i, l,
                    u, g) : parseFloat(u), f = parseFloat(c), t._pt = new st(t._pt, a, l, h, f - h, Si), t._pt.u =
                g || 0, t._props.push(l));
            zn(a, r)
        };
    rt("padding,margin,Width,Radius", function(n, t) {
        var e = "Top",
            i = "Right",
            r = "Bottom",
            s = "Left",
            o = (t < 3 ? [e, i, r, s] : [e + s, e + i, r + i, r + s]).map(function(a) {
                return t < 2 ? n + a : "border" + a + n
            });
        Ve[t > 1 ? "border" + n : n] = function(a, l, u, c, h) {
            var f, d;
            if (arguments.length < 4) return f = o.map(function(g) {
                return Ft(a, g, u)
            }), d = f.join(" "), d.split(f[0]).length === 5 ? f[0] : d;
            f = (c + "").split(" "), d = {}, o.forEach(function(g, _) {
                return d[g] = f[_] = f[_] || f[(_ - 1) / 2 | 0]
            }), a.init(l, d, h)
        }
    });
    var Es = {
        name: "css",
        register: Pi,
        targetTest: function(t) {
            return t.style && t.nodeType
        },
        init: function(t, e, i, r, s) {
            var o = this._props,
                a = t.style,
                l = i.vars.startAt,
                u, c, h, f, d, g, _, m, p, y, v, A, x, E, T, w;
            sn || Pi(), this.styles = this.styles || ys(t), w = this.styles.props, this.tween = i;
            for (_ in e)
                if (_ !== "autoRound" && (c = e[_], !(at[_] && as(_, e, i, r, t, s)))) {
                    if (d = typeof c, g = Ve[_], d === "function" && (c = c.call(i, r, t, s), d = typeof c),
                        d === "string" && ~c.indexOf("random(") && (c = Ee(c)), g) g(this, t, _, c, i) && (T =
                        1);
                    else if (_.substr(0, 2) === "--") u = (getComputedStyle(t).getPropertyValue(_) + "").trim(),
                        c += "", $t.lastIndex = 0, $t.test(u) || (m = K(u), p = K(c)), p ? m !== p && (u = Nt(t,
                            _, u, p) + p) : m && (c += m), this.add(a, "setProperty", u, c, r, s, 0, 0, _), o
                        .push(_), w.push(_, 0, a[_]);
                    else if (d !== "undefined") {
                        if (l && _ in l ? (u = typeof l[_] == "function" ? l[_].call(i, r, t, s) : l[_], W(u) &&
                                ~u.indexOf("random(") && (u = Ee(u)), K(u + "") || (u += ut.units[_] || K(Ft(t,
                                    _)) || ""), (u + "").charAt(1) === "=" && (u = Ft(t, _))) : u = Ft(t, _),
                            f = parseFloat(u), y = d === "string" && c.charAt(1) === "=" && c.substr(0, 2), y &&
                            (c = c.substr(2)), h = parseFloat(c), _ in Tt && (_ === "autoAlpha" && (f === 1 &&
                                Ft(t, "visibility") === "hidden" && h && (f = 0), w.push("visibility", 0, a
                                    .visibility), It(this, a, "visibility", f ? "inherit" : "hidden", h ?
                                    "inherit" : "hidden", !h)), _ !== "scale" && _ !== "transform" && (_ =
                                Tt[_], ~_.indexOf(",") && (_ = _.split(",")[0]))), v = _ in Dt, v) {
                            if (this.styles.save(_), A || (x = t._gsap, x.renderTransform && !e
                                    .parseTransform || ke(t, e.parseTransform), E = e.smoothOrigin !== !1 && x
                                    .smooth, A = this._pt = new st(this._pt, a, N, 0, 1, x.renderTransform, x,
                                        0, -1), A.dep = 1), _ === "scale") this._pt = new st(this._pt, x,
                                    "scaleY", x.scaleY, (y ? oe(x.scaleY, y + h) : h) - x.scaleY || 0, Si), this
                                ._pt.u = 0, o.push("scaleY", _), _ += "X";
                            else if (_ === "transformOrigin") {
                                w.push(At, 0, a[At]), c = Ou(c), x.svg ? ki(t, c, 0, E, 0, this) : (p =
                                    parseFloat(c.split(" ")[2]) || 0, p !== x.zOrigin && It(this, x,
                                        "zOrigin", x.zOrigin, p), It(this, a, _, Ye(u), Ye(c)));
                                continue
                            } else if (_ === "svgOrigin") {
                                ki(t, c, 1, E, 0, this);
                                continue
                            } else if (_ in bs) {
                                Bu(this, x, _, f, y ? oe(f, y + c) : c);
                                continue
                            } else if (_ === "smoothOrigin") {
                                It(this, x, "smooth", x.smooth, c);
                                continue
                            } else if (_ === "force3D") {
                                x[_] = c;
                                continue
                            } else if (_ === "transform") {
                                Lu(this, c, t);
                                continue
                            }
                        } else _ in a || (_ = pe(_) || _);
                        if (v || (h || h === 0) && (f || f === 0) && !vu.test(c) && _ in a) m = (u + "").substr(
                                (f + "").length), h || (h = 0), p = K(c) || (_ in ut.units ? ut.units[_] : m),
                            m !== p && (f = Nt(t, _, u, p)), this._pt = new st(this._pt, v ? x : a, _, f, (y ?
                                    oe(f, y + h) : h) - f, !v && (p === "px" || _ === "zIndex") && e
                                .autoRound !== !1 ? bu : Si), this._pt.u = p || 0, m !== p && p !== "%" && (this
                                ._pt.b = u, this._pt.r = Au);
                        else if (_ in a) Du.call(this, t, _, u, y ? y + c : c);
                        else if (_ in t) this.add(t, _, u || t[_], y ? y + c : c, r, s);
                        else if (_ !== "parseTransform") {
                            ji(_, c);
                            continue
                        }
                        v || (_ in a ? w.push(_, 0, a[_]) : w.push(_, 1, u || t[_])), o.push(_)
                    }
                } T && _s(this)
        },
        render: function(t, e) {
            if (e.tween._time || !on())
                for (var i = e._pt; i;) i.r(t, i.d), i = i._next;
            else e.styles.revert()
        },
        get: Ft,
        aliases: Tt,
        getSetter: function(t, e, i) {
            var r = Tt[e];
            return r && r.indexOf(",") < 0 && (e = r), e in Dt && e !== At && (t._gsap.x || Ft(t, "x")) ? i &&
                Pn === i ? e === "scale" ? Su : Eu : (Pn = i || {}) && (e === "scale" ? Cu : Pu) : t.style && !
                Xi(t.style[e]) ? wu : ~e.indexOf("-") ? Tu : nn(t, e)
        },
        core: {
            _removeProperty: Ce,
            _getMatrix: ln
        }
    };
    ot.utils.checkPrefix = pe;
    ot.core.getStyleSaver = ys;
    (function(n, t, e, i) {
        var r = rt(n + "," + t + "," + e, function(s) {
            Dt[s] = 1
        });
        rt(t, function(s) {
            ut.units[s] = "deg", bs[s] = 1
        }), Tt[r[13]] = n + "," + t, rt(i, function(s) {
            var o = s.split(":");
            Tt[o[1]] = r[o[0]]
        })
    })("x,y,z,scale,scaleX,scaleY,xPercent,yPercent", "rotation,rotationX,rotationY,skewX,skewY",
        "transform,transformOrigin,svgOrigin,force3D,smoothOrigin,transformPerspective",
        "0:translateX,1:translateY,2:translateZ,8:rotate,8:rotationZ,8:rotateZ,9:rotateX,10:rotateY");
    rt("x,y,z,top,right,bottom,left,width,height,fontSize,padding,margin,perspective", function(n) {
        ut.units[n] = "px"
    });
    ot.registerPlugin(Es);
    var Ss = ot.registerPlugin(Es) || ot;
    Ss.core.Tween;
    class $u {
        constructor(t, e = {}) {
            this.gl = t, this.data = e, this.shaders = El, this.programInfo = Er(this.gl, this.shaders), this.data
                .test && this.initGui(), this.a = {
                    mode: 1,
                    swap: 0
                }, this.gl.useProgram(this.programInfo.program), this.setBuffAtt(), this.setUniforms()
        }
        setBuffAtt() {
            const t = {
                position: [-1, -1, 0, 1, -1, 0, -1, 1, 0, -1, 1, 0, 1, -1, 0, 1, 1, 0]
            };
            this.bufferInfo = Kn(this.gl, t)
        }
        setUniforms() {
            this.uniforms = {
                u_res: [this.gl.canvas.width, this.gl.canvas.height],
                u_time: 0,
                u_params: [this.data.multx, this.data.multy, this.data.hue, this.data.brightness],
                u_params2: [this.data.mouse, this.data.scale, this.data.noise, this.data.bw],
                u_altparams: [this.data.scale2, this.data.bw2, 0, 0],
                u_color: this.data.color,
                u_color2: this.data.color2,
                u_mode: this.a.mode,
                u_swap: this.a.swap
            }, this.gl.useProgram(this.programInfo.program), Qt(this.programInfo, this.uniforms)
        }
        render(t, {
            x: e,
            y: i
        }) {
            this.gl.useProgram(this.programInfo.program), Tr(this.gl, this.programInfo, this.bufferInfo), Qt(this
                .programInfo, {
                    u_time: t * this.data.time,
                    u_mouse: [e, i],
                    u_mode: this.a.mode,
                    u_swap: this.a.swap
                }), Sr(this.gl, this.bufferInfo)
        }
        resize(t) {
            this.gl = t, this.gl.useProgram(this.programInfo.program), Qt(this.programInfo, {
                u_res: [this.gl.canvas.width, this.gl.canvas.height]
            })
        }
        initGui() {
            this.gui = new bl, this.gui.add(this.data, "multx", 0, 10).onChange(() => {
                this.setUniforms()
            }).listen(), this.gui.add(this.data, "multy", 0, 10).onChange(() => {
                this.setUniforms()
            }).listen(), this.gui.add(this.data, "hue", 0, 1).onChange(() => {
                this.setUniforms()
            }).listen(), this.gui.add(this.data, "brightness", 0, 5).onChange(() => {
                this.setUniforms()
            }).listen(), this.gui.add(this.data, "mouse", -1, 1).onChange(() => {
                this.setUniforms()
            }).listen(), this.gui.add(this.data, "scale", 0, 10).onChange(() => {
                this.setUniforms()
            }).listen(), this.gui.add(this.data, "noise", 0, 10).onChange(() => {
                this.setUniforms()
            }).listen(), this.gui.add(this.data, "bw", 0, 1).onChange(() => {
                this.setUniforms()
            }).listen(), this.gui.add(this.data, "time", 0, 1)
        }
        mode(t) {
            t === "light" ? this.a.mode = 1 : t === "dark" ? this.a.mode = 0 : this.a.mode === 0 ? this.a.mode = 1 :
                this.a.mode = 0, console.log(t, this.uniforms.u_mode), this.setUniforms()
        }
        swap(t, {
            d: e
        }) {
            let i = 0;
            t === 0 ? i = 0 : t === 1 || this.a.swap === 0 ? i = 1 : i = 0, Ss.to(this.a, {
                swap: i,
                duration: e
            }), this.setUniforms()
        }
    }
    class Uu {
        constructor(t) {
            this.gl = t, this.computeParams(), this.events(), this.create()
        }
        events() {
            this.mouse = {
                x: 0,
                y: 0,
                wx: window.innerWidth,
                wy: window.innerHeight
            }, document.addEventListener("mousemove", t => {
                this.mouse.x = t.clientX / this.mouse.wx * 2 - 1, this.mouse.y = -(t.clientY / this.mouse
                    .wy) * 2 + 1
            })
        }
        create() {
            this.quad = new $u(this.gl, this.params)
        }
        render(t, e) {
            this.quad && this.quad.render(t, this.mouse)
        }
        resize(t) {
            this.gl = t, this.mouse.wx = window.innerWidth, this.mouse.wy = window.innerHeight, this.quad && this
                .quad.resize(this.gl)
        }
        computeParams() {
            const t = document.querySelector('[data-gradient="wrapper"]'),
                e = [parseFloat(t.dataset.red) || 0, parseFloat(t.dataset.green) || .33, parseFloat(t.dataset
                    .blue) || .66],
                i = [parseFloat(t.dataset.red2) || 0, parseFloat(t.dataset.green2) || 0, parseFloat(t.dataset
                    .blue2) || 0];
            this.params = {
                test: t.hasAttribute("data-test"),
                multx: parseFloat(t.dataset.multx) || .2,
                multy: parseFloat(t.dataset.multy) || .8,
                hue: parseFloat(t.dataset.hue) || 0,
                brightness: parseFloat(t.dataset.brightness) || .8,
                mouse: parseFloat(t.dataset.mouse) || 1,
                scale: parseFloat(t.dataset.scale) || .2,
                scale2: parseFloat(t.dataset.scale2) || .2,
                noise: parseFloat(t.dataset.noise) || 1,
                color: e,
                color2: i,
                bw: parseFloat(t.dataset.bw) || 0,
                bw2: parseFloat(t.dataset.bw2) || 0,
                time: parseFloat(t.dataset.time) || 1
            }
        }
    }
    var Nu = `attribute vec4 position;

void main() {
  vec4 pos = position;
  gl_Position = position;
}`,
        Vu = `precision mediump float;

uniform vec2 u_res;
uniform float u_time;

uniform sampler2D u_diff;

void main() {
  vec2 uv = gl_FragCoord.xy / u_res;

  vec3 img = texture2D(u_diff, uv).rgb;



  gl_FragColor.rgb = img.rgb;
  gl_FragColor.a = 1.;
}`;
    const Yu = [Nu, Vu];
    class Gu {
        constructor(t, e = {}) {
            this.gl = t, this.data = e, this.shaders = Yu, this.programInfo = Er(this.gl, this.shaders), this.gl
                .useProgram(this.programInfo.program), this.setBuffAtt(), this.setUniforms()
        }
        setBuffAtt() {
            const t = {
                position: [-1, -1, 0, 1, -1, 0, -1, 1, 0, -1, 1, 0, 1, -1, 0, 1, 1, 0]
            };
            this.bufferInfo = Kn(this.gl, t)
        }
        setUniforms() {
            this.uniforms = {
                u_res: [this.gl.canvas.width, this.gl.canvas.height],
                u_time: 0
            }, this.gl.useProgram(this.programInfo.program), Qt(this.programInfo, this.uniforms)
        }
        render(t, e = null) {
            this.gl.useProgram(this.programInfo.program), Tr(this.gl, this.programInfo, this.bufferInfo), Qt(this
                .programInfo, {
                    u_time: t,
                    u_diff: e
                }), Sr(this.gl, this.bufferInfo)
        }
        resize(t) {
            this.gl = t, this.gl.useProgram(this.programInfo.program), Qt(this.programInfo, {
                u_res: [this.gl.canvas.width, this.gl.canvas.height]
            })
        }
    }
    class Hu {
        constructor(t) {
            this.gl = t
        }
        create() {
            this.fbi = this.gl.createFramebuffer(), this.texture = this.gl.createTexture(), this.gl.bindTexture(this
                    .gl.TEXTURE_2D, this.texture), this.gl.texImage2D(this.gl.TEXTURE_2D, 0, this.gl.RGBA, this.gl
                    .canvas.width, this.gl.canvas.height, 0, this.gl.RGBA, this.gl.UNSIGNED_BYTE, null), this.gl
                .texParameteri(this.gl.TEXTURE_2D, this.gl.TEXTURE_MIN_FILTER, this.gl.LINEAR), this.gl
                .texParameteri(this.gl.TEXTURE_2D, this.gl.TEXTURE_WRAP_S, this.gl.CLAMP_TO_EDGE), this.gl
                .texParameteri(this.gl.TEXTURE_2D, this.gl.TEXTURE_WRAP_T, this.gl.CLAMP_TO_EDGE), this
                .depthBuffer = this.gl.createRenderbuffer(), this.gl.bindRenderbuffer(this.gl.RENDERBUFFER, this
                    .depthBuffer), this.gl.renderbufferStorage(this.gl.RENDERBUFFER, this.gl.DEPTH_COMPONENT16, this
                    .gl.canvas.width, this.gl.canvas.height), this.attach(), this.createPlane(), this.unbind()
        }
        attach() {
            this.gl.bindFramebuffer(this.gl.FRAMEBUFFER, this.fbi), this.gl.framebufferTexture2D(this.gl
                    .FRAMEBUFFER, this.gl.COLOR_ATTACHMENT0, this.gl.TEXTURE_2D, this.texture, 0), this.gl
                .framebufferRenderbuffer(this.gl.FRAMEBUFFER, this.gl.DEPTH_ATTACHMENT, this.gl.RENDERBUFFER, this
                    .depthBuffer)
        }
        unbind() {
            this.gl.bindFramebuffer(this.gl.FRAMEBUFFER, null), this.gl.bindTexture(this.gl.TEXTURE_2D, null), this
                .gl.bindRenderbuffer(this.gl.RENDERBUFFER, null)
        }
        createPlane() {
            this.quad = new Gu(this.gl)
        }
        setupRender() {
            this.isActive && (this.gl.bindFramebuffer(this.gl.FRAMEBUFFER, this.fbi), this.gl.clear(this.gl
                .COLOR_BUFFER_BIT || this.gl.DEPTH_BUFFER_BIT))
        }
        render(t) {
            this.isActive && (this.gl.bindFramebuffer(this.gl.FRAMEBUFFER, null), this.quad && this.quad.render(t,
                this.texture))
        }
        resize(t) {
            this.gl = t, this.create(), this.quad && this.quad.resize(this.gl)
        }
    }
    class Xu {
        constructor(canvasSelector) {
            this.canvas = document.querySelector(canvasSelector);

            if (!this.canvas) {

                return;
            }

            this.gl = this.canvas.getContext("webgl"), this.gl.clearColor(.04, .04, .04, 1), this.gl.vp = {
                dpr: Math.min(window.devicePixelRatio, 2)
            }, this.camera = new ll(this.gl), this.gl.camera = this.camera.get(this.gl), new ResizeObserver(t =>
                this.resize(t[0].contentRect)).observe(this.canvas), this.resize(), this.scroll = new al(this
                .gl), this.time = 0, this.create(), this.render(), this.resize()
        }
        create() {
            this.post = new Hu(this.gl), this.post.isActive = !1, this.scene = new Uu(this.gl), window
                .dispatchEvent(new Event("gradientReady"))
        }
        render() {
            this.time += .01, this.gl.clear(this.gl.COLOR_BUFFER_BIT || this.gl.DEPTH_BUFFER_BIT), this.gl.viewport(
                    0, 0, this.gl.canvas.width, this.gl.canvas.height), this.post && this.post.isActive && this.post
                .setupRender(), this.scene && this.scene.render(this.time, this.scroll.y), this.post && this.post
                .isActive && this.post.render(this.time), requestAnimationFrame(this.render.bind(this))
        }
        resize() {
            ol(this.gl.canvas, this.gl.vp.dpr), this.gl.vp = {
                viewSize: this.viewSize,
                px: this.pixelSize,
                inner: [window.innerWidth, window.innerHeight],
                scroll: window.scrollY
            }, this.gl.camera && (this.gl.camera = this.camera.get(this.gl)), this.scroll && this.scroll.resize(
                this.gl), this.post && this.post.resize(this.gl), this.scene && this.scene.resize(this.gl)
        }
        get viewSize() {
            const t = Math.abs(this.gl.camera.z * Math.tan(this.gl.camera.fov / 2) * 2);
            return [t * (this.gl.canvas.width / this.gl.canvas.height), t]
        }
        get pixelSize() {
            return this.viewSize[0] / window.innerWidth
        }
    }
    // Criar instâncias apenas se os elementos estiverem presentes na página
    const xu1 = new Xu(".c1");
    const xu2 = new Xu(".c2");
    const xu3 = new Xu(".c3");

    // Criar uma lista de instâncias para fácil iteração
    const xuInstances = [xu1, xu2, xu3].filter(instance => instance);

    // Iterar sobre as instâncias e realizar a operação desejada
    xuInstances.forEach((xuInstance) => {
        // Realizar a operação desejada em cada instância
        Exemplo: xuInstance.post.isActive = true;
    });

    // Iniciar a renderização para cada instância
    xuInstances.forEach((xuInstance) => {
        xuInstance.render();
    });

    class Wu {
        constructor() {
            this.call = {
                mode: t => {
                    console.log("light mode", t), this.gl.scene.quad.mode(t)
                },
                swap: (t, e = {
                    d: 0
                }) => {
                    console.log("swap", t, e), this.gl.scene.quad.swap(t, e)
                }
            }, this.gl = new Xu("c")
        }
    }
    window.Gradient = new Wu;
</script>
