document.addEventListener('DOMContentLoaded', function() {
    var isGrayscale = localStorage.getItem('grayscaleEnabled') === 'true';

    function toggleGrayscale() {
        if (isGrayscale) {
            document.body.style.filter = "none";
            localStorage.setItem('grayscaleEnabled', false);
            document.cookie = "toggle_state=normal_version; expires=Fri, 31 Dec 9999 23:59:59 GMT";
        } else {
            document.body.style.filter = "grayscale(100%)";
            localStorage.setItem('grayscaleEnabled', true);
            document.cookie = "toggle_state=grayscale_enabled; expires=Fri, 31 Dec 9999 23:59:59 GMT";
        }
        isGrayscale = !isGrayscale;
    }

    document.getElementById('grayscaleToggle').addEventListener('click', function(event) {
        event.preventDefault();
        toggleGrayscale();
        var toggleText = isGrayscale ? 'Звичайна версія' : 'Людям з порушеннями зору';
        this.querySelector('.nav__title').innerHTML = '<i class="fa fa-eye"></i> ' + toggleText;
    });

    // Apply grayscale filter based on localStorage state on page load
    if (isGrayscale) {
        document.body.style.filter = "grayscale(100%)";
    }
});
