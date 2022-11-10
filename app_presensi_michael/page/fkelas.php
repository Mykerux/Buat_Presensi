<?php
   $aksi = isset($_GET[ 'aksi'])?$_GET['aksi']:"";
   if($aksi == "simpan"){
      extract($_POST);
      $query = "insert into tb_kelas values('','$nama_kelas','$jurusan','$wali_kelas')";
      $simpan = $koneksi->query($query);
      if($simpan){
         echo "<script>alert('data tersimpan');</script>";
         echo "<script>location.href='?hal=kelas'</script>";
      }else{
         echo "<script>alert('data gagal tersimpan');</script>";
         echo "<script>location.href='?hal=kelas'</script>";
      }
   }
?>

<div class="tabel_siswa">
   <div class="card-header bg-secondary">
      <h3>Input data siswa</h3>
      <a href="?hal=kelas" class="btn btn-warning">Lihat data</a>
   </div>
   <div class="card-body">
      <form action="?hal=fkelas&aksi=simpan" method="post">
         <div class="form-group">
            <label for="nama_kelas">Kelas</label>
            <input type="text" name="nama_kelas" class="form-control">
         </div>
         <div class="form-group">
            <label for="id_kelas">Jurusan</label>
            <select name="jurusan" class="form-control" required>
               <option value=""> ==== PILIH JURUSAN ===== </option>
               <option value="1">Otomatisasi Dan Tata Kelola Perkantoran</option>
               <option value="2">Akutansi dan Keuangan lembaga</option>
               <option value="3">Bisnis Daring Dan pemasaran</option>
               <option value="4">Multimedia</option>
               <option value="5">Rekayasa Perangkat Lunak</option>
            </select>
         </div>
         <div class="form-group">
            <label for="wali_kelas">Wali Kelas</label>
            <input type="text" name="wali_kelas" class="form-control">
         </div>
         <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-danger">reset</button>
         </div>
      </form>
   </div>
</div>