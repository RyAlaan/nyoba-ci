<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RyStore - CodeIgniter</title>

    <!-- tailiwndcdn -->
    <?= $this->include('layouts/tailwindcdn') ?>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <?= $this->include('layouts/navigation'); ?>

        <!-- Page Content -->
        <main>
            <?= $this->renderSection('content'); ?>
        </main>
    </div>
</body>

</html>