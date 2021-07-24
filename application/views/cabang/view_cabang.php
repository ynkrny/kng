
<h2 class="page-title">
    Data Cabang
</h2>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <a href="#" class="btn btn-success mb-3" id="tambahcabang">+ Tambah Data</a>
            <div class="md-3"><?php echo $this->session->flashdata('msg'); ?></div>
            <table class="table table-striped table-bordered" id="tabelcabang">
                <thead>
                    <tr>
                    <th class="th">NO</th>
                    <th class="th">KODE CABANG</th>
                    <th class="th">NAMA CABANG</th>
                    <th class="th">ALAMAT</th>
                    <th class="th">TELP</th>
                    <th class="th">AKSI </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($cabang as $c) { ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $c->kode_cabang; ?></td>
                        <td><?= $c->nama_cabang; ?></td>
                        <td><?= $c->alamat_cabang; ?></td>
                        <td><?= $c->telepon; ?></td>
                        <td>
                           <a href="#" data-kodecabang="<?php echo $c->kode_cabang; ?>" class="btn btn-sm btn-primary edit">Edit</a>
                            <a href="#" data-href="<?= base_url(); ?>cabang/hapuscabang/<?= $c->kode_cabang; ?>" class="btn btn-sm btn-danger hapus">Hapus</a>
                        </td>
                    </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalcabang" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Cabang</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputcabang">
            </div>
          </div>
        </div>
      </div>
 </div>
 <div class="modal modal-blur fade" id="modaleditcabang" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Cabang</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformeditcabang">
            </div>
          </div>
        </div>
      </div>
 </div>

 <div class="modal modal-blur fade" id="modalhapuscabang" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Anda Yakin Hapus Data ini?</div>
      <div>JIka dihapus maka data akan hilang!</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
      <a href="#" id="hapuscabang" class="btn btn-danger">Yes, Delete</a>
    </div>
  </div>
</div>
</div>


<script>
    $(function(){
        $("#tambahcabang").click(function() {
            $("#modalcabang").modal("show");
            $("#loadforminputcabang").load("<?php echo base_url(); ?>cabang/inputcabang");
        });

        $(".edit").click(function() {
            var kodecabang = $(this).attr("data-kodecabang");
            $("#modaleditcabang").modal("show");
            $("#loadformeditcabang").load("<?php echo base_url(); ?>cabang/editcabang/" + kodecabang);
        });

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalhapuscabang").modal("show");
            $("#hapuscabang").attr("href", href);
        });
        
        $('#tabelcabang').DataTable();
    });
</script>