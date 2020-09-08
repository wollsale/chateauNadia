import { sticky, logoScale } from "./topbar.js";
import { slider } from "./slider.js";
import { form } from "./form.js";
import { nav } from "./nav.js";

if (window.matchMedia("(max-width: 1024px)").matches) {
    console.log('nav')

    if (document.querySelector('.nav-trigger')) {
        nav();
    }
}

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

// const test = (() => {
//     document.querySelector('textarea').oninput = function auto_grow() {
//         document.querySelector('textarea').style.height = "5px";
//         document.querySelector('textarea').style.height = (document.querySelector('textarea').scrollHeight) + "px";
//     }
// })();