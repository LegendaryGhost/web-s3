const envoyerTheForm = event => {
    event.preventDefault();
    let form = event.target;

    const actionDirUrl = form.action;
    const actionFileName = form.dataset.action;
    const formData = new FormData(form);

    sendXHRRequest(actionDirUrl + actionFileName, 'POST', formData).then(
        reponse => {
            const jsonReponse = JSON.parse(reponse);
            alert(jsonReponse.message);
            chargerVarietesThe();
        } 
    );

    viderTheModifForm();
}

const envoyerParcelleForm = event => {
    event.preventDefault();
    let form = event.target;

    const actionDirUrl = form.action;
    const actionFileName = form.dataset.action;
    const formData = new FormData(form);

    sendXHRRequest(actionDirUrl + actionFileName, 'POST', formData).then(
        reponse => {
            const jsonReponse = JSON.parse(reponse);
            alert(jsonReponse.message);
            chargerParcelles();
        } 
    );

    viderParcelleModifForm();
};

const envoyerCueilleurForm = event => {
    event.preventDefault();
    let form = event.target;

    const actionDirUrl = form.action;
    const actionFileName = form.dataset.action;
    const formData = new FormData(form);

    sendXHRRequest(actionDirUrl + actionFileName, 'POST', formData).then(
        () => {
            location.reload();
            viderCueilleurModifForm();
        }
    );

};

const viderTheModifForm = () => {
    theForm.dataset.action = 'ajout-the.php';
    theForm.dataset.mode = 'ajout';
    theForm.reset();
};

const viderParcelleModifForm = () => {
    parcelleForm.dataset.action = 'ajout-parcelle.php';
    parcelleForm.dataset.mode = 'ajout';
    parcelleForm.reset();
};

const viderCueilleurModifForm = () => {
    cueilleurForm.dataset.action = 'ajout-cueilleur.php';
    cueilleurForm.dataset.mode = 'ajout';
    cueilleurForm.reset();
};

const preparerTheModifForm = (theId) => {
    const the = varietesThe.find(the => the.id == theId);
    theForm.dataset.action = 'modif-the.php';
    theForm.dataset.mode = 'modif';

    // Fill in the theForm fields with the data from the 'the' object
    theForm.elements['id'].value = the.id;
    theForm.elements['nom'].value = the.nom;
    theForm.elements['occupation'].value = the.occupation;
    theForm.elements['rendement'].value = the.rendement_mensuel;
};

const preparerParcelleModifForm = (parcelleId) => {
    const parcelle = cueilleurs.find(parcelle => parcelle.id == parcelleId);
    parcelleForm.dataset.action = 'modif-parcelle.php';
    parcelleForm.dataset.mode = 'modif';

    // Fill in the parcelleForm fields with the data from the 'the' object
    parcelleForm.elements['id'].value = parcelle.id;
    parcelleForm.elements['idThe'].value = parcelle.id_the;
    parcelleForm.elements['nom'].value = parcelle.nom_parcelle;
    parcelleForm.elements['surface'].value = parcelle.surface;
};

const preparerCueilleurModifForm = (cueilleurId) => {
    const cueilleur = cueilleurs.find(cueilleur => cueilleur.id == cueilleurId);
    cueilleurForm.dataset.action = 'modif-cueilleur.php';
    cueilleurForm.dataset.mode = 'modif';

    // Fill in the cueilleurForm fields with the data from the 'the' object
    cueilleurForm.elements['id'].value = cueilleur.id;
    cueilleurForm.elements['nom'].value = cueilleur.nom;
    cueilleurForm.elements['genre'].value = cueilleur.genre;
    cueilleurForm.elements['dateNaissance'].value = cueilleur.date_naissance;
    cueilleurForm.elements['salaire'].value = cueilleur.salaire;
};

const supprimerThe = event => {
    event.preventDefault();
    const formData = new FormData(event.target);
    sendXHRRequest(theCrudDir + 'effacer-the.php', 'POST', formData).then(
        reponse => {
            alert(reponse);
            chargerVarietesThe();
            viderTheModifForm();
        }
    );
};

const supprimerParcelle = event => {
    event.preventDefault();
    const formData = new FormData(event.target);
    sendXHRRequest(parcelleCrudDir + 'effacer-parcelle.php', 'POST', formData).then(
        () => {
            chargerParcelles();
            viderParcelleModifForm();
        }
    );
};

