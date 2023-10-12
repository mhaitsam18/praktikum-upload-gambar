<?php 
$conn = mysqli_connect('localhost','root', '', 'upload');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tampil Foto</title>
</head>
<body>
	<table border="1">
		<tr>
			<th>Nomor</th>
			<th>Nama</th>
			<th>Foto</th>
		</tr>
		<?php
		$sql = "SELECT * FROM data_foto";
		$result = $conn->query($sql);
		while ($row = $result->fetch_assoc()) {
			?>
			<tr>
				<td><?= $row['id'] ?></td>
				<td><?= $row['nama'] ?></td>
				<td><img width="300" height="400" src="<?= $row['foto'] ?>"></td>
			</tr>
			<?php
		}
		 ?>
	</table>
</body>
</html>