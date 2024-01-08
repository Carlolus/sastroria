document.addEventListener("DOMContentLoaded", function() {
    // Tu código JavaScript aquí
    const hiddenId = document.getElementById("obj");
    const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');

    dropdownTriggers.forEach(dropdownTrigger => {
        dropdownTrigger.addEventListener('show.bs.dropdown', function () {
            const userId = this.getAttribute('data-id');
            hiddenId.value = userId;
        });
    });
});
/*
function searchCustomers() {
    // Obtén el valor de la barra de búsqueda
    var searchName = document.getElementById("searchName").value;

    // Realiza una solicitud AJAX para obtener los resultados de la búsqueda
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Actualiza la tabla con los resultados de la búsqueda
            document.getElementById("customerTable").innerHTML = xhr.responseText;
        }
    };

    // Envía la solicitud al servidor (ahora a search_customers.php)
    xhr.open("POST", "search_customers.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchName=" + searchName);
}*/