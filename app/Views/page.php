<?= $this->extend('layout/template_user'); ?>

<?= $this->section('content'); ?>
<div class="lg:px-40 mt-2">
    <div class="flex flex-wrap md:flex-nowrap md:gap-x-4">
        <div class="bg-white min-h-full py-4 w-full md:w-2/3">
            <h3 class="font-bold text-4xl text-center mt-8 px-8"><?= $berita['judul']; ?></h3>
            <p class="text-center p-2"><?= $berita['kategori']; ?> - <?= $berita['nama']; ?></p>
            <p class="text-center pb-6 text-gray-400"><?= $berita['hari']; ?>, <?= $berita['tanggal']; ?> WIB</p>
            <div class="flex justify-center">
                <img class="md:w-full" src="/img/<?= $berita['gambar']; ?>" alt="">
            </div>
            <p class="mb-4 text-sm md:px-0 px-4"><?= $berita['ket']; ?></p>
            <div class="md:px-0 px-4">
                <?= $berita['isi']; ?>
            </div>
            <div class="my-8 space-y-4">
                <p class="bg-gray-200 uppercase text-gray-600 font-bold py-2 px-4 text-lg">Komentar</p>
                <form action="/page/komentar" method="POST">
                    <div class="rounded-md border-2 border-gray-300">
                        <textarea name="komentar" class="resize-none outline-none p-2 w-full" rows="5" placeholder="Tulis Komentar..."></textarea>
                        <input type="hidden" name="id_berita" value="<?= $berita['id']; ?>">
                        <input type="hidden" name="id_member" value="<?= session()->get('id_member'); ?>">
                        <div class="flex justify-end">
                            <?php if (session()->get('id_member')) : ?>
                                <button type="submit" name="kirim" class="flex items-center gap-x-2 bg-blue-600 hover:bg-blue-700 shadow-lg text-white font-semibold rounded-lg py-2 px-4 m-2">Kirim</button>
                            <?php endif ?>
                </form>
                <?php if (!session()->get('id_member')) : ?>
                    <button type="button" name="harus_login" class="flex items-center gap-x-2 bg-blue-600 hover:bg-blue-700 shadow-lg text-white font-semibold rounded-lg py-2 px-4 m-2" id="btn-buka">Kirim</button>
                    <?php session()->setFlashdata('login_required', 'Untuk menulis komentar silahkan login terlebih dahulu') ?>
                <?php endif ?>
            </div>
        </div>

        <?php if ($komentar == null) : ?>
            <div class="bg-gray-200 rounded-md">
                <div class="p-4 ">
                    <div class="my-4">
                        <p class="text-center text-gray-500 font-bold text-lg flex justify-center">Belum ada Komentar</p>
                        <div class="flex items-center justify-center text-gray-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <p class="text-center text-gray-400 ">Jadilah yang pertama komentar disini</p>
                    </div>
                </div>
            </div>
        <?php endif ?>

        <?php if ($komentar != null) : ?>
            <?php foreach ($komentar as $komen) : ?>
                <div class="bg-gray-100 rounded-md">
                    <div class="p-4 ">
                        <div class="flex gap-x-2 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="font-semibold text-lg"><?= $komen['nama']; ?></p>
                        </div>
                        <div class="text-gray-500 mx-12"><?= $komen['komentar']; ?></div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </div>
</div>

<?= $this->endSection(); ?>