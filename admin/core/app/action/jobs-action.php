<?php

if(isset($_GET["opt"]) && $_GET["opt"]=="add"){
	$user = new JobData();
	$user->name = $_POST["name"];
	$user->description = $_POST["description"];
	$user->requirements = $_POST["requirements"];
	$user->limit_at = $_POST["limit_at"];
	$user->category_id = $_POST["category_id"];
	$user->place_id = $_POST["place_id"];
	$user->add();
	Core::redir("./?view=jobs");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="update"){
	$user = JobData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->description = $_POST["description"];
	$user->requirements = $_POST["requirements"];
	$user->limit_at = $_POST["limit_at"];
	$user->category_id = $_POST["category_id"];
	$user->place_id = $_POST["place_id"];
	$user->status = isset($_POST["status"])?1:0;

	$user->update();
	Core::redir("./?view=jobs");
}
else if(isset($_GET["opt"]) && $_GET["opt"]=="del"){
	$category = JobData::getById($_GET["id"]);
	$category->del();
	Core::redir("./index.php?view=jobs");
}

?>