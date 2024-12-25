<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>
<div class="row py-3 px-5">

    <div class="col-12 bg-white">
        <img src="<?= site_url('/images/headerImage.png') ?>" alt="" width="100%">
    </div>

    <div class="mt-5 d-flex flex-column align-items-center justify-content-center">
        <h1 class="fw-bold fs-1">Find something here</h1>
        <a class="btn btn-dark fw-bold rounded-pill" href="<?= site_url('/products') ?>">Shop Now!</a>
    </div>

    <div class="row mt-5">
        <div class="row d-flex flex-row align-items-center">
            <span class="bg-dark rounded" style="width: 5px; height: 40px;"></span>
            <div class="col-2">
                <h5 class="mb-0 fw-bold">Collections</h5>
            </div>
        </div>
        <div class="row mt-4">
            <?php foreach ($categories as $key => $category): ?>
                <a href="<?= site_url('/products?category=' . $category['name']) ?>" class="col-2 text-decoration-none text-dark">
                    <div class="item d-flex flex-column align-items-center justify-content-center border rounded py-4">
                        <i class='fs-1 <?= $category['icon'] ?>'></i>
                        <p class="fw-bolder mb-0"><?= $category['name'] ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="row d-flex flex-row align-items-center">
                <span class="bg-dark rounded" style="width: 5px; height: 40px;"></span>
                <div class="col-2">
                    <h5 class="mb-0 fw-bold">Best seller</h5>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row mt-4 ">
                <?php foreach ($products as $key => $product): ?>
                    <a href="<?= site_url('/products/' . $product['slug']) ?>" class="col-3 text-decoration-none text-dark">
                        <img style="width: 100%; aspect-ratio: 1/1;" src="<?= site_url('/products/' . $product['image']) ?>" alt="" srcset="">
                        <div class="item d-flex flex-column py-3">
                            <p class="fw-bolder mb-0"><?= $product['name'] ?></p>
                            <p class="fw-bolder text-secondary mb-0"><?= $product['category_name'] ?></p>
                            <p class="fw-bolder fs-5 pt-2 mb-0">Rp <?= number_format($product['price'], 2, ',', '.') ?></p>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>



<?= $this->endSection('content'); ?>