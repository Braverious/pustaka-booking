<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Display flash messages -->
    <?php if ($this->session->flashdata('pesan')) : ?>
        <div class="alert alert-success">
            <?= $this->session->flashdata('pesan'); ?>
        </div>
    <?php endif; ?>

    <!-- Display validation errors -->
    <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">
            <?= validation_errors(); ?>
        </div>
    <?php endif; ?>

    <!-- Action buttons -->
    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="<?= base_url('anggota/cetak_laporan_anggota'); ?>" class="btn btn-primary mb-3">
                <i class="fas fa-print"></i> Print
            </a>
            <a href="<?= base_url('anggota/laporan_anggota_pdf'); ?>" class="btn btn-warning mb-3">
                <i class="far fa-file-pdf"></i> Download Pdf
            </a>
            <a href="<?= base_url('anggota/export_excel'); ?>" class="btn btn-success mb-3">
                <i class="far fa-file-excel"></i> Export ke Excel
            </a>
        </div>
    </div>

    <!-- Data table -->
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Tanggal Bergabung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($anggota)) : ?>
                        <?php $a = 1; foreach ($anggota as $b) : ?>
                            <tr>
                                <th scope="row"><?= $a++; ?></th>
                                <td><?= $b['nama']; ?></td>
                                <td><?= $b['email']; ?></td>
                                <td><?= date('d F Y', $b['tanggal_input']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="4" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
