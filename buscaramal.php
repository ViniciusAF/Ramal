<?php
include "conecta_mysql_ramal.inc";
$buscar = $_POST['buscaramal'];
if (!is_numeric($buscar) and !empty($buscar)){
	echo "Digite apenas numeros no campo do ramal.";
	echo "<br>";
	echo "<a href =\"ramal.php\">Voltar</a>";
}else{
	
	if (empty($buscar)){
	
	$cor1 = "gray";
	$cor2 = "white";
	$i = 2;
	
    $dados = mysql_query("select id_ramal, nr_ramal, descricao, nome_usuario from ramal inner join usuario on ramal.id_usuario = usuario.id_usuario;") or die(mysql_error());
	$total = mysql_num_rows($dados);
    $linhas = mysql_affected_rows();
	if($total >= 0) {	
	echo "<table border = '1' width = '600'>";
    echo "<tr><td><strong>Ramais</strong></td></tr>";
	echo "</table>";
	echo "<table border = '1' width = '600'>";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
      echo "<tr><td style=\"background: " . $cor . ";\" width = \"20\"><strong>" . "ID: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['id_ramal'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Numero: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\">" . $exibe['nr_ramal'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Descricao: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"400\">" . $exibe['descricao'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Usuario: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['nome_usuario'] . "</td>";
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
	echo "<a href =\"ramal.php\">Voltar</a>";
	
}else{
		


		
$dados = mysql_query("select * from ramal where nr_ramal = '$buscar'") or die(mysql_error());
$total = mysql_num_rows($dados);
$linhas = mysql_affected_rows();

    $cor1 = "gray";
	$cor2 = "white";
	$i = 2;
	 
if($total >= 0) {	
	echo "<table border = '1' width = '600'>";
    echo "<tr><td><strong>Ramais</strong></td></tr>";
	echo "</table>";
	echo "<table border = '1' width = '600'>";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
      echo "<tr><td style=\"background: " . $cor . ";\" width = \"20\"><strong>" . "ID: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['ID_ramal'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Numero: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\">" . $exibe['Nr_ramal'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Descricao: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"400\">" . $exibe['Descricao'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Cod. Usuario: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['ID_usuario'] . "</td>";
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
	echo "<a href =\"ramal.php\">Voltar</a>";

	
	
  }

}


?>