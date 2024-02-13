const ajouterCueillette = e => {
    e.preventDefault();

    sendXHRRequest('../inc/user/ajout-cueillete.php', 'POST', formData).then(
        responseText => {
            const jsonResponse = JSON.parse(responseText);
            alert(jsonResponse.message);
        }
    );
};

window.addEventListener('load', () => {
    let form = document.getElementById('form-ajout-cueillette');

    form.addEventListener('submit', ajouterCueillette);
});
