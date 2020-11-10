export const nav = () => {
    const trigger = document.querySelectorAll('.nav-trigger');
    const nav = document.querySelector('.head-nav');
    const topbar = document.querySelector('.topbar__main');
    const body = document.querySelector('body');
    const container = topbar.querySelector('.container');

    const menuIsOpen = function () {
        return nav.classList.contains("head-nav--is-active");
    };

    const styleMenu = () => {
        const space = document.querySelector('.head-nav').getBoundingClientRect().top;
        const height = document.querySelector('.topbar__main .container .flex').clientHeight;

        topbar.style.height = height + "px";
        nav.style.top = space + 'px';
        nav.style.height = window.innerHeight - space + "px";
    }

    const openMenu = () => {
        nav.classList.add('head-nav--is-active')
        container.classList.add('open')
    }

    const closeMenu = () => {
        nav.classList.remove('head-nav--is-active')
        container.classList.remove('open')
    }

    const toggleMenu = () => {

        if (nav.classList.contains('head-nav--is-active')) {
            closeMenu()
        } else {
            openMenu()
        }
    }


    // TRIGGER
    styleMenu();

    trigger.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault();

            toggleMenu();

            if (!body.classList.contains('no-scroll')) {
                body.classList.add('no-scroll')
            } else {
                body.classList.remove('no-scroll')
            }
        })
    });
}