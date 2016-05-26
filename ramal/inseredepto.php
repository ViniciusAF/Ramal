<?php
include "conecta_mysql_ramal.inc";
   $departamento = $_POST['nomedepartamento'];
   $exclui = mysql_query("delete from departamento where Desc_depto ='$departamento'");
   
   if (isset($_POST["btninserir"])){
	         if (empty($departamento)){
	         echo "Digite o departamento!";
	         echo "<br>";
	         echo "<a href =\"departamento.html\">Voltar</a>";
             } elseif (is_numeric($departamento)) {
             echo "Digite apenas letras no campo departamento.";
	         echo "<br>";
	         echo "<a href =\"departamento.html\">Voltar</a>";
			 }else {
	         mysql_query("insert into departamento (Desc_depto) values ('$departamento')");
             echo "Incluido";
			 echo "<br>";
			 echo "<a href =\"departamento.html\">Voltar</a>";
             }
   } elseif (isset($_POST['btnexcluir'])) {
			 $exclui;
			 echo "Registro Excluido";
			 echo "<br>";
			 echo "<a href =\"departamento.html\">Voltar</a>";
    } 
	
	
  
?>