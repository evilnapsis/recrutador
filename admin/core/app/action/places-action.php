<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){

	$user = new PlaceData();
	$user->name = $_POST["name"];
	$user->add();
	Core::redir("./?view=places");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
	$user = PlaceData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->update();
	Core::redir("./?view=place");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$category = PlaceData::getById($_GET["id"]);
	$category->del();
	Core::redir("./index.php?view=places");
}

?>