<?php
class PembayaranModel extends CI_Model{
    public function get_data($table){
        return $this->db->get($table);
    }


    public function insert_data($data,$table){
        $this->db->insert($table,$data);
    }


    public function update_data($table,$data,$where){
        $this->db->update($table,$data,$where);
    }

    public function delete_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function import_data($siswa)
    {
        $jumlah = count($siswa);
        if ($jumlah > 0) {
            $this->db->replace('tb_siswa', $siswa);
        }
    }

    public function cek_login(){
        $username = set_value('username');
        $password = set_value('password');

        $result = $this->db->where('username',$username)
                        ->where('password',md5($password))
                        ->limit(1)
                        ->get('tb_user');
        if($result->num_rows()>0){
            return $result->row();
        }
        return FALSE;
    }
    public function cek_siswa(){
        $nis = set_value('nis');
        $nisn = set_value('nisn');

        $result = $this->db->where('nis',$nis)
                        ->where('nisn',$nisn)
                        ->limit(1)
                        ->get('tb_siswa');
        if($result->num_rows()>0){
            return $result->row();
        }
        return FALSE;
    }
    
}




?>