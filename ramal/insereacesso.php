<?php
include "conecta_mysql_ramal.inc";
   $nomedoacesso = $_POST['nomeacesso'];
   $insere = $_POST['acessoinsere'];
   $altera = $_POST['acessoaltera'];
   $deleta = $_POST['acessoexclui'];
   $pesquisa = $_POST['acessopesquisa'];
   $exclui = mysql_query("delete from tipo_acesso where Desc_tipo_acesso ='$nomedoacesso'");
	   
   
  
   
   if (isset($_POST["btninserir"])){
	         if (empty($nomedoacesso)){
	         echo "Digite o nome do tipo de acesso!";
	         echo "<br>";
	         echo "<a href =\"tipos_acesso.html\">Voltar</a>";
             } else {
	         mysql_query("insert into tipo_acesso (Desc_tipo_acesso, T_insere, T_altera, T_exclui, T_Pesquisa) values ('$nomedoacesso', '$insere', '$altera', '$deleta', '$pesquisa')");
             echo "Incluido";
			 echo "<br>";
			 echo "<a href =\"tipos_acesso.html\">Voltar</a>";
             }
    } elseif (isset($_POST['btnexcluir'])) {
             $exclui;
			 echo "Registro Excluido";
			 echo "<br>";
	         echo "<a href =\"tipos_acesso.html\">Voltar</a>";
    } 
	
	
  
?>