<div class="container pt-5">
    <a href="<?= base_url('barang/tambah');?>" class="btn btn-success mb-2">Tambah Data</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Data Barang</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Nama Customer</th>
                            <th>No Hp</th>
                            <th>Alamat</th>
                            <th>Nama Barang</th>
                            <th>Jumlah Barang</th>
                            <th>Harga Barang</th>
                            <th>Total Harga Barang</th>
                            <th>Aksi</th>
                        </tr> 
                    </thead>
                    <tbody>
                        
                        <?php $no=1; foreach($getBarang as $isi){?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['namacustomer'];?></td>
                                <td><?= $isi['namacustomer'];?></td>
                                <td><?= $isi['nohp'];?></td>
                                <td><?= $isi['alamat'];?></td>
                                <td><?= $isi['nama_barang'];?></td>
                                <td><?= $isi['jumlahbarang'];?></td>
                                <td>Rp <?= number_format($isi['hargabarang']);?>,-</td>
                                <td>Rp <?= number_format($isi['jumlahbarang']*$isi['hargabarang']);?>,-</td>
                                <td>
                                    <a href="<?= base_url('barang/edit/'.$isi['id_barang']);?>" 
                                    class="btn btn-success">
                                    Edit</a>
                                    <a href="<?= base_url('barang/hapus/'.$isi['id_barang']);?>" 
                                    onclick="javascript:return confirm('Apakah ingin menghapus data barang ?')"
                                    class="btn btn-danger">
                                    Hapus</a>

                                </td>
                            </tr>
                        <?php $no++;}?>
                    </tbody>  

                </table>
            </div>
        </div>
    </div>
</div>