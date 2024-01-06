<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="h-screen bg-gray-100 w-full pb-20">
    <div class="pt-6 px-6 pb-4">
        <h1 class="uppercase text-2xl font-semibold text-gray-600">Komentar</h1>
    </div>

    <?php if (session('pesan')) : ?>
        <p class="bg-green-200 text-green-600 rounded-lg p-4 mx-6 mb-6 flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg><?= session()->getFlashdata('pesan'); ?></p>
    <?php endif ?>

    <div class="mx-6 md:mx-6 flex gap-x-4">
        <div class="w-full">
            <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3">Berita</th>
                    <th class="px-4 py-3">Jumlah Komentar</th>
                    <th class="px-4 py-3 text-center" colspan="2">aksi</th>
                </tr>
                <?php $n = 1 ?>
                <?php foreach ($komentar as $kmn) : ?>
                    <tr class="bg-white border-b border-gray-200 ">
                        <td class="px-4 py-3"><?= $n++; ?></td>
                        <td class="px-4 py-3"><?= $kmn['judul']; ?></td>
                        <td class="px-4 py-3"><?= $kmn['jml_komen']; ?> Komentar</td>
                        <td class="flex items-center justify-center gap-x-2 px-4 py-3">
                            <form action="/admin/komentar/show" method="POST">
                                <input type="hidden" name="lihat" value="<?= $kmn['id']; ?>">
                                <button type="submit" class="text-sm bg-green-600 text-white rounded-lg shadow-md hover:bg-green-800 py-1 px-3">Lihat</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <?php if (isset($showKomen)) : ?>
            <div class="w-3/4 bg-white rounded-t-lg mt-5">
                <div class="text-right">
                    <div class="px-4 pt-4">
                        <a href="/admin/komentar">
                            <button>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </a>
                    </div>
                </div>
                <div class="text-left">
                    <div class="px-4 pb-2 font-semibold">Judul Berita : <p class="font-light"><?= $show['judul']; ?></p>
                    </div>
                </div>
                <div class="text-left">
                    <div class="px-4 font-semibold">Komentar : </div>
                </div>
                <div class="overflow-y-scroll h-96">
                    <table class=" w-full mx-auto bg-white text-gray-800 h-screen">
                        <?php foreach ($showKomen as $show) : ?>
                            <tbody class="rounded-lg bg-white rounded-lg divide-y divide-gray-200 h-20">
                                <tr class="font-light">
                                    <td class="px-4 py-2"><?= $show['nama']; ?></td>
                                    <td class="px-4 py-2"><?= $show['komentar']; ?></td>
                                    <td class="px-4">
                                        <form action="/admin/komentar/<?= $show['id_komen']; ?>" method="POST">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="text-sm bg-red-600 text-white rounded-lg shadow-md hover:bg-red-800 py-1 px-3" onclick="return confirm('Apakah anda yakin ingin menghapus')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        <?php endforeach ?>
                        <tr class="text-left">
                            <th class="p-2"></th>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endif ?>
    </div>

    <?= $this->endSection(); ?>