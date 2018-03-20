<?php
//phpinfo();

/*
    this is a learning on PHP objects.
*/

class shopProduct{

	public $title;
	public $producerMainName;
	public $producerFirstName;
	protected $price;

	function __construct($title, $producerMainName, $producerFirstName, $price){
		$this->title = $title;
		$this->producerMainName = $producerMainName;
		$this->producerFirstName = $producerFirstName;
		$this->price = $price;

		$this->checkPrice();
		//var_dump($this);
	}

	public function getProducer(){
		$producer = $this->producerFirstName ." ". $this->producerMainName;
		return $producer;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getSummaryLine(){
		//$this->checkPrice();

		$base = "Title: ". $this->getTitle();
		$base .= " author: ". $this->getProducer();
		$base .= " Summary: ";
		return $base;
	}

	public function checkPrice(){
		try {
			if(!is_numeric($this->price)) throw new Exception("price must defined money");
		} catch (Exception $e){
			echo "message:".$this->title." occurs error for ".$e->getMessage()."<br>";
		}

	}
}

