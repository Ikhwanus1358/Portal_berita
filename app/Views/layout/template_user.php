<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>

<body class="bg-white">
    <div class="mx-auto">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800 sticky top-0">

            <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-12 lg:px-12">
                <div class="p-4 flex flex-row items-center justify-between">
                    <a href="/" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"><img class="md:w-56 w-48" src="/img/logo.png" alt=""></a>
                    <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                        <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                            <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                            <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <nav :class="{'flex': open, 'hidden': !open}" class="flex-col flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row items-center gap-x-2">
                    <form action="/home/search" method="POST">
                        <div class="flex border mt-2 rounded-full items-center justify-between">
                            <input type="text" name="keyword" class="pl-4 py-2 rounded-full text-sm font-semibold bg-transparent outline-none" placeholder="Cari berita">
                            <button type="submit" name="search">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="mt-2">
                        <?php if (!session()->get('id_member')) : ?>
                            <button class="bg-orange-400 hover:bg-orange-500 border-orange-400 hover:border-orange-500 border-2 py-2 px-4 text-white text-sm font-semibold rounded-lg" id="open-btn">Masuk</button>
                            <button class="hover:bg-orange-400 py-2 px-4 text-orange-600 border-2 border-orange-400 hover:text-white text-sm font-semibold rounded-lg" id="open-daftar">Daftar</button>
                        <?php endif ?>
                        <?php if (session()->get('id_member')) : ?>
                            <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
                            <div x-data="{ open: false }" class="bg-white dark:bg-gray-800 flex justify-end items-center">
                                <div @click="open = !open" class="relative py-3" :class="{'border-indigo-700 transform transition duration-300 ': open}" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100">
                                    <div class="flex justify-center items-center cursor-pointer">
                                        <div class="font-semibold text-gray-500 dark:text-white text-gray-900 text-md">
                                            <div class="cursor-pointer"><?= session()->get('nama'); ?></div>
                                        </div>
                                        <div class="overflow-hidden">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute w-60 px-5 py-3 dark:bg-gray-800 bg-white rounded-lg shadow border dark:border-transparent mt-5">
                                        <ul class="space-y-1 dark:text-white">
                                            <li class="font-medium  hover:bg-gray-200 rounded-md">
                                                <a href="#" class="flex items-center p-2">
                                                    <div class="mr-3">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                                        </svg>
                                                    </div>
                                                    Akun
                                                </a>
                                            </li>
                                            <li class="font-medium hover:bg-gray-200 rounded-md">
                                                <a href="#" class="flex items-center p-2">
                                                    <div class="mr-3">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        </svg>
                                                    </div>
                                                    Pengaturan
                                                </a>
                                            </li>
                                            <hr class="dark:border-gray-700">
                                            <li class="font-medium hover:bg-gray-200 rounded-md">
                                                <a href="/login_user/logout" class="flex items-center p-2" onclick="return confirm('Apakah anda yakin ingin keluar?')">
                                                    <div class="mr-3 text-red-600">
                                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                                        </svg>
                                                    </div>
                                                    Keluar
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </nav>
            </div>
        </div>

        <div class="lg:px-40">
            <div class="bg-gradient-to-r from-red-600 to-orange-600 font-semibold text-white mt-2 py-2 px-2 md:mx-0 mx-2 rounded-md">
                <a class="px-2 hover:text-yellow-400" href="/">Beranda</a>
                <?php foreach ($kategori as $k) : ?>
                    <a class="px-2 hover:text-yellow-400" href="/<?= $k['alias']; ?>"><?= $k['kategori']; ?></a>
                <?php endforeach ?>
            </div>
        </div>

        <form action="/login_user/daftar" method="POST">
            <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal-daftar">
                <div class="h-screen flex items-center justify-center">
                    <div class="w-full max-w-md bg-white px-10 pb-10 leading-normal border-t-4 border-blue-600 shadow-lg rounded-b-lg">
                        <div class="pb-2 pt-6 flex justify-end">
                            <button type="button" id="close-daftar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex justify-between mb-6">
                            <div class="uppercase text-4xl text-gray-600">Daftar</div>
                            <div class="w-24 h-0 mt-3"><img src="/img/logo.png" alt=""></div>
                        </div>
                        <div class="mb-2">
                            <label for="" class="mb-2 block mt-2">Nama</label>
                            <input name="nama" type="text" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="masukan nama lengkap">
                        </div>
                        <div class="mb-2">
                            <label for="" class="mb-2 block mt-2">Email</label>
                            <input name="email" type="text" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="contoh.123@email.com">
                        </div>
                        <div>
                            <label for="" class="mb-2 block">Kata Sandi</label>
                            <input type="password" name="password" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="masukan kata sandi">
                        </div>
                        <div class="mb-2">
                            <label for="" class="mb-2 block mt-2">No Telepon</label>
                            <input name="no_telp" type="text" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="masukan no telepon">
                        </div>
                        <div class="mb-2" class="">
                            <label for="" class="block" class="mb-2 block my-2">Jenis Kelamin</label>
                            <input type="radio" name="jenis_kelamin" class="mr-2" value="l">Laki-laki
                            <input class="ml-4 mr-2" name="jenis_kelamin" type="radio" value="p">Perempuan
                        </div>
                        <div class="flex justify-between">
                            <div class="self-end" id="daftar-tutup">
                                Sudah memiliki akun?
                                <button type="button" class="text-blue-600" id="masuk">Masuk</button>
                            </div>
                            <button type="submit" name="daftar" class="bg-blue-600 hover:bg-blue-800 text-white text-md shadow-md rounded-md py-2 px-4 mt-4">
                                Daftar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="/login_user/auth" method="POST">
            <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="my-modal">
                <div class="h-screen flex items-center justify-center">
                    <div class="w-full max-w-md bg-white px-10 pb-10 leading-normal border-t-4 border-blue-600 shadow-lg rounded-b-lg">
                        <div class="pb-2 pt-6 flex justify-end">
                            <button class="" type="button" id="ok-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex justify-between mb-6">
                            <div class="uppercase text-4xl text-gray-600">Masuk</div>
                            <div class="w-24 h-0 mt-3"><img src="/img/logo.png" alt=""></div>
                        </div>
                        <div class="mb-2">
                            <label for="" class="mb-2 block mt-2">Email</label>
                            <input name="email" type="text" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="contoh.123@email.com" value="<?= old('username'); ?>">
                        </div>
                        <div>
                            <label for="" class="mb-2 block">Kata Sandi</label>
                            <input type="password" name="password" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="masukan kata sandi" value="<?= old('password'); ?>">
                        </div>
                        <div class="">
                        </div>
                        <div class="flex justify-between mt-8">
                            <div class="self-end" id="tutup">
                                <a href="" class="text-blue-600">Lupa Password?</a>
                                <div>
                                    Belum punya akun?
                                    <button type="button" class="text-blue-600" id="daftar">
                                        Daftar
                                    </button>
                                </div>
                            </div>
                            <button type="submit" name="login" class="self-end bg-blue-600 hover:bg-blue-800 text-white text-md shadow-md rounded-md py-2 px-4">
                                Masuk
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <form action="/login_user/auth" method="POST">
            <div class="fixed hidden inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" id="modal">
                <div class="h-screen flex items-center justify-center">
                    <div class="w-full max-w-md bg-white px-10 pb-10 leading-normal border-t-4 border-blue-600 shadow-lg rounded-b-lg">
                        <div class="pb-2 pt-6 flex justify-end">
                            <button type="button" id="btn-close">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        <div class="flex justify-between mb-6">
                            <div class="uppercase text-4xl text-gray-600">Masuk</div>
                            <div class="w-24 h-0 mt-3"><img src="/img/logo.png" alt=""></div>
                        </div>
                        <div>
                            <?php if (session('login_required')) : ?>
                                <p class="flex gap-x-2 bg-red-200 text-red-600 rounded-lg py-3 px-4 my-2"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg><?= session()->getFlashdata('login_required'); ?></p>
                            <?php endif ?>
                        </div>
                        <div class="mb-2">
                            <label for="" class="mb-2 block mt-2">Email</label>
                            <input name="email" type="text" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="contoh.123@email.com" value="<?= old('username'); ?>">
                        </div>
                        <div>
                            <label for="" class="mb-2 block">Kata Sandi</label>
                            <input type="password" name="password" class="w-full border p-2 rounded-md focus:outline-none focus:border-blue-600" placeholder="masukan kata sandi" value="<?= old('password'); ?>">
                        </div>
                        <div class="flex justify-between mt-6">
                            <div class="self-end" id="tutup-2">
                                <a href="" class="text-blue-600">Lupa Password?</a>
                                <div>
                                    Belum punya akun?
                                    <button type="button" class="text-blue-600" id="daftar-2">
                                        Daftar
                                    </button>
                                </div>
                            </div>
                            <button type="submit" name="login" class="self-end bg-blue-600 hover:bg-blue-800 text-white text-md shadow-md rounded-md py-2 px-4">
                                Masuk
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <?= $this->renderSection('content'); ?>

        <div class="flex-nowrap md:w-1/3 w-full md:space-y-4">
            <div class="bg-white md:px-0 px-2">
                <h3 class="font-bold uppercase border-b-2 mb-2 mt-4 pb-1">berita populer</h3>
                <?php $n = 1; ?>
                <?php foreach ($berita_populer as $bp) : ?>
                    <div class="flex gap-x-2 mb-2 pb-2 font-semibold text-md border-b-2">
                        <p class="flex-none text-xl text-gray-400">#<?= $n++; ?> </p>
                        <a href="/<?= $bp['id']; ?>"><?= $bp['judul']; ?></a>
                    </div>
                <?php endforeach ?>
            </div>

            <div class="bg-white p-4">
                <h3 class="font-bold uppercase border-b-2 mb-6">berita populer</h3>
                <div class="space-y-4">
                    <h4>consectetur adipisicing elit</h4>
                    <h4>Aspernatur quidem molestias quisquam</h4>
                    <h4> Optio, est recusandae. Eligendi quo commodi</h4>
                    <h4>necessitatibus facere reiciendis voluptatum</h4>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="fixed bottom-10 md:right-10 right-8 back-to-top">
        <button class="bg-gradient-to-r from-red-600 to-orange-600 hover:text-yellow-400 rounded-full w-12 h-12 text-center text-white shadow-2xl flex justify-center items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 " viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <footer class="bg-gray-100 border border-t-2 border-gray-300 bottom-0">
        <div class="text-center p-4 text-sm">
            <span>Copyright &copy; Kelompok 6 <?= date('Y'); ?></span>

        </div>
    </footer>
    </div>

    <?php if (session()->getFlashdata('daftar_success')) : ?>
        <script type="text/javascript">
            alert("Pendaftaran Berhasil");
        </script>
    <?php endif ?>

    <script type="text/javascript">
        $('.back-to-top').hide();
        $(window).on('scroll', function(e) {
            $this = $(this);
            if ($this.scrollTop() > 0) {
                $('.back-to-top').fadeIn('slow');
            } else {
                $('.back-to-top').fadeOut('fast');
            }
        });

        $('.back-to-top').on('click', function() {
            $('body,html').animate({
                scrollTop: 0
            }, 1000);
        });
    </script>

    <script>
        let modal = document.getElementById("my-modal");
        let btn = document.getElementById("open-btn");
        let button = document.getElementById("ok-btn");

        btn.onclick = function() {
            modal.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        button.onclick = function() {
            modal.style.display = "none";
        }
    </script>

    <script>
        let mdl = document.getElementById("modal");
        let tbl = document.getElementById("btn-buka");
        let tombol = document.getElementById("btn-close");

        tbl.onclick = function() {
            mdl.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        tombol.onclick = function() {
            mdl.style.display = "none";
        }

        let formBuka2 = document.getElementById("daftar-2");
        let formTutup2 = document.getElementById("tutup-2");
        formBuka2.onclick = function() {
            formDaftar.style.display = "block";
        }
        formTutup2.onclick = function() {
            mdl.style.display = "none";
        }
    </script>


    <script>
        let formDaftar = document.getElementById("modal-daftar");
        let formOpen = document.getElementById("open-daftar");
        let btnClose = document.getElementById("close-daftar");

        formOpen.onclick = function() {
            formDaftar.style.display = "block";
        }
        // We want the modal to close when the OK button is clicked
        btnClose.onclick = function() {
            formDaftar.style.display = "none";
        }

        let formBuka = document.getElementById("daftar");
        let formTutup = document.getElementById("tutup");
        formBuka.onclick = function() {
            formDaftar.style.display = "block";
        }
        formTutup.onclick = function() {
            modal.style.display = "none";
        }


        let masukBuka = document.getElementById("masuk");
        let daftarTutup = document.getElementById("daftar-tutup");
        masukBuka.onclick = function() {
            modal.style.display = "block";
        }
        daftarTutup.onclick = function() {
            formDaftar.style.display = "none";
        }
    </script>

</body>

</html>