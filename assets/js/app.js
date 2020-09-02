import { sticky, logoScale } from "./topbar.js";

if (document.querySelector('.topbar__main')) {
    sticky(document.querySelector('.topbar__main'))
};

if (document.querySelector('.brand__logo')) {
    logoScale(document.querySelector('.brand__logo'))
}