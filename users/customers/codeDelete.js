let modalConfirm = document.getElementById("modalConfirm");
let bodyModalConfirm = document.getElementById("bodyModalConfirm");
let hiddenCamp = document.getElementById("customer_id");

function confirmDelete(id, name){
    modalConfirm = new bootstrap.Modal('#modalConfirm', {
        keyboard: false
    })
    modalConfirm.show();
    hiddenCamp.value = id;
    bodyModalConfirm.innerHTML = "<p>¿Está seguro de que desea eliminar al cliente   " + name + " ?</p>";
}