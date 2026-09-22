<?php foreach($books as $book): ?>

<div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden">

    <img class="img"
        src="images/<?php echo htmlspecialchars($book['afbeelding']); ?>" 
        alt="<?php echo htmlspecialchars($book['titel']); ?>"
    >

    <div class="books">

        <h3 class="text-2xl font-semibold text-gray-900 mb-2">
            <?php echo htmlspecialchars($book['titel']); ?>
        </h3>

        <p class="text-gray-600 mb-3 line-clamp-3">
            <?php echo htmlspecialchars($book['id']); ?>
        </p>

        <p class="text-gray-600 mb-3 line-clamp-3">
            <?php echo htmlspecialchars($book['paginas']); ?> paginas
        </p>

        <p class="text-gray-600 mb-3 line-clamp-3">
            <?php echo htmlspecialchars($book['auteur']); ?>
        </p>

        <p class="text-gray-600 mb-3 line-clamp-3">
            <?php echo htmlspecialchars($book['genre']); ?>
        </p>

        <a 
            href="boekenDP.php?id=<?php echo htmlspecialchars($book['id']); ?>" 
            class="inline-block text-blue-600 font-semibold hover:text-blue-800 transition-colors"
        >
            Meer informatie
        </a>

    </div>
</div>

<?php endforeach; ?>