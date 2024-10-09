<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todo 😎</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="titulo text-center">
                    <h1>ToDo C.I 😎</h1>
                    <span class="float-end">
                        <?= ucfirst($this->session->userdata("usuario")) ?>
                        <a href="<?php echo site_url("auth/logout"); ?>">Salir</a>
                    </span>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="<?php echo site_url("todo/nuevo"); ?>">
                            <div class="mb-3">
                                <label for="texto" class="form-label">Pendiente:</label>
                                <input type="text" class="form-control" id="texto" name="texto" required>
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>

                <br>
                <?php if ($this->session->flashdata("OP")): ?>
                    <div class="alert alert-primary" role="alert"><?= $this->session->flashdata("OP") ?></div>
                <?php endif; ?>

                <br>
                <?php if (count($pendientes)): ?>
                    <ul class="list-group">
                        <?php foreach ($pendientes as $p): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-start">
                                <div class="ms-2 me-auto">
                                    <span><?= $p->texto ?></span>
                                </div>
                                <a class="btn btn-success btn-sn" title="Listo"
                                   href="<?php echo site_url("/todo/listo/" . $p->pendiente_id); ?>">
                                    <i class="bi bi-check-lg"></i>
                                </a>
                                <a class="btn btn-danger btn-sn" title="Borrar"
                                   href="<?php echo site_url("/todo/borrar/" . $p->pendiente_id); ?>">
                                    <i class="bi bi-trash3"></i>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php else: ?>
                    <div class="alert alert-danger" role="alert">
                        <strong>Info:</strong> No hay pendientes
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
