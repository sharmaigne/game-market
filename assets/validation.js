'use strict'

/* use a validity hack for url */
function invalid_image(inp, image) {
    let temp = document.createElement('input');
    temp.type = 'url';
    temp.value = image;

    const res = !temp.checkValidity();

    inp.className = "form-control " + (res ? "is-invalid" : "is-valid");

    return res;
}

function invalid_stars(inp, stars) {
    const res = isNaN(stars) || stars < 0 || stars > 5;
    inp.className = "form-control " + (res ? "is-invalid" : "is-valid");

    return res;
}

function invalid_storage(inp, storage) {
    const shorterdays = [4,6,9,11];
    const pattern = /[0-9]+(\.[0-9]+)?\s[G,M,K]B/; /* checks for a number followed by GB, MB, or KB */
    
    const res = !pattern.test(storage);
    inp.className = "form-control " + (res ? "is-invalid" : "is-valid");
    return res;
}

function invalid_date(inp, release_date){
    const pattern   = /[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])/;

    /* month and day with integer hack */
    const month     = + (/(?<=[0-9-]{5})\d{2}(?=[-0-9])/)
                        .exec(release_date);
    const day       = + (/(?<=[0-9]{4}-[0-9]{2}-)\d{2}/)
                        .exec(release_date);

    const valid_day = day >= 0 && ( 0                        /* hack for haskell syntax */ 
        || (month == 2 && day <= 29) 
        || (shorterdays.includes(month) && day <= 30)    
        || (!shorterdays.includes(month) && day <= 31) )
        
    const res = !(pattern.test(release_date) && valid_day);
    inp.className = "form-control " + (res ? "is-invalid" : "is-valid");
    return res;
}

function isempty(inp) {
    const res = inp.value == "";
    inp.className = "form-control " + (res ? "is-invalid" : "is-valid");
    return res;
}

const forms = document.querySelectorAll('.needs-validation')

/* validation */
Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
        const game_name     = form.querySelector("#game_name");
        const developer     = form.querySelector("#developer");
        const release_date  = form.querySelector("#release_date");
        const price         = form.querySelector("#price");
        const storage       = form.querySelector("#storage_required");
        const stars         = form.querySelector("#stars");
        const image         = form.querySelector("#image");
        const tags          = form.querySelector("#tags");
        const description   = form.querySelector("#description");

        if (
            isempty(game_name) || isempty(developer) || isempty(tags) || isempty(description) ||    /* HACK : check for empty */
            isNaN(price.value) || invalid_stars(stars, stars.value) ||                              /* check for invalid numbers */
            invalid_image(image, image.value) || invalid_storage(storage, storage.value) ||
            invalid_date(release_date, release_date.value)                 
        ){
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