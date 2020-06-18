<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\User;
use DateTime;
use Illuminate\Support\Collection;
require('simple_html_dom.php');
class movieController extends Controller
{
function index(Request $request){
$controller = new movieController();
$Search = $request->get('search') ;
$e1 = $controller::jumia($Search);
$e2 = $controller::souq($Search);
$e3 = $controller::cairo($Search);
$elements = array_merge($e1,$e2);
$elements = array_merge($elements,$e3);
// $elements = $e1;
// $controller::souq($Search);
$c = collect($elements);
$elements = $c->sortBy('price');
$arr = ['elements'=>$elements];
return view('movies.products',$arr);

}

function jumia($str){
    $key = str_replace(' ',"%20",$str);
    $html = file_get_html('https://www.jumia.com.eg/catalog/?q='.$key);
    //  echo $html;
    $element = array();
     foreach ($html->find('a.core') as $video) {
        $image = $video->find('img')[0]->getAttribute('data-src');
        $name = str_replace('<h3 class="name">',"",$video->find('div.info h3')[0]);
        $name = str_replace('</h3>',"",$name);
        $price = str_replace('<div class="prc">EGP',"",$video->find('div.prc')[0]);
        $price = str_replace('</div>',"",$price);
        $price = str_replace(',',"",$price);
        $new = new Content();
        $new->set_image($image);
        $new->set_name($name);
        $new->set_price($price);
        $new->set_url("https://www.jumia.com.eg/".$video->href);
        // $new->set_url($videot2);
        $new->set_site('Jumia');
        if($new->url!="https://www.jumia.com.eg/")
        $element[] = $new;
     }
     return $element;
    }
function souq($str){
        $key = str_replace(' ',"-",$str);
        $html = file_get_html('https://egypt.souq.com/eg-en/'.$key.'/s/?as=1');
        $element=array();
        //  echo $html;
         foreach ($html->find('div.single-item') as $video) {
             $image = $video->find('img')[0]->getAttribute('data-src');
             if (strpos($image, "https") === FALSE) {
                continue;
             }
             $name = $video->getAttribute('data-name');
             $name = str_replace('</h1>',"",$name);
             $name = str_replace(' 				',"",$name);
             $name = str_replace(" 			","",$name);
 
        if($video->find('div.sk-clr1 h3')){
            $price = str_replace('<h3 class="itemPrice">',"",$video->find('div.sk-clr1 h3')[0]);
            $price = str_replace('</h3>',"",$price);
            $price = str_replace(' EGP',"",$price);
            $price = str_replace(',',"",$price);
        } else{
            if ($video->find('span.itemPrice')) {
                $price = str_replace('<span class="itemPrice">', "", $video->find('span.itemPrice')[0]);
                $price = str_replace('</span>', "", $price);
            }
            else if($video->find('h3.itemPrice'))
            {
                $price = str_replace('<h3 class="itemPrice">', "", $video->find('h3.itemPrice')[0]);
                $price = str_replace('</h3>', "", $price);
            }
            $price = str_replace(' EGP',"",$price);
            $price = str_replace(',',"",$price);
        }
        
        $url = $video->find('a.itemLink')[0]->href;
           $new = new Content();
           $new->set_image($image);
           $new->set_name($name);
           $new->set_price($price);
        // $new->set_url("https://www.jumia.com.eg/".$video->href);
           $new->set_url($url);
          $new->set_site('Souq');
          $element[] = $new;
            }
        return $element;
        }


        function cairo($str){
            $key = str_replace(' ',"+",$str);
            $html = file_get_html('https://cairosales.com/en/find?search_query='.$key.'&p=3&orderby=name&orderway=asc');
            $element=array();
            // //  echo $html;
             foreach ($html->find('div.product-container') as $video) {
                      $image = $video->find('img')[0]->getAttribute('src');
                      $name = $video->find('div.left-block a')[0]->getAttribute('title');
                      $price = $video->find('div.content_price span')[0];
                      $price = str_replace('<span itemprop="price" class="price product-price"> EGP ',"",$price);
                      $price = str_replace('</span>',"",$price);
                      $price = str_replace(',',"",$price);
                      $price = str_replace(' ',"",$price);
                      $url = $video->find('a')[0]->href;
                        $new = new content();
                        $new->set_image($image);
                        $new->set_name($name);
                        $new->set_price($price);
                        $new->set_url($url);
            //          $new->set_site('ArabSeed');
                   $element[] = $new;
              }
              return $element;

            }
    
}

