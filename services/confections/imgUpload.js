document.addEventListener('DOMContentLoaded', function () {
    function handleImageUpload() {
        const fileInput = document.getElementById('profile-image');
        const previewImage = document.getElementById('suit-image-preview');
        const imageUrlInput = document.getElementById('image-url');

        const apiKey = '2d9c46c0e2fbf94e0d6442adcd8e577e';

        fileInput.addEventListener('change', function () {
            const formData = new FormData();
            formData.append('image', fileInput.files[0]);

            fetch('https://api.imgbb.com/1/upload?key=' + apiKey, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    previewImage.src = data.data.url;
                    imageUrlInput.value = data.data.url;
                })
                .catch(error => console.error('Error al subir la imagen:', error));
        });
    }

    function initialize() {
        handleImageUpload();
    }

    const state = document.getElementById("hiddenProv");

    document.getElementById('prov_fabric').addEventListener('change', function() {
        if(this.checked) {
            state.value = "y"
        } else {
            state.value = "n"
        }
    });

    initialize();
});