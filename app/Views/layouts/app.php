<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RyStore - CodeIgniter</title>

    <!-- tailiwndcdn -->
    <?= $this->include('layouts/bootstrap') ?>
    <?php if (strpos(uri_string(), 'dashboard') !== false): ?>
        <style>
            @media screen and (min-width: 768px) {
                body {
                    margin: calc(var(--header-height) + 1rem) 0 0 0;
                    padding-left: calc(var(--nav-width) + 2rem);
                }
            }
        </style>
    <?php endif; ?>
</head>

<body class="font-mulish bg-light antialiased" id="body-pd">

    <?= strpos(uri_string(), 'dashboard') === false ? $this->include('layouts/navbar') : $this->include('layouts/sidebar') ?>

    <!--Container Main start-->
    <main style="margin-top: 5rem;" class="bg-white">
        <?= $this->renderSection('content') ?>
    </main>
    <!--Container Main end-->

</body>

</html>