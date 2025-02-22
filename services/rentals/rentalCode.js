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

    // Agregar filas a la tabla de clientes
    $.each(data, function(index, item) {
        const row = $('<tr>');
        row.html(`<td>${item.id}</td><td>${item.name}</td><td><input type='radio' name='selectedCustomer' value='${item.id}'></td>`);
        tableBodyClientes.append(row);
    });
}

$('#searchInputClientes').trigger('input');


document.getElementById('btnSave').disabled = true;
var customerS = false;
var suitS = false;

function validateButton() {
    if (customerS && suitS) {
        document.getElementById('btnSave').disabled = false;
    }
}

$('#tableBodyClientes').on('change', 'input[name="selectedCustomer"]', function () {
    customerS = true;
    validateButton();
});

$('#tableBodyTrajes').on('change', 'input[name="selectedSuit"]', function () {
    suitS = true;
    validateButton();
});


const btn1 = document.getElementById("frmCreateRental")

btn1.addEventListener("submit", function(evt){
    
    evt.preventDefault();

    let div1 = document.getElementById("divModal")


    fetch("create_rental2.php",{
        method: 'post',
        body: new FormData(frmCreateRental)
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


