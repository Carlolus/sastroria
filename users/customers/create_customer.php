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
    
    <form action="add_customer.php" id = "frmAddCustomer">
        <div class="container-fluid">
            <div class="container">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
                    <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted">
                        <i class="bi bi-arrow-left-square me-2"></i></a>Añadir nuevo cliente</h2>
                    <div class="hstack gap-3">
                        <button class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span
                                class="text">Cancelar</span></button>
                        <button class="btn btn-dark btn-sm btn-icon-text" type="submit"><i class="bi bi-save"></i> <span class="text">Guardar</span></button>
                    </div>
                </div>

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
                                            <input id = "txtId" name = "txtId" type="number" class="form-control" min = "1" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nombre</label>
                                            <input id = "txtName" name = "txtName" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label class="form-label">Teléfono</label>
                                            <input id = "txtPhone" name = "txtPhone" type="text" class="form-control" required min = "0">
                                        </div>
                                    </div>
                                    <div class="col-lg-6"> 
                                        <div class="mb-3">
                                            <label class="form-label">Dirección</label>
                                            <input id = "txtAdress" name = "txtAdress" type="text" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label class="form-label">Correo Electrónico:</label>
                                        <input id = "txtEmail" name = "txtEmail" type="email" class="form-control">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Address -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6 mb-4">Medidas pantalón</h3>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="form-label">Largo</label>
                                        <input id="txtLargoP" name="txtLargoP" type="number" class="form-control" min="0" max="999">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Tiro</label>
                                        <input id="txtTiroP" name="txtTiroP" type="number" class="form-control" min="0" max="999">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Cintura</label>
                                        <input id="txtCinturaP" name="txtCinturaP" type="number" class="form-control" min="0" max="999">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Base</label>
                                        <input id="txtBaseP" name="txtBaseP" type="number" class="form-control" min="0" max="999">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="form-label">Pierna</label>
                                        <input id="txtPiernaP" name="txtPiernaP" type="number" class="form-control" min="0" max="999">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Rodilla</label>
                                        <input id="txtRodillaP" name="txtRodillaP" type="number" class="form-control" min="0" max="999">
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="form-label">Bota</label>
                                        <input id="txtBotaP" name="txtBotaP" type="number" class="form-control" min="0" max="999">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Medidas chaleco</h3>
                                <label class="form-label">Largo</label>
                                <input id="txtLargoV" name="txtLargoV" type="number" class="form-control" min="0" max="999">
                                <br>
                                <label class="form-label">Talle</label>
                                <input id="txtTalleV" name="txtTalleV" type="number" class="form-control" min="0" max="999">
                                <br>
                                <label class="form-label">Pecho</label>
                                <input id="txtPechoV" name="txtPechoV" type="number" class="form-control" min="0" max="999">
                            </div>
                        </div>

                        <!-- Medidas Saco -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <h3 class="h6">Medidas Saco</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">Largo</label>
                                        <input id="txtLargoS" name="txtLargoS" type="number" class="form-control" min="0" max="999">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Talle</label>
                                        <input id="txtTalleS" name="txtTalleS" type="number" class="form-control" min="0" max="999">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">Espalda</label>
                                        <input id="txtEspaldaS" name="txtEspaldaS" type="number" class="form-control" min="0" max="999">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Hombro</label>
                                        <input id="txtHombroS" name="txtHombroS" type="number" class="form-control" min="0" max="999">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label class="form-label">Pecho</label>
                                        <input id="txtPechoS" name="txtPechoS" type="number" class="form-control" min="0" max="999">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="form-label">Manga</label>
                                        <input id="txtMangaS" name="txtMangaS" type="number" class="form-control" min="0" max="999">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form> 
</body>