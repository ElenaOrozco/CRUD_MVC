<h1 class="page-header">Usuarios</h1>

<div class="text-left m-2">
    <a class="btn btn-outline-success" href="?c=User&a=Crud">Nuevo usuario</a>
</div>

<table class="table table-responsive">
    <thead>
        <tr>
            <th >Nombre</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th ></th>
            <th ></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->nombre; ?></td>
            <td><?php echo $r->direccion; ?></td>
            <td><?php echo $r->telefono; ?></td>

            <td>
                <a href="?c=user&a=Crud&id=<?php echo $r->id; ?>" class="btn btn-outline-warning">Editar</a>
            </td>
            <td>
                <a href="?c=user&a=Eliminar&id=<?php echo $r->id; ?>" class="btn btn-outline-danger">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 