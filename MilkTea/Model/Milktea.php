<?php
  require_once "OMilkTea.php";

  class Milktea extends OMilkTea {

  	function getType(){
  		return "Milk Tea";
  	}

  	function getImagePath(){
    		return $this->image;
    }
    
    function getDisplayPrice(){
          return $this->price." VNĐ";
    }
  }
?>