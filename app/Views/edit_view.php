<div class="container p-5">
    <a href="<?= base_url('barang');?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Edit Barang : <?= $barang->nama_barang;?></h4>
        </div>
        <div class="card-body">
            <form method="post" action="<?= base_url('barang/update');?>">
                <div class="form-group">
                    <label for="">Nama Customer</label>
                    <input type="text" value="<?= $barang->namacustomer;?>" name="namacustomer" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">No Hp</label>
                    <input type="number" value="<?= $barang->nohp;?>" name="nohp" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" value="<?= $barang->alamat;?>" name="alamat" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" value="<?= $barang->nama_barang;?>" name="nama_barang" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Barang</label>
                    <input type="number" value="<?= $barang->jumlahbarang;?>" name="jumlahbarang" required class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Harga Barang</label>
                    <input type="number" value="<?= $barang->hargabarang;?>" name="hargabarang" required class="form-control">
                </div>
                <button class="btn btn-success">Edit Data</button>
            </form>
            
        </div>
    </div>
</div>