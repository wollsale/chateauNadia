export const nav = () => {
    const trigger = document.querySelectorAll('.nav-trigger');
    const nav = document.querySelector('.head-nav');

    trigger.forEach(el => {
        el.addEventListener('click', (e) => {
            e.preventDefault();

            nav.classList.contains('head-nav--is-active') ? nav.classList.remove('head-nav--is-active') : nav.classList.add('head-nav--is-active')
        })
    });
}