<form action="<?php echo base_url(); ?>barang/updatebarang" class="formBarang" method="POST">
    <div class="form-group mb-3">
        <input type="text" value="<?php echo $barang['kode_barang']; ?>" readonly class="form-control" name="kodebarang" placeholder="Kode Barang">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?php echo $barang['nama_barang']; ?>" class="form-control" name="namabarang" placeholder="Nama Barang">
    </div>
    <div class="form-group mb-3">
        <select name="satuan" class="form-select">
            <option value="">Satuan</option>
            <option <?php if ($barang['satuan'] == "pcs") {
                        echo "selected";
                    } ?> value="pcs">pcs</option>
            <option <?php if ($barang['satuan'] == "unit") {
                        echo "selected";
                    } ?>value="unit">unit</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
</form>

<script>
    $(function() {
     $('.formBarang').bootstrapValidator({
        fields: {
            kodebarang: {
            message: 'Kode Barang Tidak Valid !',
            validators: {
                notEmpty: {
                message: 'Kode Barang Harus Diisi !'
                }
            }
            },
            namabarang: {
            message: 'Nama Barang Tidak Valid !',
            validators: {
                notEmpty: {
                message: 'Nama Barang Harus Diisi !'
                }
            }
            },
            satuan: {
            message: 'Satuan Tidak Valid !',
            validators: {
                notEmpty: {
                message: 'Satuan Harus Diisi !'
                }
            }
            },
        }
    });        
    });
</script>