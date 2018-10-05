<?php
$jb  = JobData::getById($_GET["id"]);
?>

<div class="container">
<div class="row">
<div class="col-md-12">
<h1><?php echo $jb->name; ?></h1>

<div class="panel panel-default">
<div class="panel-heading">Informacion del Trabajo</div>
<div class="panel-body">
<label>Descripcion</label>
<p><?php echo $jb->description; ?></p>
<label>Requerimientos</label>
<p><?php echo $jb->requirements; ?></p>
<label>Fecha limite</label>
<p><?php echo $jb->limit_at; ?></p>
<label>Categoria</label>
<p><?php echo CategoryData::getById($jb->category_id)->name; ?></p>
<label>Lugar</label>
<p><?php echo PlaceData::getById($jb->place_id)->name; ?></p>


</div>
</div>

<div class="panel panel-default">
<div class="panel-heading">Enviar informacion</div>
<div class="panel-body">

<form method="post" action="./?action=send" enctype="multipart/form-data">
<input type="hidden" name="job_id" value="<?php echo $jb->id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Nombre" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Apellidos</label>
    <input type="text" name="lastname" class="form-control" id="exampleInputEmail1" placeholder="Apellidos" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Telefono</label>
    <input type="text" name="phone" required class="form-control" id="exampleInputEmail1" placeholder="Telefono">
  </div>


  <div class="form-group">
    <label for="exampleInputEmail1">Correo electronico</label>
    <input type="email" name="email" required class="form-control" id="exampleInputEmail1" placeholder="Correo electronico">
  </div>

  <div class="form-group">
    <label for="exampleInputFile">Adjuntar CV en PDF</label>
    <input type="file" name="file" id="exampleInputFile" required>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="accept" required> Acepto los terminos y condiciones
    </label>
  </div>
  <button type="submit" class="btn btn-default">Enviar datos</button>
</form>

</div>
</div>

</div>
</div>
</div>
<br><br><br><br>