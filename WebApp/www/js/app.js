window.addEventListener('DOMContentLoaded', function() {

    app = new Vue({
        el: '#vue',
        data: {
            pageTitle: 'Mon super titre !',  
            renderBody: 'Contenu de la page',
            year: 2020,
            authors: ['Julien', 'Adrien', 'Tib', 'François', 'Mr Balkany'],
            isActive: false
        },
    }); 

    document.querySelector('#btn').addEventListener('click', function() {
        app.year = parseInt(app.year);
        app.year += 1;
        // app.authors.push('Mickaël');
        app.isActive = !app.isActive;
    });


});


