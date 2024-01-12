$('#searchInputClientes').on('input', function() {
    const searchTerm = $(this).val();
   
    $.ajax({
        url: 'searchCustomer.php',
        type: 'POST',
        data: { searchTerm: searchTerm },
        dataType: 'json',
        success: function(data) {
            
            updateTableClientes(data);
        },
        error: function(error) {
            console.error('Error al obtener datos de clientes:', error);
        }
    });
});

function updateTableClientes(data) {
    const tableBodyClientes = $('#tableBodyClientes');
    tableBodyClientes.empty();

    $.each(data, function(index, item) {
        const row = $('<tr>');
        row.html(`<td>${item.id}</td><td>${item.name}</td><td><input type='radio' name='selectedCustomer' value='${item.id}'></td>`);
        tableBodyClientes.append(row);
    });
}




const btn1 = document.getElementById("frmEditConfection")

btn1.addEventListener("submit", function(evt){
    
    evt.preventDefault();

    let div1 = document.getElementById("divModal")

    //llamado asincrono

    fetch("edit_confection2.php",{
        method: 'post',
        body: new FormData(frmEditConfection)
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