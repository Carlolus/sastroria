<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
</head>
<body>
    <?php include('../../resources/menu.php');?>
    
    <style>
    body {
        font-family: 'Roboto', sans-serif;

        .password-toggle {
            position: relative;
        }

        .toggle-btn {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        #profile-image-preview {
            max-width: 100%;
            height: auto; 
            max-height: 200px;
            display: block; 
            margin-top: 10px; 
        }
    }

    
    #formimg{
            max-width: 250px;
            margin: 0 auto;
            padding: 0px;
            /* background-color: #162938; */
            border: 2px solid #162938;
        }


    img{
            /* margin-left: 70px; */
            /* justify-content: center;
            align-items: center; */
            height: 10px;
            width: 200px;
            border-radius: 50%;
            object-fit: cover;
            background: #dfdfdf;
            border: 2px solid #162938;
        }
        
    </style>
    
    <div class="container mt-5">
        <h1 class="mb-4">Actualizar Información</h1>

        <div class="row">
        <?php
            $db = conectar();

            $sql = "SELECT login, name, image, phone FROM users WHERE login = '" . $_SESSION['xlog'] . "'";
            $result = mysqli_query($db, $sql);

            if ($result) {
                $arr = mysqli_fetch_array($result);
                $login = $arr["login"];
                $name = $arr["name"];
                $image = $arr["image"];
                $phone = $arr["phone"];
            } else {
                echo "Error en la consulta: " . mysqli_error($db);
            }
            echo <<<HTML
                <form action="dataChange.php" method="post" id = "frmDataChange">
                    <div class="row">
                        <div class="col-md-6">
                        <!-- Clave de acceso -->
                            <div class="form-group">
                                <label for="clave">Clave de acceso:</label>
                                <input type="text" class="form-control" name="login" id="clave" value='$login' required>
                            </div>
                            <br>
                            <!-- Nombre -->
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" name="name" id="nombre" value='$name' required>
                            </div>
                            <br>
                            <!-- Número de teléfono -->
                            <div class="form-group">
                                <label for="telefono">Número de teléfono:</label>
                                <input type="tel" class="form-control" value = '$phone'name="phone" id="telefono" pattern="[0-9]{10}" required>
                                <small class="form-text text-muted">Formato: 1234567890</small>
                            </div>
                            <br>
                        </div>

                        <div class="col-md-6 justify-content-center align-items-center">
                            <div class="form-group">
                                <label for="imagen">Seleccionar nueva imagen:</label>
                            </div>
                            <div class="form-group">
                                <label for="profile-image">
                                    <img src='$image' name="imgdir" alt="Profile Image" id="profile-image-preview" style="max-width: 100%; height: auto;">
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="file" id="profile-image" name="profile-image">
                            </div>           
                        </div>

                        <input type="hidden" id="image-url" name="image-url">
        
                        <div class="col-md-12"> 
                            <button type="submit" class="btn btn-dark btn-block">Actualizar</button>
                            <input type="button" class = "btn btn-tertiary" id = "btnChangePass" value="Cambiar Contraseña">
                        </div>
                    </div>    
                </form>   
            HTML;  
                mysqli_close($db);
            ?>
        </div>

    <div class="modal" tabindex="-1" role="dialog" id="modalChangePassword">
        <div class="modal-dialog" role="document">
            <div class="row"> 
                <div class="modal-content">
                    <form action="passwordChange.php" method="post" class="col-12" id="frmChangePass">
                        <br>
                        <h2>Actualizar Contraseña</h2>
                        <br>
                        <div class="form-group">
                            <label for="newPassword1">Nueva Contraseña:</label>
                            <div class="input-group">
                                <input type="password" required id="newPassword1" name="newPassword1" class="form-control">
                                <span class="input-group-text" onclick="togglePassword('newPassword1')">
                                    <i class="bi ci-eye"></i>
                                </span>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="newPassword2">Confirme la nueva contraseña:</label>
                            <div class="input-group">
                                <input type="password" required id="newPassword2" name="newPassword2" class="form-control">
                                <span class="input-group-text" onclick="togglePassword('newPassword2')">
                                    <i class="bi ci-eye"></i>
                                </span>
                            </div>
                            <small id="passwordMatchMessage" class="form-text text-muted"></small>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="actualPassword">Contraseña actual:</label>
                            <div class="input-group">
                                <input type="password" required id="actualPassword" name="actualPassword" class="form-control">
                                <span class="input-group-text" onclick="togglePassword('actualPassword')">
                                    <i class="bi ci-eye"></i>
                                </span>
                            </div>
                        </div>
                        <br>
                        <input type="submit" value="Guardar" class="btn btn-dark btn-block col-5" id = "btnSaveChanges">
                        <input type="button" class="btn btn-tertiary col-5" value="Cancelar" onclick="ocultarModal()">             
                        <br>
                        <br>             
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="dataUpdate.js"></script>
    <script src="imgUpload.js"></script>
</body>
</html>