<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p>
        <?= htmlspecialchars($note['body']) ?>
    </p>
        <p class="mb-6">
            <a href="/notes" class="text-blue-500 underline">go back...</a>
        </p>

        
        <footer class="mt-5">
                <a href="/note/edit?id=<? $note['id'] ?>" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Edit</a>
        </footer>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>