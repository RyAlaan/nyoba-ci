<?php $this->extend('layouts/app')  ?>

<?php $this->section('content') ?>

<div class="container-xl">
    <div class="row">

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="col-12 mb-4 alert alert-danger alert-dismissible fade show" role="alert">
                <?= esc(session()->getFlashdata('error')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert">x</button>
            </div>
        <?php endif ?>

        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <td>no</td>
                        <td>Total Price</td>
                        <td>Status</td>
                        <td width="20%">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($orders as $key => $order) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= number_format($order['total_price'], 2, ',', '.') ?></td>
                            <td><?= $order['status'] ?></td>
                            <td>
                                <div class="">
                                    <a href="<?= site_url('orders/' . $order['id']) ?>" type="button" class="btn btn-outline-primary">
                                        <i class="bx bx-search"></i> Detail
                                    </a>
                                    <button type="button" class="btn btn-outline-danger">
                                        <i class="bx bx-trash"></i> Remove
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php $this->endSection('content') ?>