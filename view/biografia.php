<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Biografies de Músics Pakistanesos</title>
</head>
<body>
    <h1>Biografies dels Músics Pakistanesos</h1>
    <?php foreach ($musicians as $musician): ?>
        <div style="margin-bottom: 30px;">
            <h2><?php echo htmlspecialchars($musician['name']); ?></h2>
            <img src="<?php echo htmlspecialchars($musician['image_url']); ?>" alt="Imatge de <?php echo htmlspecialchars($musician['name']); ?>" width="300">
            <p><?php echo htmlspecialchars($musician['biography']); ?></p>
            <a href="<?php echo htmlspecialchars($musician['website']); ?>" target="_blank">Visita el seu web</a>
        </div>
    <?php endforeach; ?>
</body>
</html>
