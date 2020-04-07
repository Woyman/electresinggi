<?php 
include('config/koneksi.php');

include('config/function.php');
include('admin/proses/electre.php');

$qGetDataKriteria = mysqli_query($konek, "SELECT * FROM kriteria_kamera");



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

    <title><?php echo 'Perhitungan '.ucfirst(getURL($_SERVER['REQUEST_URI']))  ?></title>
  </head>
  <body>
    
    <!-- <div class="container"> -->

   <?php include('navbar.php'); ?> 
      
    <div class="container"> 
        <nav aria-label="breadcrumb" >
            <ol class="breadcrumb" style="background-color: unset;">
                <li class="breadcrumb-item active" aria-current="page"><?php echo 'Perhitungan '.ucfirst(getURL($_SERVER['REQUEST_URI']))  ?></li>
            </ol>
        </nav>        

        
          <div class="" id="home" aria-labelledby="home-tab">
            <?php 
              $electre = new electre;
              $electre->setKonek($konek);
              $electre->setJenis('kamera');
              // $m_X = $electre->matrixX();      
              $Allkriteria = $electre->getAllKriteria();
            ?>
            <div class="row">
              
              <div class="col-6 mt-3">
                  <h4>Nilai Bobot</h4>     
                  <p>Masukkan nilai bobot tiap kriteria untuk perhitungan electre</p>
                  <form action="hitung_electre.php" method="post">
                    <input type="hidden" value="kamera" name="jenis" >
                    <?php  
                      foreach($Allkriteria as $kri )
                      {
                    ?>
                      <div class="form-group">
                        <label for="idK<?= $kri['id_kriteria'] ?>"><?= $kri['nama_kriteria'] ?> <input type="checkbox" class="check" data-id="<?= $kri['id_kriteria'] ?>" > </label>
                          <input type="hidden" name="id_kriteria[]" value="<?= $kri['id_kriteria'] ?>" id="k<?= $kri['id_kriteria'] ?>" disabled required>                          
                          <input type="number" min='1' max='5' name="nilaiKriteria[]" id="idK<?= $kri['id_kriteria'] ?>" class="form-control" required disabled>  
                      </div>
                    <?php 
                      }
                    ?>

                      <div class="form-group">
                        <button class="btn btn-primary">Hitung</button>
                      </div>
                  </form>
                  <pre>
                  
              </div>
            </div>
                                  
          </div>                  
                        
        </div>
    </div>    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $( document ).ready(function() {
      
      $('.check').change(function(){
        var id = $(this).attr('data-id')

        if ($(this).is(':checked')) 
        {          
          $('#idK'+id).removeAttr('disabled');
          $('#k'+id).removeAttr('disabled');
        }else{
          $('#idK'+id).attr('disabled', true);
          $('#k'+id).attr('disabled', true);
        }

      });

    });
  </script>
  

  </body>
</html>