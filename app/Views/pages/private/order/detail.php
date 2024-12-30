<?php $this->extend('layouts/app') ?>

<?php $this->section('content') ?>

<div class="container-xl">
    <div class="row row-gap-4 mb-4">
        <div class="col-12 col-md-6">
            <div class="rounded border-light-subtle card py-3 px-4">
                <div class="card-header bg-white mb-2">
                    <h4 class="fw-bold">User Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-secondary"><i class='bx bxs-user-circle'></i> Customer</p>
                        </div>
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-end">User</p>
                        </div>
                    </div>
                    <div class="row py-2 border border-start-0 border-end-0">
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-secondary"><i class='bx bx-envelope'></i> Email</p>
                        </div>
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-end">ambasing@mail.com</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-secondary"><i class='bx bxs-phone'></i> Phone</p>
                        </div>
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-end">0843-1234-4321</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="rounded border-light-subtle card py-3 px-4">
                <div class="card-header bg-white mb-2">
                    <h4 class="fw-bold">User Details</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-secondary"><i class='bx bxs-user-circle'></i> Customer</p>
                        </div>
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-end">User</p>
                        </div>
                    </div>
                    <div class="row py-2 border border-start-0 border-end-0">
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-secondary"><i class='bx bx-envelope'></i> Email</p>
                        </div>
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-end">ambasing@mail.com</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-secondary"><i class='bx bxs-phone'></i> Phone</p>
                        </div>
                        <div class="col-6">
                            <p class="my-2 fs-6 fw-bold text-end">0843-1234-4321</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-light-subtle rounded py-3 px-4">
                <div class="card-header bg-white mb-4">
                    <h4 class="fw-bold">Detail Product</h4>
                </div>
                <div class="card-body text-secondary">
                    <table class="table align-middle fs-6 gy-5 mb-0">
                        <thead>
                            <tr class="text-start text-secondary fw-bold fs-7 text-uppercase gs-0">
                                <th class="min-w-175px">Product</th>
                                <th class="min-w-70px text-end">Qty</th>
                                <th class="min-w-100px text-end">Unit Price</th>
                                <th class="min-w-100px text-end">Total</th>
                            </tr>
                        </thead>
                        <tbody class="fw-medium text-secondary">
                            <?php foreach ($orderItem['products'] as $key => $product) : ?>
                                <tr class="">
                                    <td>
                                        <a href="<?= site_url('products/' . $product['id']) ?>" class="d-flex align-items-center">
                                            <!--begin::Thumbnail-->
                                            <img src="<?= site_url('/products/' . $product['image']) ?>" alt="" class="ratio ratio-1x1" style="max-width: 50px;">
                                            <!--end::Thumbnail-->

                                            <!--begin::Title-->
                                            <div class="ms-5">
                                                <p class="fw-bold text-secondary decoration-none mb-0"><?= $product['name'] ?></p>
                                            </div>
                                            <!--end::Title-->
                                        </a>
                                    </td>
                                    <td class="text-end">
                                        <?= $orderItem['quantity'] ?>
                                    </td>
                                    <td class="text-end">
                                        <?= 'Rp ' . number_format($product['price'], '2', ',', '.') ?>
                                    </td>
                                    <td class="text-end">
                                        <?= 'Rp ' .  number_format($orderItem['price'], '2', ',', '.') ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3" class="fs-3 text-end">
                                    Grand Total
                                </td>
                                <td class="fs-3 fw-bold text-end">
                                    <?php
                                    $totalPrice = 0;

                                    foreach ($orderItem['products'] as $key => $product) {
                                        $totalPrice += $product['price'] * $orderItem['quantity'];
                                    }

                                    echo 'Rp ' . number_format($totalPrice, '2', ',', '.');
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endSection('content') ?>