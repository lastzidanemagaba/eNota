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
            'sale_nama' => $this->request->getPost('sale_nama'),
            'sale_hp'         => $this->request->getPost('sale_hp'),
            'sale_alamat'  => $this->request->getPost('sale_alamat'),
            'sale_deskripsi'  => $this->request->getPost('sale_deskripsi'),
            'sale_tgl'  => $this->request->getPost('sale_tgl'),
            'namabarang'  => $this->request->getPost('namabarang'),
            'hargabarang'  => $this->request->getPost('hargabarang'),
            'jumlahbarang'  => $this->request->getPost('jumlahbarang'),
            'sale_dp_nom'  => $this->request->getPost('sale_dp_nom'),
            'sale_dp_via'  => $this->request->getPost('sale_dp_via'),
            'sale_dp_tgl'  => $this->request->getPost('sale_dp_tgl'),
            'sale_kirim_nom'  => $this->request->getPost('sale_kirim_nom'),
            'sale_kirim_via'  => $this->request->getPost('sale_kirim_via'),
            'sale_kirim_tgl'  => $this->request->getPost('sale_kirim_tgl')

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
            'sale_nama' => $this->request->getPost('sale_nama'),
            'sale_hp'         => $this->request->getPost('sale_hp'),
            'sale_alamat'  => $this->request->getPost('sale_alamat'),
            'sale_deskripsi'  => $this->request->getPost('sale_deskripsi'),
            'sale_tgl'  => $this->request->getPost('sale_tgl'),
            'namabarang'  => $this->request->getPost('namabarang'),
            'hargabarang'  => $this->request->getPost('hargabarang'),
            'jumlahbarang'  => $this->request->getPost('jumlahbarang'),
            'sale_dp_nom'  => $this->request->getPost('sale_dp_nom'),
            'sale_dp_via'  => $this->request->getPost('sale_dp_via'),
            'sale_dp_tgl'  => $this->request->getPost('sale_dp_tgl'),
            'sale_kirim_nom'  => $this->request->getPost('sale_kirim_nom'),
            'sale_kirim_via'  => $this->request->getPost('sale_kirim_via'),
            'sale_kirim_tgl'  => $this->request->getPost('sale_kirim_tgl')
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
					'label'			=> $row['sale_nama'],
				);
		     	echo json_encode($arr_result);
		   	}
               
	}

    public function invoice()
	{
		$id = $this->request->uri->getSegment(3);

		$transaksiModel = new \App\Models\TransaksiModel();
		$transaksi = $transaksiModel->find($id);

		$userModel = new \App\Models\UserModel();
		$pembeli = $userModel->find($transaksi->id_pembeli);

		$barangModel = new \App\Models\BarangModel();
		$barang = $barangModel->find($transaksi->id_barang);

		$html = view('transaksi/invoice',[
			'transaksi'=> $transaksi,
			'pembeli' => $pembeli,
			'barang' => $barang,
		]);

		$pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Dea Venditama');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		//$this->response->setContentType('application/pdf');
		//Close and output PDF document
		$pdf->Output(__DIR__.'/../../public/uploads/invoice.pdf', 'F');

		$attachment = base_url('uploads/Invoice.pdf');

		$message = "<h1>Invoice Pembelian</h1><p>Kepada ".$pembeli->username." Berikut Invoice atas pembelian ".$barang->nama."";

		$this->sendEmail($attachment, 'monolog@gmail.com', 'Invoice', $message);

		return redirect()->to(site_url('transaksi/index'));
		
	}

    

}