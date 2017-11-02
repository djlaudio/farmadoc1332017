<?php
class Promo_provider_Data {
	public static $tablename = "promo_provider";

	public function ProductData(){
		$this->count = "0";
	
		$this->created_at = "NOW()";
	}

	public function getCategory(){ return CategoryData::getById($this->category_id);}

	public function add(){
		$sql = "insert into ".self::$tablename." (idClient,idProduct,count, created_at) ";
		$sql .= "value ($this->idClient,$this->idProduct,$this->count, NOW())";
		return Executor::doit($sql);
	}

        public static function updateProviderDataBy1($idProduct, $countPromosProd)
     {

$sql = "update ".self::$tablename." set countPromos=countPromos+1 where idProduct=$idProduct ";
Executor::doit($sql);
echo ($sql);

}

  public static function updateProviderDataTo0($idProduct, $countPromosProd)
     {

$sql = "update ".self::$tablename." set countPromos=0 where idProduct=$idProduct ";
Executor::doit($sql);
echo ($sql);

}
	


	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Promo_provider_Data());

	}

public static function getCountById($id){
		$sql = "select countPromos from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new Promo_provider_Data());

	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new Promo_provider_Data());
	}


	public static function getAllByPage($start_from,$limit){
		$sql = "select * from ".self::$tablename." where id>=$start_from limit $limit";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Promo_provider_Data());
	}


	public static function getLike($p){
		$sql = "select * from ".self::$tablename." where barcode like '%$p%' or name like '%$p%' or id like '%$p%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Promo_provider_Data());
	}



	public static function getAllByUserId($user_id){
		$sql = "select * from ".self::$tablename." where user_id=$user_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Promo_provider_Data());
	}

	public static function getAllByProviderId($provider_id){
		$sql = "select * from ".self::$tablename." where idProvider=$provider_id order by created_at desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new Promo_provider_Data());
	}









}

// How to recognize product if customer already have 3 buyed???

// for each factura with promo count++ customer

//how???


//if line contains promo count++;

//if promo ==3 then alert. Promo=0.

//table client/promo. 
 

// so this is included in invoices.




?>