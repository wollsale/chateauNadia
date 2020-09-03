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