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
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Price</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($products as $product) : ?>
        <tr>
          <th scope="row"><?= $product['id']; ?></th>
          <td><?= $product['name']; ?></td>
          <td><img src="/images/<?= $product['image'] ?>" alt="<?= $product['name']; ?>" width="100"></td>
          <td><?= $product['price']; ?></td>
          <td>
            <div class="d-flex justify-content-evenly">
              <div>
                <form action="/products/add-cart" method="post">
                  <?= csrf_field(); ?>
                  <input type="hidden" name="name" value="{{ $product['name'] }}">
                  <input type="hidden" name="price" value="{{ $product['price'] }}">
                  <button type="submit" class="btn btn-primary mb-2">Add to Cart</button>
                </form>
              </div>
              <div>
                <a href="/products/edit/<?= $product['slug'] ?>" class="btn btn-warning mr-2">Edit</a>
              </div>
              <div>
                <a href="#" class="btn btn-danger">Delete</a>
              </div>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>


<?= $this->endSection(); ?>