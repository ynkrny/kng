
<h2 class="page-title">
    Data Harga
</h2>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <a href="#" class="btn btn-success mb-3" id="tambahharga">+ Tambah Data</a>
            <div class="md-3"><?php echo $this->session->flashdata('msg'); ?></div>
            <table class="table table-striped table-bordered" id="tabelharga">
                <thead>
                    <tr>
                    <th class="th">NO</th>
                    <th class="th">KODE HARGA</th>
                    <th class="th">KODE BARANG</th>
                    <th class="th">NAMA BARANG</th>
                    <th class="th">SATUAN</th>
                    <th class="th">HARGA</th>
                    <th class="th">STOK</th>
                    <th class="th">CABANG</th>
                    <th class="th">AKSI </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; 
                    foreach($harga as $h) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $h->kode_harga; ?></td>
                        <td><?= $h->kode_barang; ?></td>
                        <td><?= $h->nama_barang; ?></td>
                        <td><?= $h->satuan; ?></td>
                        <td align="right" ><?= number_format($h->harga,'0','','.'); ?></td>
                        <td><?= $h->stok; ?></td>
                        <td><?= $h->kode_cabang; ?></td>
                        <td>
                                <a href="#" data-kodeharga="<?php echo $h->kode_harga; ?>" class="btn btn-sm btn-primary edit">Edit</a>
                                <a href="#" data-href="<?= base_url(); ?>barang/hapusharga/<?= $h->kode_harga; ?>" class="btn btn-sm btn-danger hapus">Hapus</a>
                            </td>
                    </tr>
                    <?php  $no++; } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalharga" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Harga</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputharga">
            </div>
          </div>
        </div>
      </div>
 </div>
 <div class="modal modal-blur fade" id="modaleditharga" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Harga</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformeditharga">
            </div>
          </div>
        </div>
      </div>
 </div>

 <div class="modal modal-blur fade" id="modalhapusharga" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Anda Yakin Hapus Data ini?</div>
      <div>JIka dihapus maka data akan hilang!</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
      <a href="#" id="hapusharga" class="btn btn-danger">Yes, Delete</a>
    </div>
  </div>
</div>
</div>


<script>
    $(function(){
        $("#tambahharga").click(function() {
            $("#modalharga").modal("show");
            $("#loadforminputharga").load("<?php echo base_url(); ?>barang/inputharga");
        });

        $(".edit").click(function() {
            var kodeharga = $(this).attr("data-kodeharga");
            $("#modaleditharga").modal("show");
            $("#loadformeditharga").load("<?php echo base_url(); ?>barang/editharga/" + kodeharga);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapusharga").modal("show");
            $("#hapusharga").attr("href", href);
        });
        
        $('#tabelharga').DataTable();
    });
</script>