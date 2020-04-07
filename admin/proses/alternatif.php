<?php 
ob_start();
include('../../config/koneksi.php');
include('../../config/function.php');

if(isset($_POST['action']) && $_POST['action'] == 'input' )
{
    $nama_alternatif = $_POST['nama_alternatif'];
    $desc = $_POST['deskripsi'];
    $seri = $_POST['seri'];      
    $merk = $_POST['merk'];        
    $id_kriteria = $_POST['id_kriteria'];
    $bobot = $_POST['bobot'];

    $foto = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];  

    $query = "INSERT INTO alternatif(nama_alternatif, merk, seri_produk, foto, deskripsi)
                 VALUES('$nama_alternatif', '$merk', '$seri', '$foto', '$desc')";

    $insert = mysqli_query($konek, $query) or die(mysqli_error($konek));

    $alternatif = mysqli_query($konek, "SELECT id_alternatif FROM alternatif ORDER BY id_alternatif DESC limit 1");
    $alt = mysqli_fetch_assoc($alternatif); $lastIdAlternatif = $alt['id_alternatif'];    

    foreach($id_kriteria as $index=>$id )    
    {   $nilai = $bobot[$index];
        $qInsertNilai =  "INSERT INTO nilai_kriteria_kamera(id_kriteria, id_alternatif, nilai) VALUES('$id', '$lastIdAlternatif','$nilai')";
        mysqli_query($konek, $qInsertNilai);
    }

    if($insert) 
    {
        move_uploaded_file($file_tmp, '../input/gambar/'.$foto);
    }else{
        mysqli_error($konek);
    }    
    header("Location: ../kamera.php?success=1");  
}
elseif(isset($_POST['action']) && $_POST['action'] == 'update')
{
    $nama_alternatif = $_POST['nama_alternatif'];
    $desc = $_POST['deskripsi'];
    $seri = $_POST['seri'];      
    $merk = $_POST['merk'];        
    $id_kriteria = $_POST['id_kriteria'];
    $bobot = $_POST['bobot'];
    $id_nilai = $_POST['id_nilai'];

    $foto = $_FILES['gambar']['name'];
    $file_tmp = $_FILES['gambar']['tmp_name'];  
    
    $idAlternatif = $_POST['id_alternatif'];
    // $desc = $_POST['deskripsi'];
    // $seri = $_POST['seri'];
    // // $jns_produk = $_POST['jns_produk'];
    // $id_merk = $_POST['merk'];
    // $bobot = $_POST['bobot'];
    // $id_nilai = $_POST['id_nilai'];
    

    $qGetAlternatif = mysqli_query($konek,"SELECT * FROM alternatif WHERE id_alternatif='$idAlternatif' ");
    $alt = mysqli_fetch_assoc($qGetAlternatif);

    if(!empty($_FILES['gambar']['name']))
    {
        $foto = $_FILES['gambar']['name'];
        $file_tmp = $_FILES['gambar']['tmp_name'];
        unlink('../input/gambar/'.$alt['foto']);
    }else{
        $foto = $alt['foto'];
    }        

    $query = "UPDATE alternatif SET nama_alternatif='$nama_alternatif',
                                    deskripsi='$desc',
                                    seri_produk='$seri',
                                    merk='$merk', 
                                    foto='$foto' WHERE id_alternatif='$idAlternatif' ";

    $insert = mysqli_query($konek, $query) or die(mysqli_error($konek));

    // foreach($id_kriteria as $index=>$id )    
    // {   $nilai = $bobot[$index];
    //     $qInsertNilai =  "INSERT INTO nilai_kriteria_kamera(id_kriteria, id_alternatif, nilai) VALUES('$id', '$lastIdAlternatif','$nilai')";
    //     mysqli_query($konek, $qInsertNilai);
    // }

    foreach($id_nilai as $index=>$id )    
    {   
        $nilai = $bobot[$index];
        $cekIdNilai = "SELECT * FROM nilai_kriteria_kamera where id_nilai='$id' ";
        $qCek = mysqli_query($konek, $cekIdNilai); $cek = mysqli_num_rows($qCek);

        if($cek > 0 )
        {
            $qInsertNilai =  "UPDATE nilai_kriteria_kamera SET nilai='$nilai' WHERE id_nilai = '$id' ";
            mysqli_query($konek, $qInsertNilai);
        }else{
            $idKriteria = $_POST['id_kriteria'][$index];
            echo $qInsertNilai =  "INSERT nilai_kriteria_kamera (nilai, id_kriteria, id_alternatif) VALUES('$nilai','$idKriteria','$idAlternatif') ";
            mysqli_query($konek, $qInsertNilai);
        } 
    }

    if($insert) 
    {

        if(!empty($_FILES['gambar']['name'])) move_uploaded_file($file_tmp, '../input/gambar/'.$foto);

    }else{
        mysqli_error($konek);
    }    
    header("Location: ../kamera.php?success=2");  

}
elseif(isset($_GET['action']) && $_GET['action'] == 'delete')
{
    $idAlternatif = $_GET['id'];
    $deleteAlternatif = mysqli_query($konek, "DELETE FROM alternatif WHERE id_alternatif='$idAlternatif' ");

    header("Location: ../kamera.php?success=3");  
}


?>