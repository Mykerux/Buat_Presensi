<?php
  $aksi = isset($_GET['aksi'])?$_GET['aksi']:"";
  $id = isset($_GET['id'])?$_GET['id']:"";
  if($aksi=="hapus"){
    $query = "delete from tb_kelas where id_kelas = $id";
    $hapus = $koneksi->query($query);
    if($hapus){
      ?>
<script>
alert('hapus berhasil');
location.href = '?hal=kelas';
</script>
<?php
    }
  }
?>
<div class="table">
   <div class="card-header">
      <h3>Data Kelas</h3>
      <a href="?hal=fkelas" class="btn btn-warning">Tambah Data</a>
   </div>
   <div class="card-body">
      <table class="table table-stripped table-bordered">
         <tr>
            <th>No</th>
            <th>Id Kelas</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Wali Kelas</th>
            <th>Ganti</th>
         </tr>
         <?php
    $query = "select * from tb_kelas";
    $hasil = $koneksi->query("select * from tb_kelas");
    $no = 0;
    while($row = $hasil->fetch_assoc()){
      $no++;
      ?>
         <tr>
            <td><?=$no?></td>
            <td><?=$row['id_kelas']?></td>
            <td><?=$row['nama_kelas']?></td>
            <td><?=$row['jurusan']?></td>
            <td><?=$row['wali_kelas']?></td>
            <td>
               <a href="?hal=edit_kelas&aksi=edit&id=<?=$row['id_kelas']?>" class="btn btn-warning">Edit</a>
               <a href="?hal=kelas&aksi=hapus&id=<?=$row['id_kelas']?>" class="btn btn-danger"
                  onclick="return confirm('Yakin mau kamu hapus kidz');">Hapus</a>
            </td>
         </tr>
         <?php
      }
      ?>

      </table>
   </div>
</div>