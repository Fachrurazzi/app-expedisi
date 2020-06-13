<?php

class Pengiriman_model extends CI_Model {

    public function tambah_pengiriman($data)
    {
        $this->db->insert('data_pengiriman', $data);
        return $this->db->insert_id();
    }

    public function generate_no_waybill($id_pengiriman)
    {
        $this->db->query("update data_pengiriman set no_waybill = CONCAT( 'JT', LPAD($id_pengiriman,7,'0') ) where id_pengiriman = $id_pengiriman ");
        $query = $this->db->query("select no_waybill from data_pengiriman where id_pengiriman = $id_pengiriman");
        return $query->row_array()['no_waybill'];
    }

    public function pengiriman($id_pengiriman)
    {
        return $this->db->query("select * from data_pengiriman where id_pengiriman = ?", $id_pengiriman)->row_array();
    }

    public function get_pengiriman($no_waybill)
    {
        return $this->db->query(
            "select * 
            from data_pengiriman
            left join detail_barang on data_pengiriman.id_barang =  detail_barang.id_barang
            where no_waybill = ?", $no_waybill)->row_array();
    }

    public function get_all_pengiriman()
    {
        $query = $this->db->query(
            "select * from data_pengiriman
            left join detail_barang on data_pengiriman.id_barang = detail_barang.id_barang"
        );
        return $query->result_array();
    }

    public function perbarui_pengiriman($id_pengiriman,$data)
    {
        $this->db->where('id_pengiriman',$id_pengiriman);
        $this->db->update('data_pengiriman',$data);
    }

    public function hapus_pengiriman($id_pengiriman)
    {
        $this->db->where('id_pengiriman',$id_pengiriman);
        $this->db->delete('data_pengiriman');
    }

    public function get_all_metode_pembayaran($type)
    {
        $sql = "select * from data_pengiriman
            left join detail_barang on data_pengiriman.id_barang = detail_barang.id_barang";
        if ($type == "CASH") {
            $sql .= " where metode_pembayaran = 'CASH'";
        } elseif($type == "DFOD") {
            $sql .= " where metode_pembayaran = 'DFOD'";
        }
        return $this->db->query($sql)->result_array();

    }

    public function get_all_paket($type)
    {
        $sql = "select * from data_pengiriman
            left join detail_barang on data_pengiriman.id_barang = detail_barang.id_barang";
        if ($type == "Dokumen") {
            $sql .= " where jenis_paket = 'Dokumen'";
        } elseif($type == "Barang") {
            $sql .= " where jenis_paket = 'Barang'";
        }
        return $this->db->query($sql)->result_array();

    }
}
