<?php

class Model_penjualan extends CI_Model {
    function cekBarang()
    {
        $id_user = $this->session->userdata('id_user');
        return $this->db->get_where('penjualan_detail_temp', array('id_user'=>$id_user));
    }

    function getLastFaktur($bulan, $tahun,$cabang)
    {
      
        $this->db->select('no_faktur');
        $this->db->from('penjualan');
        $this->db->where('kode_cabang', $cabang);
        $this->db->where('MONTH(tgltransaksi)', $bulan);
        $this->db->where('YEAR(tgltransaksi)', $tahun);
        $this->db->order_by('no_faktur', 'desc');
        $this->db->join('users', 'penjualan.id_user = users.id_user');
        $this->db->limit(1);
        return $this->db->get();
    }

    function cekBarangtemp($kode_barang, $id_user)
    {
        return $this->db->get_where('penjualan_detail_temp', array('kode_barang' => $kode_barang, 'id_user' => $id_user));
    }

    function insertBarangtemp($data)
    {
        $this->db->insert('penjualan_detail_temp', $data);
    }

    function getDatabarangtemp($id_user)
    {
        $this->db->select('penjualan_detail_temp.kode_barang, nama_barang, harga, qty, (qty * harga) as total, id_user');
        $this->db->from('penjualan_detail_temp');
        $this->db->join('barang_master', 'penjualan_detail_temp.kode_barang = barang_master.kode_barang');
        $this->db->where('id_user', $id_user);
        return $this->db->get();
    }

    function deleteBarangtemp($kode_barang, $id_user)
    {
        $hapus = $this->db->delete('penjualan_detail_temp', array('kode_barang' => $kode_barang, 'id_user' => $id_user));
        if($hapus) {
            return 1;
        }
    }

    function insertPenjualan($data)
    {
        $simpan = $this->db->insert('penjualan', $data);
        if($simpan) {
            $detailpenjualan = $this->db->get_where('penjualan_detail_temp', array('id_user' => $data['id_user']));
            $totalpenjualan = 0;
            $berhasil = 0;
            $error = 0;
            foreach ($detailpenjualan->result() as $d) {
                $totalpenjualan = $totalpenjualan + ($d->qty * $d->harga);
                $datadetail = array(
                    'no_faktur' => $data['no_faktur'],
                    'kode_barang' => $d->kode_barang,
                    'harga' => $d->harga,
                    'qty' => $d->qty
                );
                $simpandetail = $this->db->insert('penjualan_detail', $datadetail);
                if ($simpandetail) {
                    $berhasil++;
                } else {
                    $error++;
                }
            }
            if ($error > 0) {
                $hapusdetailpenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
                $hapusdatapenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    Data Berhasil disimpan </div>');
                    redirect('penjualan/inputpenjualan');
            } else {
                $hapustemporary = $this->db->delete('penjualan_detail_temp', array('id_user' => $data['id_user']));
                if ($hapustemporary) {    
                    if ($data['jenistransaksi'] == "tunai") {
                        $tahun = date('Y');
                        $thn = substr($tahun, 2, 2);
                        $getLastNobukti = $this->db->query("SELECT nobukti FROM historibayar WHERE YEAR(tglbayar) = '$tahun'")->row_array();
                        $nomorterakhir = $getLastNobukti['nobukti'];
                        $nobukti = buatkode($nomorterakhir, $thn, 6);
                        $databayar = array(
                            'nobukti' => $nobukti,
                            'no_faktur' => $data['no_faktur'],
                            'tglbayar' => $data['tgltransaksi'],
                            'bayar' => $totalpenjualan,
                            'id_user' => $data['id_user']
                        );
                        $bayar = $this->db->insert('historibayar', $databayar);
                        if ($bayar) {
                            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                            Data Berhasil disimpan </div>');
                            redirect('penjualan/inputpenjualan');
                        } else {
                            $hapusdetailpenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
                            $hapusdatapenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                            Data gagal disimpan !</div>');
                            redirect('penjualan/inputpenjualan');
                        }
                    }
                } else {
                    $hapusdetailpenjualan = $this->db->delete('penjualan_detail', array('no_faktur' => $data['no_faktur']));
                    $hapusdatapenjualan = $this->db->delete('penjualan', array('no_faktur' => $data['no_faktur']));
                    $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">
                    Data gagal disimpan !</div>');
                    redirect('penjualan/inputpenjualan');
                }
            }
        }
    }

    
}
