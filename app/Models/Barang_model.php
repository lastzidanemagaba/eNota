<?php 
namespace App\Models;
use CodeIgniter\Model;
 
class Barang_model extends Model
{
    protected $table = 'sales';
     
    public function getBarang($id = false)
    {
        if($id === false){
            return $this->findAll();
        }else{
            return $this->getWhere(['sale_id' => $id]);
        }   
    }

    public function saveBarang($data)
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }

    public function editBarang($data,$id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('sale_id', $id);
        return $builder->update($data);
    }


    public function hapusBarang($id)
    {
        $builder = $this->db->table($this->table);
        return $builder->delete(['sale_id' => $id]);
    }

    
 
}