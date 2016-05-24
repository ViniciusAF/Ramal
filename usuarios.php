<html>
<body>
<?php
include "conecta_mysql_ramal.inc";
$queryacesso = mysql_query("SELECT ID_tipo_acesso, Desc_tipo_acesso FROM tipo_acesso");
$querydepto = mysql_query("SELECT ID_depto, Desc_depto FROM departamento");
?>
<p> USUARIOS </p>

<br>
<br>


<table border = "1">

<tr>
<td>Inserir/Excluir Usuario</td>
</tr>

<tr>
<td><form method="post" action ="insereusuario.php">
<p> Nome do Usuario: <input type="text" name="nomeusu" maxlength="40" /></p>
<p> Andar do Usuario: <input type="text" name="andarusu" maxlength="2" /></p>
<p> Login: <input type="text" name="loginusu" maxlength="60"/></p>
<p> Senha: <input type="password" name="senhausu" maxlength="20" /></p>
<p> Status: <select name="statususu">
            <option value="Ativo" selected>A</option>
            <option value="Inativo">I</option>
  </select></p>
  
<p>Tipo de Acesso:<select name="comboboxtipoacesso">
    <?php while($vqueryacesso = mysql_fetch_assoc($queryacesso)) { ?>
    <option value = "<?php echo $vqueryacesso['ID_tipo_acesso'];?>"><?php echo $vqueryacesso['Desc_tipo_acesso'] ?></option>
    <?php } ?>
</select></p>
  
<p>Departamento:<select name="comboboxdeptousu">
    <?php while($vquerydepto = mysql_fetch_assoc($querydepto)) { ?>
    <option value = "<?php echo $vquerydepto['ID_depto'];?>"><?php echo $vquerydepto['Desc_depto'] ?></option>
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
<td>Buscar Usuario</td>
</tr>

<tr>
<td><form method="post" action ="buscausuario.php">
<p> Nome do usuario: <input type="text" name="buscausu" maxlength="40" /></p>
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