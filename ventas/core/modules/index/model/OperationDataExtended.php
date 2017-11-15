<?php
class OperationDataExtended {
	public static $tablename = "selldata";

	public function OperationDataExtended(){
        $this->barcode = "";
		$this->padecimiento = "";
		$this->product_id = "";
		$this->q = "";
		$this->cut_id = "";
		$this->operation_type_id = "";
        $this->created_at = "NOW()";
        
    }
    

    public static function getAllLinesByDateBCOp($clientid,$start,$end,$op){
        $sql = "select p.barcode , p.name padecimiento, o.q id, s.id2 FROM product p
        INNER JOIN operation o ON p.id = o.product_id
        INNER JOIN sell s ON s.id = o.sell_id
        INNER JOIN person pe ON s.person_id = pe.id where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and person_id=$clientid  and operation_type_id=$op order by created_at desc";
           $query = Executor::doit($sql);
           return Model::many($query[0],new OperationDataExtended());
       
         }
    
         public static function getAllLinesByDateOp($start,$end,$op){
          $sql = "SELECT p.barcode, p.name padecimiento, o.q id, s.id2, s.created_at, o.operation_type_id
          FROM product p
          INNER JOIN operation o ON p.id = o.product_id
          INNER JOIN sell s ON s.id = o.sell_id
          INNER JOIN person pe ON s.person_id = pe.id where date(created_at) >= \"$start\" and date(created_at) <= \"$end\" and operation_type_id=$op order by created_at desc";
             $query = Executor::doit($sql);
             return Model::many($query[0],new OperationDataExtended());
         
           }


////////////////////////////////////////////////////////////////////////////


}

?>