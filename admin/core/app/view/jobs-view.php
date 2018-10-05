<section class="content">
<div class="row">
	<div class="col-md-12">
		<h1>Vacantes de Trabajo</h1>


<!-- Button trigger modal -->
<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
Nueva Vacante
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nueva Vacante</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal" method="post" id="addcategory" action="index.php?action=jobs&opt=add" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo*</label>
    <div class="col-md-6">
      <input type="text" name="name" required class="form-control" id="name" placeholder="Titulo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <textarea name="description" required class="form-control" id="description" placeholder="Descripcion"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Requerimientos*</label>
    <div class="col-md-6">
      <textarea name="requirements" required class="form-control" id="requirements" placeholder="Requerimientos"></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha limite*</label>
    <div class="col-md-6">
      <input type="date" name="limit_at" required class="form-control" id="limit_at" placeholder="Fecha limite">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria </label>
    <div class="col-md-6">
    <select name="category_id" class="form-control" required>
    <option value="">-- SELECCIONAR --</option>
      <?php foreach(CategoryData::getAll() as $g):?>
        <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Lugar </label>
    <div class="col-md-6">
    <select name="place_id" class="form-control" required>
    <option value="">-- SELECCIONAR --</option>
      <?php foreach(PlaceData::getAll() as $g):?>
        <option value="<?php echo $g->id;  ?>"><?php echo $g->name; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Vacante</button>
    </div>
  </div>
</form>

      </div>

    </div>
  </div>
</div>


<br>
<br>
		<?php

		$users = JobData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
<div class="box box-primary">
<div class="box-body">
			<table class="table table-bordered table-hover datatable">
			<thead>
			<th>Titulo</th>
      <th>Fecha limite</th>
      <th>Categoria</th>
      <th>Lugar</th>
      <th>Activo</th>
      <th>Creacion</th>
			<th></th>
			</thead>
			<?php
			foreach($users as $user){
				?>
				<tr>
				<td><?php echo $user->name; ?></td>
        <td><?php echo $user->limit_at; ?></td>
        <td><?php echo CategoryData::getById($user->category_id)->name; ?></td>
       <td><?php echo PlaceData::getById($user->place_id)->name; ?></td>
       <td>
         <?php if($user->status==1){ echo "<i class='fa fa-check'></i>"; }?>
       </td>
        <td><?php echo $user->created_at; ?></td>
				<td style="width:130px;">

<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editModal<?php echo $user->id; ?>">
Editar
</button>
<a href="index.php?action=jobs&opt=del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}

				?>
				</table>
<?php foreach($users as $user):?>
<!-- Modal -->
<div class="modal fade" id="editModal<?php echo $user->id; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Editar Vacante</h4>
      </div>
      <div class="modal-body">
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=jobs&opt=update" role="form">


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Titulo*</label>
    <div class="col-md-6">
      <input type="text" name="name" value="<?php echo $user->name;?>" class="form-control" id="name" placeholder="Titulo">
    </div>
  </div>


  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Descripcion*</label>
    <div class="col-md-6">
      <textarea name="description" required class="form-control" id="description" placeholder="Descripcion"><?php echo $user->description;?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Requerimientos*</label>
    <div class="col-md-6">
      <textarea name="requirements" required class="form-control" id="requirements" placeholder="Requerimientos"><?php echo $user->requirements;?></textarea>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Fecha limite*</label>
    <div class="col-md-6">
      <input type="date" name="limit_at" required class="form-control" value="<?php echo $user->limit_at;?>" id="limit_at" placeholder="Fecha limite">
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria </label>
    <div class="col-md-6">
    <select name="category_id" class="form-control" required>
    <option value="">-- SELECCIONAR --</option>
      <?php foreach(CategoryData::getAll() as $g):?>
        <option value="<?php echo $g->id;  ?>" <?php if($user->category_id==$g->id){ echo "selected"; }?>><?php echo $g->name; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Lugar </label>
    <div class="col-md-6">
    <select name="place_id" class="form-control" required>
    <option value="">-- SELECCIONAR --</option>
      <?php foreach(PlaceData::getAll() as $g):?>
        <option value="<?php echo $g->id;  ?>" <?php if($user->place_id==$g->id){ echo "selected"; }?>><?php echo $g->name; ?></option>
      <?php endforeach; ?>
    </select>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label" >Esta activo</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="status" <?php if($user->status==1){ echo "checked";}?>> 
    </label>
  </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="user_id" value="<?php echo $user->id;?>">
      <button type="submit" class="btn btn-primary">Actualizar Vacante</button>
    </div>
  </div>
</form>

      </div>

    </div>
  </div>
</div>
<?php endforeach; ?>
				</div>
				</div>
				<?php


		}else{
			echo "<p class='alert alert-danger'>No hay Vacantes de Trabajo</p>";
		}


		?>


	</div>
</div>

</section>