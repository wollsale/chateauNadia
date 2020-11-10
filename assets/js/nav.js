export const nav = () => {
    const trigger = document.querySelectorAll('.nav-trigger');
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

    trigger.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault();

            styleMenu();

            nav.setAttribute('data-state', nav.getAttribute('data-state') === 'open' ? 'close' : 'open');

            if (!body.classList.contains('no-scroll')) {
                body.classList.add('no-scroll')
            } else {
                body.classList.remove('no-scroll')
            }
        })
    });
}