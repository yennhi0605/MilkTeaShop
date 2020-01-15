<?php
  require_once "OMilkTea.php";

  class Smoothie extends OMilkTea {

  	function getType(){
  		return "Smoothie";
  	}

  	function getImagePath(){
    		return $this->image;
    }
    
    function getDisplayPrice(){
      return $this->price." VNĐ";
    }
  }
?>