<?php
  include('db.php'); 
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Book Store</title>
    <style type="text/css">
    @media only screen and (max-width: 600px) {
      .hapus{
        position: relative;
        bottom: -20px;
        
      padding-left: 16px;
  
  padding-right: 16px;


      }
      .tambah{
        position: relative;
        float:left;
        top:30px;
        right:200px;
      }
      
form{
position: relative;
left: 200px;
}
      td{
        font-size: 12px;
    }
 td a{
      font-size: 10px;
    }
    .edit{
      padding-left: 20px;
  
  padding-right: 20px;
    }
}
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: cadetblue;
      }
    table {
      border: solid 1px #DDEEEE;
      border-collapse: collapse;
      border-spacing: 0;
      width: 70%;
      margin: 10px auto 10px auto;
    }
    table thead th {
        background-color: #DDEFEF;
        border: solid 1px #DDEEEE;
        color: #336B6B;
        padding: 10px;
        text-align: left;
        text-shadow: 1px 1px 1px #fff;
        text-decoration: none;
    }
    table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
    }
    a {
          background-color: cadetblue;
          color: #fff;
          padding: 10px;
          text-decoration: none;
          font-size: 12px;
    }
    
    .tambah{
        position: relative;
        float:left;
        margin-left:200px
      }
      form{
        float:right;
        margin-right:200px
      }
      .button{
        padding-bottom:40px
      }
      .button-keluar{
        font-weight: bold;
        font-size: 14px;
        color: white;
        top: 30px;
        position: absolute;
        width: 44px;
        height: 19px;
        right: 80px;
        background: #2F86A6;
        border-radius: 6px;
      }
    </style>
  </head>
  <body>
            <ul>
                <li><a class= "button-keluar" href="keluar.php">Keluar</a></li>
            </ul>

    <center><h1>Daftar Buku</h1><center>
    <div class="button">
    <a href="tambah_buku.php" class ="tambah">+ &nbsp; Tambah</a>
    
    <form action="index.php" method="get">
	<input type="text" name="cari">
	<input type="submit" value="Cari">
</form>
</div>
    <table>
      <thead>
        <tr>
          <th>Gambar</th>
          <th>Judul</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Action</th>
        </tr>
    </thead>
    <tbody>
    
      <?php
     

      $query = "SELECT * FROM buku ORDER BY id ASC";
      $result = mysqli_query($conn, $query);
      if(!$result){
        die ("Query Error: ".mysqli_error($conn).
           " - ".mysqli_error($conn));
      }
      ?>
      <?php
      if(isset($_GET['cari'])) {
          $cari = $_GET['cari'];
          $result = mysqli_query($conn, "SELECT * FROM buku WHERE judul LIKE '%".$cari."%'");				
      } else {
          $result = mysqli_query($conn, $query);
      }
      
      $no = 1; 
      
      while($row = mysqli_fetch_assoc($result))
      {  
      ?>

       <tr>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar']; ?>" style="width: 120px;"></td>
          <td><?php echo $row['judul']; ?></td>
          <td><?php echo $row['pengarang']; ?></td>
          <td><?php echo $row['penerbit']; ?></td>
          <td>
              <a href="edit_buku.php?id=<?php echo $row['id']; ?>" class = "edit"> Edit</a> 
              <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" class = "hapus" onclick="return confirm('Anda yakin akan menghapus buku ini?')">Hapus</a>
          </td>
      </tr>
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
  
</html>