const genererThesLignes = (thes) => {
    theListeTbody.textContent = '';

    // Iterate over the array and create table rows
    thes.forEach(the => {
        var tr = document.createElement('tr');
        
        // First cell with ID
        var tdId = document.createElement('td');
        var div = document.createElement('div');
        div.className = 'd-flex px-2 py-1';
        var divInner = document.createElement('div');
        divInner.className = 'd-flex flex-column justify-content-center';
        var h6 = document.createElement('h6');
        h6.className = 'mb-0 text-sm';
        h6.innerText = the.id;
        divInner.appendChild(h6);
        div.appendChild(divInner);
        tdId.appendChild(div);
        tr.appendChild(tdId);

        // Second cell with nom
        var tdNom = document.createElement('td');
        var pNom = document.createElement('p');
        pNom.className = 'text-xs font-weight-bold mb-0';
        pNom.innerText = the.nom;
        tdNom.appendChild(pNom);
        tr.appendChild(tdNom);

        // Second cell with occupation
        var tdNom = document.createElement('td');
        var pNom = document.createElement('p');
        pNom.className = 'text-xs font-weight-bold mb-0';
        pNom.innerText = `${the.occupation} m^2`;
        tdNom.appendChild(pNom);
        tr.appendChild(tdNom);

        // Third cell with monthly yield
        var tdRendement = document.createElement('td');
        tdRendement.className = 'align-middle text-center text-sm';
        var pRendement = document.createElement('p');
        pRendement.className = 'text-xs font-weight-bold mb-0';
        pRendement.innerText = `${the.rendement_mensuel} m^2`;
        tdRendement.appendChild(pRendement);
        tr.appendChild(tdRendement);

        // Fourth cell with Modify button
        var tdModify = document.createElement('td');
        tdModify.className = 'align-middle text-center text-sm';
        var btnModify = document.createElement('button');
        btnModify.className = 'badge badge-sm bg-gradient-info';
        btnModify.innerText = 'Modifier';
        btnModify.dataset.theId = the.id;
        btnModify.addEventListener('click', event => {
            const theId = event.target.dataset.theId;
            preparerTheModifForm(theId);
        });
        tdModify.appendChild(btnModify);
        tr.appendChild(tdModify);

        // Fifth cell with Delete form
        var tdDelete = document.createElement('td');
        tdDelete.className = 'align-middle';
        var formDelete = document.createElement('form');
        formDelete.addEventListener('submit', supprimerThe);
        formDelete.action = `${theCrudDir}effacer-the.php`;
        formDelete.method = 'post';
        var inputHidden = document.createElement('input');
        inputHidden.type = 'hidden';
        inputHidden.name = 'id';
        inputHidden.value = the.id;
        formDelete.appendChild(inputHidden);
        var btnDelete = document.createElement('button');
        btnDelete.type = 'submit';
        btnDelete.className = 'badge badge-sm bg-gradient-danger';
        btnDelete.innerText = 'Supprimer';
        formDelete.appendChild(btnDelete);
        tdDelete.appendChild(formDelete);
        tr.appendChild(tdDelete);

        // Append the row to the table body
        theListeTbody.appendChild(tr);
    });
}

