<?= $this->extend('layouts/app'); ?>

<?= $this->section('content'); ?>

<div class="row p-4 p-md-5 row-gap-2">
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $user): ?>
                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['phone'] ?></td>
                        <td><?= $user['address'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!--end: Datatable-->
    </div>
</div>

<?= $this->endSection('content'); ?>