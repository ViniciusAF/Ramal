<?php
include "conecta_mysql_ramal.inc";
$buscarusuario = $_POST['buscausu'];
if (is_numeric($buscarusuario) and !empty($buscarusuario)){
	echo "Digite apenas letras no campo do nome.";
	echo "<br>";
	echo "<a href =\"ramal.php\">Voltar</a>";
}else{
	
if (empty($buscarusuario)){
	
	$cor1 = "gray";
	$cor2 = "white";
	$i = 2;
	
    $dados = mysql_query("select id_usuario, nome_usuario, andar_usuario, status, 
	                             Desc_tipo_acesso, 
	                             Desc_depto 
								 from usuario inner join tipo_acesso on usuario.id_tipo_acesso = tipo_acesso.id_tipo_acesso 
								 inner join departamento on usuario.id_depto = departamento.id_depto;") or die(mysql_error());
	$total = mysql_num_rows($dados);
    $linhas = mysql_affected_rows();
	
	if($total >= 0) {	
	echo "<table border = '1' width = '1000'>";
    echo "<tr><td><strong>Usuarios</strong></td></tr>";
	echo "</table>";
	echo "<table border = '1' width = '1000'>";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
      echo "<tr><td style=\"background: " . $cor . ";\" width = \"20\"><strong>" . "ID: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['id_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Nome: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['nome_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Andar: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['andar_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Status: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['status'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Acesso: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['Desc_tipo_acesso'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Departamento: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['Desc_depto'] . "</td>";
	  $i++;
    }
    echo "</table>";
	
	echo "<table border = '1' width = '1000'>";
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
	echo "<a href =\"usuarios.php\">Voltar</a>";
	
}else{
		


		
$dados = mysql_query("select id_usuario, nome_usuario, andar_usuario, status, 
	                             Desc_tipo_acesso, 
	                             Desc_depto 
								 from usuario inner join tipo_acesso on usuario.id_tipo_acesso = tipo_acesso.id_tipo_acesso 
								 inner join departamento on usuario.id_depto = departamento.id_depto where nome_usuario = '$buscarusuario'") or die(mysql_error());
$total = mysql_num_rows($dados);
$linhas = mysql_affected_rows();

    $cor1 = "gray";
	$cor2 = "white";
	$i = 2;
	 
if($total >= 0) {	
	echo "<table border = '1' width = '1000'>";
    echo "<tr><td><strong>Usuarios</strong></td></tr>";
	echo "</table>";
	echo "<table border = '1' width = '1000'>";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
      echo "<tr><td style=\"background: " . $cor . ";\" width = \"20\"><strong>" . "ID: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['id_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Nome: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['nome_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Andar: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['andar_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Status: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['status'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Acesso: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['Desc_tipo_acesso'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"50\"><strong>" . "Departamento: " . "</strong></td>";
	  echo "<td style=\"background: " . $cor . ";\" width = \"200\">" . $exibe['Desc_depto'] . "</td>";
	  $i++;
    }
    echo "</table>";
	echo "<table border = '1' width = '1000'>";
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
	echo "<a href =\"usuarios.php\">Voltar</a>";

	
	
}

}
?>