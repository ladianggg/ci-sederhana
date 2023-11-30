 <a href=" <?php echo base_url('anggota/tambah'); ?> " > Tambah Anggota Baru </a>
 <table> 
    <th>Anggota</th>
    <th>Alamat</th>
    <th>Ubah</th>
    <th>Hapus</th>
    <?php foreach ($anggota as $a):?>

    <tr>
        <td><?php echo $a['anggota']?></td>
        <td><?php echo $a['alamat']?></td>
        <td><a href=" <?php echo site_url('anggota/get_edit/'.$a['idanggota']); ?> " >Ubah</a>
</td>
<td><a href=" <?php echo site_url('anggota/hapus/'.$a['idanggota']); ?> " >Hapus</a>
</td>
    </tr>
    <?php endforeach ?>


 </table>