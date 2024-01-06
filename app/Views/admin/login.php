<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <form action="/admin/login/auth" method="POST">
        <div class="h-screen flex items-center justify-center">
            <div class="w-full max-w-md bg-white p-10 leading-normal border-t-4 border-orange-400 shadow-lg rounded-b-lg">
                <div class="flex justify-between mb-6">
                    <div class="uppercase text-4xl text-gray-800">Masuk</div>
                    <div class="w-24 h-0 mt-3"><img src="/img/logo.png" alt=""></div>
                </div>
                <div>
                    <?php if (session('pesan')) : ?>
                        <p class="flex gap-x-2 bg-red-200 text-red-600 rounded-lg py-3 px-4 my-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg><?= session()->getFlashdata('pesan'); ?></p>
                    <?php endif ?>
                </div>
                <div class="mb-2">
                    <label for="" class="mb-2 block mt-2">Nama Pengguna / Email</label>
                    <input name="username" type="text" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="masukan nama pengguna atau email" value="<?= old('username'); ?>">
                    <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                        <?php if ($validation->hasError('username')) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        <?php endif ?>
                        <?= $validation->getError('username'); ?>
                    </div>
                </div>
                <div>
                    <label for="" class="mb-2 block">Kata Sandi</label>
                    <input type="password" name="password" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="masukan kata sandi" value="<?= old('password'); ?>">
                    <div class="text-red-500 ml-1 flex gap-x-2 items-center">
                        <?php if ($validation->hasError('password')) : ?>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        <?php endif ?>
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="flex justify-between mt-8">
                    <div class="self-end">
                        <a href="" class="text-blue-600">Lupa Password?</a>
                    </div>
                    <button type="submit" name="login" class="bg-blue-600 hover:bg-blue-800 text-white text-md shadow-md rounded-md py-2 px-4">
                        Masuk
                    </button>
                </div>
            </div>
        </div>
    </form>
</body>

</html>