<?php

class Kirim_model extends CI_Model {

    public function get_all_kirim()
    {
        return $this->db->query(
            "select * from kirim_barang
            left join karyawan on kirim_barang.id_karyawan = karyawan.id_karyawan"
        )->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('kirim_barang',$data);
    }

    public function get_kirim($id_kirim_barang)
    {
        return $this->db->query(
            "select * from kirim_barang where id_kirim_barang = ?",$id_kirim_barang)->row_array();
    }

    public function ubah($id_kirim_barang,$data)
    {
        $this->db->where('id_kirim_barang', $id_kirim_barang);
        $this->db->update('kirim_barang',$data);
    }

    public function hapus($id_kirim_barang)
    {
        $this->db->where('id_kirim_barang',$id_kirim_barang);
        $this->db->delete('kirim_barang');
    }


}