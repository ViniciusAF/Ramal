<html>
<body>
<?php
include "conecta_mysql_ramal.inc";
$queryusu = mysql_query("SELECT ID_usuario, Nome_usuario from usuario");
?>
<p> RAMAIS </p>

<br>
<br>


<table border = "1">

<tr>
<td>Inserir/Excluir Ramal</td>
</tr>

<tr>
<td><form method="post" action ="insereramal.php">
<p> Numero: <input type="text" name="numramal" maxlength="4" /></p>
<p> Descricao: <input type="text" name="descramal" maxlength="300"/></p>
<p> Usuario:<select name = "selectusuario">
    <?php while($vqueryusu = mysql_fetch_assoc($queryusu)) { ?>
    <option value = "<?php echo $vqueryusu['ID_usuario'];?>"><?php
	                         echo "<br>";
	                         echo $vqueryusu['Nome_usuario']; ?></option>
    <?php } ?>
</select></p>
  
<h5> I = Inativo/Nao, A = Ativo/Sim</h5>

<p align = "center"><input type="submit" name ="btninserir" value = "Inserir"/>
<input type="submit" name ="btnexcluir" value = "Excluir"/></p>
</form></td>

</tr>

<tr>
<td style ="background:black"></td>
</tr>

<tr>
<td>Buscar Ramal</td>
</tr>

<tr>
<td><form method="post" action ="buscaramal.php">
<p> Numero: <input type="text" name="buscaramal" maxlength="4"/></p>
<p align = "center"><input type="submit" name ="btnbusca" value = "Buscar"/>
<h6>Deixe em branco para buscar todos os dados</h6></p>
</form></td>
</tr>

</table>

<br>
<br>



<p><a href ="menu.php">Voltar</a></p></td>

<br>
<br>



</body>
</html>