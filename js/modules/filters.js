function eventAnimationHandler() {
    const events = document.querySelectorAll('.event');

    events.forEach(event => {
        if (!event.classList.contains('fade-in-top')) {
            event.classList.remove('hidden');
            event.classList.add('fade-in-top');

            return;
        }

        if (!event.classList.contains('fade-out-bottom')) {
            event.classList.remove('fade-in-top');
            event.classList.add('fade-out-bottom');

            return;
        }
    })

}

jQuery(document).ready(function ($) {

    eventAnimationHandler();

    const submit = document.querySelector('.filterEvents');

    if (submit) {
        submit.addEventListener('click', (e) => {
            e.preventDefault();
            const form = document.querySelector('#getEvents');
            const data = new FormData(form);
            console.log(data);
            $.ajax({
                url: '/wp-json/myplugin/v1/getevents',
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                beforeSend: function () {
                    eventAnimationHandler();
                },
                success: function (response) {
                    console.log(response);
                    $(".evenementen").html(response);
                    eventAnimationHandler();
                },
                error: function (response) {
                    console.error('Error:', response);
                }
            });

        });
    }

    $(function () {
        $(".datepicker").datepicker({
            dateFormat: "dd-mm-yy"
        });
    });

});
