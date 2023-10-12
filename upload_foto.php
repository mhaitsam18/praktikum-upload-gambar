<?php 
$conn = mysqli_connect('localhost','root', '', 'upload');
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Foto</title>
</head>
<body>
<form action="" method='post' enctype="multipart/form-data">
	<input type="text" name="nama">
	<input type="file" name="foto">
	<input type="submit" name="simpan">
</form>
</body>
</html>
<?php 
if (isset($_POST['simpan'])) {
	$target_dir		= "upload/"; // Untuk Foto
	$file_name		= basename($_FILES["foto"]["name"]); // Untuk Foto
	$target_file	= $target_dir . $file_name; // Untuk Foto
	$imageFileType	= strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // untuk foto
	if (move_uploaded_file($_FILES["foto"]["tmp_name"],$target_file)) {
		$nama =$_POST['nama'];
		$sql="INSERT INTO data_foto(nama, foto) VALUES ('$nama','$target_file')";
		$result=$conn->query($sql);
		if ($result == true) {
				echo "<script> alert('Foto berhasil masuk ke database');</script>";
		} else {
				echo "<script> alert('Foto gagal masuk ke database');</script>";
		}
		// echo "<script> location='login_member.php'; </script>";
	} else {
		echo "<script> alert('Foto Gagal masuk ke folder');</script>";
	}
}
 ?>