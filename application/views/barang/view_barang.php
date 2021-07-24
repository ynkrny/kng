
<h2 class="page-title">
    Data Barang
</h2>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <a href="#" class="btn btn-success mb-3" id="tambahbarang">+ Tambah Data</a>
            <div class="md-3"><?php echo $this->session->flashdata('msg'); ?></div>
            <table class="table table-striped table-bordered" id="tabelbarang">
                <thead>
                    <tr>
                    <th class="th">NO</th>
                    <th class="th">KODE BARANG</th>
                    <th class="th">NAMA BARANG</th>
                    <th class="th">SATUAN</th>
                    <th class="th">AKSI </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach($barang as $b) { ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $b->kode_barang; ?></td>
                            <td><?php echo $b->nama_barang; ?></td>
                            <td><?php echo $b->satuan; ?></td>
                            <td>
                                <a href="#" data-kodebarang="<?php echo $b->kode_barang; ?>" class="btn btn-sm btn-primary edit">Edit</a>
                                <a href="#" data-href="<?= base_url(); ?>barang/hapusbarang/<?= $b->kode_barang; ?>" class="btn btn-sm btn-danger hapus">Hapus</a>
                            </td>
                        </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalbarang" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Barang</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputbarang">
            </div>
          </div>
        </div>
      </div>
 </div>
 <div class="modal modal-blur fade" id="modaleditbarang" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Barang</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformeditbarang">
            </div>
          </div>
        </div>
      </div>
 </div>

 <div class="modal modal-blur fade" id="modalhapusbarang" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Anda Yakin Hapus Data ini?</div>
      <div>JIka dihapus maka data akan hilang!</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
      <a href="#" id="hapusbarang" class="btn btn-danger">Yes, Delete</a>
    </div>
  </div>
</div>
</div>


<script>
    $(function(){
        $("#tambahbarang").click(function() {
            $("#modalbarang").modal("show");
            $("#loadforminputbarang").load("<?php echo base_url(); ?>barang/inputbarang");
        });

        $(".edit").click(function() {
            var kodebarang = $(this).attr("data-kodebarang");
            $("#modaleditbarang").modal("show");
            $("#loadformeditbarang").load("<?php echo base_url(); ?>barang/editbarang/" + kodebarang);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapusbarang").modal("show");
            $("#hapusbarang").attr("href", href);
        });
        
        $('#tabelbarang').DataTable();
    });
</script>