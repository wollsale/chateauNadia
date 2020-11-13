import { sticky, logoScale } from "./topbar.js";
import { slider } from "./slider.js";
import { form } from "./form.js";
// import { nav } from "./nav.js";
import { buttonHover } from "./button.js";
import { file } from "./file.js";
import { modal } from "./modal.js";

if (window.matchMedia("(max-width: 1280px)").matches) {
    const trigger = document.querySelector('.nav-trigger');
    const nav = document.querySelector('.head-nav');
    const topbar = document.querySelector('.topbar__main');
    const body = document.querySelector('body');
    const container = topbar.querySelector('.container');

    const styleMenu = () => {
        let space = 0;

        if (document.querySelector('.topbar__main').getAttribute('data-sticky') === 'true') {
            space = document.querySelector('.topbar__main').clientHeight;
        } else {
            space = document.querySelector('.topbar').clientHeight;
        }

        nav.style.top = space + 'px';
        nav.style.height = window.innerHeight - space + "px";
    }

    // TRIGGER
    styleMenu();

    trigger.addEventListener('click', (e) => {
        e.preventDefault();
        styleMenu();

        nav.setAttribute('data-state', nav.getAttribute('data-state') === 'open' ? 'close' : 'open');

        if (!body.classList.contains('no-scroll')) {
            body.classList.add('no-scroll')
        } else {
            body.classList.remove('no-scroll')
        }
    })
}

// window.onload = function () {
//     if (window.matchMedia("(max-width: 1280px)").matches) {
//         nav();
//         console.log('ok')
//     }
// };

// window.addEventListener('resize', () => {
//     if (window.matchMedia("(max-width: 1280px)").matches) {
//         if (document.querySelector('.nav-trigger')) {
//             nav();
//         }
//     }
// })

if (document.querySelector('.topbar__main')) {
    sticky(document.querySelector('.topbar__main'))
};

if (window.screen.width >= 1024) {
    if (document.querySelector('.brand__logo')) {
        logoScale(document.querySelector('.brand__logo'))
    }
}

if (document.querySelector('.slider')) {
    slider(document.querySelector('.slider'))
}

if (document.querySelector('.form')) {
    form();
}

if (document.querySelector('input[type="file"]')) {
    file();
}

if (document.querySelector('.modal')) {
    modal(document.querySelector('.modal'));
}

// if (document.querySelector('.wp-block-button__link')) {
//     buttonHover(document.querySelector('.wp-block-button__link'));
// }

window.addEventListener('load', function () {
    if (document.querySelector('.carousel')) {
        var carousel = tns({
            container: '.carousel',
            "startIndex": 1,
            "loop": true,
            items: 1,
            "center": true,
            gutter: "100px",
            rewind: 'true',
            touch: true,
            controls: true,
            nav: false,
            controlsContainer: document.querySelector('.carousel__controls'),
            prevButton: document.getElementById('#prev'),
            nextButton: document.getElementById('#next'),
        });

        const controls = document.querySelectorAll('.carousel__control');
        controls.forEach(control => {
            control.addEventListener('click', (e) => {
                e.preventDefault();
            })
        });
    }
})

window.addEventListener('load', function () {
    if (document.querySelector('.hero-slider')) {
        var slider = tns({
            container: '.hero-slider',
            items: 1,
            autoplay: true,
            controls: false,
            nav: false,
            navAsThumbnails: true,
            autoplayButton: false,
            autoplayButtonOutput: false,
            autoplayHoverPause: false,
            mode: 'gallery',
            speed: 800
        });

        document.querySelector('.hero-slider').addEventListener('click', (e) => {
            slider.goTo('next');
        })
    }
})


import sal from 'sal.js'
sal({
    threshold: .1,
    once: true,
});















/* LANG SWITCHER MOBILE */
window.addEventListener('load', function () {
    const triggers = document.querySelectorAll("[data-show]");
    const show = (el) => {
        const target = document.querySelectorAll("[data-id='" + el.dataset.target + "']")

        target.forEach(item => {
            console.log(item)
            item.setAttribute('data-state', item.getAttribute('data-state') === 'open' ? 'close' : 'open');
        });
    }

    triggers.forEach(trigger => {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();

            show(trigger);
        })
    });
})