<?= $this->extend('layout/template_admin'); ?>

<?= $this->section('content'); ?>

<div class="h-screen bg-gray-100 w-full pb-20">
    <div class="pt-6 px-6 pb-4">
        <h1 class="uppercase text-2xl font-semibold text-gray-600">Daftar Member</h1>
    </div>

    <?php if (session('pesan')) : ?>
        <p class="bg-green-200 text-green-600 rounded-lg p-4 mx-6 mb-6 flex items-center gap-x-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg><?= session()->getFlashdata('pesan'); ?></p>
    <?php endif ?>

    <div class="mx-6 md:mx-6">
        <table class="rounded-t-lg m-5 w-full mx-auto bg-gray-200 text-gray-800">
            <tr class="text-left border-b-2 border-gray-300">
                <th class="px-4 py-3">ID</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">No Telp</th>
                <th class="px-4 py-3">Jenis Kelamin</th>
                <th class="px-4 py-3 text-center" colspan="2">aksi</th>
            </tr>
            <?php foreach ($member as $mbr) : ?>
                <tr class="bg-white border-b border-gray-200 ">
                    <td class="px-4 py-3"><?= $mbr['id_member']; ?></td>
                    <td class="px-4 py-3"><?= $mbr['nama']; ?></td>
                    <td class="px-4 py-3"><?= $mbr['email']; ?></td>
                    <td class="px-4 py-3"><?= $mbr['no_telp']; ?></td>
                    <td class="px-4 py-3">
                        <?php if ($mbr['jenis_kelamin'] == 'l' ? $jk = 'Laki-laki' :  $jk = 'Perempuan') ?>
                        <?= $jk; ?>
                    </td>
                    <td class="flex items-center justify-center gap-x-2 px-4 py-3">
                        <form action="/admin/member/<?= $mbr['id_member']; ?>" method="POST">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="text-sm bg-red-600 text-white rounded-lg shadow-md hover:bg-red-800 py-1 px-3" onclick="return confirm('Apakah anda yakin ingin menghapus')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>
    </div>

    <?= $this->endSection(); ?>