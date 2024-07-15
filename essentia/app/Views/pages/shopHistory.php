<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Essentia</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products/add">Add item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<div class="container">

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Receipt</th>
        <th scope="col">Total items</th>
        <th scope="col">Total price</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($history as $item) : ?>
        <tr>
          <th><?= $item['id']; ?></th>
          <td><?= $item['receipt']; ?></td>
          <td><?= $item['total_items']; ?></td>
          <td><?= $item['total_price']; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $this->endSection(); ?>