<?php

class Sampai_model extends CI_Model {

    public function get_all_sampai()
    {
        return $this->db->query("select * from sampai_barang left join karyawan on sampai_barang.id_karyawan = karyawan.id_karyawan")->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('sampai_barang',$data);
    }

    public function get_sampai($id_sampai_barang)
    {
        return $this->db->query("select * from sampai_barang where id_sampai_barang = ?",$id_sampai_barang)->row_array();
    }

    public function ubah($id_sampai_barang,$data)
    {
        $this->db->where('id_sampai_barang', $id_sampai_barang);
        $this->db->update('sampai_barang',$data);
    }

    public function hapus($id_sampai_barang)
    {
        $this->db->where('id_sampai_barang',$id_sampai_barang);
        $this->db->delete('sampai_barang');
    }

}