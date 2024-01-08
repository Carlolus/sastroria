const btn2 = document.getElementById("frmModifyCustomer")

btn2.addEventListener("submit", function(evt){
    
    evt.preventDefault();

    let div1 = document.getElementById("divModal")

    //llamado asincrono

    fetch("edit_customer2.php",{
        method: 'post',
        body: new FormData(frmModifyCustomer)
    })
    .then(response => response.text())
    .then(data => {
        div1.innerHTML = data;
        const myModal = new bootstrap.Modal('#Modal1', {
            keyboard: false
        })
        myModal.show()
    })
    .catch(err => alert(err))
})