<?php
$jobs  = JobData::getAllActive();
?>

<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Vacantes de Trabajo</h1>

<div class="panel panel-default">
<div class="panel-heading">Vacantes de Trabajo</div>
<div class="panel-body">

<?php if(count($jobs)>0):?>

<table>
<?php foreach($jobs as $jb):?>
	<tr>
		<td>
			<h4><?php echo $jb->name; ?></h4>
			<p><?php echo CategoryData::getById($jb->category_id)->name; ?> - <?php echo PlaceData::getById($jb->place_id)->name; ?></p>
			<a href="./?view=job&id=<?php echo $jb->id; ?>" class="btn btn-primary">Ver</a>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<?php else:?>
	<p class="alert alert-warning">No hay vacantes de trabajo por el momento!</p>
<?php endif; ?>

</div>
</div>

</div>
</div>
</div>
<br><br><br><br>