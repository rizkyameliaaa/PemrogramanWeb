<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $id_bus = $_POST['id_bus'];
      $plat = $_POST['plat'];
      $status = $_POST['status'];
      //query SQL
      $query = "INSERT INTO bus (id_bus, plat, status) VALUES('$id_bus','$plat','$status')"; 

      //eksekusi query
      $result = mysqli_query(connection(),$query);
      if ($result) {
        $status = 'ok';
      }
      else{
        $status = 'err';
      }
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <title>Trans UPN</title>
  </head>

  <body>
    <nav class="navbar">
      <a class="navbar-brand" href="index.php">Data Trans UPN</a>
    </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
       
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data Bus berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data Bus gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Bus</h2>
          <form action="formBus.php" method="POST">
            
            <div class="form-group">
              <label>ID bus</label>
              <input type="text" class="form-control" placeholder="ID Bus" name="id_bus" required="required" readonly>
            </div>
            <div class="form-group">
              <label>Plat</label>
              <input type="text" class="form-control" placeholder="Plat Bus" name="plat" required="required">
            </div>
            <div class="form-group">
              <label>Status</label>
              <input type="text" class="form-control" placeholder="Status" name="status" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

  </body>
</html>