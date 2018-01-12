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

class bookProduct extends shopProduct{
	public $numPages;

	function __construct($title, $producerMainName, $producerFirstName, $price, $numPages){
		parent::__construct($title, $producerMainName, $producerFirstName, $price);
		$this->numPages = $numPages;
	}

	public function getDiscountPrice(){
		$tmp_price = $this->price;
		if($tmp_price > 100){
			$discount_price = $tmp_price*0.8;
		} else {
			$discount_price = $tmp_price;
		}
		return $discount_price;
	}

	public function getSummaryLine(){
		$base = parent::getSummaryLine();
		$base .= $this->numPages;
		return $base;
	}
}

class cdProduct extends shopProduct{
	public $playLength;

	function __construct($title, $producerMainName, $producerFirstName, $price, $playLength){
		parent::__construct($title, $producerMainName, $producerFirstName, $price);
		$this->playLength = $playLength;
	}

    public function getSummaryLine(){
    	$base = parent::getSummaryLine();
    	$base .= $this->playLength;
    	$base .= " price:". $this->price;
        return $base;
    }
}


$producer1 = new shopProduct('My Antonia','Willa','Cather',5.99);
$book1 = new bookProduct('Xenoblade','cw','Alex',100,'66p');
$book2 = new bookProduct('Xenoblade2','beta','Alex',200,'88p');
$cd1 = new cdProduct('Xenoblade2-OST','Nintendo','Japan',368,'2h40m');
$cd2 = new cdProduct('Xenoblade2-OST','Nintendo','Japan','ffff','2h40m');
print("author: {$producer1->getProducer()}");
echo "<br>";
print("author: {$book1->getTitle()} price: {$book1->getDiscountPrice()}");
echo "<br>";
print("author: {$book2->getTitle()} price: {$book2->getDiscountPrice()}");
echo "<br>";
print("{$book2->getSummaryLine()}");
echo "<br>";
print("{$cd1->getSummaryLine()}");
echo "<br>";
print("{$cd2->getSummaryLine()}");
