<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Prueba Diagnostico Desis</title>
        <link href="Assets/css/styles.css" rel="stylesheet" />
        <script src="Assets/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">FORMULARIO DE VOTACIÓN</h3></div>
                                    <div class="card-body">
                                        <form method="POST" id="frmPersonas">
                                            <div class="form-floating mb-3">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" name="nombreApellido" id="nombreApellido" type="text" placeholder="Nombre y Apellido" />
                                                    <label for="nombreApellido">Nombre y Apellido</label>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="alias" name="alias" type="text" placeholder="Alias" />
                                                    <label for="alias">Alias</label>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="rut" name="rut" type="text" placeholder="RUT" />
                                                    <label for="rut">RUT</label>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name="inputEmail" type="email" placeholder="Email" />
                                                <label for="inputEmail">Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-control" id="inputRegion" name="inputRegion" placeholder="Región">
                                                    <option value="" >Seleccione Región</option>
                                                </select>
                                                <label for="inputRegion">Región</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-control" id="inputComuna" name="inputComuna" placeholder="Comuna">
                                                    <option value="" >Seleccione Comuna</option>
                                                </select>
                                                <label for="inputComuna">Comuna</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select class="form-control" id="inputCandidato" name="inputCandidato" placeholder="Candidato">
                                                    <option value="" >Seleccione Candidato</option>
                                                </select>
                                                <label for="inputCandidato">Candidato</label>
                                            </div>
                                            <label for="checkboxs">Cómo se enteró de nosotros:</label>
                                            <div class="form-floating mb-3" id="checkboxs">

                                            </div>

                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="button" class="btn btn-primary btn-block" onclick="registrarPersona(event);">Votar</button></div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">

                    </div>
                </footer>
            </div>
        </div>
        <script src="Assets/js/jquery-3.7.1.min.js"></script>
        <script src="Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="Assets/js/scripts.js"></script>
        <script src="Assets/js/funciones.js"></script>
    </body>
</html>
