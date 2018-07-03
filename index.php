<?php
//phpinfo();

/*
    this is a learning on PHP objects.
*/

@require_once(dirname(__FILE__).'/shopProduct.php');

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

class beta {

    //数组转xml
    function _getXMLFromArray($data)
    {
        $lineFeed = "";
        $str = "";
        foreach($data as $key => $value){
            $key = strtoupper($key);
            if(!is_array($value)){
                $str.="<{$key}>$value</{$key}>{$lineFeed}";
            }else{
                if(isset($value[0])){
                    foreach($value as $v){
                        $str.= "<{$key}>".$this->_getXMLFromArray($v)."</{$key}>{$lineFeed}";
                    }
                }else {
                    $str .= "<{$key}>{$lineFeed}{$this->_getXMLFromArray($value)}</{$key}>{$lineFeed}";
                }
            }
        }
        return $str;
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


$test = array(
array('bn'=>'aa','store'=>'10','branch_id'=>'1'),
array('bn'=>'bb','store'=>'20','branch_id'=>'1'),
);

$json = json_encode($test);
echo "<br>";
echo $json;


$tt = unserialize('a:1:{s:10:"RESULTList";a:1:{i:0;a:3:{s:6:"Result";s:1:"F";s:11:"Description";s:28:"错误：客户tb01不存在";s:9:"ReceiptNo";N;}}}');
echo "<br>";
//echo "<pre>";
var_dump($tt);

$beta = new beta();
$sdf = array('a1'=>'AA','b2'=>'BB');
$xml = $beta->_getXMLFromArray($sdf);
print("{$xml}");
//echo "<pre>";
var_dump($xml);