<?= $this->extend('layouts/auth') ?>

<?= $this->section('content') ?>

<form class="col-md-8 h-100 d-flex flex-column align-items-center justify-content-center" action="<?php echo base_url('/auth/login'); ?>" method="post">

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="col-6 alert alert-danger alert-dismissible fade show" role="alert">
            <?= esc(session()->getFlashdata('error')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>


    <div class="w-50">
        <p class="text-muted">Welcome back!👋</p>
        <h1 class="text-2xl text-dark mb-4">Login to your account</h1>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <button type="submit" class="btn btn-primary">Login</button>

        <p>Not registered? <a href="<?php echo site_url('auth/register') ?>" class="text-primary">Create an account</a></p>
    </div>
</form>

<?= $this->endSection('content') ?>