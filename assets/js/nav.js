export const nav = () => {
    let trigger = document.querySelectorAll('.nav-trigger');
    let nav = document.querySelector('.head-nav');
    let topbar = document.querySelector('.topbar__main');
    let space = document.querySelector('.head-nav').getBoundingClientRect().top;
    let height = document.querySelector('.topbar__main .container .flex').clientHeight;
    let body = document.querySelector('body');


    topbar.style.height = height + "px";
    nav.style.top = space + 'px';
    nav.style.height = window.innerHeight - space + "px";

    trigger.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault();

            nav.classList.contains('head-nav--is-active') ? nav.classList.remove('head-nav--is-active') : nav.classList.add('head-nav--is-active')

            body.classList.contains('no-scroll') ? body.classList.remove('no-scroll') : body.classList.add('no-scroll');
        })
    });
}