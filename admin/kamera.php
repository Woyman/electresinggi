<?php 
include('../config/session.php');
include('../config/function.php');
include('../config/koneksi.php');

$qGetDataAlternatifKamera = mysqli_query($konek, "SELECT * FROM alternatif ORDER BY id_alternatif ASC");

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css"> 

    <title><?php echo ucfirst(getURL($_SERVER['REQUEST_URI']))  ?></title>
  </head>
  <body>
    
    <!-- <div class="container"> -->

   <?php include('navbar.php'); ?> 
      
    <div class="container"> 
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb" style="background-color: unset;">
                <li class="breadcrumb-item active" aria-current="page"><?php echo ucfirst(getURL($_SERVER['REQUEST_URI'])); ?></li>                
            </ol>            
        </nav>


        <div class="row">

      

        <?php  if( isset($_GET['success']) && $_GET['success'] == '1' )
            { ?>
                
                <div class="alert alert-success animated fadeOut delay-4s" role="alert">
                    Data berhasil ditambahkan.
                </div>

        <?php }elseif(isset($_GET['success']) && $_GET['success'] == '2'){ ?>

                <div class="alert alert-success animated fadeOut delay-4s" role="alert">
                    Data berhasil diupdate.
                </div>

            <?php }elseif(isset($_GET['success']) && $_GET['success'] == '3'){ ?>

                <div class="alert alert-info animated fadeOut delay-4s" role="alert">
                    Data berhasil dihapus.
                </div>

            <?php   }elseif(isset($_GET['error']) && $_GET['error'] == '1'){?>

                <div class="alert alert-danger animated fadeOut delay-4s" role="alert">
                    ID alternatif tidak ditemukan.
                </div>

        <?php }?>       
                
            <div class="col-12 ">
                <div class="float-right">
                    <a href="tambahkamera.php" class="btn btn-primary btn-sm my-3"> Tambah Alternatif Baru </a>
                </div>
                

                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#  </th>
                            <th scope="col">Nama Kamera</th>  
                            <th scope="col">Merk</th>
                            <th scope="col">Seri Produk</th>
                            <th> Action </th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php $n = 1; while($alt = mysqli_fetch_assoc($qGetDataAlternatifKamera)){ ?>
                        <tr>
                            <th scope="row"><?= $n ?></th>
                            <td> <?= $alt['nama_alternatif'] ?> </td>                            
                            <td> <?= $alt['merk'] ?> </td>                            
                            <td> <?= $alt['seri_produk'] ?> </td>    
                            <td> 
                                <a href="#" class="btn btn-warning btn-sm delete"  data-id='<?= $alt['id_alternatif'] ?>'>Hapus</a>
                                <a href="edit/alternatif.php?id=<?= $alt['id_alternatif'] ?>" class="btn btn-info btn-sm" >Update</a>
                                <a href="detail/alternatif.php?id=<?= $alt['id_alternatif'] ?>" class="btn btn-primary btn-sm" >View</a>
                            </td>                                    
                        </tr>
                    <?php $n++;  } ?>

                    </tbody>
                </table>
            </div>                  

    </div>


  
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>

$( document ).ready(function() {
    
    $('.delete').click(function(){

      if(confirm('Anda yakin ingin menghapus alternatif ini?'))
      {
          var id = $(this).attr('data-id');
          window.location = "proses/alternatif.php?action=delete&id="+id;
      }

    });

});

    </script>
  </body>
</html>