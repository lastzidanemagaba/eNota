<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Barang_model;

class Barang extends Controller
{
    public function index()
    {
        $model = new Barang_model;
        $data['title']     = 'Data Barang';
        $data['getBarang'] = $model->getBarang();
        echo view('header_view', $data);
        echo view('barang_view', $data);
        echo view('footer_view', $data);
    }

    public function tambah()
    {
        $data['title']     = 'Tambah Data Barang';
        echo view('header_view', $data);
        echo view('tambah_view', $data);
        echo view('footer_view', $data);
    }

    public function add()
    {
        $model = new Barang_model;
        $data = array(
            'namacustomer' => $this->request->getPost('namacustomer'),
            'nohp'         => $this->request->getPost('nohp'),
            'alamat'  => $this->request->getPost('alamat'),
            'nama_barang'  => $this->request->getPost('nama_barang'),
            'jumlahbarang'  => $this->request->getPost('jumlahbarang'),
            'hargabarang'  => $this->request->getPost('hargabarang')

        );
        $model->saveBarang($data);
        echo '<script>
                alert("Sukses Tambah Data Barang");
                window.location="'.base_url('barang').'"
            </script>';

    }

    public function edit($id)
    {
        $model = new Barang_model;
        $getBarang = $model->getBarang($id)->getRow();
        if(isset($getBarang))
        {
            $data['barang'] = $getBarang;
            $data['title']  = 'Edit '.$getBarang->nama_barang;

            echo view('header_view', $data);
            echo view('edit_view', $data);
            echo view('footer_view', $data);

        }else{

            echo '<script>
                    alert("ID barang '.$id.' Tidak ditemukan");
                    window.location="'.base_url('barang').'"
                </script>';
        }
    }

    public function update()
    {
        $model = new Barang_model;
        $id = $this->request->getPost('id_barang');
        $data = array(
            'namacustomer' => $this->request->getPost('namacustomer'),
            'nohp'         => $this->request->getPost('nohp'),
            'alamat'  => $this->request->getPost('alamat'),
            'nama_barang'  => $this->request->getPost('nama_barang'),
            'jumlahbarang'  => $this->request->getPost('jumlahbarang'),
            'hargabarang'  => $this->request->getPost('hargabarang')
        );
        $model->editBarang($data,$id);
        echo '<script>
                alert("Sukses Edit Data Barang");
                window.location="'.base_url('barang').'"
            </script>';
    }

    public function hapus($id)
    {
        $model = new Barang_model;
        $getBarang = $model->getBarang($id)->getRow();
        if(isset($getBarang))
        {
            $model->hapusBarang($id);
            echo '<script>
                    alert("Hapus Data Barang Sukses");
                    window.location="'.base_url('barang').'"
                </script>';

        }else{

            echo '<script>
                    alert("Hapus Gagal !, ID barang '.$id.' Tidak ditemukan");
                    window.location="'.base_url('barang').'"
                </script>';
        }
    }

    function get_autocomplete(){
            $model = new Barang_model;
		    $result = $model->getBarang();
		   	if (count($result) > 0) {
		    foreach ($result as $row)
		     	$arr_result[] = array(
					'label'			=> $row['namacustomer'],
				);
		     	echo json_encode($arr_result);
		   	}
               
	}

    

}