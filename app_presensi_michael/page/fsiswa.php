<?php
   $aksi = isset($_GET[ 'aksi'])?$_GET['aksi']:"";
   if($aksi == "simpan"){
      extract($_POST);
      $query = "insert into tb_siswa values('','$nama_siswa','$nis','$alamat','$jk','$id_kelas')";
      $simpan = $koneksi->query($query);
      if($simpan){
         echo "<script>alert('data tersimpan');</script>";
         echo "<script>location.href='?hal=siswa'</script>";
      }else{
         echo "<script>alert('data gagal tersimpan');</script>";
         echo "<script>location.href='?hal=siswa'</script>";
      }
   }
?>
<div class="tabel_siswa">
   <div class="card-header bg-secondary">
      <h3>Input data siswa</h3>
      <a href="?hal=siswa" class="btn btn-warning">Lihat data</a>
   </div>
   <div class="card-body">
      <form action="?hal=fsiswa&aksi=simpan" method="post">
         <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" name="nama_siswa" class="form-control">
         </div>
         <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" name="nis" class="form-control">
         </div>
         <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control">
         </div>
         <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
               <option value=""> ==== PILIH JENIS KELAMIN ===== </option>
               <option value="L">Laki-laki</option>
               <option value="P">Perempuan</option>
            </select>
         </div>
         <div class="form-group">
            <label for="id_kelas">Pilih kelas</label>
            <select name="id_kelas" class="form-control" required>
               <option value=""> ==== PILIH KELAS ===== </option>
               <?php
                  $qkelas = "select * from tb_kelas";
                  $hasilkelas = $koneksi->query($qkelas);
                  while($rowkelas=$hasilkelas->fetch_assoc()){
                     ?>
               <option value="<?=$rowkelas['id_kelas']?>"><?=$rowkelas['nama_kelas']?></option>
               <?php
               }
               ?>
            </select>
         </div>
         <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
            <button type="reset" class="btn btn-danger">reset</button>
         </div>
      </form>
   </div>
</div>