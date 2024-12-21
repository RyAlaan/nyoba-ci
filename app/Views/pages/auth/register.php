<?= $this->extend('layouts/auth'); ?>

<?= $this->section('form'); ?>

<form class="w-3/5 h-full flex flex-col items-center justify-center" action="<?php echo base_url('/auth/register'); ?>" method="post">

    <div class="w-full max-w-96 flex flex-col items-center gap-y-4">
        <div class="w-full">
            <p class="text-sm text-gray">Hello there!👋</p>
            <h1 class="text-2xl text-[#333333] font-bold">Let's create your account!</h1>
        </div>

        <div class="w-full py-1 flex flex-col">
            <label class="font-semibold text-sm " for="name">Name</label>
            <input class="block py-2.5 px-3 w-full text-sm text-black bg-transparent border-2 border-gray rounded-lg appearance-none focus:border-primary focus:rounded-lg focus:outline-none transition-all duration-500" placeholder="Enter your fullname" name="name" type="text" required>
        </div>

        <div class="w-full py-1 flex flex-col">
            <label class="font-semibold text-sm " for="email">Email</label>
            <input class="block py-2.5 px-3 w-full text-sm text-black bg-transparent border-2 border-gray rounded-lg appearance-none focus:border-primary focus:rounded-lg focus:outline-none transition-all duration-500" placeholder="Enter your email" name="email" type="email" required>
        </div>

        <div class="w-full py-1 flex flex-col">
            <label class="font-semibold text-sm " for="password">Password</label>
            <input class="block py-2.5 px-3 w-full text-sm text-black bg-transparent border-2 border-gray rounded-lg appearance-none focus:border-primary focus:rounded-lg focus:outline-none transition-all duration-500" placeholder="Enter your password" name="password" type="password" required>
        </div>

        <div class="w-full py-1 flex flex-col">
            <label class="font-semibold text-sm " for="passconf">Password Confrimation</label>
            <input class="block py-2.5 px-3 w-full text-sm text-black bg-transparent border-2 border-gray rounded-lg appearance-none focus:border-primary focus:rounded-lg focus:outline-none transition-all duration-500" placeholder="Confirm your password" name="passconf" type="password" required>
        </div>

        <button type="submit" class="w-full py-2.5 rounded-lg bg-primary text-white font-bold">Register</button>

        <p>Already have an account? <a class="font-bold text-primary" href="<?php echo site_url('auth/login') ?>">Login to your account</a></p>

    </div>
</form>

<?= $this->endSection('form'); ?>