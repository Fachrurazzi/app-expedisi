<?php

class Gudang_model extends CI_Model {

    public function get_all_data_gudang()
    {
        return $this->db->query("select * from barang_gudang")->result_array();
    }

    public function tambah($data)
    {
        $this->db->insert('barang_gudang',$data);
    }

    public function hapus($id_barang_gudang)
    {
        $this->db->where('id_barang_gudang',$id_barang_gudang);
        $this->db->delete('barang_gudang');
    }

    public function ubah($id_barang_gudang,$data)
    {
        $this->db->where('id_barang_gudang',$id_barang_gudang);
        $this->db->update('barang_gudang',$data);
    }

    public function get_barang_gudang($id_barang_gudang)
    {
        return $this->db->query("select * from barang_gudang where id_barang_gudang = ?",$id_barang_gudang)->row_array();
    }

    public function get_laporan_masuk_gudang($alasan)
    {
        return $this->db->query("
            select * from barang_gudang bg
            join data_pengiriman p on bg.no_waybill = p.no_waybill
            join detail_barang d on d.id_barang = p.id_barang
            where bg.alasan = '$alasan'
            group by p.no_waybill
        ")->result_array();
    }
}
