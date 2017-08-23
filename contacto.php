<?php session_start() ?>
<?php
$nombre=$_SESSION['nombre']??'';
$email=$_SESSION['email']??'';
$comment=$_SESSION['comment']??'';
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Orly Rosenkranz - Contact</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="favicon" href="favicon/icon.png" />
  </head>
  <body>
      <!-- <img src="opcion1/images/logo.png" alt="logotipo" class="logo"> -->
      	<h1 style="color:grey">ORLY ROSENKRANZ</h1>
      <nav class="main-nav">
          <ul>
              <li><a href="index.php">HOME</a></li>
              <li><a href="about.html">ABOUT</a></li>
              <!-- <li><a href="inicio.html">GALERIA</a></li> -->
              <li><a style='background-color: #FF530D'; href="contacto.php">CONTACTO</a></li>
          </ul>
      </nav>

      <div id="contact" class="container-fluid bg-grey">
        <h2 style='margin-left:30px;' class="text-center">CONTACTO</h2>
        <div class="row">
          <div class="col-sm-5">
            <p>Contact us and we'll get back to you.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Buenos Aires, AR</p>
          
            <p><span class="glyphicon glyphicon-envelope"></span> orlyrosenkranz@hotmail.com</p>
          </div>
          <div class="col-sm-7 slideanim">



<form class="" action="comments.php" method="post">
     <?php if(!isset($_SESSION['exito'])): ?>
            <div class="row">
              <div class="col-sm-6 form-group">
                <input class="form-control"  name="name" placeholder='Name' type="text" value='<?php echo $nombre; ?>' autofocus >
              </div>
              <div class="col-sm-6 form-group">
                <input class="form-control"  name="email" placeholder="Email" type="email" value='<?php echo $email; ?>' >
              </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5" ><?php echo $comment; ?></textarea><br>
            <!-- <div class="row"> -->
                <?php endif; ?>
              <div class="col-sm-12 form-group" style="
    margin-bottom: 80px;">
        <?php  $errors = $_SESSION['errors'] ?? array(); ?>
        <?php foreach ($errors as $e): ?>
        <p style="color:red;"><?php echo $e; ?></p>
    <?php endforeach; ?>




<br>
<br>

                 <?php if(isset($_SESSION['exito'])): ?>
                <span style="color:red">Gracias! <?php echo $nombre ?> </span>    <span style="color:red"><?php echo $_SESSION['exito'] ?></span>
                <?php endif; ?>
                 <?php if(!isset($_SESSION['exito'])): ?>
                <button style='background-color:#FF530D; color:white;' class="btn btn-default pull-right" type="submit">Send</button>
                <?php endif; ?>
              </div>
</form>
<footer class="main-footer">
    <ul>
        <li><a href="index.php">HOME</a></li>
        <li><a href="about.html">ABOUT</a></li>
        <li><a href="mailto:orlyrosenkranz@hotmail.com?subject=feedback" >CONTACT</a></li>
    </ul>
    <strong class="copyright">©Orly Rosenkranz 2017. - All Rights Reserved.</strong>
</footer>






  </body>
  <?php session_unset(); ?>
</html>
