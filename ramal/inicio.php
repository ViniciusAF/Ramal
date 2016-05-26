<html>
<body>
<form method = "post">
<table align = "center">
<tr>
<td><p>Buscar por departamento:<select name="comboboxtipoacesso">
                               <?php 
	                           include "conecta_mysql_ramal.inc";
                               $querybuscadepto = mysql_query("SELECT * from departamento");
	                           echo "<option value =\"todos\">Todos</option>";
	                           while($vquerybuscadepto = mysql_fetch_assoc($querybuscadepto)) { 
	                           ?>
                                        <option value = "<?php echo $vquerybuscadepto['ID_depto'];?>"><?php echo $vquerybuscadepto['Desc_depto'] ?></option>
                                        <?php 
										} 
										?>
	                           </select></td>
	
<td><p align = "center"><input type="submit" name ="btnbuscar" value = "Buscar"/></p></td>
</tr>
</table>
</form>	

<?php
if (isset($_POST["btnbuscar"])){
$coddepto = $_POST['comboboxtipoacesso'];
$cor1 = "lightgray";
$cor2 = "white";
$i = 2;
include "conecta_mysql_ramal.inc";



if( $coddepto == "todos" ){




$todos = "select Nome_usuario, Andar_usuario, Nr_ramal, Descricao, desc_depto
from usuario inner join ramal on 
usuario.id_usuario = ramal.id_usuario
inner join departamento on usuario.id_depto = departamento.id_depto order by desc_depto;";

$dadostodos = mysql_query ($todos) or die (mysql_error());
$total2 = mysql_num_rows($dadostodos);



        if($total2 > 0) {
			
        echo "<table border = '1' width = '1000' align = \"center\">
			  <tr><td align = \"center\"><strong>RAMAIS PSYCHEMEDICS</strong></td></tr>
			  <tr><td align = \"center\"><strong>Todos</strong></td></tr>
			  </table>
			  
			  <table border = '1' width = '1000' align = \"center\">
			  <tr><td><strong>Nome:</strong></td>
			  <td><strong>Andar:</strong></td>
			  
			  <td><strong>Ramal:</strong></td>
			  <td><strong>Descricao:</strong></td></tr>
	
			  ";
			  
    while ($exibe2 = mysql_fetch_assoc($dadostodos)) {
	  if ($i %2 == 0) {
	
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe2['Nome_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe2['Andar_usuario'] . "</td>";	
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe2['Nr_ramal'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe2['Descricao'] . "</td></tr>";
	  $i++;
	
     }
     echo "</table>";
	 }


} else {
	
	
	
	
$sql_depto = "select Nome_usuario, Andar_usuario, Nr_ramal, Descricao, desc_depto
from usuario inner join ramal on 
usuario.id_usuario = ramal.id_usuario
inner join departamento on usuario.id_depto = departamento.id_depto where departamento.ID_depto = '".$coddepto."' order by desc_depto;";

$dados = mysql_query($sql_depto) or die(mysql_error());
$total = mysql_num_rows($dados);



    if($total > 0) {
		
	$buscadepto = mysql_query("Select desc_depto from departamento where id_depto = '".$coddepto."';");
    $exibedepto = mysql_fetch_assoc($buscadepto);
    $depto = $exibedepto['desc_depto'];

	echo "<table border = '1' width = '1000' align = \"center\">
	<tr>
	<td align = \"center\"><strong>RAMAIS PSYCHEMEDICS</strong></td>
	</tr>
	<tr>
	<td align = \"center\"><strong>$depto</strong></td>
	</tr>
	</table>
			  
	<table border = '1' width = '1000' align = \"center\">
	<tr>
	<td><strong>Nome:</strong></td>
	<td><strong>Andar:</strong></td>
	<td><strong>Ramal:</strong></td>
	<td><strong>Descricao:</strong></td>
	</tr>
	";
    while ($exibe = mysql_fetch_assoc($dados)) {
	  if ($i %2 == 0) {
		  $cor = $cor1;
	  }else{
		  $cor = $cor2;
	  }
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['Nome_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['Andar_usuario'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['Nr_ramal'] . "</td>";
	  echo "<td style=\"background: " . $cor . ";\">" . $exibe['Descricao'] . "</td></tr>";
	  $i++;
	
    }
    echo "</table>";
    }
	
	
	
	
	
}

}


	?>
	

</body>
</html>