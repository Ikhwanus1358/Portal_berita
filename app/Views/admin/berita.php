<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="h-full bg-gray-100 w-full pb-20">
    <?php if (!isset($_POST['edit'])) : ?>
        <form action="/admin/berita/tambah" method="POST" enctype="multipart/form-data">
            <div class="pt-6 px-6 pb-8">
                <h1 class="uppercase text-2xl font-semibold text-gray-600">Tambah Berita</h1>
            </div>
            <div class="">
                <?php if (session('pesan')) : ?>
                    <p class="bg-green-200 text-green-600 rounded-lg p-4 mx-6 mb-6 flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg><?= session()->getFlashdata('pesan'); ?></p>
                <?php endif ?>
                <?php if (session('gagal')) : ?>
                    <p class="bg-red-200 text-red-600 rounded-lg p-4 mx-6 mb-6 flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg><?= session()->getFlashdata('msg'); ?></p>
                <?php endif ?>
            </div>
            <div class="px-6 grid grid-cols-2 gap-2">
                <div class="space-y-2">
                    <label class="block" for="">Judul</label>
                    <input name="judul" class="rounded-md md:w-4/6 w-full px-3 py-1 bg-white focus:border-gray-500 border focus:outline-none" type="text" placeholder="Judul berita" value="<?= old('judul'); ?>">
                    <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                        <?php if ($validation->hasError('judul')) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        <?php endif ?>
                        <?= $validation->getError('judul'); ?>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="block" for="">Gambar</label>
                    <input name="gambar" type="file" class="bg-white rounded md:w-4/6 w-full border text-gray-400">
                    <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                        <?php if ($validation->hasError('gambar')) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        <?php endif ?>
                        <?= $validation->getError('gambar'); ?>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="block" for="">Kategori</label>
                    <select class="border rounded-md px-3 md:w-4/6 w-full py-1" name="kategori" id="">
                        <option value="">-Pilih Kategori-</option>
                        <?php foreach ($kategori as $k) : ?>
                            <?php if ($k['id_kat'] == old('kategori')) : ?>
                                <option value="<?= $k['id_kat']; ?>" selected><?= $k['kategori']; ?></option>
                            <?php endif ?>
                            <option value="<?= $k['id_kat']; ?>"><?= $k['kategori']; ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                        <?php if ($validation->hasError('kategori')) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        <?php endif ?>
                        <?= $validation->getError('kategori'); ?>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="block" for="">keterangan</label>
                    <input name="ket" class="rounded-md px-3 py-1 md:w-4/6 bg-white w-full border focus:outline-none" type="text" placeholder="Keterangan gambar" value="<?= old('ket'); ?>">
                    <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                        <?php if ($validation->hasError('ket')) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        <?php endif ?>
                        <?= $validation->getError('ket'); ?>
                    </div>
                </div>
                <div class="space-y-2 col-span-2">
                    <label class="block" for="">Isi berita</label>
                    <textarea name="isi" class="rounded-md border w-full p-2" id="ckeditor" cols="80" rows="10"><?= old('isi'); ?></textarea>
                    <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                        <?php if ($validation->hasError('isi')) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        <?php endif ?>
                        <?= $validation->getError('isi'); ?>
                    </div>
                </div>
                <div>
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input type="hidden" name="hari" value="<?= date('l'); ?>">
                    <input type="hidden" name="tanggal" value="<?= date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="id_admin" value="<?= session()->get('id'); ?>">
                    <input type="hidden" name="viewnum" value="0">
                </div>
                <div class="space-y-2 col-span-2">
                    <label class="block" for="">Terbitkan</label>
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
        <form action="/admin/berita/update" method="POST" enctype="multipart/form-data">
            <div class="pt-6 px-6 pb-8">
                <h1 class="uppercase text-2xl font-semibold text-gray-600">Edit Berita</h1>
            </div>
            <input name="id" type="hidden" value="<?= $ber['id']; ?>">
            <input type="hidden" name="gambarLama" value="<?= $ber['gambar']; ?>">
            <div class="px-6 grid grid-cols-2 gap-2">
                <div class="space-y-2">
                    <label class="block" for="">Judul</label>
                    <input name="judul" class="rounded-md md:w-4/6 w-full px-3 py-1 bg-white focus:border-gray-500 border focus:outline-none" type="text" placeholder="Judul berita" value="<?= $ber['judul']; ?>">
                </div>
                <div class="space-y-2">
                    <label class="block" for="">Gambar</label>
                    <input name="gambar" type="file" id="gambar" class="hidden custom-file-input bg-white rounded md:w-4/6 w-full border text-gray-400" value="<?= $ber['gambar']; ?>" onchange="previewImg()">
                    <label class="custom-file-label flex" for="gambar">
                        <p class="bg-gray-200 w-26 px-2 text-sm py-1 text-center text-md rounded border-2 border-black">Choose File</p>
                        <input type="text" name="gambar" class="bg-white rounded md:w-3/6 w-full border text-gray-400 px-2" placeholder="Pilih gambar" value="<?= $ber['gambar']; ?>">
                    </label>
                </div>
                <div class="space-y-2">
                    <label class="block" for="">Kategori</label>
                    <select class="border rounded-md px-3 md:w-4/6 w-full py-1" name="kategori" id="">
                        <option value="">-Pilih Kategori-</option>
                        <?php foreach ($kategori as $k) : ?>
                            <?php if ($ber['id_kat'] == $k['id_kat']) : ?>
                                <option value="<?= $k['id_kat']; ?>" selected><?= $k['kategori']; ?></option>
                            <?php endif ?>
                            <option value="<?= $k['id_kat']; ?>"><?= $k['kategori']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="space-y-2">
                    <label class="block" for="">keterangan</label>
                    <input name="ket" class="rounded-md px-3 py-1 md:w-4/6 bg-white w-full border focus:outline-none" type="text" placeholder="Keterangan gambar" value="<?= $ber['ket']; ?>">
                </div>
                <div class="space-y-2 col-span-2">
                    <label class="block" for="">Isi berita</label>
                    <textarea name="isi" class="rounded-md border w-full p-2" name="" id="ckeditor" cols="80" rows="10"><?= $ber['isi']; ?></textarea>
                </div>
                <div>
                    <?php date_default_timezone_set('Asia/Jakarta'); ?>
                    <input type="hidden" name="hari" value="<?= $ber['hari']; ?>">
                    <input type="hidden" name="tanggal" value="<?= $ber['tanggal'] ?>">
                    <input type="hidden" name="id_admin" value="<?= $ber['id_admin']; ?>">
                    <input type="hidden" name="viewnum" value="<?= $ber['view_num']; ?>">
                </div>
                <div class="space-y-2 col-span-2">
                    <?php if ($ber['terbit'] == 0 ? $s = 'selected' : $s = '') ?>
                    <label class="block" for="">Terbitkan</label>
                    <select class="py-1 px-2 rounded" name="terbit" id="">
                        <option value="1" <?= $s; ?>>Yes</option>
                        <option value="0" <?= $s; ?>>No</option>
                    </select>
                </div>
                <div class="py-6 mb-2">
                    <a href="/admin/berita" class="bg-gray-500 hover:bg-gray-700 rounded shadow-lg py-1 px-3 text-white">Batal</a>
                    <button type="submit" name="edit" class="bg-blue-600 hover:bg-blue-800 rounded shadow-lg py-1 px-3 text-white">edit</button>
                </div>
            </div>
        </form>
    <?php endif ?>

    <div class="mx-6 md:mx-6 border-t-2">
        <div class="mt-6 flex justify-between">
            <h1 class="uppercase font-semibold text-2xl">Daftar Berita</h1>
            <div>
                <form action="/admin/berita" method="POST">
                    <input type="text" name="keyword" class="font-sm rounded-md border-2 border-gray-200 py-1 px-2" placeholder="Cari berita">
                    <button type="submit" name="search" class="bg-gray-200 border-2 border-gray-400 rounded-md py-1 px-4 hover:bg-gray-300 hover:border-gray-400 active:bg-gray-400">Cari</button>
                </form>
            </div>
        </div>
        <div class="">
            <?php $n = 1 ?>
            <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
                <tr class="text-left border-b-2 border-gray-300">
                    <th class="px-4 py-3">ID</th>
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Tanggal</th>
                    <th class="px-4 py-3">Terbit</th>
                    <th class="px-4 py-3">upload by</th>
                    <th class="px-4 py-3 text-center">aksi</th>
                </tr>
                <?php foreach ($berita as $b) : ?>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-4 py-3"><?= $n++; ?></td>
                        <td class="px-4 py-3"><?= $b['judul']; ?></td>
                        <td class="px-4 py-3"><?= $b['kategori']; ?></td>
                        <td class="px-4 py-3"><?= $b['tanggal']; ?></td>
                        <td class="px-4 py-3">
                            <?php if ($b['terbit'] == 1) : ?>
                                <div class="text-center text-green-500 bg-green-200 rounded-full">Yes</div>
                            <?php endif ?>
                            <?php if ($b['terbit'] == 0) : ?>
                                <p class="text-center text-red-500 bg-red-200 rounded-full">No</p>
                            <?php endif ?>
                        </td>
                        <td class="px-4 py-3"><?= $b['nama']; ?></td>
                        <td class="flex items-center justify-center gap-x-2 my-6 px-4">
                            <form action="/admin/berita/edit" method="POST">
                                <input type="hidden" name="edit" value="<?= $b['id']; ?>">
                                <button class="text-sm bg-yellow-400 text-white rounded-lg shadow-md hover:bg-yellow-600 py-1 px-3">Edit</button>
                            </form>
                            <form action="/admin/berita/<?= $b['id']; ?>" method="POST">
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