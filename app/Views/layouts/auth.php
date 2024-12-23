<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?= $this->include('layouts/bootstrap') ?>
</head>

<body style="overflow: hidden;" class="vh-100 d-flex flex-column overflow-none">

    <div class="row flex-grow-1">
        <div class="col-md-4 bg-primary d-flex align-items-center justify-content-center">
            <img src="/images/auth.png" style="width: 280px;" class="img-fluid" alt="">
        </div>
        <?= $this->renderSection('content')?>
    </div>

</body>

</html>