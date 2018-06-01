<html>
<title>Aplikasi Data Mahasiswa</title>
<style>
.fixed-th tbody {
	overflow-y: auto;
	width: 100%;
	max-height: 300px;
	position: static;
}
.fixed-th th,.fixed-th td{
	vertical-align: center;
	padding:10px 7px;
	text-align: center;
}
.fixed-th th:nth-child(1), .fixed-th td:nth-child(1) {
min-width:100px;
}
.fixed-th th:nth-child(2), .fixed-th td:nth-child(2) {
width:300px;
}
.fixed-th th:nth-child(3), .fixed-th td:nth-child(3) {
width:200px;
}
.fixed-th th:nth-child(4), .fixed-th td:nth-child(4) {
width:200px;
}
</style>

<h1>Aplikasi Data Mahsiswa</h1>
<hr>

<a href="tambah.php"><img title="Tambah Data" src="../img/tambah.png"/></a>
<br></br>

<?php
	include "koneksi.php";
	$koneksiObj = new Koneksi();
	$koneksi = $koneksiObj->ambilKoneksi();

	if ($koneksi->connect_error){
		die("Koneksi gagal : ".$koneksi->connect_error);
	} else {
		//echo "Koneksi Sukses !";
	}
	$qry = "select * from data_mhs";
	$data = $koneksi->query($qry);
?>

<table class="fixed-th">
	<tr bgcolor='magenta'>
		<th>NIM</th>
		<th>NAMA</th>
		<th>JURUSAN</th>
		<th>OPSI</th>
	</tr>
	
	<?php
		if ($data->num_rows <= 0){
			echo "<tr><td>";
			echo "DATA NIHIL";
			echo "</td></tr>";
		} else {
			while ($row = $data->fetch_assoc()) {
				echo "<tr>";
				echo "<td>".$row["nim"]."</td>";
				echo "<td>".$row["nama"]."</td>";
				echo "<td>".$row["jurusan"]."</td>";
				echo '<td><a href="edit.php?nim='. $row["nim"] .'"><img title="Edit Data" src="../img/edit.png"/></a>
						<a href="hapus.php?nim='. $row["nim"] .'"><img title="Delete Data" src="../img/hapus.png"/></a>';
				//echo '<td><a href="hapus.php?nim='. $row["nim"] .'">Hapus</a>';
				echo "<tr>";
			}
		}
	?>
</table>
</html>