<?php
  require_once "OMilkTea.php";

  class Coffee extends OMilkTea {

  	function getType(){
  		return "Coffee";
  	}

  	function getImagePath(){
    		return $this->image;
    }
    
    function getDisplayPrice(){
          return $this->price." VNĐ";
    }
  }
?>