<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile | Rizky Amelia</title>
	<link rel="stylesheet" href="style.css">

	<style type="text/css">
		img{
			border-radius: 50%;
		}
	</style>
</head>
<body>
 
<?php
    $header = "About Me";
	$header2 = "Skills & Interests";
	$list2 = "Experiences";
	$list3 = "Home";
	$intro = "Hi, I'm Rizky Amelia!";
	$deskripsi = "Saya merupakan mahasiswi aktif jurusan Informatika UPN Veteran Jawa Timur. Saat ini saya sedang menempuh semester empat, <br> selamat datang di web profile saya.";
	$tabel11 = "DATA DIRI";
	$tabel12 = "KETERANGAN";
	$tabel21 = "Nama Lengkap";
	$tabel22 = "Rizky Amelia";
	$tabel31 = "NPM";
	$tabel32 = "21081010129";
	$tabel41 = "Umur";
	$tabel51 = "Alamat";
	$tabel52 = "Kec. Soko Kab. Tuban";
	$tabel61 = "Agama";
	$tabel62 = "Islam";
	$tabel71 = "Jenis Kelamin";
	$tabel72 = "Perempuan";
	$tabel81 = "Hobi";
	$tabel82 = "Menonton Film, Mendengarkan Musik, Membaca Buku";
	$experiences = "Experiences";
	$experiences1 = "BEM Fakultas Ilmu Komputer UPN Veteran Jawa Timur Periode 2022-2023";
	$ket1 = "Anggota Bidang Luar Negeri";
	$tugas1 = "Membangun relasi antara BEM FASILKOM dengan organisasi kemahasiswaan lainnya";
	$tugas2 = "Membuat program kerja untuk membangun relasi antara BEM FASILKOM dengan organisasi kemahasiswaan internal atau eksternal lainnya, <br> seperti studi banding atau program kerja bersama";
	$experiences2 = "Panitia Fasilkom Fest 2022";
	$ket2 = "Anggota Divisi Sponsorship";
	$tugas3 = "Membuat Proposal Sponsorship";
	$tugas4 = "Menjalin kerja sama dengan pihak mitra untuk mendukung berjalannya acara";
	$experiences3 = "Panitia Loka Karya 2022";
	$ket3 = "Ketua Divisi Humas";
	$tugas5 = "Menjalin hubungan dengan pihak internal maupun eksternal";
	$tugas6 = "Menghubungi tamu undangan";
	$skill_interest = "Skills & Interests";
	$skills = "Memahami beberapa bahasa pemrograman, Mudah beraptasi, Bertanggungjawab dan dapat dipercaya.";
	$interest = "Design, Programming, Internship, Volunteer,  Workshop.";
?>
	<div class= "header">
		<div class="header1">
			<?php echo $header;?>
		</div>
		<div class="header2">
			<ul>
				<li style="list-style: none;"> <?php echo $header2; ?></li> 
				<li style="list-style: none;"> <?php echo $list2; ?></li>
				<li style="list-style: none;"> <?php echo $list3; ?></li>
			</ul> 
		</div>
	</div>

	<div class="profil">
		<img src="amel.jpg" height="200px">
	</div>


	<div class="about">
		<h1 align="center"><?php echo $intro; ?></h1>
		<p> <?php echo $deskripsi; ?></p>
	</div>

	<table border="2" cellspacing="3" cellpadding="5" align="center">
		<tr align="center" bgcolor="787A91" style="color: aliceblue;">
			<td width="200"> <?php echo $tabel11;?> </td>
			<td width="400"> <?php echo $tabel12;?></td>
		</tr>
		<tr>
			<td><?php echo $tabel21;?></td>
			<td><?php echo $tabel22;?></td>
		</tr>
		<tr>
			<td><?php echo $tabel31;?></td>
			<td><?php echo $tabel32;?></td>
		</tr>
		<tr>
			<td><?php echo $tabel41;?></td>
			<td>
			<?php 
			$dateOfBirth = "07-09-2002";
			$today = date("Y-m-d");
			$diff = date_diff(date_create($dateOfBirth), date_create($today));
			echo ''.$diff->format('%y');
			?></td>
		</tr>
		<tr>
			<td><?php echo $tabel51;?></td>
			<td><?php echo $tabel52;?></td>
		</tr>
		<tr>
			<td><?php echo $tabel61;?></td>
			<td><?php echo $tabel62;?></td>
		</tr>
		<tr>
			<td><?php echo $tabel71;?></td>
			<td><?php echo $tabel72;?></td>
		</tr>
		<tr>
			<td><?php echo $tabel81;?></td>
			<td><?php echo $tabel82;?></td>
		</tr>
	</table>

    <div>
		<p></p>
    </div>
  
    <hr><div class="experiences">
        <h3><?php echo $experiences;?></h3>
        <p> <b><?php echo $experiences1;?></b> 
            <br><?php echo $ket1;?>
        </p>
        <ul>
            <li><?php echo $tugas1;?></li>
            <li><?php echo $tugas2;?></li>
        </ul>
        <p><b><?php echo $experiences2;?></b>
            <br><?php echo $ket2;?>
        </p>
        <ul>
            <li><?php echo $tugas3;?></li>
            <li><?php echo $tugas4;?></li>
        </ul>
        <p> <b><?php echo $experiences3;?></b> 
            <br><?php echo $ket3;?>
        </p>
        <ul>
            <li><?php echo $tugas5;?></li>
            <li><?php echo $tugas6;?></li>
        </ul>

        <h3><?php echo $skill_interest;?></h3>
        <p> <b>Skills :</b><?php echo $skills;?>
        <br> <b>Interests :</b> <?php echo $interest;?>
        </p>
    </div>
    
	<div class="footer">
		<div class="isi-footer">
			<div class="contact">Contact Me</div>
			<div class="contact-list">
                <li style="list-style: none;"><i class="bx bx-envelope"></i> rizkya0709@gmail.com</li>
                <a href="https://www.instagram.com/rizkyamelia._">@rizkyamelia._</a> <br> 
                <a href="wa.me/+6281235695347">0812-3569-5347</a>
			</div>
		</div>
	</div>
</body>
</html>