<?php
class JobData {
	public static $tablename = "job";


	public function JobData(){
		$this->name = "";
		$this->lastname = "";
		$this->email = "";
		$this->password = "";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,description,requirements,category_id,place_id,limit_at,created_at) ";
		$sql .= "value (\"$this->name\",\"$this->description\",\"$this->requirements\",$this->category_id,$this->place_id,\"$this->limit_at\",NOW())";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto JobData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",description=\"$this->description\",requirements=\"$this->requirements\",limit_at=\"$this->limit_at\",category_id=\"$this->category_id\",place_id=\"$this->place_id\",status=$this->status where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new JobData());
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new JobData());

	}
	
		public static function getAllActive(){
		$sql = "select * from ".self::$tablename." where status=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new JobData());

	}
	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new JobData());
	}


}

?>