<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){

	$user = new DepartmentData();
	$user->name = $_POST["name"];
	$user->code = $_POST["code"];

	$user->ruc = $_POST["ruc"];
	$user->phone = $_POST["phone"];
	$user->email = $_POST["email"];
	$user->add();
	Core::redir("./?view=departments");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
	$user = DepartmentData::getById($_POST["user_id"]);
	$user->code = $_POST["code"];
	$user->name = $_POST["name"];
	$user->ruc = $_POST["ruc"];
	$user->phone = $_POST["phone"];
	$user->email = $_POST["email"];
	$user->update();
	Core::redir("./?view=departments");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$category = DepartmentData::getById($_GET["id"]);
	$category->del();
	Core::redir("./index.php?view=departments");
}

?>