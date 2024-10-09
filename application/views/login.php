<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo 😎</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="titulo" align="center">
                    <h1>ToDo C.I😎</h1>
                    <?php
                    if ($this->session->flashdata("OP")) {
                        switch ($this->session->flashdata("OP")) {
                            case "SALIO":
                                ?>
                                <div class="alert alert-success" role="alert">
                                    USUARIO DESLOGEADO
                                </div>
                                <?php
                                break;
                            case "USUARIO INCORRECTO":
                                ?>
                                <div class="alert alert-info" role="alert">
                                    USUARIO INCORRECTO
                                </div>
                                <?php
                                break;
                            case "USUARIO INACTIVO":
                                ?>
                                <div class="alert alert-info" role="alert">
                                    USUARIO INACTIVO
                                </div>
                                <?php
                                break;
                            case "PROHIBIDO":
                                ?>
                                <div class="alert alert-info" role="alert">
                                    PRIMERO DEBE LOGEARSE
                                </div>
                                <?php
                                break;
                        }
                    }
                    ?>
                    <br>
                </div>
                <div class="card">
                    <div class="card-body">
                        <?php echo validation_errors("<p>", "</p>"); ?>
                        <form method="post" action="<?php echo site_url("auth/login"); ?>">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="mb-3" align="end">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>