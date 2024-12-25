<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="row p-4 p-md-5 row-gap-4">
    <form method="post" action="<?php echo isset($category) ? base_url('/dashboard/categories/' . $category['id']) : base_url('/dashboard/categories') ?>" class="row">
        <div class="col-8">
            <div class="row">
                <label for="name"><?php echo isset($category) ? 'Edit category' : 'Add category' ?></label>
                <?php if (session()->has('validation')) :  foreach (session()->getFlashdata('validation') as $error) : ?>
                        <p class="text-danger"><?= esc($error) ?></p>
                <?php endforeach;
                endif; ?>
            </div>
            <input class="form-control-sm form-control" type="text" value="<?php echo isset($category) ? $category['name'] : "" ?>" name="name" id="">
        </div>
        <div class="col-4 d-flex flex-row align-items-end justify-content-end">
            <button type="submit" class="btn btn-primary fw-bold"><?php echo isset($category) ? 'Edit category' : 'Add category' ?></button>
        </div>
    </form>
    <div class="row d-flex row-gap-3m justify-content-between">
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
                    <th width="70%">Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $key => $category): ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $category['name'] ?></td>
                        <!-- issue -->
                        <td class="d-flex align-items-center gap-3">
                            <a href="<?php echo site_url('dashboard/categories/' . $category['id']) ?>" class="btn btn-warning btn-sm mr-2">
                                <i class='bx bx-edit'></i>
                                Edit
                            </a>
                            <form method="post" action="<?php echo base_url('dashboard/categories/' . $category['id']); ?>">
                                <?php csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" title='Delete'>
                                    <i class='bx bx-trash'></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>

<?= $this->endSection('content'); ?>