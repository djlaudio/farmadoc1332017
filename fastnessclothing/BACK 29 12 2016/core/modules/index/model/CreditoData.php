<?php
class CreditoData {
	public static $tablename = "credito";

	public function CreditoData(){
		$this->idCredito = "";

		$this->descripcion= ""; // se utiliza para cargar el combo con una descripcion del credito
	}

	public static function getAll(){

		$sql = "SELECT idCredito, CONCAT( credito.idCredito,' Factura: ', credito.numFactura, ' ', persona.nombre, cantidadCredito,  ' col.', credito.observacion) AS descripcion
		FROM credito 
		INNER JOIN cliente ON credito.idClienteCredito = cliente.idPersona
		INNER JOIN persona ON cliente.idPersona = persona.idPersona
		WHERE  credito.cantidadCredito >credito.montoPagado AND credito.termino_id='137' and credito.anulada='0' and credito.anulada2='0'
		order by persona.nombre";
		
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new CreditoData();
			$array[$cnt]->idCredito = $r['idCredito'];
			$array[$cnt]->descripcion = $r['descripcion'];
			$cnt++;
		}
		return $array;
	}

	public static function getLastId(){
		$sql = "select MAX(idCredito) idCredito FROM credito";
		$max="";

		$query = Executor::doit($sql);
		while($r = $query[0]->fetch_array()){
			$max = $r['idCredito'];
		}


		return $max;
	}
}

?>