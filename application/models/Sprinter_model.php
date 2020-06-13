<?php

class Sprinter_model extends CI_Model {

    public function get_all_sprinter()
    {
        $query = $this->db->query("
            select * from sprinter
            join karyawan on sprinter.id_karyawan = karyawan.id_karyawan
        ");
        return $query->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('sprinter',$data);
    }

    public function get_sprinter($id_sprinter)
    {
        return $this->db->query("select * from sprinter where id_sprinter = ?",$id_sprinter)->row_array();
    }

    public function ubah($id_sprinter,$data)
    {
        $this->db->where('id_sprinter',$id_sprinter);
        $this->db->update('sprinter',$data);
    }

    public function get_laporan_sprinter($tanggal_awal,$tanggal_akhir)
    {
        return $this->db->query("
            select sum(jumlah_barang) as jumlah_barang, nama,nik from sprinter 
            join karyawan on sprinter.id_karyawan = karyawan.id_karyawan
            where (date(sprinter.tanggal) between '$tanggal_awal' and  '$tanggal_akhir')
            group by sprinter.id_karyawan
        ")->result_array();
    }
}
