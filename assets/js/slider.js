import { directive } from "babel-types";

export const slider = (slider) => {
    let items = slider.querySelectorAll('.slider__item'),
        trigger = document.querySelectorAll('.slider__bullet'),
        amount = items.length;

    items[0].classList.add('slider__item--is-active')
    trigger[0].classList.add('slider__bullet--is-active')

    trigger.forEach(el => {
        let target = el.dataset.slide;

        el.addEventListener('click', (e) => {
            e.preventDefault();

            trigger.forEach(element => {
                element.classList.remove('slider__bullet--is-active');
            });

            el.classList.add('slider__bullet--is-active');

            items.forEach(item => {
                let index = item.dataset.slide
                item.classList.remove('slider__item--is-active')

                if (index == target) {
                    let translate = index
                    item.classList.add('slider__item--is-active')

                    items.forEach(item => {
                        item.style.transform = 'translateX(-' + (translate - 1) * 100 + '%)'
                    });
                }
            });
        })
    });
};