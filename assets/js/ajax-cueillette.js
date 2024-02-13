
const genererCueilletteLignes = (listeCueillette) => {
    // Assume 'tbody' is a reference to the tbody element where the rows will be inserted
    let tbody = document.getElementById('cueillette-table-body'); // Replace with actual ID if different

    // Clear existing content
    tbody.innerHTML = '';

    // Iterate over the list of pickings
    listeCueillette.forEach(cueillette => {
        // Create a new table row
        let tr = document.createElement('tr');

        // First cell with date
        let tdDate = document.createElement('td');
        let divDate = document.createElement('div');
        divDate.className = 'd-flex px-2 py-1';
        let divInnerDate = document.createElement('div');
        divInnerDate.className = 'd-flex flex-column justify-content-center';
        let spanDate = document.createElement('span');
        spanDate.className = 'text-secondary text-xs font-weight-bold';
        spanDate.innerText = cueillette.date_cueillette;
        divInnerDate.appendChild(spanDate);
        divDate.appendChild(divInnerDate);
        tdDate.appendChild(divDate);
        tr.appendChild(tdDate);

        // Second cell with the harvester's name
        let tdHarvesterName = document.createElement('td');
        let pHarvesterName = document.createElement('p');
        pHarvesterName.className = 'text-xs font-weight-bold mb-0';
        pHarvesterName.innerText = cueillette.nomCueilleur;
        tdHarvesterName.appendChild(pHarvesterName);
        tr.appendChild(tdHarvesterName);

        // Third cell with the parcel name
        let tdParcelName = document.createElement('td');
        tdParcelName.className = 'align-middle text-center text-sm';
        let spanParcelName = document.createElement('span');
        spanParcelName.className = 'badge badge-sm bg-gradient-success';
        spanParcelName.innerText = cueillette.nomParcelle;
        tdParcelName.appendChild(spanParcelName);
        tr.appendChild(tdParcelName);

        // Fourth cell with weight
        let tdWeight = document.createElement('td');
        let pWeight = document.createElement('p');
        pWeight.className = 'text-xs font-weight-bold mb-0';
        pWeight.innerText = cueillette.poids;
        tdWeight.appendChild(pWeight);
        tr.appendChild(tdWeight);

        // Append the row to the table body
        tbody.appendChild(tr);
    });
};

const chargerCueillette = () => {
    sendXHRRequest(cueilletteCrudDir + 'liste-cueillette.php').then(
        reponse => {
            cueillettes = JSON.parse(reponse);
            genererCueilletteLignes(cueillettes);
        }
    );
};

const ajouterCueillette = e => {
    e.preventDefault();
    const action = e.target.action;
    const formData = new FormData(e.target);

    sendXHRRequest(action, 'POST', formData).then(
        responseText => {
            const jsonResponse = JSON.parse(responseText);
            alert(jsonResponse.message);
            chargerCueillette();
        }
    );
};

let cueillettes = [];
let cueilletteCrudDir;

window.addEventListener('load', () => {
    let form = document.getElementById('form-ajout-cueillette');
    let actionUrl = form.action;
    cueilletteCrudDir = actionUrl.substring(0, actionUrl.lastIndexOf('/') +  1)

    chargerCueillette();

    form.addEventListener('submit', ajouterCueillette);
});
