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
      <form action="" method="post">
            <div class="form-group">
				    <label>Title</label>
				    <input type="text" name="title" class="form-control basicAutoComplete" id="title" placeholder="Title" autocomplete="off">
				 </div>
            </form>
            <form method="post" action="<?= base_url('barang/add');?>">
                <div class="form-group">
                    <label for="">Nama Customer</label>
                    <input type="text" name="namacustomer" class="form-control" required>
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
                <button class="btn btn-success">Tambah Data</button>
            </form>
            
        </div>
    </div>
</div>

