export const sticky = (target) => {
    const spaceTop = target.getBoundingClientRect().top;
    const head = document.querySelector('.topbar__head');
    let height = target.clientHeight;
    let trigger;

    if (spaceTop <= 0) {
        trigger = head.clientHeight;
    } else {
        trigger = spaceTop;
    }

    window.onscroll = (e) => {
        let scroll = window.scrollY;

        if (scroll >= trigger) {
            target.dataset.sticky = true;
            head.style.marginBottom = height + "px";
        } else {
            target.dataset.sticky = false;
            head.style.marginBottom = 0 + "px";
        }
    }
}

export const logoScale = (target) => {
    const scaleLimit = 2;

    window.addEventListener('scroll', (e) => {
        let sticky = document.querySelector('.topbar__main').dataset.sticky;

        if (sticky === 'true') {
            target.style.transform = 'scale(1)';
        } else {
            target.style.transform = 'scale(1.6)';
        }
    })
}