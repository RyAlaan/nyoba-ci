<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="flex flex-row gap-x-10">
    <div class="w-1/3 px-5 py-6 flex flex-row gap-x-2 bg-primary">
        <i class="text-xl text-white fa-solid fa-users"></i>
        <p class="font-bold text-white text-xl">
            <?php  // $this->users->count() 
            ?>
            1 Users
        </p>
    </div>
    <div class="w-1/3 px-5 py-6 flex flex-row gap-x-2 bg-primary">
        <i class="text-xl text-white fa-solid fa-boxes-stacked"></i>
        <p class="font-bold text-white text-xl">
            <?php  // $this->users->count() 
            ?>
            1 Products
        </p>
    </div>
    <div class="w-1/3 px-5 py-6 flex flex-row gap-x-2 bg-primary">
        <i class="text-xl text-white fa-solid fa-bell"></i>
        <p class="font-bold text-white text-xl">
            <?php  // $this->users->count() 
            ?>
            1 Confirm Orders
        </p>
    </div>
</div>

<?= $this->endSection('content'); ?>