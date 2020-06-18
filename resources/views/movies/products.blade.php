<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Twitter Bootstrap shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="../css/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Favicons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
    <a class="logo" href="../"><span></span> 
		<img src="../logo2.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
    <!-- The form -->
    <form class="example" action="../index2" method="get">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</header>
<!-- 
Body Section 
-->
	<div class="row">
	<div class="span">
<!-- 
New Products
-->
	<div class="well well-small">
    <div style ="width: 300px;">
    <h3>Products </h3>
    <h4>Products price >1000 EGP </h4>
    <label class="switch">
        <input type="checkbox" onchange="change(this)">
        <span class="slider round"></span>
    </label>
	</div>	
    <div class="row-fluid">
		  <ul class="thumbnails" id="elements" data-src="0">
              @foreach ($elements as $element)
              <li class="span4 element" data-src={{$element->price}} style="margin-left: 0px;">
                <div class="thumbnail">
                  <a href="product_details.html" class="overlay"></a>
                  @if($element->site == "Jumia")
                  <a class="zoomTool2" href="{{$element->url}}" title="add to cart"><span class="icon-search"></span> GO TO SITE</a>
                  @endif
                  <a href="{{$element->url}}"><img src="{{$element->image}}" style="height: 200px;"></a>
                  <div class="caption cntr">
                      <p>{{$element->name}}</p>
                      <p><strong> {{$element->price}} EGP</strong></p>
                      @if($element->site == "Jumia")
                      <h4><a class="shopBtn" href="https://www.jumia.com.eg/" title="add to cart"> Jumia.com </a></h4>
                      @elseif($element->site == "Souq")
                      <h4><a class="shopBtn2" href="https://egypt.souq.com/" title="add to cart"> Souq.com </a></h4>
                      @else 
                      <h4><a class="shopBtn3" href="https://egypt.souq.com/" title="add to cart"> Cairosales.com </a></h4>
                      @endif
                      {{-- <div class="actionList">
                          <a class="pull-left" href="#">Add to Wish List </a> 
                          <a class="pull-left" href="#"> Add to Compare </a>
                      </div>  --}}
                      <br class="clr">
                  </div>
                </div>
              </li> 
              @endforeach
		  </ul>
		</div>
	
	</div>
	</div>
	</div>
<!-- 
Clients 
-->

<!--
Footer
-->
<footer class="footer">
<div class="row-fluid">
<div class="span2">
<h5>Your Account</h5>
<a href="#">YOUR ACCOUNT</a><br>
<a href="#">PERSONAL INFORMATION</a><br>
<a href="#">ADDRESSES</a><br>
<a href="#">DISCOUNT</a><br>
<a href="#">ORDER HISTORY</a><br>
 </div>
<div class="span2">
<h5>Iinformation</h5>
<a href="contact.html">CONTACT</a><br>
<a href="#">SITEMAP</a><br>
<a href="#">LEGAL NOTICE</a><br>
<a href="#">TERMS AND CONDITIONS</a><br>
<a href="#">ABOUT US</a><br>
 </div>
<div class="span2">
<h5>Our Offer</h5>
<a href="#">NEW PRODUCTS</a> <br>
<a href="#">TOP SELLERS</a><br>
<a href="#">SPECIALS</a><br>
<a href="#">MANUFACTURERS</a><br>
<a href="#">SUPPLIERS</a> <br/>
 </div>
 <div class="span6">
<h5>The standard chunk of Lorem</h5>
The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for
 those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et 
 Malorum" by Cicero are also reproduced in their exact original form, 
accompanied by English versions from the 1914 translation by H. Rackham.
 </div>
 </div>
</footer>
</div><!-- /container -->

<div class="copyright">
<div class="container">
	<p class="pull-right">
		<a href="#"><img src="assets/img/maestro.png" alt="payment"></a>
		<a href="#"><img src="assets/img/mc.png" alt="payment"></a>
		<a href="#"><img src="assets/img/pp.png" alt="payment"></a>
		<a href="#"><img src="assets/img/visa.png" alt="payment"></a>
		<a href="#"><img src="assets/img/disc.png" alt="payment"></a>
	</p>
	<span>Copyright &copy; 2013<br> bootstrap ecommerce shopping template</span>
</div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
    <script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
    <script src="assets/js/shop.js"></script>
  </body>
  <script>
   function change(item){
    modified = document.getElementById("elements").getAttribute("data-src");  
    if (item.checked == true && modified==0){
        elements = document.getElementsByClassName('element');
        for (i = 0; i < elements.length; i++) {
               if(elements[i].getAttribute("data-src") <1000){
                elements[i].style.display = "none";
                elements[i].classList.add("modified");
            }
        }
        document.getElementById("elements").setAttribute("data-src",1);   
        }
    else if(item.checked == false){
        elements = document.getElementsByClassName('modified');
        for (i = 0; i < elements.length; i++) {
               if(elements[i].getAttribute("data-src") <1000){
                elements[i].style.display = "block";
               }
        }
   }
   else {
        elements = document.getElementsByClassName('modified');
        for (i = 0; i < elements.length; i++) {
               if(elements[i].getAttribute("data-src") <1000){
                elements[i].style.display = "none";
               }
        }
   }
}

  </script>
</html>