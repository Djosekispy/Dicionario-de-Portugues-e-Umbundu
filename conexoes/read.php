  <?php
 include_once '../conexoes/conectar.php';
  ?>
  <!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" lang="pt" charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    </head>

     <body class="blue-grey darken-4">

 <div class="row corpo"> 

 
<header>
	<div id="tema" class="blue-grey lighten-5">
		<b class="hide-on-small-only">Dicionario</b>
		<a href="../index.php" style="color: black;"> <b>Português-Umbundo </b></a>
		
	</div>
	<form id="formulario">
    <input type="text" name="pesquisa" id="inserir">	
    <button type="submit" name="Procurar" id="botao" class="btn">
    	Procurar
    </button>	
	</form>
</header>
</div>

<div class="row corpo">
  
<div class="grey lighten-5 " >
  <table>

<?php

$ps = $_GET['pesquisa'];

$sql = "SELECT * FROM palavras where termo like '%$ps%' or sentido like '%$ps%' ";
  $saida = mysqli_query($conectar,$sql);
  if($saida):
     
     while($dados = mysqli_fetch_array($saida)):
     
 
?>
      <ul class="collapsible" style=" margin-bottom: 0px; margin-top: 0px;">
    <li>
      <div class="collapsible-header"><?php 
$termo = utf8_encode($dados['termo']);
        $sentido = utf8_encode($dados['sentido']);
        echo $termo; ?></div>
      <div class="collapsible-body">
        <i><?php echo $sentido;?></i></div>
    </li>
  </ul>
    <?php   
  endwhile;
endif;
    ?>
        
  </table>
</div>


</div>






      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/jquery.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>
       <script type="text/javascript">

       	 $(document).ready(function(){
 M.AutoInit();
     $(".dropdown-trigger").dropdown();
    $('.sidenav').sidenav();
  });
     
       </script>
    </body>
  </html>