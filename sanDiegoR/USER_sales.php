<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Sales</title>
    <!-- Bootstrap core CSS -->
    <link href="docs/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="docs/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="docs/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
  </head>
  <body role="document">
      <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">San Diego Homes</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="USER_neighborhoods.php">Neighborhoods</a></li>
            <li><a href="USER_homes.php">Homes</a></li>
            <li class="active"><a href="USER_sales.php">Sales</a></li>
            <li><a href="USER_homebuyer.php">Homebuyer</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <div class="container theme-showcase" role="main">
      <!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>San Diego Neighborhood Analysis</h1>
        <p>Add neighborhoods, homes, sales data and homebuyers to this database to understand market trends by neighborhood in the greater San Diego area</p>
      </div>
      <div class="row">
        <div class="col-sm-8 blog-main">
          <div class="blog-post">
            <h2 class="blog-post-title">Sales</h2>
              <div class="table-responsive">
              <h3>  </h3>
                <table class="table table-striped">
                  <thead>
                      <th>ID</th>
                      <th>List Price</th>
                      <th>Sold Price</th>
                      <th>Active</th>
                  </thead>
                  <tbody>
                    <?php
                    $servername   = "oniddb.cws.oregonstate.edu";
                    $username     = "hesseljo-db";
                    $password     = "UdHj518wuN4ZKkIY";
                    $dbname       = "hesseljo-db";

        
                    $conn = new mysqli($servername, $username, $password, $dbname);
  
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } 

                    $sql = "SELECT * FROM sales";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo 
                            "<tr><td>".$row["id"]
                            ."</td><td>".$row["list_price"]
                            ."</td><td>".$row["sold_price"]
                            ."</td><td>".$row["active"];
                        }
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                    ?>
                  </tbody>
              </table>
            </div> 

            <div>
              <h4>Add A Recent Sold Home(must be sold within last 24 hours)</h4>
               <form action="SERVER_sales.php" method="post">
                <div class="form-group form-group-sm">
                  
                  <label for="list_price">List Price</label><br>
                  <input class="form-control" type="text" id="list_price" name="list_price" placeholder="List_price"><br>
                  
                  <label for="sold_price">Sold Price</label><br>
                  <input class="form-control" type="text" id="sold_price" name="sold_price" placeholder="Sold_price"><br>

                  <label for="active">Is Active</label><br>
                  <input class="form-control" type="text" id="active" name="active" placeholder="Active"><br>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
    </div> <!-- /container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
