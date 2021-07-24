<form action="<?php echo base_url(); ?>pelanggan/simpanpelanggan" class="formPelanggan" method="POST">
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="kodepelanggan" placeholder="Kode Pelanggan">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="namapelanggan" placeholder="Nama Pelanggan">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="alamatpelanggan" placeholder="Alamat Pelanggan">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="nohp" placeholder="NO HP">
    </div>
    <div class="form-group mb-3">
        <select name="cabang" class="form-select">
            <option value="">Pilih Cabang</option>
            <?php foreach($cabang as $c) { ?>
                <option value="<?= $c->kode_cabang; ?>"><?= $c->nama_cabang; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Simpan</button>
    </div>
</form>

<script>
    $(function() {
     $('.formPelanggan').bootstrapValidator({
        fields: {
            kodepelanggan: {
            message: 'Kode Pelanggan Tidak Valid !',
            validators: {
                notEmpty: {
                message: 'Kode Pelanggan Harus Diisi !'
                }
            }
            },
            namapelanggan: {
            message: 'Nama Pelanggan Tidak Valid !',
            validators: {
                notEmpty: {
                message: 'Nama Pelanggan Harus Diisi !'
                }
            }
            },
            alamatpelanggan: {
            message: 'Alamat Pelanggan tidak valid ! ',
            validators: {
                notEmpty: {
                message: 'Alamat Pelanggan Harus Diisi !'
                }
            }
            },

            nohp: {
            message: 'No HP Pelanggan tidak valid! ',
            validators: {
                notEmpty: {
                message: 'No HP Pelanggan Harus Diisi !'
                }
            }
            },

            cabang: {
            message: 'Cabang tidak valid! ',
            validators: {
                notEmpty: {
                message: 'Cabang Harus Diisi !'
                }
            }
            },
        }
    });        
    });
</script>