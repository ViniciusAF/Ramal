<?php
include "conecta_mysql_ramal.inc";
$buscardepartamento = $_POST['buscadepartamento'];
if (!is_numeric($buscardepartamento) and !empty($buscardepartamento)){
	echo "Digite apenas numeros no campo do ramal.";
	echo "<br>";
	echo "<a href =\"ramal.php\">Voltar</a>";
}else{
	if (empty($buscardepartamento)){
	
	$cor1 = "gray";
	$cor2 = "white";
	$i = 2;
	
    $dados = mysql_query("select * from departamento") or die(mysql_error());
	$total = mysql_num_rows($dados);
    $linhas = mysql_affected_rows();
	if($total >= 0) {	
	echo "<table border = '1' width = '350'>";
    echo "<tr><td><strong>Departamentos cadastrados</strong></td></tr>";
	echo "</table>";
	echo "<table border = '1' width = '350'>";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
      echo "<tr><td style=\"background: " . $cor . ";\" width = \"20\"><strong>" . "ID: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['ID_depto'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Nome: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['Desc_depto'] . "</td>";
	  $i++;
    }
    echo "</table>";
    } else {
	echo "Sua busca não obteve resultados.";
	}
	
	echo "<br>";
	echo "<br>";
	echo "Total de linhas retornadas: ", $total;
    echo "<br>";
    echo "<br>";	
	echo "Total de linhas afetadas: ", $linhas;
	echo "<br>";
	echo "<br>";
	echo "<a href =\"departamento.html\">Voltar</a>";
	
}else{
		


		
$dados = mysql_query("select * from departamento where Desc_depto = '$buscardepartamento'") or die(mysql_error());
$total = mysql_num_rows($dados);
$linhas = mysql_affected_rows();

    $cor1 = "gray";
	$cor2 = "white";
	$i = 2;
	 
if($total >= 0) {	
	echo "<table border = '1' width = '350'>";
    echo "<tr><td><strong>Departamentos cadastrados</strong></td></tr>";
	echo "</table>";
	echo "<table border = '1' width = '350'>";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
      echo "<tr><td style=\"background: " . $cor . ";\" width = \"20\"><strong>" . "ID: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['ID_depto'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Nome: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['Desc_depto'] . "</td>";
	  $i++;
    }
    echo "</table>";
    } else {
	echo "Sua busca não obteve resultados.";
	}
	echo "<br>";
	echo "<br>";
	echo "Total de linhas retornadas: ", $total;
    echo "<br>";
    echo "<br>";	
	echo "Total de linhas afetadas: ", $linhas;
	echo "<br>";
	echo "<br>";
	echo "<a href =\"departamento.html\">Voltar</a>";

	
	
}
	
	
}



?>