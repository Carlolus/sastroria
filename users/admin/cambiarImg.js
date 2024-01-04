// Actualizar la ruta de la imagen de previsualización
document.querySelector("#profile-image-preview").addEventListener("change", (e) => {
    // Obtener la ruta de la nueva imagen
    const newImagePath = e.target.files[0].path;
  
    // Actualizar la ruta de la imagen de previsualización
    document.querySelector("#profile-image-preview").src = newImagePath;
    console.log(newImagePath)
    console.log("hola")
});

console.log("asdfdsa")