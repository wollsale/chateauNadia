import { sticky, logoScale } from "./topbar.js";
import { slider } from "./slider.js";

if (document.querySelector('.topbar__main')) {
    sticky(document.querySelector('.topbar__main'))
};

if (document.querySelector('.brand__logo')) {
    logoScale(document.querySelector('.brand__logo'))
}

if (document.querySelector('.slider')) {
    slider(document.querySelector('.slider'))
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
                console.log('click')
            })
        });
    }
})