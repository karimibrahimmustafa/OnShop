<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    var $name;
    var $url;
    var $site;
    var $image;
    var $price;
    function set_name($new_name) { 
        $this->name = $new_name;  
    }
    function set_price($new_name) { 
        $this->price = $new_name;  
    }
    function set_url($new_name) { 
        $this->url = $new_name;  
    }
    function set_image($new_name) { 
        $this->image = $new_name;  
    }
    function set_site($new_name) { 
        $this->site = $new_name;  
    }
}
