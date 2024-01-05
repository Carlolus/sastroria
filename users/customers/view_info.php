<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../resources/header.php');?>
</head>
<body>
    <?php include('../../resources/menu.php'); ?>
    <style>     
        body{
            background:#eee;
        }

        .card {
            box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: 1rem;
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.5rem 1.5rem;
        }
    </style>
    <br>
    <div class="container-fluid">

        <?php 
            // Información básica
            $db = conectar();
            $id = $_GET['id'];
            $sql = "SELECT * FROM customers WHERE id = $id"; 
            $result = mysqli_query($db, $sql);
            $arr = mysqli_fetch_array($result);
            $name = $arr[1];
            $phone = $arr[2];
            $adress = $arr[3];
            $email= $arr[4];
            
            // Medidas pantalón
            $sql = "SELECT * FROM trouser_measures WHERE customer = $id";
            $result = mysqli_query($db, $sql);
            $arr = mysqli_fetch_array($result);

            $largoP = $arr[1] ?? '';
            $tiroP = $arr[2] ?? '';
            $cinturaP = $arr[3] ?? '';
            $baseP = $arr[4] ?? '';
            $piernaP = $arr[5] ?? '';
            $rodillaP = $arr[6] ?? '';
            $botaP = $arr[7] ?? '';

            // Medidas Saco
            $sql = "SELECT * FROM coat_measures WHERE customer = $id";
            $result = mysqli_query($db, $sql);
            $arr = mysqli_fetch_array($result);

            $largoS = $arr[1] ?? '';
            $talleS = $arr[2] ?? '';
            $espaldaS = $arr[3] ?? '';
            $hombroS = $arr[4] ?? '';
            $pechoS = $arr[5] ?? '';
            $mangaS = $arr[6] ?? '';

            // Medidas Chaleco
            $sql = "SELECT * FROM vest_measures WHERE customer = $id";
            $result = mysqli_query($db, $sql);
            $arr = mysqli_fetch_array($result);

            $largoV = $arr[1] ?? '';
            $talleV = $arr[2] ?? '';
            $pechoV = $arr[3] ?? '';

            echo 
            <<< HTML
            <div class="container">
                <!-- Main content -->
                <div class="row">
                    <!-- Left side -->
                    <div class="col-lg-8">
                        <!-- Basic information -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6 mb-4">Información Básica</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Cédula</label>
                                            <input id="txtId" name="txtId" type="number" class="form-control" min="1" readonly value="$id">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input id="txtName" name="txtName" type="text" class="form-control" readonly value="$name">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Teléfono</label>
                                            <input id="txtPhone" name="txtPhone" type="text" class="form-control" readonly value="$phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6"> 
                                        <div class="mb-3">
                                            <label class="form-label">Dirección</label>
                                            <input id="txtAdress" name="txtAdress" type="text" class="form-control" readonly value="$adress">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Correo Electrónico:</label>
                                        <input id="txtEmail" name="txtEmail" type="email" class="form-control" readonly value="$email">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6 mb-4">Medidas pantalón</h3>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="form-label">Largo</label>
                                        <input id="txtLargoP" name="txtLargoP" type="number" class="form-control" min="0" max="999" readonly value="$largoP">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Tiro</label>
                                        <input id="txtTiroP" name="txtTiroP" type="number" class="form-control" min="0" max="999" readonly value="$tiroP">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Cintura</label>
                                        <input id="txtCinturaP" name="txtCinturaP" type="number" class="form-control" min="0" max="999" readonly value="$cinturaP">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Base</label>
                                        <input id="txtBaseP" name="txtBaseP" type="number" class="form-control" min="0" max="999" readonly value="$baseP">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="form-label">Pierna</label>
                                        <input id="txtPiernaP" name="txtPiernaP" type="number" class="form-control" min="0" max="999" readonly value="$piernaP">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Rodilla</label>
                                        <input id="txtRodillaP" name="txtRodillaP" type="number" class="form-control" min="0" max="999" readonly value="$rodillaP">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Bota</label>
                                        <input id="txtBotaP" name="txtBotaP" type="number" class="form-control" min="0" max="999" readonly value="$botaP">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Medidas Chaleco</h3>
                                <label class="form-label">Largo</label>
                                <input id="txtLargoV" name="txtLargoV" type="number" class="form-control" min="0" max="999" readonly value="$largoV">
                                <br>
                                <label class="form-label">Talle</label>
                                <input id="txtTalleV" name="txtTalleV" type="number" class="form-control" min="0" max="999" readonly value="$talleV">
                                <br>
                                <label class="form-label">Pecho</label>
                                <input id="txtPechoV" name="txtPechoV" type="number" class="form-control" min="0" max="999" readonly value="$pechoV">
                            </div>
                        </div>

                        <!-- Medidas Saco -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Medidas Saco</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">Largo</label>
                                        <input id="txtLargoS" name="txtLargoS" type="number" class="form-control" min="0" max="999" readonly value="$largoS">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Talle</label>
                                        <input id="txtTalleS" name="txtTalleS" type="number" class="form-control" min="0" max="999" readonly value="$talleS">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">Espalda</label>
                                        <input id="txtEspaldaS" name="txtEspaldaS" type="number" class="form-control" min="0" max="999" readonly value="$espaldaS">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Hombro</label>
                                        <input id="txtHombroS" name="txtHombroS" type="number" class="form-control" min="0" max="999" readonly value="$hombroS">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">Pecho</label>
                                        <input id="txtPechoS" name="txtPechoS" type="number" class="form-control" min="0" max="999" readonly value="$pechoS">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Manga</label>
                                        <input id="txtMangaS" name="txtMangaS" type="number" class="form-control" min="0" max="999" readonly value="$mangaS">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            HTML; 
            mysqli_close($db);

        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>