<?php require_once dirname(__FILE__) . '/../vendor/autoload.php'; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--    <link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="css/styles.css">
    <title>Ready Solutions</title>

    <script src="js/index-app.js"></script>
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="yar-block yar-bg-purple">
            <div class="yar-block__content">
                <h1 class="site-title">Ready Solutions</h1>
            </div>
        </div>
    </header>

    <div class="content yar-bg-light-gray">
        <?php require_once dirname(__FILE__) . '/../src/templates/pages/eshop_catalog/eshop_catalog.php'; ?>
    </div>

    <footer class="footer">
        <div class="yar-block">
            <div class="yar-block__content">
                <div class="info-text">Info Text</div>
            </div>
        </div>
    </footer>
</div>
</body>
</html>