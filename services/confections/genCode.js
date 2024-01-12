document.addEventListener("DOMContentLoaded", function() {
    const hiddenId = document.getElementById("obj");
    const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');

    dropdownTriggers.forEach(dropdownTrigger => {
        dropdownTrigger.addEventListener('show.bs.dropdown', function () {
            const confectionId = this.getAttribute('data-id');
            hiddenId.value = confectionId;
        });
    });
});