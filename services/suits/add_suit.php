<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background:#eee;
        }

        #formimg {
            max-width: 400px;
            margin: 0 auto;
        }

        #suit-image-preview {
            max-width: 400px; /* Tamaño máximo deseado */
            max-height: 200px; /* Tamaño máximo deseado */
            height: auto;
            width: 100%;
            border-radius: 8px;
        }

        #profile-image {
            display: none;
        }

        .custom-file-input {
            color: transparent;
        }

        .custom-file-input::-webkit-file-upload-button {
            visibility: hidden;
        }

        .custom-file-input::before {
            content: 'Seleccionar imagen';
            color: #fff;
            display: inline-block;
            background: linear-gradient(to right, #162938 50%, #183c4a 50%);
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .custom-file-input:hover::before {
            background: #162938;
        }

        .form-check-label {
            margin-left: 15px;
        }

        .btn-dark {
            background-color: #162938;
            color: #fff;
        }

    </style>
</head>
<body>
    <?php include('../../resources/menu.php');?>
    <div class="container mt-5">
        <h1 class="mb-4">Agregar traje</h1>
        <div class="row">
            <form action="add_suit2.php" method="post" id="frmAddSuit">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="clave">Talla:</label>
                            <input type="number" class="form-control" name="txtsize" id="txtsize" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nombre">Detalles:</label>
                            <input type="text" class="form-control" name="txtdetails" id="txtdetails" required>
                        </div>
                        <br>           
                        <label class="form-check-label">Disponible</label>
                        <div class="form-check form-switch">
                            <input type="hidden" id="hiddenState" name="hiddenState" value = "a">
                            <input class="form-check-input" type="checkbox" id="disponible" name = "disponible" checked>
                        </div>
                        <br>
                    </div>

                    <div class="col-md-6" id="formimg">
                        <div class="form-group">
                            <label for="imagen">Imagen:</label>
                        </div>
                        <div class="form-group">
                            <label for="profile-image">
                                <img src = "https://i.ibb.co/SBkBrJY/img-suit.png" name="imgdir" alt="Profile Image" id="suit-image-preview">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="custom-file-input">
                                <input type="file" id="profile-image" name="profile-image">
                            </label>
                        </div>
                    </div>

                    <input type="hidden" id="image-url" name="image-url">

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-dark btn-block">Agregar Traje</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="imgUpload.js"></script>
    <script src="codeAdd.js"></script>  
</body>
</html>