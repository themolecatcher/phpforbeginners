
<?php require base_path('views/partials/head.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <ul>
                <?php foreach ($notes as $note) : ?> 
                    <li>
                        <a href="/note?id=<?= $note['id']?>" class="text-blue-500 hover:underline">
                            <?= htmlspecialchars($note['body'])?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
                <p class="mt-5">
                    <a href="/notes/create" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    New note
                    </a>
                </p>                    

            </div>
        </main>
        </div>

        <?php require base_path('views/partials/footer.php') ?>

