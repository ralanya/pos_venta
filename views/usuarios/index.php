<?php include_once 'views/template/header.php'; ?>
<div class="card">
    <div class="card-body">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="usuarios-tab" data-bs-toggle="tab" data-bs-target="#usuarios" type="button" role="tab" aria-controls="nav-usuarios" aria-selected="true">Usuarios</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="nuevo-tab" data-bs-toggle="tab" data-bs-target="#nuevo" type="button" role="tab" aria-controls="nav-nuevo" aria-selected="false">Nuevo</button>
            </li>
        </ul>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-2" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                <h5 class="card-title text-center"><i class="fas fa-user"></i> Listado de Usuarios</h5>
                <hr>
                <table class="table table-bordered table-striped table-hove" id="tblUsuarios" style="width: 100%">
                    <thead class="thead-light">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade mt-2" id="nuevo" role="tabpanel" aria-labelledby="nuevo-tab">
                <div class="row p-5">
                    <div class="col-lg-4 col-sm-6">
                        <label>Nombres</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list"></i></span>
                            <input type="text" class="form-control" placeholder="Nombres">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label>Apellidos</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                            <input type="text" class="form-control" placeholder="Apellidos">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label>Correo</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Correo Electrónico">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label>Teléfono</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="number" class="form-control" placeholder="Teléfono">
                        </div>
                    </div>
                    <div class="col-lg-8 col-sm-6">
                        <label>Dirección</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-home"></i></span>
                            <input type="text" class="form-control" placeholder="Dirección">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <label>Clave</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i>Clave</span>
                            <input type="password" class="form-control" placeholder="Contraseña">
                        </div>
                    </div>                    
                    <div class="col-lg-4 col-sm-6">
                        <label>Rol</label>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-id-card"></i></label>
                            <select class="form-select" id="inputGroupSelect01">
                                <option selected>Seleccionar...</option>
                                <option value="1">ADMINISTRADOR</option>
                                <option value="2">VENDEDOR</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="text-end">
                    <button class="btn btn-primary" type="button">Registrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'views/template/footer.php'; ?>