<?php

class Barang_model extends CI_Model {

    public function tambah_detail_barang($data)
    {
        $this->db->insert('detail_barang', $data);
        return $this->db->insert_id();
    }
}
