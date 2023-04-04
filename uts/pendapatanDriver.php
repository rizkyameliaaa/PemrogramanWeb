<?php
include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trans UPN</title>
  <link rel="stylesheet" href="file.css">
</head>

<body>
  <div class="grid-container">
    <div class="item4">Pemrorgaman Web</div>
    <div class="item1">Perhitungan Gaji Driver</div>
    <div class="item2">
      <br>
      <ul>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo "index.php"; ?>">Data Trans UPN</a>
          <ul>
            <li class="nav-item">
              <a class="nav-link " href="<?php echo "pendapatanDriver.php"; ?>">Pendapatan Driver</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="<?php echo "pendapatanKondektur.php"; ?>">Pendapatan Kondektur</a>
            </li>
          </ul>
        </li>
      </ul>
      </li>
      </ul>
    </div>
    <div class="item3">
      <?php
      $query_driver = "SELECT * FROM driver";
      $data_driver = mysqli_query(connection(), $query_driver);
      ?>
      <form action="pendapatanDriver.php" method="POST">
        <div class="form-group">
          <label>Driver</label>
          <select class="custom-select" name="id_driver" required="required" id="id_driver">
            <option selected>Pilih driver</option>
            <?php
            while ($row = mysqli_fetch_array($data_driver)) {
              echo "<option value='" . $row['id_driver'] . "'>" . $row['nama'] . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label>Tanggal</label>
          <input type="date" class="form-control" placeholder="Awal" name='date1' id='date1' required="required">
        </div>
        <button type="submit" class="btn btn-primary">Hitung</button>
      </form>
      <?php
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_driver = $_POST['id_driver'];
        $date1 = $_POST['date1'];
        $query_tanggal = "SELECT month('$date1') as bulan";
        $data_tanggal = mysqli_query(connection(), $query_tanggal);
        $hasil = mysqli_fetch_array($data_tanggal);
        $bulan = $hasil['bulan'];
        $query_gaji = "SELECT SUM(jumlah_km) AS Jarak FROM trans_upn WHERE id_driver = '$id_driver' AND MONTH(tanggal) = MONTH('$date1')";
        $data_gaji = mysqli_query(connection(), $query_gaji);
        $hasil = mysqli_fetch_array($data_gaji);
        $query_jarak = "SELECT SUM(jumlah_km) AS Total FROM trans_upn WHERE id_driver = '$id_driver'";
        $data_jarak = mysqli_query(connection(), $query_jarak);
        $hasil_jarak = mysqli_fetch_array($data_jarak);
        $gaji = $hasil['Jarak'] * 3000;
        echo "Gaji driver Di Bulan Ke $bulan adalah $gaji <br>";
        echo "Jarak Yang ditempuh driver Pada bulan $bulan adalah $hasil[Jarak] km<br>";
        echo "Jarak Yang ditempuh driver Pada Keseluruhan adalah $hasil_jarak[Total] km <br>";
      }
      ?>
    </div>

  </div>
</body>

</html>