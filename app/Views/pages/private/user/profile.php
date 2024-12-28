<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<form class="container-xl" action="<?= site_url('profile') ?>" method="post">
    <?= csrf_field(); ?>
    <input type="text" name="_method" value="PUT" hidden>
    <div class="row">
        <?php if (session()->getFlashdata('error')) : ?>
            <?= $this->include('components/error-notification') ?>
        <?php endif; ?>

        <div class="col-12">
            <div class="form-group mb-3">
                <label for="name">Fullname</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Insert your fullname" value="<?= old('name', $user['name'] ?? null) ?>">
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="phone">Phone number</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="phone" id="phone" placeholder="Insert your phone number" value="<?= old('phone', $user['phone'] ?? null) ?>" required>
                </div>
            </div>

            <div class="form-group mb-3">
                <label for="address">Address</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" name="address" id="address" placeholder="Insert your address"><?= old('address', $user['address'] ?? null) ?></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary col-2">Save</button>
        </div>
    </div>
</form>

<?= $this->endSection('content') ?>