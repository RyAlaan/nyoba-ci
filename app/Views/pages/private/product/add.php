<?php $this->extend('layouts/app'); ?>

<?php $this->section('content') ?>
<div class="row">
    <?php if (session()->has('validation')) :  foreach (session()->getFlashdata('validation') as $error) : ?>
            <p class="text-danger"><?= esc($error) ?></p>
    <?php endforeach;
    endif; ?>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h3>Add new Product</h3>
                <hr>
                <form class="" action="<?php echo site_url('dashboard/products/add') ?>" method="POST" enctype="multipart/form-data">
                    <?php csrf_field(); ?>
                    <div class="form_group row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Select image</label>
                        <div class="col-sm-10">
                            <!-- <div class="custom-file"> -->
                            <input type="file" class="custom-file-input form-control" name="image" id="image" value="<?php old('file', null) ?>">
                            <!-- </div> -->
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label">Select Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="select-category" name="category_id" <?php old('category_id', null) ?>>
                                <?php foreach ($categories as $category) : ?>
                                    <option class="" value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required value="<?php old('name', null) ?>">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" placeholder="Enter product description" rows="3"><?php old('description', null) ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">price</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter product price" required value="<?php old('price', null) ?>">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="stock" class="col-sm-2 col-form-label">stock</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Enter product stock" required <?php old('stock', null) ?>>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save product</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $this->endSection('content') ?>