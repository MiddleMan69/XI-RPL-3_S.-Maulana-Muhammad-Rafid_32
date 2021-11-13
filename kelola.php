<!DOCTYPE html>

<?php
    include'koneksi.php';

    $id_buku = '';
    $judul = '';
    $penulis = '';
    $jenis = '';

    if(isset($_GET['ubah'])){
        $id_buku = $_GET['ubah'];

        $query = "SELECT * FROM tb_buku WHERE id_buku = '$id_buku';";
        $sql = mysqli_query($conn, $query);

        $result = mysqli_fetch_assoc($sql);

        $judul = $result['judul_buku'];
        $penulis = $result['penulis'];
        $jenis = $result['jenis_buku'];
    }
?>

<html lang="en">
<head>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    
    <!--Font Awsome-->
    <link rel="stylesheet" href="fontawsm/css/font-awesome.min.css">

    <title>INDEX</title>
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
        PHP 02
        </a>
    </div>
    </nav>

    <div class="container">
        <form method="POST" action="proses.php" enctype="multipart/form-data">
            <input type="hidden" value="<?php echo $id_buku; ?>" name="id_buku">
                <div class="mb-3 row">
                <label for="Judul" class="col-sm-2 col-form-label">Judul Buku</label>
                <div class="col-sm-10">
                    <input required type="text" name="judul_buku" class="form-control" id="Judul" value="<?php echo $judul; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                <div class="col-sm-10">
                    <input required type="text" name="penulis" class="form-control" id="penulis" value="<?php echo $penulis; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Jenis" class="col-sm-2 col-form-label">Jenis Buku</label>
                <div class="col-sm-10">
                    <select required id="Jenis" name="jenis_buku" class="form-select">
                        <option value="Novel">Novel</option>
                        <option value="Cergam">Cergam</option>
                        <option value="Komik">Komik</option>
                        <option value="Ensiklopedi">Ensiklopedi</option>
                        <option value="Nomik">Nomik</option>
                        <option value="Dongeng">Dongeng</option>
                        <option value="Biografi">Biografi</option>
                        <option value="Catatan_Harian">Catatan Harian</option>
                        <option value="Fotografi">Fotografi</option>
                        <option value="Karya_Ilmiah">Karya Ilmiah</option>
                        <option value="Tafsir">Tafsir</option>
                        <option value="Kamus">Kamus</option>
                        <option value="Panduan">Panduan</option>
                        <option value="Majalah">Majalah</option>
                        <option value="Atlas">Atlas</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="Judul" class="col-sm-2 col-form-label">Sampul Buku</label>
                <div class="col-sm-10">
                    <input <?php if(!isset($_GET['ubah'])){echo "required";} ?> class="form-control" type="file" name="gambar_buku" id="foto" accept="image/*">    
                </div>
            </div>
            <div class="mb-3 row mt-4">
                <div class="col">
                    <?php
                        if(isset($_GET['ubah'])){
                    ?>
                        <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Simpan Perubahan
                        </button>
                    <?php 
                        } else {
                    ?>   
                        <button type="submit" name="aksi" value="add" class="btn btn-primary">
                            <i class="fa fa-floppy-o" aria-hidden="true"></i>
                            Tambahkan
                        </button>
                    <?php
                        }
                    ?>
                    <a href="index.php" type="button" class="btn btn-danger">
                        <i class="fa fa-step-backward" aria-hidden="true"></i>
                        Batal
                    </button>
                </div>
        </form>
        
            
        </div>
    </div>
</body>
</html>