<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=User">Usuarios</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->nombre : 'Nuevo Registro'; ?></li>
</ol>

<form action="?c=User&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="nombre" value="<?php echo $alm->nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="direccion" value="<?php echo $alm->direccion; ?>" class="form-control" placeholder="Ingrese su direccion" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="telefono" value="<?php echo $alm->telefono; ?>" class="form-control" placeholder="Ingrese su correo telefono" data-validacion-tipo="requerido|min:10"  />
    </div>
    
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>