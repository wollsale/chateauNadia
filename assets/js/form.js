export const form = () => {
    const triggers = document.querySelectorAll('.form__trigger');
    const forms = document.querySelectorAll('.form');
    const activateClass = 'form--is-active';


    triggers.forEach(trigger => {
        let target = trigger.dataset.form;

        trigger.addEventListener('click', (e) => {
            e.preventDefault();

            reset();
            activate(trigger, target)
        })
    });

    const reset = () => {
        document.querySelectorAll('.' + activateClass).forEach(element => {
            element.classList.remove(activateClass);
        });
    }

    function activate(trigger, index) {
        trigger.classList.add(activateClass);

        forms.forEach(form => {
            let match = form.dataset.form;

            form.classList.remove(activateClass);

            if (index == match) {
                form.classList.add(activateClass)
            }
        });
    }
}