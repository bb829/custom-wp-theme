const pricing = document.querySelector('.pricing--tabs');
const pricingTab = document.querySelectorAll('a.pricing__tab');
const tables = document.querySelectorAll('[data-pricing-table]');

pricingTab.forEach(tab => {

    tab.addEventListener('click', function (event) {
        event.preventDefault();
        pricingTab.forEach(t => t.classList.remove('pricing__tab--active'));
        event.target.classList.add('pricing__tab--active');


        const tabID = event.target.getAttribute('id');
        const pricingContent = document.querySelector('div#' + tabID);

        tables.forEach(table => {
            table.classList.add('d-none');
        });

        if (pricingContent.classList.contains('d-none')) {
            pricingContent.classList.remove('d-none');

        } else {

            pricingContent.classList.add('d-none');

        }

    });

});
