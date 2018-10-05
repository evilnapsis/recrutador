<?php

if(isset($_POST["accept"])){

	$up = new Upload($_FILES["file"]);
	if($up->uploaded){
		$up->Process("./admin/uploads/");
		if($up->processed){
			$person  = new PersonData();
			$person->name = $_POST["name"];
			$person->lastname = $_POST["lastname"];
			$person->phone = $_POST["phone"];
			$person->email = $_POST["email"];
			$person->file = $up->file_dst_name;;//$_POST["file"];
			$person->job_id = $_POST["job_id"];
			$person->add();
			Core::alert("Informacion enviada exitosamente!");
				
		}else{
			Core::alert("Hubo un error al procesar tu cv!");
		}

	}else{
		Core::alert("No se pudo subir tu cv!");
	}
}
Core::redir("./?view=job&id=$_POST[job_id]");
?>