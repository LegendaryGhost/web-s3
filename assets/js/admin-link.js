window.addEventListener('load', function() {
    // Sélectionne tous les liens dans la barre latérale qui ont un attribut data-target
    let sidenavLinks = document.querySelectorAll('#sidenav-main .nav-item[data-target]');
    let sidenavLinksToDisable = document.querySelectorAll('#sidenav-main .nav-item[data-target] a');

    sidenavLinksToDisable.forEach(link => {
        link.addEventListener('click', e => e.preventDefault())
    });


    // Ajoute un écouteur d'événements à chaque lien
    sidenavLinks.forEach(function(link) {
        link.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche la navigation vers une nouvelle page

            const sidenavLinks = document.querySelectorAll('#sidenav-main .nav-item[data-target]');
            sidenavLinks.forEach(link => {
                link.querySelector('.nav-link').classList.remove('active')
            });

            // Cache tous les divs contenant le contenu
            let containers = document.querySelectorAll('.container');
            containers.forEach(function(container) {
                container.classList.remove('active');
            });
            
            // Récupère l'ID du conteneur à partir de l'attribut data-target
            const targetId = this.getAttribute('data-target').substring(1); // Enlève le # initial
            const targetContainer = document.getElementById(targetId);
            if (targetContainer) {
                this.querySelector('.nav-link').classList.add('active');
                targetContainer.classList.add('active');
            }
        });
    });

});
