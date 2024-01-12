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

  const formData = new FormData(frmChangePass); 

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

  const formData = new FormData(frmDataChange); 

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

