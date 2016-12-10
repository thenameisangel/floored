<?php
// Temp product URLs for testing purposes
// Uncomment blocks to test each site as needed

// Amazon
// $url = 'https://www.amazon.com/Clara-Clark-Premier-1800-Sheet/dp/B00902XC72/ref=lp_1063274_1_1?s=bedbath&ie=UTF8&qid=1480190082&sr=1-1';
$url = '';
$priceQuery = '//span[@id="priceblock_ourprice"]/text()';
$productQuery = '//span[@id="productTitle"]/text()';

//scrape data for specific site
$productInfo = scrape($url, $priceQuery, $productQuery);

###############################################################

function scrape($url, $priceQuery, $productQuery) {

  //get HTML from URL
  $html = file_get_contents($url);

  $doc = new DOMDocument();

  //disable libxml errors
  libxml_use_internal_errors(TRUE);

  if(!empty($html)){

    $doc->loadHTML($html);
    //remove errors for html
    libxml_clear_errors();

    $xpath = new DOMXPath($doc);

    //get product name and price
    $productName = $xpath->query($productQuery);
    $productPrice = $xpath->query($priceQuery);

    //create array to store product values
    $product = array();

    //print product name
    if($productName->length > 0){
      foreach($productName as $row){
        echo $row->nodeValue . "<br/>";
        array_push($product, $row->nodeValue);
      }
    }

    //print product price
    if($productPrice->length > 0){
      foreach($productPrice as $row){
        echo $row->nodeValue . "<br/>";
        array_push($product, $row->nodeValue);
      }
    }
    return $product;
  }
}

?>
