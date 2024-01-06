<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="h-screen bg-gray-100 w-full pb-20">
    <div class="pt-6 px-6 pb-8">
        <h1 class="uppercase text-2xl font-semibold text-gray-600">Konfigurasi</h1>
    </div>

    <?php if (session('gagal')) : ?>
        <p class="bg-red-200 text-red-600 rounded-lg p-4 mx-6 mb-6 flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg><?= session()->getFlashdata('msg'); ?></p>
    <?php endif ?>

    <div class="px-6 grid md:grid-cols-2 grid-cols-1 gap-2 mb-8 gap-y-8">
        <form action="/admin/konfigurasi/updatelogo" method="POST" enctype="multipart/form-data">
            <div class="space-y-2">
                <label class="block text-lg font-semibold" for="">Logo</label>
                <img class="w-52 py-4" src="/img/logo.png" alt="">
                <div class="flex items-center">
                    <input name="logo" class="bg-white rounded md:w-1/2 w-3/4 border text-gray-400 mr-4" type="file">
                    <button type="submit" name="updateLogo" class="bg-blue-500 text-white py-1 px-2 rounded shadow-lg" onclick="return confirm('Apakah anda yakin ingin mengganti logo?')">Ganti Logo</button>
                </div>
                <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                    <?php if ($validation->hasError('logo')) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    <?php endif ?>
                    <?= $validation->getError('logo'); ?>
                </div>
            </div>
        </form>
        <div class="space-y-2">
            <form action="/admin/konfigurasi/updateIcon" method="POST" enctype="multipart/form-data">
                <label class="block text-lg font-semibold" for="">Icon Situs</label>
                <img class="w-16 my-3" src="/img/icon.ico" alt="">
                <div class="flex items-center">
                    <input name="icon" class="bg-white rounded md:w-1/2 w-3/4 border text-gray-400 mr-4" type="file">
                    <button type="submit" name="updateIcon" class="bg-blue-500 text-white py-1 px-2 rounded shadow-lg" onclick="return confirm('Apakah anda yakin ingin mengganti Icon?')">Ganti Icon</button>
                </div>
                <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                    <?php if ($validation->hasError('icon')) : ?>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    <?php endif ?>
                    <?= $validation->getError('icon'); ?>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>