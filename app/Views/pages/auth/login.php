<?= $this->extend('layouts/auth'); ?>

<?= $this->section('form'); ?>

<form class="w-3/5 h-full flex flex-col items-center justify-center" action="<?php echo base_url('/auth/login'); ?>" method="post">

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <div class="w-full max-w-96 p-3 bg-red-500 rounded">
                <p class="font-semibold text-white text-md"> <?= session()->getFlashdata('error') ?>
                </p>
            </div>
        </div>
    <?php endif; ?>

    <div class="w-full max-w-96 flex flex-col items-center gap-y-4">
        <div class="w-full">
            <p class="text-sm text-gray">Welcome back!👋</p>
            <h1 class="text-2xl text-[#333333] font-bold">Login to your account</h1>
        </div>

        <div class="w-full py-1 flex flex-col">
            <label class="font-semibold text-sm " for="email">Email</label>
            <input class="block py-2.5 px-3 w-full text-sm text-black bg-transparent border-2 border-gray rounded-lg appearance-none focus:border-primary focus:rounded-lg focus:outline-none transition-all duration-500" placeholder="Enter your email" name="email" type="email" required>
        </div>

        <div class="w-full py-1 flex flex-col">
            <label class="font-semibold text-sm " for="password">Password</label>
            <input class="block py-2.5 px-3 w-full text-sm text-black bg-transparent border-2 border-gray rounded-lg appearance-none focus:border-primary focus:rounded-lg focus:outline-none transition-all duration-500" placeholder="Enter your password" name="password" type="password" required>
        </div>

        <button type="submit" class="w-full py-2.5 rounded-lg bg-primary text-white font-bold">Login</button>

        <p>Not registered? <a class="font-bold text-primary" href="<?php echo site_url('auth/register') ?>">Create an account</a></p>

    </div>
</form>

<?= $this->endSection('form'); ?>