const btn1 = document.getElementById("frmEditRental")


btn1.addEventListener("submit", function(evt){
    
    evt.preventDefault();

    let div1 = document.getElementById("divModal")

    fetch("edit_rental2.php",{
        method: 'post',
        body: new FormData(frmEditRental)
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