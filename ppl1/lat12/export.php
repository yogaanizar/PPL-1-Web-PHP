<?php
header("Content-type: application/xls");
header("Content-Disposition: attachment; filename=Siswa.xls");
?>
	<table border="1">
		<tr>
			<th>NIM</th>
			<th>Nama</th>
			<th>Umur</th>
		</tr>
		<?php 
		// koneksi database
		$koneksi = mysqli_connect("localhost","root","","db_akademik");
 
		// menampilkan data pegawai
		$data = mysqli_query($koneksi,"select * from mahasiswa");
		$no = 1;
		while($d = mysqli_fetch_array($data)){
		?>
		<tr>
			<td><?php echo $d['nim']; ?></td>
			<td><?php echo $d['nama']; ?></td>
			<td><?php echo $d['umur']; ?></td>
		</tr>
		<?php 
		}
		?>
	</table>