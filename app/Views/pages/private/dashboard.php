<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="row">
    <div class="col-12 col-lg-4">
        <div class="p-2 d-flex flex-row align-items-center bg-primary text-white">
            <i class="fa-solid fa-users text-white me-2 fs-3"></i>
            <p class="font-weight-bold text-white fs-4 mb-0">
                <?php // $this->users->count() 
                ?>
                1 Users
            </p>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="p-2 d-flex flex-row align-items-center bg-primary text-white">
            <i class="fa-solid fa-boxes-stacked text-white me-2 fs-3"></i>
            <p class="font-weight-bold text-white fs-4 mb-0">
                <?php // $this->users->count() 
                ?>
                1 Products
            </p>
        </div>
    </div>
    <div class="col-12 col-lg-4">
        <div class="p-2 d-flex flex-row align-items-center bg-primary text-white">
            <i class="fa-solid fa-bell text-white me-2 fs-3"></i>
            <p class="font-weight-bold text-white fs-4 mb-0">
                <?php // $this->users->count() 
                ?>
                1 Confirm Orders
            </p>
        </div>
    </div>
</div>

<?= $this->endSection('content'); ?>