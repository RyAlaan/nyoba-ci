<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="row p-4 p-md-5 row-gap-2">
    <div class="row d-flex row-gap-3 justify-content-between">
        <div class="col-12">
            <a href="<?php echo site_url('/dashboard/products/add') ?>" class="btn btn-primary">Add product</a>
        </div>
        <div class="col-12 col-md-3 d-flex align-items-center">
            <p class="mb-0 me-2">Show</p>
            <select class="form-select form-select-sm me-2" aria-label="Small select example">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
            </select>
            <p class="mb-0">entries</p>
        </div>
        <div class="col-12 col-md-3 d-flex align-items-center">
            <p class="mb-0">search</p>
            <input class="form-control form-control-sm" type=" text">
        </div>
    </div>
    <div class="col-lg-12">
        <!--begin: Datatable-->
        <table class="table" id="kt_datatable1">
            <thead>
                <tr>
                    <th width="10%">#</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $key => $product): ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['category_name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td><?= $product['stock'] ?></td>
                        <td>edit delete</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>

    <?php if ($products) : ?>
        <div class="row d-flex flex-row align-items-center justify-content-between">
            <div class="col-3">
                <p class="mb-0">showing <?php echo $products[0]['id'] ?> to <?php echo $products[count($products) - 1]['id'] ?> of <?php echo $page->getTotal(); ?> entries</p>
            </div>

            <!-- start: Pagination -->
            <div class="col-1">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $page->getPreviousPageURI() ?>" tabindex="-1"><i class='bx bx-chevrons-left'></i></a>
                        </li>
                        <?php if ($page->getCurrentPage() - 1 > 0): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $page->getPreviousPageURI() ?>"><?php echo $page->getCurrentPage() + -1 ?></a>
                            </li>
                        <?php endif; ?>
                        <li class="page-item">
                            <a class="page-link active" href="">
                                <?php echo $page->getCurrentPage() ?>
                            </a>
                        </li>
                        <?php if ($page->hasMore()): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo $page->getNextPageURI() ?>"><?php echo $page->getCurrentPage() + 1 ?></a>
                            </li>
                        <?php endif; ?>
                        <li class="page-item">
                            <a class="page-link" href="<?php echo $page->getNextPageURI() ?>"><i class='bx bx-chevrons-right'></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- end: Pagination -->
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection('content'); ?>