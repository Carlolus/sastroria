// Obtener el elemento de imagen de previsualización
const imagePreview = document.querySelector("#profile-image-preview");

// Obtener el elemento de entrada de archivo
const inputFile = document.querySelector("#profile-image");

// Agregar un evento de cambio al elemento de entrada de archivo
inputFile.addEventListener("change", (e) => {
  // Obtener el archivo seleccionado
  const selectedFile = e.target.files[0];

  // Mostrar la imagen seleccionada en la imagen de previsualización
  imagePreview.src = URL.createObjectURL(selectedFile);
});

const btnChangePass = document.getElementById("btnChangePass");
let modalModify;

btnChangePass.addEventListener("click", function() {

  modal = new bootstrap.Modal(document.getElementById("modalChangePassword"), {
    keyboard: false
  });
  modal.show(); 
});

function ocultarModal() {
  modal.hide();
}

function togglePassword(id) {
  const passwordInput = document.getElementById(id);

  // Cambia entre 'password' y 'text'
  passwordInput.type = passwordInput.type === "password" ? "text" : "password";
}

const newPassword1 = document.getElementById('newPassword1');
const newPassword2 = document.getElementById('newPassword2');
const passwordMatchMessage = document.getElementById('passwordMatchMessage');
const guardarButton = document.getElementById('btnSaveChanges');

newPassword1.addEventListener('input', checkPasswordMatch);
newPassword2.addEventListener('input', checkPasswordMatch);

function checkPasswordMatch() {
    if (newPassword1.value !== newPassword2.value) {
        passwordMatchMessage.textContent = 'Las contraseñas no coinciden';
        guardarButton.disabled = true;
    } else {
        passwordMatchMessage.textContent = '';
        guardarButton.disabled = false;
    }
}

const guardarButtonF = document.getElementById("frmChangePass");
guardarButtonF.addEventListener("submit", function(evt) {
  modal.hide();
  evt.preventDefault();

  let div1 = document.getElementById("divModal");

  // Obtener los datos del formulario
  const formData = new FormData(frmChangePass); // 'this' se refiere al formulario actual

  // Llamado asincrónico con datos del formulario
  fetch("passwordChange.php", {
      method: 'post',
      body: formData,
  })
  .then(response => response.text())
  .then(data => {
      div1.innerHTML = data;
      const MyModal = new bootstrap.Modal('#Modal1', {
          keyboard: false
      });
      MyModal.show();
  })
  .catch(err => alert(err));
});


const actualizarDataB = document.getElementById("frmDataChange");
actualizarDataB.addEventListener("submit", function(evt) {
  evt.preventDefault();

  let div1 = document.getElementById("divModal");

  // Obtener los datos del formulario
  const formData = new FormData(frmDataChange); // 'this' se refiere al formulario actual

  // Llamado asincrónico con datos del formulario
  fetch("dataChange.php", {
      method: 'post',
      body: formData,
  })
  .then(response => response.text())
  .then(data => {
      //location.reload();
      div1.innerHTML = data;
      const MyModal = new bootstrap.Modal('#Modal1', {
          keyboard: false
      });
      MyModal.show();
  })
  .catch(err => alert(err));
});
