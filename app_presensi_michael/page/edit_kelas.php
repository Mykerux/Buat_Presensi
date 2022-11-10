<?php
   $nama_kelas = "";
   $jurusan = "";
   $wali_kelas = "";
   $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
   $id = isset($_GET['id'])?$_GET['id']:"";
   if($aksi=="edit"){
      $query = "select * from tb_kelas where id_kelas=$id";
      $hasil = $koneksi->query($query);
      if($hasil->num_rows > 0){
         $row = $hasil->fetch_assoc();
         $nama_kelas = $row['nama_kelas'];
         $jurusan = $row['jurusan'];
         $wali_kelas = $row['wali_kelas'];
      }
   }else if($aksi=='update'){
      extract($_POST);
      $query = "update tb_kelas set nama_kelas ='$nama_kelas', jurusan ='$jurusan', wali_kelas ='$wali_kelas'";
      $update = $koneksi->query($query);
      if($update){
         ?>
<script>
alert('update berhasil');
location.href = '?hal=kelas';
</script>
<?php
      }
   }
?>
<div class="tabel_kelas">
   <div class="card-header bg-secondry">
      <h3>Perbarui Data</h3>
      <a href="?hal=kelas" class="btn btn-success">Lihat Data</a>
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
               <option value="OTKP">Otomatisasi Dan Tata Kelola Perkantoran</option>
               <option value="AKL">Akutansi dan Keuangan lembaga</option>
               <option value="BDP">Bisnis Daring Dan pemasaran</option>
               <option value="MM">Multimedia</option>
               <option value="RPL">Rekayasa Perangkat Lunak</option>
            </select>
         </div>
         <div class="form-group">
            <label for="wali_kelas">Wali Kelas</label>
            <input type="text" name="wali_kelas" class="form-control">
         </div>
         <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-warning">Simpan</button>
            <button type="reset" class="btn btn-danger">reset</button>
         </div>
      </form>
   </div>
</div>