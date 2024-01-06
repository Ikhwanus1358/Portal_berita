<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="h-full bg-gray-100 w-full pb-20">
    <?php if (!isset($_POST['edit'])) : ?>
        <div class="pt-6 px-6 pb-8">
            <h1 class="uppercase text-2xl font-semibold text-gray-600">Tambah Kategori</h1>
        </div>

        <div class="">
            <?php if (session('pesan')) : ?>
                <p class="bg-green-200 text-green-600 rounded-lg p-4 mx-6 mb-6"><?= session()->getFlashdata('pesan'); ?></p>
            <?php endif ?>
            <?php if (session('gagal')) : ?>
                <p class="bg-red-200 text-red-600 rounded-lg p-4 mx-6 mb-6 flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg><?= session()->getFlashdata('msg'); ?></p>
            <?php endif ?>
        </div>

        <form action="/admin/kategori/tambah" method="POST">
            <div class="px-6 space-y-2">
                <div class="space-y-2">
                    <label class="block ml-1" for="">Kategori</label>
                    <input name="kategori" class="rounded-md lg:w-1/3 md:w-2/3 w-full px-3 py-1 bg-white focus:border-gray-500 border focus:outline-none" type="text" placeholder="Nama Kategori" value="<?= old('kategori'); ?>">
                    <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                        <?php if ($validation->hasError('kategori')) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        <?php endif ?>
                        <?= $validation->getError('kategori'); ?>
                    </div>
                </div>

                <input name="alias" class="rounded-md px-3 py-1 lg:w-1/3 md:w-2/3 bg-white w-full border focus:outline-none" type="hidden" placeholder="alias">

                <div class="space-y-2 col-span-2">
                    <label class="block" for="">Tampilkan</label>
                    <select class="py-1 px-2 rounded" name="terbit" id="">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <div class="py-6 mb-2">
                    <button type="submit" name="tambah" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-1 px-3 text-white">Tambah</button>
                </div>
            </div>
        </form>
    <?php endif ?>

    <?php if (isset($_POST['edit'])) : ?>
        <div class="pt-6 px-6 pb-8">
            <h1 class="uppercase text-2xl font-semibold text-gray-600">Edit Kategori</h1>
        </div>
        <form action="/admin/kategori/update" method="POST">
            <div class="px-6 space-y-2">
                <input name="id_kat" type="hidden" value="<?= $kat['id_kat']; ?>">
                <div class="space-y-2">
                    <label class="block" for="">Kategori</label>
                    <input name="kategori" class="rounded-md lg:w-1/3 md:w-2/3 w-full px-3 py-1 bg-white focus:border-gray-500 border focus:outline-none" type="text" placeholder="Nama Kategori" value="<?= $kat['kategori']; ?>">
                </div>
                <input name="alias" class="rounded-md px-3 py-1 lg:w-1/3 md:w-2/3 bg-white w-full border focus:outline-none" type="hidden" placeholder="alias" value="<?= $kat['alias']; ?>">
                <div class="space-y-2 col-span-2">
                    <?php if ($kat['terbit'] == 0 ? $s = 'selected' : $s = '') ?>
                    <label class="block" for="">Tampilkan</label>
                    <select class="py-1 px-2 rounded" name="terbit" id="">
                        <option value="1" <?= $s; ?>>Yes</option>
                        <option value="0" <?= $s; ?>>No</option>
                    </select>
                </div>
                <div class="py-6 mb-2 flex gap-x-2">
                    <a class="bg-gray-600 hover:bg-gray-700 rounded shadow-lg px-4 py-1 text-white" href="/admin/kategori">Batal</a>
                    <button type="submit" name="update" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-1 px-3 text-white">Edit</button>
                </div>
            </div>
        </form>
    <?php endif ?>

    <div class="mx-6 md:mx-6 border-t-2">
        <div class="mt-6">
            <h1 class="uppercase font-semibold text-2xl">Daftar Kategori</h1>
        </div>
        <div class="">
            <table class="table-auto rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
                <tr class="text-left border-b-2 border-gray-300 text-center">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Alias</th>
                    <th class="px-4 py-3">Terbit</th>
                    <th class="px-4 py-3 text-center">aksi</th>
                </tr>
                <?php foreach ($kategori as $k) : ?>
                    <tr class="bg-white border-b border-gray-200 text-center">
                        <td class="px-4 py-3"><?= $k['id_kat']; ?></td>
                        <td class="px-4 py-3"><?= $k['kategori']; ?></td>
                        <td class="px-4 py-3"><?= $k['alias']; ?></td>
                        <td class="px-4 py-3 w-24">
                            <?php if ($k['terbit'] == 1) : ?>
                                <div class="text-center text-green-500 bg-green-200 rounded-full">Yes</div>
                            <?php endif ?>
                            <?php if ($k['terbit'] == 0) : ?>
                                <p class="text-center text-red-500 bg-red-200 rounded-full">No</p>
                            <?php endif ?>
                        </td>
                        <td class="flex items-center justify-center gap-x-2 px-4 py-3">
                            <form action="/admin/kategori/edit" method="POST">
                                <input type="hidden" name="edit" value="<?= $k['id_kat']; ?>">
                                <button class="text-sm bg-yellow-400 text-white rounded-lg shadow-md hover:bg-yellow-600 py-1 px-3">Edit</button>
                            </form>
                            <form action="/admin/kategori/<?= $k['id_kat']; ?>" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="text-sm bg-red-600 text-white rounded-lg shadow-md hover:bg-red-800 py-1 px-3" onclick="return confirm('Apakah anda yakin ingin menghapus')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>