const genererParcellesLignes = parcelles => {
    parcelleListeTbody.textContent = '';

    // Iterate over the array and create table rows
    parcelles.forEach(parcelle => {
        var tr = document.createElement('tr');
        
        // First cell with ID
        var tdId = document.createElement('td');
        tdId.innerText = parcelle.id;
        tr.appendChild(tdId);

        // Second cell with nom
        var tdNom = document.createElement('td');
        tdNom.innerText = parcelle.nom_parcelle;
        tr.appendChild(tdNom);

        // Third cell with variety of tea
        var tdVariete = document.createElement('td');
        tdVariete.innerText = parcelle.nom_the; // Assuming variete is a property of the parcelle object
        tr.appendChild(tdVariete);

        // Fourth cell with surface
        var tdSurface = document.createElement('td');
        tdSurface.innerText = `${parcelle.surface} ha`;
        tr.appendChild(tdSurface);

        // Fifth cell with Modify button
        var tdModify = document.createElement('td');
        tdModify.className = 'align-middle text-center text-sm';
        var btnModify = document.createElement('button');
        btnModify.className = 'badge badge-sm bg-gradient-info';
        btnModify.innerText = 'Modifier';
        btnModify.dataset.parcelleId = parcelle.id;
        btnModify.addEventListener('click', event => {
            const parcelleId = event.target.dataset.parcelleId;
            preparerParcelleModifForm(parcelleId); // You will need to implement this function
        });
        tdModify.appendChild(btnModify);
        tr.appendChild(tdModify);

        // Sixth cell with Delete form
        var tdDelete = document.createElement('td');
        tdDelete.className = 'align-middle';
        var formDelete = document.createElement('form');
        formDelete.addEventListener('submit', supprimerParcelle); // You will need to implement this function
        formDelete.action = `${parcelleCrudDir}effacer-parcelle.php`; // Adjust the path according to your server setup
        formDelete.method = 'post';
        var inputHidden = document.createElement('input');
        inputHidden.type = 'hidden';
        inputHidden.name = 'id';
        inputHidden.value = parcelle.id;
        formDelete.appendChild(inputHidden);
        var btnDelete = document.createElement('button');
        btnDelete.type = 'submit';
        btnDelete.className = 'badge badge-sm bg-gradient-danger';
        btnDelete.innerText = 'Supprimer';
        formDelete.appendChild(btnDelete);
        tdDelete.appendChild(formDelete);
        tr.appendChild(tdDelete);

        // Append the row to the table body
        parcelleListeTbody.appendChild(tr);
    });
}

const genererTheOptions = thes => {
    const select = parcelleForm.querySelector('select');
    select.textContent = '';
    thes.forEach(the => {
        const option = document.createElement('option');
        option.value = the.id;
        option.textContent = the.nom;
        select.appendChild(option);
    });

    select.value = thes[0].id;
};

const chargerVarietesThe = () => {
    sendXHRRequest(theCrudDir + 'liste-the.php').then(
        reponse => {
            varietesThe = JSON.parse(reponse);
            genererThesLignes(varietesThe);
            genererTheOptions(varietesThe);
        }
    );
};

const chargerParcelles = () => {
    sendXHRRequest(adminDir + '/parcelle/liste-parcelle.php').then(
        reponse => {
            cueilleurs = JSON.parse(reponse);
            genererParcellesLignes(cueilleurs);
        }
    );
}

const chargerCueilleurs = () => {
    sendXHRRequest(adminDir + '/cueilleur/liste-cueilleur.php').then(
        reponse => {
            cueilleurs = JSON.parse(reponse);
        }
    );
}

let theForm;
let parcelleForm;
let cueilleurForm;
let theFormResetBtn;
let parcelleFormResetBtn;
let cueilleurFormResetBtn;
let theListeTbody;
let parcelleListeTbody;
let theCrudDir;
let parcelleCrudDir;
let adminDir;
let varietesThe = [];
let cueilleurs = [];

window.addEventListener('load', () => {
    theForm = document.getElementById('form-the');
    parcelleForm = document.getElementById('form-parcelle');
    cueilleurForm = document.getElementById('form-cueilleur');
    theFormResetBtn = theForm.querySelector('button[type="reset"]');
    parcelleFormResetBtn = parcelleForm.querySelector('button[type="reset"]');
    cueilleurFormResetBtn = cueilleurForm.querySelector('button[type="reset"]');
    theListeTbody = document.querySelector('#table-liste-the tbody');
    parcelleListeTbody = document.querySelector('#table-liste-parcelle tbody');

    theCrudDir = theForm.action;
    parcelleCrudDir = parcelleForm.action;
    adminDir = theCrudDir + '../';    

    chargerVarietesThe();
    chargerParcelles();
    chargerCueilleurs();

    const modifCueilleurBtns = document.querySelectorAll('#table-liste-cueilleur button[data-cueilleur-id]');
    modifCueilleurBtns.forEach(button => {
        button.addEventListener('click', event => {
            const idCueilleur = event.target.dataset.cueilleurId;
            preparerCueilleurModifForm(idCueilleur);
        })
    });

    theForm.addEventListener('submit', envoyerTheForm);
    parcelleForm.addEventListener('submit', envoyerParcelleForm);
    cueilleurForm.addEventListener('submit', envoyerCueilleurForm);
    theFormResetBtn.addEventListener('click', viderTheModifForm);
    parcelleFormResetBtn.addEventListener('click', viderParcelleModifForm);
    cueilleurFormResetBtn.addEventListener('click', viderCueilleurModifForm);
});