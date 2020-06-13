<?php

class Paket_model extends CI_Model {

    public function get_all_paket_bermasalah()
    {
        return $this->db->query("select * from paket_bermasalah")->result_array();
    }

    public function tambah_paket_bermasalah($data)
    {
        $this->db->insert('paket_bermasalah',$data);
    }

    public function get_bermasalah($id_paket_bermasalah)
    {
        return $this->db->query("select * from paket_bermasalah where id_paket_bermasalah = ?",$id_paket_bermasalah)->row_array();
    }

    public function ubah_paket_bermasalah($id_paket_bermasalah,$data)
    {
        $this->db->where('id_paket_bermasalah',$id_paket_bermasalah);
        $this->db->update('paket_bermasalah',$id_paket_bermasalah);
    }

    public function hapus_paket_bermasalah($id_paket_bermasalah)
    {
        $this->db->where('id_paket_bermasalah',$id_paket_bermasalah);
        $this->db->delete('paket_bermasalah');
    }

    public function laporan_paket_bermasalah($type)
    {
        return $this->db->query("
            select * from paket_bermasalah pb
            join data_pengiriman p on pb.no_waybill = p.no_waybill
            join detail_barang d on d.id_barang = p.id_barang
            where status = '$type'
            group by p.no_waybill
        ")->result_array();
    }
}
