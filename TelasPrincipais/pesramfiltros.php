<html>
<body>
<head>


<style type="text/css">
  body {
	font-family: Georgia, "Times New Roman",
          Times, serif;
    color: White;
    background-color: #27408B
	}
  </style>
  
<title> Ramais Psychemedics </title>


</head>
<form method = "post">
<table align = "center" border = '1'>

<tr><td><img align="center" src="img/psy.png"/></td></tr>

<tr>
<td><label>Nome:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" size = '17' name="nomeusuariodigitado" maxlength="60" value = "<?php include "conecta_mysql_ramal.inc"; $nomedigitado = $_POST["nomeusuariodigitado"]; echo $nomedigitado; ?>" /></td>
</tr>



<tr>
<td><label>Departamento:</label>&nbsp;&nbsp;<select name="comboboxtipoacesso">
                               <?php 
	                           
                               $querybuscadepto = mysql_query("SELECT * from departamento");
							   
							   echo "<option value =\"\"></option>";
	                           echo "<option value =\"todos\">Todos</option>";
	                           while($vquerybuscadepto = mysql_fetch_assoc($querybuscadepto)) { 
	                           ?>
                                        <option value = "<?php echo $vquerybuscadepto['Desc_depto'];?>" 
										                 <?php if ($_POST["comboboxtipoacesso"] == $vquerybuscadepto['Desc_depto']) { echo "selected"; } ?>>
														 <?php echo $vquerybuscadepto['Desc_depto']; ?>
														 </option>
                                        <?php 
										} 
										?>
	                </select></td>
</tr>

<tr>
<td><label>Ramal:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="text" size = '4' name="numramal" maxlength="4" value = "<?php $ramaldigitado = $_POST["numramal"]; echo $ramaldigitado; ?>" /></td>
</tr>

<tr>
<td><p align = "center"><input type="submit" name ="btnbuscar" value = "Buscar"/></p></td>
</tr>
</table>
</form>	

<?php


//Verificando se a variavel, no caso o botão, foi inicializado.
if (isset($_POST["btnbuscar"])){

//Colocando em uma variavel o valor selecionado.
$coddepto = $_POST['comboboxtipoacesso'];
$ramal = $_POST["numramal"];
$nome = $_POST["nomeusuariodigitado"];

//Definindo as cores para intercalar na tabela.
$cor1 = "#1E90FF";
$cor2 = "#4682B4";
$i = 2;

//Conexão com o Banco
include "conecta_mysql_ramal.inc";


//Condições: Se "todos" for selecionado
if($coddepto == "todos" or $coddepto == "" and $ramal == "" and $nome == ""){
   
   //Consulta de todos os departamentos
   $todos = "select Nome_usuario, Andar_usuario, Nr_ramal, Descricao, desc_depto
   from usuario inner join ramal on 
   usuario.id_usuario = ramal.id_usuario
   inner join departamento on usuario.id_depto = departamento.id_depto order by Nome_usuario;";
   $dadostodos = mysql_query ($todos) or die (mysql_error());
   $total2 = mysql_num_rows($dadostodos);
    
   if($total2 > 0) {
			
        echo "<table border = '1' width = '1000' align = \"center\">
			  <tr><td align = \"center\"><strong>RAMAIS PSYCHEMEDICS</strong></td></tr>
			  
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

//Caso contrário:
} else {
	
   //Consulta do departamento e ramal selecionado
   $sql_depto = "select Nome_usuario, Andar_usuario, Nr_ramal, Descricao, desc_depto
   from usuario inner join ramal on 
   usuario.id_usuario = ramal.id_usuario
   inner join departamento on usuario.id_depto = departamento.id_depto
   where departamento.desc_depto like '%".$coddepto."%' 
   and
   Nome_usuario like '%".$nome."%'
   and
   Nr_ramal like '%".$ramal."%' order by Nome_usuario ;";
   $dados = mysql_query($sql_depto) or die(mysql_error());
   $total = mysql_num_rows($dados);
   
   if($total > 0 ) { 
	  echo "<table border = '1' width = '1000' align = \"center\">
	  <tr>
	  <td align = \"center\"><strong>RAMAIS PSYCHEMEDICS</strong></td>
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