<?php
include "conecta_mysql_ramal.inc";
   $nomeusuario = $_POST['nomeusu'];
   $andarusuario = $_POST['andarusu'];
   $loginusuario = $_POST['loginusu'];
   $senhausu = $_POST['senhausu'];
   $statususu = $_POST['statususu'];
   $iddepto = $_POST['comboboxdeptousu'];
   $idtipo = $_POST['comboboxtipoacesso'];
   $exclui = mysql_query("delete from usuario where nome_usuario ='$nomeusuario'");
	   
   
  
   
   if (isset($_POST["btninserir"])){
	         if (empty($nomeusuario)) {
	            echo "Digite o nome do usuario!";
	            echo "<br>";
	            echo "<a href =\"usuarios.php\">Voltar</a>";
		     } elseif (is_numeric($nomeusuario)) {
				echo "Digite apenas letras no campo do nome!";
	            echo "<br>";
	            echo "<a href =\"usuarios.php\">Voltar</a>";
             } elseif (empty($andarusuario)) {
			    echo "Digite o andar que o usuario se localiza!";
	            echo "<br>";
	            echo "<a href =\"usuarios.php\">Voltar</a>";
			 } elseif (!is_numeric($andarusuario)) {
				echo "Digite apenas numeros no campo do andar!";
	            echo "<br>";
	            echo "<a href =\"usuarios.php\">Voltar</a>";
			 } elseif (empty($loginusuario)) {
				echo "Digite o login do usuario!";
	            echo "<br>";
	            echo "<a href =\"usuarios.php\">Voltar</a>";
			 } elseif (empty($senhausu)) {
		        echo "Digite a senha do usuario!";
	            echo "<br>";
	            echo "<a href =\"usuarios.php\">Voltar</a>";
		     } elseif (empty($iddepto)) {
		        echo "Digite o codigo do departamento do usuario!";
	            echo "<br>";
	            echo "<a href =\"usuarios.php\">Voltar</a>";
		     } elseif (empty($idtipo)) {
				echo "Digite o codigo do tipo de acesso do usuario!";
	            echo "<br>";
	            echo "<a href =\"usuarios.php\">Voltar</a>";
			 }else {
				mysql_query("insert into usuario (Nome_usuario, Andar_usuario, Login_usu, Senha_usu, Status, ID_depto, ID_tipo_acesso)
				values ('$nomeusuario', '$andarusuario', '$loginusuario', '$senhausu', '$statususu', '$iddepto', '$idtipo')");
                echo "Incluido";
			    echo "<br>";
			    echo "<a href =\"usuarios.php\">Voltar</a>";
			 }
    } elseif (isset($_POST['btnexcluir'])) {
             $exclui;
			 echo "Registro Excluido";
			 echo "<br>";
	         echo "<a href =\"usuarios.php\">Voltar</a>";
    } 
	
	
  
?>