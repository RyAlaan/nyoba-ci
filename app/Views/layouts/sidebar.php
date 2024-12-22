<aside id="sidebar-multi-level-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full overflow-y-auto bg-gray-800">
        <div class="w-full p-6 border-1 border-slate-400">
            <p class="text-2xl text-white font-black">RYSTORE</p>
        </div>

        <ul class="px-3 py-4 space-y-2 font-medium">
            <li>
                <a href="#" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
                    <i class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white fa-solid fa-chart-pie"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group dark:text-white hover:bg-gray-700" aria-controls="user-management" data-collapse-toggle="user-management">
                    <i class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white fa-solid fa-cart-shopping"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">User management</span>
                    <i class="fa-solid fa-angle-down"></i>
                </button>

                <ul id="user-management" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700">Customer</a>
                    </li>
                </ul>
            </li>

            <li>
                <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group dark:text-white hover:bg-gray-700" aria-controls="product-management" data-collapse-toggle="product-management">
                    <i class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white fa-solid fa-cart-shopping"></i>
                    <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Product management</span>
                    <i class="fa-solid fa-angle-down"></i>
                </button>

                <ul id="product-management" class="hidden py-2 space-y-2">
                    <li>
                        <a href="#" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700">Category</a>
                    </li>
                    <li>
                        <a href="#" class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group text-white hover:bg-gray-700">Porduct</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#" class="flex items-center p-2 rounded-lg text-white hover:bg-gray-700 group">
                    <i class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white fa-solid fa-chart-pie"></i>
                    <span class="ms-3">Order Management</span>
                </a>
            </li>

        </ul>
    </div>
</aside>

<nav class="ml-64 px-8 py-5 flex flex-row items-center justify-between bg-white">
    <a class="font-semibold text-slate-500" href="<?= site_url('/') ?>">Back to home</a>
    <p class="text-slate-200">Hi, <span class="font-bold text-slate-500"><?= session()->get('name') ?></span></p>
</nav>