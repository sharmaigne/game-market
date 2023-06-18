const forms = document.querySelectorAll('.needs-validation')

/* validation */
Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated')
    }, false)
})

/* prevent resubmission on refresh */
if ( window.history.replaceState ) {
    window.history.replaceState( null, null, window.location.href );
}
