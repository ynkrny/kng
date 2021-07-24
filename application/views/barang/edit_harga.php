<form action="<?php echo base_url(); ?>barang/updateharga" class="formHarga" method="POST">
    <div class="form-group mb-3">
        <input type="text" value="<?= $harga['kode_harga']; ?>" readonly class="form-control" id="kodeharga" name="kodeharga" placeholder="Kode Harga">
    </div>
    <div class="form-group mb-3">
        <select id="kodebarang" disabled name="kodebarang" class="form-select">
            <option value="">Pilih Barang</option>
            <?php foreach ($barang as $b) { ?>
                <option <?php if($harga['kode_barang'] == $b->kode_barang) { echo "selected"; } ?>
                value="<?= $b->kode_barang; ?>"><?= $b->kode_barang ." - ". $b->nama_barang; ?></option>
            <?php } ?>
        </select>
    </div>  
    <div class="form-group mb-3">
        <input type="text" value="<?= $harga['harga']; ?>" id="harga" class="form-control" name="harga" placeholder="Harga">
    </div> 
    <div class="form-group mb-3">
        <input type="text" value="<?= $harga['stok']; ?>" id="stok" class="form-control" name="stok" placeholder="Stok">
    </div>  
    
    <div class="form-group mb-3">
        <select disabled id="kodecabang" name="cabang" class="form-select">
            <option value="">Pilih Cabang</option>  
            <?php foreach ($cabang as $c) { ?>
                <option  <?php if($harga['kode_cabang'] == $c->kode_cabang) { echo "selected"; } ?>  
                value="<?= $c->kode_cabang; ?>"><?= $c->nama_cabang; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">Update</button>
    </div>
</form>

<script>
    $(function() {
     $('.formHarga').bootstrapValidator({
        fields: {
            kodebarang: {
            message: 'Kode Barang Tidak Valid !',
            validators: {
                notEmpty: {
                message: 'Kode Barang Harus Diisi !'
                }
            }
            },
            harga: {
            message: 'Harga Tidak Valid !',
            validators: {
                notEmpty: {
                message: 'Harga Harus Diisi !'
                }
            }
            },

            stok: {
            message: 'stok Tidak Valid !',
            validators: {
                notEmpty: {
                message: 'stok Harus Diisi !'
                }
            }
            },
            cabang: {
            message: 'cabang Tidak Valid !',
            validators: {
                notEmpty: {
                message: 'cabang Harus Diisi !'
                }
            }
            },
        }
    }); 

    function loadkodeharga() {
        var kodebarang = $('#kodebarang').val();
        var kodecabang = $('#kodecabang').val();
        var kodeharga = kodebarang + kodecabang;
        $("#kodeharga").val(kodeharga);
    }

    $("#kodebarang").change(function(){
        loadkodeharga();
    });

    $("#kodecabang").change(function(){
        loadkodeharga();
    });

    });
</script>