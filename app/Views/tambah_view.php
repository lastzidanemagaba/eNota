<div class="container p-5">
    <a href="<?= base_url('barang');?>" class="btn btn-secondary mb-2">Kembali</a>
    <div class="card">
        <div class="card-header bg-info text-white">
            <h4 class="card-title">Tambah Data</h4>
        </div>
        <div class="card-body">
        <div class="container">
		<form action="upload.php" enctype="multipart/form-data" class="dropzone" id="image-upload">
            <center><h3>Drag And Drop Gambar Dari Whatsapp</h3></center>
      </form>
     
            <form method="post" action="<?= base_url('barang/add');?>">
                <br>
                <h4>Data Isian</h4>
                <hr>
                <div class="form-group">
                    <label for="">Nama Customer</label>
                    <input type="text" name="namacustomer" class="form-control basicAutoComplete" id="namacustomer" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">No Hp</label>
                    <input type="number" name="nohp" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Jumlah Barang</label>
                    <input type="number" name="jumlahbarang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Harga Barang</label>
                    <input type="number" name="hargabarang" class="form-control" required>
                </div>
                <h4>DP Barang</h4>
                <hr>
                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="number" name="hargabarang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Via</label>
                    <input type="number" name="hargabarang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tgl</label>
                    <input type="text" name="dob" id="dob" class="form-control" required>
                </div>
                <h4>Ongkir</h4>
                <hr>
                <div class="form-group">
                    <label for="">Nom</label>
                    <input type="number" name="hargabarang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Via</label>
                    <input type="number" name="hargabarang" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Tgl</label>
                    <input type="text" name="dobx" id="dobx" class="form-control" required>
                </div>
                <button class="btn btn-success">Tambah Data</button>
            </form>
            
        </div>
    </div>
</div>

