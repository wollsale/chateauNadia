export const nav = () => {
    let trigger = document.querySelectorAll('.nav-trigger');
    let nav = document.querySelector('.head-nav');
    let topbar = document.querySelector('.topbar__main');
    let space = document.querySelector('.head-nav').getBoundingClientRect().top;
    let height = document.querySelector('.topbar__main .container .flex').clientHeight;
    let body = document.querySelector('body');
    let container = topbar.querySelector('.container');

    // SET
    topbar.style.height = height + "px";
    nav.style.top = space + 'px';
    nav.style.height = window.innerHeight - space + "px";

    // INIT
    nav.classList.remove('head-nav--is-active')
    container.classList.remove('open')
    body.classList.remove('no-scroll')

    // TRIGGER
    trigger.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault();

            if (!nav.classList.contains('head-nav--is-active')) {
                nav.classList.add('head-nav--is-active')
                container.classList.add('open')
                console.log('open nav')
            } else {
                nav.classList.remove('head-nav--is-active')
                container.classList.remove('open')
                console.log('close nav')
            }

            if (!body.classList.contains('no-scroll')) {
                body.classList.add('no-scroll')
            } else {
                body.classList.remove('no-scroll')
            }
        })
    });
}