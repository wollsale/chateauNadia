const sticky = (target) => {
    const trigger = target.getBoundingClientRect().top;
    const head = document.querySelector('.topbar__head');
    let height = target.clientHeight;

    window.onscroll = (e) => {
        let scroll = window.scrollY;

        console.log(scroll + " :: " + trigger);

        if (scroll >= trigger) {
            target.dataset.sticky = true;
            head.style.marginBottom = height + "px";
        } else {
            target.dataset.sticky = false;
            head.style.marginBottom = 0 + "px";
        }
    }
}

export default sticky;