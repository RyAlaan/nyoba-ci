<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?= $this->include('layouts/tailwindcdn') ?>
</head>

<body>
    <main class="w-full h-screen flex font-mulish <?= uri_string() === "auth/login" ? "flex-row" : "flex-row-reverse" ?>">

        <div class="w-2/5 h-full flex items-center justify-center bg-primary">
            <img class="w-[280px] aspect-square" src="/images/auth.png" alt="">
        </div>

        <?= $this->renderSection('form'); ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>

</html>