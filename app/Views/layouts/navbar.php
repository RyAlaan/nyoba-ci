<nav class="navbar navbar-expand-lg bg-white">
    <div class="container-fluid p-3">
        <a class="navbar-brand fw-bold fs-4" href="#">RY<span class="">STORE</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav fw-medium">
                <li class="nav-item">
                    <a href="<?= site_url('/') ?>" class="nav-link" aria-current="page">Home</a>
                </li>
                <?php if (session()->get('role') === 'admin') : ?>
                    <li class="nav-item">
                        <a href="<?= site_url('/dashboard') ?>" class="nav-link" aria-current="page">Dashboard</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="<?= site_url('/cart') ?>" class="nav-link" aria-current="page">Cart</a>
                </li>
                <li class="nav-item">
                    <a href="<?= session()->get('id') ? site_url('auth/logout') : site_url('auth/login') ?>" class="nav-link" aria-current="page"><?= session()->get('id') ? 'Logout' : 'Login' ?></a>
                </li>
            </ul>
            <div class="d-flex align-items-center justify-content-center">
                <p class="fw-bolder"><?= session()->get('name') ?></p>
            </div>
        </div>
    </div>
</nav>