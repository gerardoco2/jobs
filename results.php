<?php 
    

  if (isset($_POST['empleo']) && isset($_POST['pais']) ) {

      function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


    $busqueda = $_POST['empleo'];
    $pais = $_POST['pais'];
    $ip = get_client_ip();
  

    $jobs_url = 'http://api.indeed.com/ads/apisearch?publisher=2726282284894331&l=&sort=date&radius=&q='.$busqueda.'&st=&jt=&start=&limit=1000&fromage=&filter=&latlong=1&co='.$pais.'&chnl=&userip=1.2.3.4&useragent=Mozilla/%2F4.0(Firefox)&v=2&format=json';

     $jobs_json = file_get_contents($jobs_url);
     $jobs_arr  = json_decode($jobs_json, true);


    }
$jobs_arr = 0;

?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Justified Nav Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <style>
     
    </style>
    <!-- Custom styles for this template -->
    <link href="justified-nav.css" rel="stylesheet">
  </head>

  <body>

    <div class="container">

      <header class="masthead">

        <nav class="navbar navbar-expand-md navbar-light bg-light rounded mb-3">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav text-md-center nav-justified w-100">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Empleos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Recomendaciones</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Transporte</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Hospedaje</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nosotros</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <main role="main">

        <!-- Jumbotron -->
        <?php if ( $jobs_arr['results'] ) {  ?>
            <div class="jumbotron">
              <h1>Resultados!</h1>
              <p class="lead">Los resultados de tu busqueda se encuentran aqui abajo.</p>
            </div>
            <div class="row">
            <?php $cont = 0; foreach ($jobs_arr['results'] as $job) { ?>
              <div class="col-md-4">
                <div class="card text-center" style="margin-bottom: 10px;">
                  <div class="card-header">
                    <?php echo $job['company'];?>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $job['jobtitle'];?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?php echo $job['city']; ?></h6>
                    <p class="card-text"><?php echo $job['snippet']; ?></p>
                    <a href="<?php echo $job['url']; ?>" class="btn btn-primary">Ver Esta Oferta!</a>
                  </div>
                  <div class="card-footer text-muted">
                    <?php echo $job['formattedRelativeTime'];?>
                  </div>
                </div>
              </div>
            <?php } ?>
            </div>



        <?php } else { ?>
        <div class="jumbotron">
          <h1>No hay Resultados para esta Busqueda!</h1>
          <p class="lead">Por favor intenta de nuevo.</p>
        </div>
        <?php } ?>
      </main>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; Company 2017</p>
      </footer>

    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>
