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
                <h3>Edit Product</h3>
                <hr>
                <form class="" action="<?php echo site_url('dashboard/products/' . $product['id']) ?>" method="POST" enctype="multipart/form-data">
                    <?php csrf_field(); ?>

                    <div class="form_group row mb-3">
                        <label for="image" class="col-sm-2 col-form-label">Select image</label>
                        <div class="col-sm-10 gap-3 d-flex flex-row">
                            <img id="imagePreview" src="<?= site_url('/products/' . $product['image']) ?>" alt="Image Preview" style="display: block; margin-top: 10px; max-width: 120px; height: auto;" />
                            <input type="file" class="custom-file-input form-control" name="image" id="image" value="<?php old('file', null) ?>" accept="image/*">
                        </div>
                    </div>


                    <div class="form-group row mb-3">
                        <label for="category_id" class="col-sm-2 col-form-label">Select Category</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="select-category" value="<?= $product['category_id'] ?>" name="category_id" <?php old('category_id', null) ?>>
                                <?php foreach ($categories as $category) : ?>
                                    <option class="" value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" required value="<?= old('name', $product['name'] ?? '') ?>">
                        </div>
                    </div>

                    <div class=" form-group row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="description" name="description" placeholder="Enter product description" rows="3" require><?= old('description', $product['description'] ?? '') ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="price" class="col-sm-2 col-form-label">price</label>
                        <div class="col-sm-10">
                            <input
                                type="number"
                                class="form-control"
                                id="price"
                                name="price"
                                placeholder="Enter product price"
                                required
                                value="<?= old('price', $product['price'] ?? 0) ?>">
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="stock" class="col-sm-2 col-form-label">stock</label>
                        <div class="col-sm-10">
                            <input type="number"
                                class="form-control"
                                id="stock"
                                name="stock"
                                placeholder="Enter product stock"
                                required
                                value="<?= old('stock', $product['stock'] ?? 0) ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('image').addEventListener('change', (event) => {
        console.log("change");

        const imageInput = event.target;
        imagePreview = document.getElementById('imagePreview');

        if (imageInput.files && imageInput.files[0]) {
            const reader = new FileReader();

            reader.onload = (e) => {
                imagePreview.src = e.target.result;
                imagePreview.style.display = "block";
            };

            reader.readAsDataURL(imageInput.files[0])
        } else {
            imagePreview.style.display = 'none';
        }
    })
</script>

<?php $this->endSection('content') ?>