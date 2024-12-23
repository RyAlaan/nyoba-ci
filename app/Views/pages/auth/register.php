<?= $this->extend('layouts/auth'); ?>

<?= $this->section('content'); ?>

<!-- <form class="col-md-8 h-100 d-flex flex-column align-items-center justify-content-center" action="<?php echo base_url('/auth/login'); ?>" method="post">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <div class="p-3 bg-danger rounded">
                <p class="font-weight-bold text-white text-md"> <?= session()->getFlashdata('error') ?> </p>
            </div>
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
</form> -->

<form class="col-md-8 h-100 d-flex flex-column align-items-center justify-content-center" action="<?php echo base_url('/auth/register'); ?>" method="post">

    <div class="w-75">
        <p class="text-muted">Hello there!👋</p>
        <h1 class="text-2xl text-dark mb-4">Let's create your account!</h1>

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your fullname" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
        </div>

        <div class="mb-3">
            <label for="passconf" class="form-label">Password Confirmation</label>
            <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Confirm your password" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>

        <p>Already have an account? <a href="<?php echo site_url('auth/login') ?>" class="text-primary">Login to your account</a></p>
    </div>
</form>

<?= $this->endSection('form'); ?>