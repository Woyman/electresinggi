<?php 

include('../../config/koneksi.php');

if(isset($_POST['action']) && $_POST['action'] == 'input' )
{
    $nama_kriteria = $_POST['nama_kriteria'];
    $nilai_1 = $_POST['nilai_1'];
    $nilai_2 = $_POST['nilai_2'];
    $nilai_3 = $_POST['nilai_3'];
    $nilai_4 = $_POST['nilai_4'];
    $nilai_5 = $_POST['nilai_5'];

    $q = "INSERT INTO kriteria_kamera (nama_kriteria, nilai_1, nilai_2, nilai_3, nilai_4, nilai_5)
             VALUES ('$nama_kriteria', '$nilai_1', '$nilai_2', '$nilai_3', '$nilai_4', '$nilai_5') ";

    $insertKriteria = mysqli_query($konek, $q);

    // mysqli_error($konek);    
    header('Location: ../kriteria_kamera.php?success=1');  
}

elseif(isset($_POST['action']) && $_POST['action'] == 'edit')
{
    $id = $_POST['id'];
    $nama_kriteria = $_POST['nama_kriteria'];
    $nilai_1 = $_POST['nilai_1'];
    $nilai_2 = $_POST['nilai_2'];
    $nilai_3 = $_POST['nilai_3'];
    $nilai_4 = $_POST['nilai_4'];
    $nilai_5 = $_POST['nilai_5'];
    
   echo  $q = "UPDATE kriteria_kamera SET nama_kriteria='$nama_kriteria', 
                                          nilai_1='$nilai_1',
                                          nilai_2='$nilai_2',
                                          nilai_3='$nilai_3',
                                          nilai_4='$nilai_4',
                                          nilai_5='$nilai_5' WHERE id_kriteria='$id' ";

    $deleteMerk = mysqli_query($konek, $q);

     header('Location: ../kriteria_kamera.php?success=3');  
}

elseif(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $kriteria = $_GET['id'];

    echo $q = "DELETE FROM kriteria_kamera WHERE id_kriteria='$kriteria' ";
    $deleteMerk = mysqli_query($konek, $q);

    header('Location: ../kriteria_kamera.php?success=2');  
}

?>