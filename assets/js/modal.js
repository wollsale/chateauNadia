export const modal = (target) => {
    const close = target.querySelector('.modal__close');
    const overlay = document.querySelector('.overlay');

    close.addEventListener('click', (e) => {
        e.preventDefault();

        target.style.display = 'none';
        overlay.style.display = 'none';
    })
}