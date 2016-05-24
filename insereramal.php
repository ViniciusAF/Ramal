<?php
include "conecta_mysql_ramal.inc";
   $numeroramal = $_POST['numramal'];
   $descricao = $_POST['descramal'];
   $codusu = $_POST['selectusuario'];
  
    if (isset($_POST["btninserir"])){
	         if (empty($numeroramal)){
	            echo "Digite o numero do ramal!";
	            echo "<br>";
	            echo "<a href =\"ramal.php\">Voltar</a>";
             } elseif (empty($descricao)) {
			    echo "Digite a descricao do ramal!";
	            echo "<br>";
	            echo "<a href =\"ramal.php\">Voltar</a>";
			 } elseif (empty($codusu)) {
				echo "Digite o codigo do usuario que utiliza o ramal!";
	            echo "<br>";
	            echo "<a href =\"ramal.php\">Voltar</a>";
			 }elseif (!is_numeric($numeroramal)) {
				echo "Digite apenas numeros no campo ramal.";
				echo "<br>";
				echo "<a href =\"ramal.php\">Voltar</a>";
			 }else {
				mysql_query("insert into ramal (nr_ramal, descricao, ID_usuario)
				values ('$numeroramal', '$descricao', '$codusu')");
                echo "Incluido";
			    echo "<br>";
			    echo "<a href =\"ramal.php\">Voltar</a>";
			 }
    } elseif (isset($_POST['btnexcluir'])) {
          
		     $exclui = mysql_query("delete from ramal where nr_ramal ='$numeroramal'");
			 echo "Registro Excluido";
			 echo "<br>";
	         echo "<a href =\"ramal.php\">Voltar</a>";
			 
			 
			 
    } 
  
	
  
?>