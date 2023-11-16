<!-- <h3>Subir Imagen</h3>
<form action="<?php echo base_url();?>cupload/subirImagen" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Titulo</td>
			<td><input type="text" name="titImagen" class="form-control"></td>
		</tr>
		<tr>
			<td>Imagen</td>
			<td>
				<input type="file" name="fileImagen" class="form-control">
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Guardar"></td>
		</tr>
	</table>
</form> -->

<!-- <?php echo $error;?>
<br><br>
<h3>Subir y descargar Archivo</h3>
<form action="<?php echo base_url();?>cupload/subirArchivo" method="POST" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Titulo</td>
			<td><input type="text" name="titImagen" class="form-control"></td>
		</tr>
		<tr>
			<td>Imagen</td>
			<td>
				<input type="file" name="fileImagen" class="form-control">
			</td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" value="Guardar"></td>
		</tr>
	</table>
</form>
<?php echo $errorArch;?>
<?php echo empty($estado)? '':$estado ;?>
<a href="<?php echo base_url();?>cupload/downloads/<?php echo empty($archivo)? '':$archivo ;?>">Descargar</a> -->
<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('cupload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>