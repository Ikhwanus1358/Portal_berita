<?= $this->extend('layout/template_user'); ?>

<?= $this->section('content'); ?>

<div class="lg:px-40 mt-2">
	<div class="flex flex-wrap md:flex-nowrap md:gap-x-4">
		<div class="bg-white min-h-full py-4 w-full md:w-2/3 md:px-0 px-2">
			<?php if (!isset($_POST['keyword'])) : ?>
				<h3 class="uppercase font-bold border-b-2 pb-1">Berita terbaru</h3>
			<?php endif ?>
			<?php if (isset($_POST['keyword'])) : ?>
				<h3 class="uppercase font-bold border-b-2 pb-1">Hasil Pencarian</h3>
			<?php endif ?>
			<?php foreach ($berita as $b) : ?>
				<div class="flex mt-6 items-center">
					<div class="flex-shrink-0 ">
						<img class="rounded-md w-48 mr-4" src="/img/<?= $b['gambar']; ?>" alt="">
					</div>
					<div class="">
						<a href="/<?= $b['id']; ?>">
							<h4 class="font-semibold md:text-2xl text-xl"><?= $b['judul']; ?></h4>
						</a>
						<p class="text-gray-400">Kategori : <?= $b['kategori']; ?></p>
					</div>
				</div>
			<?php endforeach ?>
			<div class="my-16">
				<h3 class="font-bold uppercase border-b-2 mb-6">Video Terpopuler</h3>
				<div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-4">
					<div class="space-y-2">
						<img class="rounded-md md:h-auto md:w-auto h-32" src="/img/thumbnail.jpg" alt="">
						<div class="space-y-2">
							<p class="text-justify font-semibold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore, explicabo labore.</p>
							<p class="text-gray-600">8 jam yang lalu</p>
						</div>
					</div>
					<div class="space-y-2">
						<img class="rounded-md md:h-auto md:w-auto h-32" src="/img/thumbnail.jpg" alt="">
						<div class="space-y-2">
							<p class="text-justify font-semibold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore, explicabo labore.</p>
							<p class="text-gray-600">8 jam yang lalu</p>
						</div>
					</div>
					<div class="space-y-2">
						<img class="rounded-md md:h-auto md:w-auto h-32" src="/img/thumbnail.jpg" alt="">
						<div class="space-y-2">
							<p class="text-justify font-semibold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Inventore, explicabo labore.</p>
							<p class="text-gray-600">8 jam yang lalu</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?= $this->endSection(); ?>