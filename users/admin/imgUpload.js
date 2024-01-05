function handleImageUpload() {
    const fileInput = document.getElementById('profile-image');
    const previewImage = document.getElementById('profile-image-preview');
    const imageUrlInput = document.getElementById('image-url');

    const apiKey = '2d9c46c0e2fbf94e0d6442adcd8e577e';

    fileInput.addEventListener('change', function() {
        const formData = new FormData();
        formData.append('image', fileInput.files[0]);

        fetch('https://api.imgbb.com/1/upload?key=' + apiKey, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            // Actualizar la URL de la imagen en la vista
            previewImage.src = data.data.url;

            // Almacenar la URL en un campo oculto del formulario
            imageUrlInput.value = data.data.url;
        })
        .catch(error => console.error('Error al subir la imagen:', error));
    });
}

function initialize() {
    // Otras configuraciones iniciales si es necesario

    // Configura el manejo de la carga de imágenes
    handleImageUpload();
}

// Llama a la función de inicialización cuando se carga la página
document.addEventListener('DOMContentLoaded', initialize);
