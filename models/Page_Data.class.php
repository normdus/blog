<?php
// Created pg 31  tested ok...
class Page_Data {
	public $title = "";
	public $content = "";
	public $css = "";
	public $embeddedStyle = "";
	// declare a new property for script elements
	public $scriptElements = "";

	// declare a new method for adding Javascript files
	public function addScript( $src ){
		$this->scriptElements .= "<script src='$src'></script>";
	}

	// declare a new method
	public function addCSS( $href ){
		$this->css .= "<link href='$href' rel='stylesheet' />";
	}
}