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
        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="container">

  <h1 class="mb-3">Register</h1>
  <form action="/register/save" method="post">
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
    <?= csrf_field(); ?>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="text" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
      <label for="phone_number" class="form-label">Phone number</label>
      <input type="number" class="form-control" id="phone_number" name="phone_number">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  <p class="mt-3">Already have an account? <a href="/login">Login</a></p>

  <?= $this->endSection(); ?>