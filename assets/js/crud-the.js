const envoyerFormulaire = event => {
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

    viderModifForm();
}

const viderModifForm = () => {
    theForm.dataset.action = 'ajout-the.php';
    theForm.dataset.mode = 'ajout';
    theForm.reset();
};

const preparerModifForm = (theId) => {
    const the = varietesThe.find(the => the.id == theId);
    theForm.dataset.action = 'modif-the.php';
    theForm.dataset.mode = 'modif';

    // Fill in the theForm fields with the data from the 'the' object
    theForm.elements['id'].value = the.id;
    theForm.elements['nom'].value = the.nom;
    theForm.elements['occupation'].value = the.occupation;
    theForm.elements['rendement'].value = the.rendement_mensuel;
};

const supprimerThe = event => {
    event.preventDefault();
    const formData = new FormData(event.target);
    sendXHRRequest(theCrudDir + 'effacer-the.php', 'POST', formData).then(
        () => {
            chargerVarietesThe();
            viderModifForm();
        }
    );
};

const genereThesLignes = (thes) => {
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
            preparerModifForm(theId);
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

const chargerVarietesThe = () => {
    sendXHRRequest(theCrudDir + 'liste-the.php').then(
        reponse => {
            varietesThe = JSON.parse(reponse);
            genereThesLignes(varietesThe);
        }
    );
};

let theForm;
let theFormResetBtn;
let theListeTbody;
let theCrudDir;
let varietesThe = [];

window.addEventListener('load', () => {
    theForm = document.getElementById('form-the');
    theFormResetBtn = theForm.querySelector('button[type="reset"]');
    theListeTbody = document.querySelector('#table-liste-the tbody');

    theCrudDir = theForm.action;

    chargerVarietesThe();

    theForm.addEventListener('submit', envoyerFormulaire);
    theFormResetBtn.addEventListener('click', viderModifForm);
});