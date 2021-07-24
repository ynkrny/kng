
<h2 class="page-title">
    Data Penjualan
</h2>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <a href="<?= base_url(); ?>penjualan/inputpenjualan" class="btn btn-success mb-3" >Tambah Data</a>
            <div class="md-3"><?php echo $this->session->flashdata('msg'); ?></div>
            <table class="table table-striped table-bordered" id="tabelpelanggan">
                <thead>
                    <tr>
                    <th class="th">NO</th>
                    <th class="th">NO FAKTUR</th>
                    <th class="th">TANGGAL</th>
                    <th class="th">KODE PELANGGAN</th>
                    <th class="th">NAMA PELANGGAN</th>
                    <th class="th">JENIS TRANSAKSI</th>
                    <th class="th">JATUH TEMPO</th>
                    <th class="th">KASIR</th>
                    <th class="th">AKSI</th>
                    </tr>
                </thead>
                

            </table>
            </div>
        </div>
    </div>
</div>
