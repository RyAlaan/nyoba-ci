<?php $this->extend('layouts/app'); ?>

<?php $this->section('content') ?>

<div class="container">
    <div class="row">
        <?php if (session()->getFlashdata('error')) : ?>
            <div class="col-12 mb-4 alert alert-danger alert-dismissible fade show" role="alert">
                <?= esc(session()->getFlashdata('error')) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="col-12">
            <form action="<?= site_url('carts/order') ?>" method="POST">
                <table class="table">
                    <thead>
                        <tr>
                            <th width="5%">#</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th width="10%">Qty</th>
                            <th width="15%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($carts)) : ?>
                            <?php foreach ($carts as $key => $cart) : ?>
                                <tr>
                                    <td class="align-middle">
                                        <input type="checkbox" name="selected_products[]" value="<?= $cart['product_id'] ?>" data-product-id="<?= $cart['product_id'] ?>">
                                    </td>
                                    <td class="align-middle">
                                        <div class="d-flex flex-row align-items-center row-gap-3">
                                            <img style="max-width: 55px; aspect-ratio: 1/1; margin-right: 5px;" src="<?= site_url('/products/' . $cart['product_image']) ?>" alt="">
                                            <p class="mb-0"><?= $cart['product_name'] ?></p>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <p class="fw-bold text-secondary">Rp <?= number_format($cart['product_price'], 2, ',', '.') ?></p>
                                    </td>
                                    <td class="align-middle">
                                        <input type="number" name="quantities[<?= $cart['product_id'] ?>]" class="form-control" value="<?= $cart['quantity'] ?>" max="<?= $cart['product_stock'] ?>">
                                    </td>
                                    <td class="align-middle">
                                        <button type="button" class="btn btn-outline-danger delete-cart-data" data-delete-url="<?= site_url('carts/delete/' . $cart['id']) ?>">
                                            <i class="bx bx-trash"></i> Remove
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </tbody>
                </table>
                <button type="submit" class="btn btn-primary">Order</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Perbaikan JavaScript
    document.querySelectorAll('.delete-cart-data').forEach((button) => {
        button.addEventListener('click', () => {
            const deleteUrl = button.getAttribute('data-delete-url');

            if (confirm('Are you sure you want to remove this item?')) {
                fetch(deleteUrl, {
                    method: "POST",
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        '_method': 'DELETE',
                        '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
                    })
                }).then((response) => {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        alert('Failed to delete the item. Please try again.');
                    }
                }).catch((err) => {
                    console.log(err.response);

                });
            }
        });
    });
</script>

<?php $this->endSection('content') ?>