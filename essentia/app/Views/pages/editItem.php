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
            <a class="nav-link" href="/products/add">Add item</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="container">

  <h1 class="mb-3">Edit product</h1>
  <form action="/products/update/<?= $product['id'] ?>" method="post">

    <!-- error data -->
    <?php if (session('validation')) : ?>
      <div class="alert alert-danger alert-dismissible">
        <ul>
          <?php foreach (session('validation')->getErrors() as $error) : ?>
            <li><?= esc($error) ?></li>
          <?php endforeach ?>
        </ul>
      </div>
    <?php endif ?>
    <!-- error data -->

    <input type="hidden" name="slug" value="<?= $product['slug'] ?>">
    <?= csrf_field(); ?>
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" value="<?= $product['name'] ?>">
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image</label>
      <input type="text" class="form-control" id="image" name="image" value="<?= $product['image'] ?>">
    </div>
    <div class="mb-3">
      <label for="price" class="form-label">Price</label>
      <input type="number" class="form-control" id="price" name="price" value="<?= $product['price'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  <?= $this->endSection(); ?>