<?= $this->include('component/header') ?>
<?= $this->include('component/sidebar') ?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Manajemen Diskon</h1>
  </div>

  <section class="section">
    <div class="card">
      <div class="card-body">

        <a href="<?= base_url('/diskon/create') ?>" class="btn btn-primary mt-3">Tambah Diskon</a>

        <table class="table table-striped mt-4">
          <thead>
            <tr>
              <th>#</th>
              <th>Tanggal</th>
              <th>Nominal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; foreach ($diskon as $d): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $d['tanggal'] ?></td>
                <td>Rp <?= number_format($d['nominal']) ?></td>
                <td>
                  <a href="<?= base_url('/diskon/edit/' . $d['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="<?= base_url('/diskon/delete/' . $d['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>

</main>

<?= $this->include('component/footer') ?>
