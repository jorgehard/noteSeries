<?php 
	session_start();
	include("config.php");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>NoteSeries - Acompanhe suas series preferidas</title>
	<meta name="description" content="Site voltado para pessoas que se perdem tentando marcar os variados seriados que assistem, util para anotar e acompanhar o andamento de seus seriados preferidos">
	<meta name="keywords" content="series,anotações,anotacoes,marcar,acompanhar,seriados,noticias sobre series,dicas de series, filmes, ação, aventura, netflix">
	<meta name="author" content="jorgehenrique@live.com">
	
	<meta http-equiv="content-type" content="text/html;charset=UTF-8">
	
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link href='https://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/all-index.css?v=0.3.777" type="text/css"/>
		
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	
    <script>
    $(window).load(function() {
        $('#loading').fadeOut(200);
    });
	
    </script>
	<style>
	
		/* Mobile */
		@media (max-width: 767px) {
			.slider-size {
				height: 250px;
			}
			.slider-size > img {
				 width: 80%;
			}
			.carousel-caption p{
				font-size:12px;
			}
			.carousel-caption h1{
				font-size:25px;
			}
		}
		/* Tablets */
		@media (max-width: 991px) and (min-width: 768px) {
			.slider-size {
				height: 250px;
			}
			.slider-size > img {
				width: 80%;
			}
		}

		/* laptops */
		@media (max-width: 1023px) and (min-width: 992px) {
			.slider-size {
				 height: 350px;
			}
			.slider-size > img {
				width: 80%;
			}
		}

		/* desktops */
		@media (min-width: 1024px) {
			.slider-size {
				height: 350px;
			}
			.slider-size > img {
				width: 60%;
			}
		}
	</style>
	</head>

  <body style="background-color:#222">
	<div class="container-fluid top-nick-bar">
		<span class="title-top"><span class="glyphicon glyphicon-film" aria-hidden="true"></span> NoteSeries</span>
	</div>
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <div class="slider-size" style="background:url(http://www.flickeringmyth.com/wp-content/uploads/2015/09/daredevil-banner0.png) center center; background-size:cover;"></div>
          <div class="container">
            <div class="carousel-caption">
              <h1>Example Headline</h1>
              <p>Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="slider-size" style="background:url(http://www.flickeringmyth.com/wp-content/uploads/2015/09/daredevil-banner0.png) center center; background-size:cover;"></div>
          <div class="container">
            <div class="carousel-caption">
              <h1>Example Headline</h1>
              <p>Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="item">
          <div class="slider-size" style="background:url(http://www.flickeringmyth.com/wp-content/uploads/2015/09/daredevil-banner0.png) center center; background-size:cover;"></div>
          <div class="container">
            <div class="carousel-caption">
              <h1>Example Headline</h1>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Proximo</span>
      </a>
    </div><!-- /.carousel -->
	<div class="container-fluid">
		<div class="col-md-4 col-xs-12 index-box-serie" style="background:url('img/teste.png') center center; background-size:cover;">
			<div class="col-xs-6 star-icon">
				<a href="#">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-6 fav-icon">
				<a href="#" class="pull-right">
					<i class="fa fa-comments" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-12 title-box">
				<h3>Titulo Serie</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra ex ex, gravida placerat libero sodales eget. Donec luctus ante metus, ut eleifend ipsum luctus vel. Vestibulum congue neque dui, nec pulvinar nulla rhoncus eget. Nunc molestie sapien et dolor suscipit viverra. Etiam in mauris non dolor ultrices congue at porta ante</p>
			</div>
		</div>	
		<div class="col-md-4 col-xs-12 index-box-serie" style="background:url('img/teste.png') center center; background-size:cover;">
			<div class="col-xs-6 star-icon">
				<a href="#">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-6 fav-icon">
				<a href="#" class="pull-right">
					<i class="fa fa-comments" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-12 title-box">
				<h3>Titulo Serie</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra ex ex, gravida placerat libero sodales eget. Donec luctus ante metus, ut eleifend ipsum luctus vel. Vestibulum congue neque dui, nec pulvinar nulla rhoncus eget. Nunc molestie sapien et dolor suscipit viverra. Etiam in mauris non dolor ultrices congue at porta ante</p>
			</div>
		</div>		
		<div class="col-md-4 col-xs-12 index-box-serie" style="background:url('img/teste.png') center center; background-size:cover;">
			<div class="col-xs-6 star-icon">
				<a href="#">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-6 fav-icon">
				<a href="#" class="pull-right">
					<i class="fa fa-comments" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-12 title-box">
				<h3>Titulo Serie</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra ex ex, gravida placerat libero sodales eget. Donec luctus ante metus, ut eleifend ipsum luctus vel. Vestibulum congue neque dui, nec pulvinar nulla rhoncus eget. Nunc molestie sapien et dolor suscipit viverra. Etiam in mauris non dolor ultrices congue at porta ante</p>
			</div>
		</div>	
	</div>
	
	<div class="container-fluid">
		<div class="col-md-4 col-xs-12 index-box-serie" style="background:url('img/teste.png') center center; background-size:cover;">
			<div class="col-xs-6 star-icon">
				<a href="#">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-6 fav-icon">
				<a href="#" class="pull-right">
					<i class="fa fa-comments" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-12 title-box">
				<h3>Titulo Serie</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra ex ex, gravida placerat libero sodales eget. Donec luctus ante metus, ut eleifend ipsum luctus vel. Vestibulum congue neque dui, nec pulvinar nulla rhoncus eget. Nunc molestie sapien et dolor suscipit viverra. Etiam in mauris non dolor ultrices congue at porta ante</p>
			</div>
		</div>	
		<div class="col-md-4 col-xs-12 index-box-serie" style="background:url('img/teste.png') center center; background-size:cover;">
			<div class="col-xs-6 star-icon">
				<a href="#">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-6 fav-icon">
				<a href="#" class="pull-right">
					<i class="fa fa-comments" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-12 title-box">
				<h3>Titulo Serie</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra ex ex, gravida placerat libero sodales eget. Donec luctus ante metus, ut eleifend ipsum luctus vel. Vestibulum congue neque dui, nec pulvinar nulla rhoncus eget. Nunc molestie sapien et dolor suscipit viverra. Etiam in mauris non dolor ultrices congue at porta ante</p>
			</div>
		</div>		
		<div class="col-md-4 col-xs-12 index-box-serie" style="background:url('img/teste.png') center center; background-size:cover;">
			<div class="col-xs-6 star-icon">
				<a href="#">
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star" aria-hidden="true"></i>
					<i class="fa fa-star-half-o" aria-hidden="true"></i>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-6 fav-icon">
				<a href="#" class="pull-right">
					<i class="fa fa-comments" aria-hidden="true"></i>
				</a>
			</div>
			<div class="col-xs-12 title-box">
				<h3>Titulo Serie</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus viverra ex ex, gravida placerat libero sodales eget. Donec luctus ante metus, ut eleifend ipsum luctus vel. Vestibulum congue neque dui, nec pulvinar nulla rhoncus eget. Nunc molestie sapien et dolor suscipit viverra. Etiam in mauris non dolor ultrices congue at porta ante</p>
			</div>
		</div>	
	</div>
	
	
	
	
	
	
	
	
	
	
	<div id="loading" style="position: absolute; height: 100%; width: 100%; top:0; left: 0; background: #FFF; z-index:9999; 
    font-size: 30px; text-align: center; padding-top: 10px; color: #666;">
		<img src="img/loading.gif" alt="" width="120"/>
		<h4 style="font-family: 'Indie Flower', cursive; position:relative; bottom:20px;">Aguarde a pagina carregar...</h4>
	</div>
	<!-- ************** LINK FUNCTION **************** onClick="myhref('LINK');" function myhref(web){ window.location.href = web; } -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>