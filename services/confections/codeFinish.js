
// Your JavaScript code here
let modalConfirmFin = document.getElementById("modalConfirmFin");
let bodyModalConfirmFin = document.getElementById("bodyModalConfirmFin");
let hiddenCampFin = document.getElementById("confection_id_fin");

function confirmFinish(id, name){
    modalConfirmFin = new bootstrap.Modal('#modalConfirmFin', {
        keyboard: false
    })
    console.log(id);
    modalConfirmFin.show();
    hiddenCampFin.value = id;
    bodyModalConfirmFin.innerHTML = "<p>¿Está seguro de que desea dar por terminado el pedido del señor(a)   " + name + " ?</p>";
}

const btn2 = document.getElementById("frmConfFin")
btn2.addEventListener("submit", function(evt){
    
    evt.preventDefault();
    let div1 = document.getElementById("modalConfirmFin")

    //llamado asincrono
    fetch("finish_confection.php",{
        method: 'post',
        body: new FormData(frmConfFin)
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
