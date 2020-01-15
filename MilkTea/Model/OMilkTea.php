<?php
	require_once "IMilkTea.php";

	abstract class OMilkTea implements IMilkTea{
		public $id;
		public $name;
		protected $price;
		protected $image;
		public function __construct($id, $name, $price, $image) {
			$this->id = $id;
	    	$this->name = $name;
	    	$this->price = $price;
	    	$this->image = $image;
	  	}
	}
?>