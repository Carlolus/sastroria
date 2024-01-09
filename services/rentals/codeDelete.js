let modalConfirm = document.getElementById("modalConfirm");
let bodyModalConfirm = document.getElementById("bodyModalConfirm");
let hiddenCamp = document.getElementById("rental_id");

function confirmDelete(id, detail){
    modalConfirm = new bootstrap.Modal('#modalConfirm', {
        keyboard: false
    })
    modalConfirm.show();
    hiddenCamp.value = id;
    bodyModalConfirm.innerHTML = "<p>¿Está seguro de que desea eliminar el alquiler del   " + detail + " ?</p>";
}

const btn1 = document.getElementById("frmConf")
btn1.addEventListener("submit", function(evt){
    
    evt.preventDefault();
    let div1 = document.getElementById("modalConfirm")

    //llamado asincrono
    fetch("delete_rental.php",{
        method: 'post',
        body: new FormData(frmConf)
    })
    .then(response => response.text())
    .then(data => {
        div1.innerHTML = data;
        const myModal = new bootstrap.Modal('#Modal1', {
            keyboard: false
        })
        myModal.show()
    })
    location.reload();
    location.reload();
})