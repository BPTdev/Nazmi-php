<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/css/milligram.min.css">
    <script
        src="https://kit.fontawesome.com/3eb46088b9.js"
        crossorigin="anonymous"></script>


    <title>ExerciseLooper</title>
    <link rel="stylesheet" media="all" href="/css/milligram.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/assets/app.js"></script>
    <script src="/assets/views.js" defer></script>
    <link rel="stylesheet" href="/css/create_style.css">
    <link rel="stylesheet" href="/css/Home.css">
    <link rel="stylesheet" href="/css/Fulfillments.css">
    <link rel="stylesheet" href="/css/Fields.css">
</head>

<body>

    <div id="page">
    <?php    if (isset($params['isHome']) and $params['isHome']): ?>
    <header class="dashboard">
        <section class="container">
            <p><img src="/assets/logo.png"></p>
            <h1>Exercise<br>Looper</h1>
        </section>
    </header>
    
<?php
else: ?>
    <header class="heading <?= $headerColor ?? null ?>">
        <section class="container">
            <a href="/">
                <img src="/assets/logo.png"></a>
            <span class="exercise-label"><?= $title ?? 'ExerciseLooper' ?></span>
        </section>
    </header>
<?php
endif; ?>
        <?php echo $content ?>
    </div>
    
</body>

</html>