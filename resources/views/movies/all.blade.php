<!DOCTYPE html>
<html lang="en" style="position:absolute; overflow-x:hidden;">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Shop Homepage</title>
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/shop-homepage.css" rel="stylesheet">
  <script type="text/javascript" src="js/profile/setting.js"></script>
</head>

<body>
  <!-- Page Content -->
  <div class="container" style="position: relative; top: -5vh; max-width:100%; padding-left:0;">
<div style="position: absolute;
background-color: #005791;
width: 100%;
height: 289px;
position: absolute;
"></div>
    <div class="row" style="position: relative; padding-bottom: 250px;">
      <div class="">
        <div class="row" style="position: relative; 
        padding-right: 25px; padding-left: 25px; padding-bottom: 250px;">
            @foreach ($elements as $element)
          <div class="col-lg-4 col-md-4 mb-4"style ="width: 50%;">
            <div class="card h-100">
            <a ><img class="card-img-top" heigh='100' src="{{$element->image}}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a >{{$element->name}}</a>
                </h4>
                <h5>${{$element->price}}</h5>
                <p class="card-text">{{$element->site}}</p>
              </div>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
