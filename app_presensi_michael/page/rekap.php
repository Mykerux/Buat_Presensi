<div class="card-header">
   <h3>Rekap Presensi</h3>
</div>
<div class="card-body">
   <form action="?hal=rekap&aksi=proses" method="post">
      <div class="card-body">
         <label for="">Pilih Kelas</label>
         <select name="kelas" id="" class="form-control" required>
            <option value="">==Pilih Kelas==</option>
            <?php
            $query = "select * from tb_kelas order by nama_kelas asc";
            $hasil = $koneksi->query($query);
            while($row = $hasil->fetch_assoc()){
               ?>
            <option value="<?=$row['id_kelas']?>"><?=$row['nama_kelas']?></option>
            <?php
            }
         ?>
         </select>
      </div>
</div>
<div class="card-footer">
   <button type="submit" name="kirim" value="kirim" class="btn btn-primary">Proses</button>
</div>
<div class="card-body">
   <table class="table table-striped table-bordened">
      <tr>
         <td>No</td>
         <td>Nama Siswa</td>
         <td>Sakit</td>
         <td>Ijin</td>
         <td>Alpha</td>
      </tr>
      <?php
         $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
         if($aksi=="proses"){
            if(isset($_POST['kirim'])){
               extract($_POST);
               $cari = "select * from tb_siswa where id_kelas=".$kelas;
               $hkelas = $koneksi->query($cari);
               $no = 0;
               while($rowsiswa = $hkelas->fetch_assoc()){
                  $no++;
                  $ceks = "select * from tb_presensi where id_siswa=".$rowsiswa['id_siswa']." and kehadiran='S'";
                  $hasils = $koneksi->query($ceks);
                  $sakit = $hasils->num_rows;
                  $cekI = "select * from tb_presensi where id_siswa=".$rowsiswa['id_siswa']." and upper(kehadiran)='I'";
                  $hasilI = $koneksi->query($cekI);
                  $izin = $hasilI->num_rows;
?>
      <tr>
         <td><?=$no?></td>
         <td><?=$rowsiswa['nama_siswa']?></td>
         <td><?=$sakit?></td>
         <td><?=$izin?></td>
         <td></td>
      </tr>
      <?php
      }
      }
      }
      ?>
   </table>
</div>
</form>