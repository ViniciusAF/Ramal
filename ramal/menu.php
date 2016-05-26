<html>
<body>


<?php
include "conecta_mysql_ramal.inc";
session_start();
$res = $_SESSION['UsuarioPesquisa'];

if ($res == 'A' or $res == '') {
	include "menuramal.html";
}

$dados = mysql_query("select Nome_usuario, Andar_usuario, Status, Nr_ramal, Descricao, desc_depto
                      from usuario inner join ramal on 
					  usuario.id_usuario = ramal.id_usuario
                      inner join departamento on usuario.id_depto = departamento.id_depto order by desc_depto;") or die(mysql_error());
$total = mysql_num_rows($dados);
$linhas = mysql_affected_rows();

    $cor1 = "gray";
	$cor2 = "white";
	$i = 2;
	
if($total >= 0) {	
	echo "<table border = '1' width = '1000'>";
    echo "<tr><td><strong>Lista</strong></td></tr>";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
      echo "<tr><td style=\"background: " . $cor . ";\"><strong>" . "Nome: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['Nome_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\"><strong>" . "Andar: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['Andar_usuario'] . "</td>";	
	  echo "<td style=\"background: " . $cor . ";\"><strong>" . "Status:" . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['Status'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\"><strong>" . "Departamento:" . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['desc_depto'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\"><strong>" . "Ramal:" . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['Nr_ramal'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\"><strong>" . "Descricao:" . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['Descricao'] . "</td></tr>";
	  $i++;
	
    }
    echo "</table>";
    }
	echo "<form method=\"post\" action =\"menu.php\">
	<p><input type=\"submit\" name =\"Sair\" value = \"Sair\"/></p>
	</form>";
	if (isset($_POST["Sair"])){
	        session_start(); session_destroy(); header("Location: login.html"); exit;
    }
	
	?>
</body>
</html>