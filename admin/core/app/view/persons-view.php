<section class="content">
<div class="row">
	<div class="col-md-12">
		<h1>Solicitudes de Trabajo</h1>

<br>
		<?php

		$users = PersonData::getAll();
		if(count($users)>0){
			// si hay usuarios
			?>
<div class="box box-primary">
<div class="box-body">
			<table class="table table-bordered table-hover datatable">
			<thead>
			<th>Nombre completo</th>
      <th>Email</th>
      <th>Vacante</th>
      <th>Categoria</th>
      <th>Lugar</th>
      <th>Status</th>
     <th>Creacion</th>
 			<th></th>
			</thead>
			<?php
			foreach($users as $user){
        $job = JobData::getById($user->job_id);
				?>
				<tr>
				<td><?php echo $user->name." ".$user->lastname; ?></td>
        <td><?php echo $user->email; ?></td>
        <td><?php echo $job->name; ?></td>
        <td><?php echo CategoryData::getById($job->category_id)->name; ?></td>
       <td><?php echo PlaceData::getById($job->place_id)->name; ?></td>
       <td><?php
       switch ($user->status) {
         case 1: echo "Pendiente"; break;
         case 2: echo "Aceptado"; break;
         case 0: echo "Rechazado"; break;
         
         default:break;
       }
       ?></td>
        <td><?php echo $user->created_at; ?></td>
				<td style="width:180px;">
<a href="./uploads/<?php echo $user->file;?>" target="_blank" class="btn btn-danger btn-xs">Ver CV</a>
        <?php if($user->status==1):?>
<a href="index.php?action=persons&opt=accept&id=<?php echo $user->id;?>" class="btn btn-info btn-xs">Aceptar</a>
<a href="index.php?action=persons&opt=denied&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Rechazar</a>
        <?php endif; ?>

<a href="index.php?action=persons&opt=del&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a></td>
				</tr>
				<?php

			}

				?>
				</table>
				</div>
				</div>
				<?php


		}else{
			echo "<p class='alert alert-danger'>No hay Solicitudes de Trabajo</p>";
		}


		?>


	</div>
</div>

</section>