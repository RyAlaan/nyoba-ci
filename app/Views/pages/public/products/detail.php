<?php $this->extend('layouts/app') ?>

<?php $this->section('content') ?>

<div class="container-xl">
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="ratio ratio-1x1 bg-light">
                <img class="object-fit-contain" src="<?= site_url('/products/' . $product['image']) ?>" alt="">
            </div>
        </div>
        <div class="col-12 col-md-8">
            <h2 class="fw-bold"><?= $product['name'] ?></h2>
            <p class=""><?= $product['description'] ?></p>
            <form class="row" method="post" action="<?= site_url('carts/add') ?>">
                <?php csrf_field(); ?>
                <div class="col-3">
                    <div class="d-flex flex-row align-items-center">
                        <button class="btn btn-outline-secondary" type="button" id="decrement">
                            <i class="bx bx-minus"></i>
                        </button>

                        <input type="number" width="40px" id="inputQuantity" class="form-control mx-2" value="1" min="1" required>

                        <button class="btn btn-outline-secondary" type="button" id="increment">
                            <i class="bx bx-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-primary"><i class='bx bxs-cart-add'></i> Add To Cart</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const increment = document.getElementById('increment')
    const decrement = document.getElementById('decrement')
    const inputQuantity = document.getElementById('inputQuantity')

    increment.addEventListener('click', function() {
        const inputVal = parseInt(inputQuantity.value)
        if (inputVal < <?= $product['stock'] ?>) {
            inputQuantity.value++
        }
    })

    decrement.addEventListener('click', function() {
        const inputVal = parseInt(inputQuantity.value)
        if (inputVal > 1) {
            inputQuantity.value--
        }
    })
</script>

<?php $this->endSection('content') ?>