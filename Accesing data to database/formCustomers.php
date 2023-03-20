<?php 
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('conn.php'); 

  $status = '';
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $customerNumber = $_POST['customerNumber'];
      $customerName = $_POST['customerName'];
      $contactLastName = $_POST['contactLastName'];
      $contactFirstName = $_POST['contactFirstName'];
      $phone = $_POST['phone'];
      $addresLine1 = $_POST['addresLine1'];
      $addresLine2 = $_POST['addresLine2'];
      $city = $_POST['city'];
      $state = $_POST['state'];
      $postalcode = $_POST['postalcode'];
      $country = $_POST['country'];
      $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
      $creditLimit = $_POST['creditLimit'];
      //query SQL
      $query = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) 
      VALUES('$customerNumber','$customerName','$contactLastName','$contactFirstName','$phone','$addressLine1','$addressLine2','$city','$state','$postalCode','$country','$salesRepEmployeeNumber','$creditLimit')"; 

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
    <title>Latihan</title>
    <!-- load css boostrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Pemrograman Web</a>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column" style="margin-top:100px;">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "index.php"; ?>">Data</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "formCustomers.php"; ?>">Tambah Data Customers</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="<?php echo "formProducts.php"; ?>">Tambah Data Products</a>
              </li>
            </ul>
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          
          <?php 
              if ($status=='ok') {
                echo '<br><br><div class="alert alert-success" role="alert">Data berhasil disimpan</div>';
              }
              elseif($status=='err'){
                echo '<br><br><div class="alert alert-danger" role="alert">Data gagal disimpan</div>';
              }
           ?>

          <h2 style="margin: 30px 0 30px 0;">Form Data</h2>
          <form action="formCustomers.php" method="POST">
            
            <div class="form-group">
              <label>customerNumber</label>
              <input type="text" class="form-control" placeholder="Customer Number" name="customerNumber" required="required">
            </div>
            <div class="form-group">
              <label>customerName</label>
              <input type="text" class="form-control" placeholder="Customer Name" name="customerName" required="required">
            </div>
            <div class="form-group">
              <label>contactLastName</label>
              <input type="text" class="form-control" placeholder="Contact Last Name" name="contactLastName" required="required">
            </div>
            <div class="form-group">
              <label>contactFirstName</label>
              <input type="text" class="form-control" placeholder="Contact First Name" name="contactFirstName" required="required">
            </div>
            <div class="form-group">
              <label>phone</label>
              <input type="text" class="form-control" placeholder="Phone" name="phone" required="required">
            </div>
            <div class="form-group">
              <label>addressLine1</label>
              <input type="text" class="form-control" placeholder="Address Line 1 " name="addressLine1" required="required">
            </div>
            <div class="form-group">
              <label>addressLine2</label>
              <input type="text" class="form-control" placeholder="Address Line 2  " name="addressLine2" required="required">
            </div>
            <div class="form-group">
              <label>city</label>
              <input type="text" class="form-control" placeholder="City" name="city" required="required">
            </div>
            <div class="form-group">
              <label>state</label>
              <input type="text" class="form-control" placeholder="State" name="state" required="required">
            </div>
            <div class="form-group">
              <label>postalCode</label>
              <input type="text" class="form-control" placeholder="Postal Code" name="postalCode" required="required">
            </div>
            <div class="form-group">
              <label>country</label>
              <input type="text" class="form-control" placeholder="Country  " name="country" required="required">
            </div>
            <div class="form-group">
              <label>salesRepEmployeeNumber</label>
              <input type="text" class="form-control" placeholder="Sales Rep Employee Number" name="salesRepEmployeeNumber" required="required">
            </div>
            <div class="form-group">
              <label>creditLimit</label>
              <input type="text" class="form-control" placeholder="Credit Limit" name="creditLimit" required="required">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </main>
      </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
  </body>
</html>