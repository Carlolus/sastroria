let modalConfirm = document.getElementById("modalConfirm");
let hiddenCamp = document.getElementById("customer_id");
const btn1 = document.getElementById("frmConf")
const contFrm = document.getElementById("containerFrm");

function confirmDelete(id, name, nr, nc){
    modalConfirm = new bootstrap.Modal('#modalConfirm', {
        keyboard: false
    })
    modalConfirm.show();
    hiddenCamp.value = id;
    console.log("Nr:" +nr);
    console.log("Nc:" +nc);
    if (nr != 0 || nc != 0) {
        if(nr != 0 && nc != 0){
            contFrm.innerHTML = `
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Atención</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body' id='bodyModalConfirm'>
                        <p>No es posible eliminar al cliente ${name} ya que cuenta con ${nr} servicios de alquiler y ${nc} servicios de confección.</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Aceptar</button>
                    </div>
                </div>`;
        }
        else if(nr != 0){
            contFrm.innerHTML = `
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Atención</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body' id='bodyModalConfirm'>
                        <p>No es posible eliminar al cliente ${name} ya que cuenta con ${nr} servicios de alquiler.</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Aceptar</button>
                    </div>
                </div>`;
        }
        else if(nc != 0){
            contFrm.innerHTML = `
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title'>Atención</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>
                    <div class='modal-body' id='bodyModalConfirm'>
                        <p>No es posible eliminar al cliente ${name} ya que cuenta con ${nc} servicios de confección.</p>
                    </div>
                    <div class='modal-footer'>
                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Aceptar</button>
                    </div>
                </div>`;
        }
    }
    else{
        contFrm.innerHTML = `
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="bodyModalConfirm">
                    <p>Está seguro de que desea eliminar al cliente ${name}.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, cancelar</button>
                    <input type="submit" class="btn btn-dark" value="Si, continuar">
                </div>
            </div>
        `;
    }
}

btn1.addEventListener("submit", function(evt){
    
    evt.preventDefault();
    let div1 = document.getElementById("modalConfirm")

    //llamado asincrono
    fetch("delete_customer.php",{
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
})