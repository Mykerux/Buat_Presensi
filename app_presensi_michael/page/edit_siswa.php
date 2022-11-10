<?php
   $nama_siswa = "";
   $nis = "";
   $alamat = "";
   $jk = "";
   $id_kelas = "";
   $id_siswa = "";
   $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
   $id = isset($_GET['id'])?$_GET['id']:"";
   if($aksi=="edit"){
      $query = "select * from tb_siswa where id_siswa=$id";
      $hasil = $koneksi->query($query);
      if($hasil->num_rows > 0){
         $row = $hasil->fetch_assoc();
         $nama_siswa = $row['nama_siswa'];
         $nis = $row['nis'];
         $alamat = $row['alamat'];
         $jk = $row['jk'];
         $id_kelas = $row['id_kelas'];
         $id_siswa = $row['id_siswa'];
      }
   }else if($aksi=='update'){
      extract($_POST);
      $query = "update tb_siswa set nama_siswa ='$nama_siswa', nis ='$nis', alamat ='$alamat', jk ='$jk',  id_kelas ='$id_kelas', where id_siswa ='$id_siswa'";
      $update = $koneksi->query($query);
      if($update){
         ?>
<script>
alert('update berhasil');
location.href = '?hal=siswa';
</script>
<?php
      }
   }
?>
<div class="tabel_siswa">
   <div class="card-header bg-secondry">
      <h3>Perbarui Data</h3>
      <a href="?hal=siswa" class="btn btn-success">Lihat Data</a>
   </div>
   <div class="card-body">
      <form action="?hal=fsiswa&aksi=simpan" method="post">
         <div class="form-group">
            <label for="nama_siswa">Nama Siswa</label>
            <input type="text" value="<?=$nama_siswa?>" name="nama_siswa" class="form-control">
         </div>
         <div class="form-group">
            <label for="nis">NIS</label>
            <input type="text" value="<?=$nis?>" name="nis" class="form-control">
         </div>
         <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" value="<?=$alamat?>" name="alamat" class="form-control">
         </div>
         <div class="form-group">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
               <option value=""> === Pilih Jenis Kelamin === </option>
               <option value="L" <?=$jk=='L' ? 'selected' :''?>>Laki-laki</option>
               <option value="P" <?=$jk=='P' ? 'selected' :''?>>Perempuan</option>
            </select>
         </div>
         <div class="form-group">
            <label for="id_kelas">Kelas</label>
            <select name="id_kelas" class="form-control" required>
               <option value=""> === Pilih Kelas === </option>
               <?php
                  $qkelas = "select * from tb_kelas";
                  $hasilkelas = $koneksi->query($qkelas);
                  while($rowkelas=$hasilkelas->fetch_assoc()){
                     if($rowkelas['id_kelas']==$id_kelas){
                        ?>
               <option value="<?=$rowkelas['id_kelas']?>" selected><?=$rowkelas['nama_kelas']?></option>
               <?php
                  }else{
                  ?>
               <option value="<?=$rowkelas['id_kelas']?>"><?=$rowkelas['nama_kelas']?></option>
               <?php
                     }
                  }
               ?>

            </select>
         </div>

         <div class="form-group">
            <button type="submit" name="simpan" class="btn btn-warning">Simpan</button>
            <button type="reset" class="btn btn-danger">reset</button>
         </div>
      </form>
   </div>
</div>