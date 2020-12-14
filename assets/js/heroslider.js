import { slider } from "./slider";

export const heroslider = (target) => {
    const images = target.querySelectorAll('img');
    let i = 0;

    const setID = () => {
        let i = 0;

        images.forEach(image => {
            image.dataset.id = i;
            i++;
        });
    }
    const setFocus = (focusValue) => {
        images.forEach(image => {
            image.dataset.focus = false;
        });

        images[focusValue].dataset.focus = true;
    }

    setID(0);


    setInterval(function () {
        console.log('SI ' + i);
        setFocus(i);
        setTransform(i);
        i < images.length - 1 ? i++ : i = 0;
    }, 3000);



    target.addEventListener('click', (e) => {
        console.log('CLI ' + i);
        e.preventDefault();
        i < images.length - 1 ? i++ : i = 0;
        setFocus(i);
        setTransform(i);

        console.log('CLI POST ' + i);
    })

    const setTransform = (i) => {
        let focus = target.querySelector('img[data-focus="true"]')
        let value = focus.dataset.id;
        target.style.transform = 'translateX(-' + value * 100 + '%)'
    }

}