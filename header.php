<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container">
      <a class="navbar-brand" href="#">e-shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="panier.php">panier</a>
          </li>
        </ul>
        <?php if (isset($_SESSION['email']))
          echo "<a href='/logout.php' class='text-white'>logout</a>";
        else
          echo "<a href='/login.php' class='text-white'>login</a>";
        ?>
      </div>
    </div>
  </nav>
</header>