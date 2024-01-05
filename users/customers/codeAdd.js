const btn1 = document.getElementById("frmAddCustomer")


btn1.addEventListener("submit", function(evt){
    
    evt.preventDefault();

    let div1 = document.getElementById("divModal")

    //llamado asincrono

    fetch("add_customer.php",{
        method: 'post',
        body: new FormData(frmAddCustomer)
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