<?php
class AffiliationData {
	public static $tablename = "affiliation";

	public function getPerson(){ return PersonData::getById($this->idClient);}
	public function getAffiliate(){ return AffiliateData::getById($this->idAffiliated);}

	public function AffiliationData(){
		$this->name = "";
		
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into affiliation (name,created_at, idClient, idAffiliated, numAffiliation) ";
		$sql .= "value (\"$this->name\",$this->created_at,$this->idClient, $this->idAffiliated,$this->numAffiliation)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto AffiliationData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}


	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new AffiliationData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->name = $r['name'];
			$data->created_at = $r['created_at'];
			$found = $data;
			break;
		}
		return $found;
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new AffiliationData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where name like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new AffiliationData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->name = $r['name'];
			$array[$cnt]->created_at = $r['created_at'];
			$cnt++;
		}
		return $array;
	}

	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AffiliationData());
	}


	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AffiliationData());
	}

	public static function getAllByCategoryId($category_id){
		$sql = "select * from ".self::$tablename." where category_id=$category_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new AffiliationData());
	}


}

?>