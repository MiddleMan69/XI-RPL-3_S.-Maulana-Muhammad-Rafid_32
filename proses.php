<?php
    include'koneksi.php';

    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){

            $judul = $_POST['judul_buku'];
            $penulis = $_POST['penulis'];
            $jenis = $_POST['jenis_buku'];
            $sampul = $_FILES['gambar_buku']['name'];

            $dir = "img/";
            $tmpFile = $_FILES['gambar_buku']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$sampul);

            $query = "INSERT INTO tb_buku VALUES(null, '$judul', '$penulis', '$jenis', '$sampul')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");
            } else {
                echo $query;
            }
        } else if($_POST['aksi'] == "edit"){
            echo "Edit Data <a href='index.php'>[Home]</a>";
            //var_dump($_POST)

            $id_buku = $_POST['id_buku'];
            $judul = $_POST['judul_buku'];
            $penulis = $_POST['penulis'];
            $jenis = $_POST['jenis_buku'];

            $showQuery = "SELECT * FROM tb_buku WHERE id_buku = '$id_buku';";
            $sqlShow = mysqli_query($conn, $showQuery);
            $result = mysqli_fetch_assoc($sqlShow);

            if($_FILES['gambar_buku']['name'] == "") {
                $foto = $result['gambar_buku'];
            } else {
                $foto = $_FILES['gambar_buku']['name'];
                unlink("img/".$result['gambar_buku']);
                move_uploaded_file($_FILES['gambar_buku']['tmp_name'], 'img/'.$_FILES['gambar_buku']['name']);
            }

            $queryy = "UPDATE tb_buku SET judul_buku='$judul', penulis='$penulis', jenis_buku='$jenis', gambar_buku='$foto' WHERE id_buku='$id_buku';";

            $sql = mysqli_query($conn, $queryy);
        }
            
    }
    if(isset($_GET['hapus'])){
        $id_buku = $_GET['hapus'];

        $showQuery = "SELECT * FROM tb_buku WHERE id_buku = '$id_buku';";
        $sqlShow = mysqli_query($conn, $showQuery);
        $result = mysqli_fetch_assoc($sqlShow);

        unlink("img/".$result['gambar_buku']);

        $query = "DELETE FROM tb_buku WHERE id_buku = '$id_buku';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: index.php");
        } else {
            echo $query;
        }
    }
?>