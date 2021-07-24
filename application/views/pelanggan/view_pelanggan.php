
<h2 class="page-title">
    Data Pelanggan
</h2>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <a href="#" class="btn btn-success mb-3" id="tambahpelanggan">+ Tambah Data</a>
            <div class="md-3"><?php echo $this->session->flashdata('msg'); ?></div>
            <table class="table table-striped table-bordered" id="tabelpelanggan">
                <thead>
                    <tr>
                    <th class="th">NO</th>
                    <th class="th">KODE PELANGGAN</th>
                    <th class="th">NAMA PELANGGAN</th>
                    <th class="th">ALAMAT</th>
                    <th class="th">NO. HP </th>
                    <th class="th">CABANG</th>
                    <th class="th">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $no= 1;
                        foreach ($pelanggan as $p) { ?>
                        <tr>
                            <td><?= $no; ?></td>
                            <td><?= $p->kode_pelanggan; ?></td>
                            <td><?= $p->nama_pelanggan; ?></td>
                            <td><?= $p->alamat_pelanggan; ?></td>
                            <td><?= $p->no_hp; ?></td>
                            <td><?= $p->nama_cabang; ?></td>
                            <td>
                                <a href="#" data-kodepelanggan="<?php echo $p->kode_pelanggan; ?>" class="btn btn-sm btn-primary edit">Edit</a>
                                <a href="#" data-href="<?= base_url(); ?>pelanggan/hapuspelanggan/<?= $p->kode_pelanggan; ?>" class="btn btn-sm btn-danger hapus">Hapus</a>
                            </td>

                        </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalpelanggan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Input Pelanggan</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadforminputpelanggan">
            </div>
          </div>
        </div>
      </div>
 </div>
 <div class="modal modal-blur fade" id="modaleditpelanggan" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Pelanggan</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="loadformeditpelanggan">
            </div>
          </div>
        </div>
      </div>
 </div>

 <div class="modal modal-blur fade" id="modalhapuspelanggan" tabindex="-1" role="dialog" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <div class="modal-title">Anda Yakin Hapus Data ini?</div>
      <div>JIka dihapus maka data akan hilang!</div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
      <a href="#" id="hapuspelanggan" class="btn btn-danger">Yes, Delete</a>
    </div>
  </div>
</div>
</div>


<script>
    $(function() {
        $("#tambahpelanggan").click(function() {
            $("#modalpelanggan").modal("show");
            $("#loadforminputpelanggan").load("<?php echo base_url(); ?>pelanggan/inputpelanggan");
        });

        $(".edit").click(function() {
            var kodepelanggan = $(this).attr('data-kodepelanggan');
            $('#modaleditpelanggan').modal("show");
            $('#loadformeditpelanggan').load("<?php echo base_url(); ?>pelanggan/editpelanggan/" + kodepelanggan);
        });

        $(".hapus").click(function() {
            var href = $(this).attr('data-href');
            $("#modalhapuspelanggan").modal("show");
            $("#hapuspelanggan").attr("href", href);
        });
        
        $('#tabelpelanggan').DataTable();
    });
</script>