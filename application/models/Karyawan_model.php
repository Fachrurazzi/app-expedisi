<?php

class Karyawan_model extends CI_Model {

    public function get_all_karyawan()
    {
        return $this->db->query("select * from karyawan")->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('karyawan', $data);
        $id_karyawan = $this->db->insert_id();
        $this->generate_nik($id_karyawan);
    }

    public function generate_nik($id_karyawan)
    {
        $this->db->query("update karyawan set nik = CONCAT( 'JVE', LPAD($id_karyawan,7,'0') ) where id_karyawan = $id_karyawan");
    }

    public function ubah($id_karyawan,$data)
    {
        $this->db->where('id_karyawan',$id_karyawan);
        $this->db->update('karyawan',$data);
    }

    public function get_karyawan($id_karyawan)
    {
        $query = $this->db->query("select * from karyawan where id_karyawan = ?", $id_karyawan);
        return $query->row_array();
    }

    public function hapus($id_karyawan)
    {
        $this->db->where('id_karyawan',$id_karyawan);
        $this->db->delete('karyawan');
    }

}