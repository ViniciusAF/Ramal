<?php
include "conecta_mysql_ramal.inc";
$buscaracesso = $_POST['buscaacesso'];
if (empty($buscaracesso)){
	
	$cor1 = "gray";
	$cor2 = "white";
	$i = 2;
	
    $dados = mysql_query("select * from Tipo_acesso") or die(mysql_error());
	$total = mysql_num_rows($dados);
    $linhas = mysql_affected_rows();
	if($total >= 0) {	
	echo "<table border = '1' width = '700'>";
    echo "<tr><td><strong>Tipos de Acesso de Usuario</strong></td></tr>";
	echo "</table>";
	echo "<table border = '1' width = '700'>";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
      echo "<tr><td style=\"background: " . $cor . ";\" width = \"20\"><strong>" . "ID: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['ID_tipo_acesso'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Nome: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['Desc_tipo_acesso'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Insere?: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['T_insere'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Altera?: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['T_altera'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Exclui?: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['T_exclui'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Pesquisa?: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['T_pesquisa'] . "</td>";
	  $i++;
    }
    echo "</table>";
	
	echo "<table border = '1' width = '700'>";
    echo "<tr><td><strong>I = Inativo/Nao    A = Ativo/Sim</strong></td></tr>";
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
	echo "<a href =\"tipos_acesso.html\">Voltar</a>";
	
}else{
		


		
$dados = mysql_query("select * from tipo_acesso where Desc_tipo_acesso = '$buscaracesso'") or die(mysql_error());
$total = mysql_num_rows($dados);
$linhas = mysql_affected_rows();

    $cor1 = "gray";
	$cor2 = "white";
	$i = 2;
	 
if($total >= 0) {	
	echo "<table border = '1' width = '700'>";
    echo "<tr><td><strong>Tipos de Acesso de Usuarios</strong></td></tr>";
	echo "</table>";
	echo "<table border = '1' width = '700'>";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
      echo "<tr><td style=\"background: " . $cor . ";\" width = \"20\"><strong>" . "ID: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['ID_tipo_acesso'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Nome: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['Desc_tipo_acesso'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Insere?: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['T_insere'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Altera?: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['T_altera'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Exclui?: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['T_exclui'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Pesquisa?: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['T_pesquisa'] . "</td>";
	  $i++;
    }
    echo "</table>";
	echo "<table border = '1' width = '700'>";
    echo "<tr><td><strong>I = Inativo/Nao    A = Ativo/Sim</strong></td></tr>";
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


?>