const hiddenId = document.getElementById("obj");
const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');

// Agrega el evento 'show.bs.dropdown' a cada elemento
dropdownTriggers.forEach(dropdownTrigger => {
    dropdownTrigger.addEventListener('show.bs.dropdown', function () {
        const userId = this.getAttribute('data-id');
        hiddenCamp.value = userId;
    });
});