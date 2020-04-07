<?php 
include('../config/session.php');
include('../config/function.php');
include('../config/koneksi.php');

$qGetDataKriteria = mysqli_query($konek, "SELECT * FROM kriteria_kamera");

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $qGetKriteria = mysqli_query($konek, "SELECT * FROM kriteria_kamera WHERE id_kriteria = '$id' ");
    $data = mysqli_fetch_assoc($qGetKriteria);

}

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
                <li class="breadcrumb-item" aria-current="page">Kriteria</li>                                
            </ol>            
        </nav>
        
        <?php 
            if( isset($_GET['success']) && $_GET['success'] == '1' )
            { ?>
                
                <div class="alert alert-success animated fadeOut delay-4s" role="alert">
                    Data berhasil ditambahkan.
                </div>

        <?php }elseif(isset($_GET['success']) && $_GET['success'] == '2'){ ?>

                <div class="alert alert-warning animated fadeOut delay-4s" role="alert">
                    Data berhasil dihapus.
                </div>
        <?php }elseif(isset($_GET['success']) && $_GET['success'] == '3'){ ?>

                <div class="alert alert-info animated fadeOut delay-4s" role="alert">
                    Data berhasil diedit.
                </div>
        <?php } ?>

        <div class="row">

            <div class="col-6">
                 <div class="card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Kriteria Kamera</th>  
                                <th></th>                      
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $no = 1;
                            while($k = mysqli_fetch_assoc($qGetDataKriteria))
                            {
                        ?>                                            
                            <tr>
                                <th scope="row"><?= $no; ?></th>
                                <td><?= $k['nama_kriteria'] ?></td>                            
                                <td> 
                                    <a href="kriteria_kamera.php?id=<?= $k['id_kriteria'] ?>" class="btn btn-warning btn-sm "> Detail </a>
                                    <a href="#" data-id="<?= $k['id_kriteria'] ?>" class="btn btn-warning btn-sm delete"> Hapus </a>
                                </td>
                            </tr>                        
                        <?php  $no++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-6">
            <h4 class="pb-3"><?php if(isset($id)) echo 'Edit'; else echo 'Tambah';  ?> Kriteria Kamera <?php if(isset($id)){ echo $data['nama_kriteria']?> 
            <a href="kriteria_kamera.php" class="btn btn-sm btn-secondary float-right"><< Kembali</a><?php }  ?> </h4>
            <form action="proses/kriteria.php" method="post" enctype="multipart/form-data">

            <?php if(isset($id)){   ?>
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="id" value="<?= $data['id_kriteria'] ?>">

            <?php }else{ ?>
                <input type="hidden" name="action" value="input">
            <?php } ?> 
                    
                    <div class="form-group">
                        <label for="merk">Nama Kriteria</label>
                        <?php if(isset($id)){   ?>
                            <input type="text" class="form-control" name="nama_kriteria" value="<?= $data['nama_kriteria'] ?>">
                        <?php }else{ ?>
                            <input type="text" class="form-control" name="nama_kriteria">
                        <?php } ?>
                    </div>    
                    
                    <div class="form-group">
                        <label for="nilai_1">Nilai 1 </label>
                         <?php if(isset($id)){   ?>
                            <input type="text"  class="form-control" name="nilai_1" value="<?= $data['nilai_1'] ?>">
                        <?php }else{ ?>
                            <input type="text"  class="form-control" name="nilai_1">
                        <?php } ?>                       
                    </div>    

                       <div class="form-group">
                        <label for="nilai_2">Nilai 2 </label>
                         <?php if(isset($id)){   ?>
                            <input type="text"  class="form-control" name="nilai_2" value="<?= $data['nilai_2'] ?>">
                        <?php }else{ ?>
                            <input type="text"  class="form-control" name="nilai_2">
                        <?php } ?>  
                    </div>    

                    <div class="form-group">
                        <label for="nilai_3">Nilai 3 </label>
                         <?php if(isset($id)){   ?>
                            <input type="text"  class="form-control" name="nilai_3" value="<?= $data['nilai_3'] ?>">
                        <?php }else{ ?>
                            <input type="text"  class="form-control" name="nilai_3">
                        <?php } ?>  
                    </div>    

                    <div class="form-group">
                        <label for="nilai_4">Nilai 4 </label>
                        <?php if(isset($id)){   ?>
                            <input type="text"  class="form-control" name="nilai_4" value="<?= $data['nilai_4'] ?>">
                        <?php }else{ ?>
                            <input type="text"  class="form-control" name="nilai_4">
                        <?php } ?>  
                    </div>    

                    <div class="form-group">
                        <label for="nilai_5">Nilai 5 </label>
                         <?php if(isset($id)){   ?>
                            <input type="text"  class="form-control" name="nilai_5" value="<?= $data['nilai_5'] ?>">
                        <?php }else{ ?>
                            <input type="text"  class="form-control" name="nilai_5">
                        <?php } ?>  
                    </div>    


                    <div class="form-group">
                       <button class="btn btn-primary col-3">Submit</button>
                    </div>
                </form>
            </div>                
        </div>


    </div>


  
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

      <script>

$( document ).ready(function() {
    
    $('.delete').click(function(){

      if(confirm('Anda yakin ingin menghapus kriteria ini?'))
      {
          var id = $(this).attr('data-id');
        //   alert(id);
         window.location = "proses/kriteria.php?action=delete&id="+id;
      }

    });

});

    </script>

  </body>
</html>