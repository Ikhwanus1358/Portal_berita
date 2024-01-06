<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="h-screen bg-gray-100 w-full pb-20">
    <div class="py-6 px-6 ">
        <h1 class="uppercase md:text-2xl text-xl font-semibold text-gray-600">Dashboard</h1>
    </div>

    <div class="px-6">
        <h1 class="text-2xl">Selamat datang <?= session()->get('nama_admin'); ?></h1>
    </div>

    <div class="grid md:grid-cols-4 sm:grid-cols-2 grid-cols-1 bg-gray-100 mt-4 md:mx-6 gap-x-4 gap-y-4">
        <div class="">
            <div class="bg-white max-w-md mx-auto rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                <div class="h-20 bg-red-400 flex items-center justify-between">
                    <p class="mr-0 text-white text-lg pl-5">PENGUNJUNG</p>
                </div>
                <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                    <p>TOTAL</p>
                </div>
                <p class="py-4 text-3xl ml-5">20,456</p>
                <!-- <hr > -->
            </div>
        </div>

        <div class="">
            <div class=" bg-white max-w-md mx-auto rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                <div class="h-20 bg-blue-500 flex items-center justify-between">
                    <p class="mr-0 text-white text-lg pl-5">PENGUNJUNG HARI INI</p>
                </div>
                <div class="flex justify-between px-5 pt-6 mb-2 text-sm text-gray-600">
                    <p>TOTAL</p>
                </div>
                <p class="py-4 text-3xl ml-5">194</p>
                <!-- <hr > -->
            </div>
        </div>

        <div class="">
            <div class="bg-white max-w-md mx-auto rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                <div class="h-20 bg-purple-400 flex items-center justify-between">
                    <p class="mr-0 text-white text-lg pl-5">JUMLAH BERITA</p>
                </div>
                <div class="flex justify-between pt-6 px-5 mb-2 text-sm text-gray-600">
                    <p>TOTAL</p>
                </div>
                <p class="py-4 text-3xl ml-5">711</p>
                <!-- <hr > -->
            </div>
        </div>

        <div class="">
            <div class=" bg-white max-w-md mx-auto rounded-lg overflow-hidden shadow-lg hover:shadow-2xl transition duration-500 transform hover:scale-100 cursor-pointer">
                <div class="h-20 bg-purple-900 flex items-center justify-between">
                    <p class="mr-0 text-white text-lg pl-5">BERITA HARI INI</p>
                </div>
                <div class="flex justify-between pt-6 px-5 mb-2 text-sm text-gray-600">
                    <p>TOTAL</p>
                </div>
                <p class="py-4 text-3xl ml-5">5</p>
                <!-- <hr > -->
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 m-5 gap-x-4 gap-y-2 items-center">
        <table class="col-span-3 rounded-t-lg w-full bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Tanggal</th>
                <th class="px-4 py-3 text-center" colspan="2">aksi</th>
            </tr>
            <tr class="bg-white border-b border-gray-200">
                <td class="px-4 py-3">Jill</td>
                <td class="px-4 py-3">Smith</td>
                <td class="px-4 py-3">50</td>
                <td class="px-4 py-3">Male</td>
                <td class="text-center">
                    <button class="bg-yellow-400 text-white rounded-lg shadow hover:bg-yellow-600 py-1 px-3">Edit</button>
                    <button class="bg-red-600 text-white rounded-lg shadow hover:bg-red-800 py-1 px-3">Delete</button>
                </td>
            </tr>
            <tr class="bg-white border-b border-gray-200">
                <td class="px-4 py-3">Jill</td>
                <td class="px-4 py-3">Smith</td>
                <td class="px-4 py-3">50</td>
                <td class="px-4 py-3">Male</td>
                <td class="text-center">
                    <button class="bg-yellow-400 text-white rounded-lg shadow hover:bg-yellow-600 py-1 px-3">Edit</button>
                    <button class="bg-red-600 text-white rounded-lg shadow hover:bg-red-800 py-1 px-3">Delete</button>
                </td>
            </tr>
            <tr class="bg-white border-b border-gray-200">
                <td class="px-4 py-3">Jill</td>
                <td class="px-4 py-3">Smith</td>
                <td class="px-4 py-3">50</td>
                <td class="px-4 py-3">Male</td>
                <td class="text-center">
                    <button class="bg-yellow-400 text-white rounded-lg shadow hover:bg-yellow-600 py-1 px-3">Edit</button>
                    <button class="bg-red-600 text-white rounded-lg shadow hover:bg-red-800 py-1 px-3">Delete</button>
                </td>
            </tr>
        </table>
        <div class="w-full">
            <div class="block bg-white text-center">
                <?php date_default_timezone_set('Asia/Jakarta'); ?>
                <div class="bg-red-600 rounded-t-lg text-white py-1">
                    <?= date('F'); ?>
                </div>
                <div class="pt-1 border-l border-r my-10">
                    <span class="text-4xl font-bold"><?= date('j'); ?></span>
                </div>
                <div class="pb-2 px-2 rounded-b flex justify-between mx-4">
                    <span class="text-sm font-bold"><?= date('l'); ?></span>
                    <span class="text-sm font-bold"><?= date('Y'); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>