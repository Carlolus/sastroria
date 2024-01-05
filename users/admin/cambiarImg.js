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


