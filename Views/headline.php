<?php
$headline = $news[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo($headline["title"]) ?></title>
    <link rel="stylesheet" href="/styles/headline.css">
</head>
<body>
    <div class="headline">
        <div class="headline__header">
            <img class="header__img" src="/images/logo.svg" alt="logo">
            <div class="header__body">
                <h1 class="header__text">ГАЛАКТИЧЕСКИЙ</h1>
                <h1 class="header__text">ВЕСТНИК</h1>
            </div>
        </div>
        <div class="headline__link">
                <a href="/news" class="link__main">Главная</a>
                <p class="link__page">/<?php echo($headline["title"]) ?></p>
        </div>
        <h1 class="headline__title"><?php echo($headline["title"]) ?></h1>
        <div class="headline__content">
            <div class="content__info">
                <div class="info__date">
                    <p class="date__text">
                        <?= 
                        htmlspecialchars(DateTime::createFromFormat('Y-m-d H:i:s', $headline["date"])->format('d.m.Y'))
                        ?>
                    </p>
                </div>
                <?= str_replace('<p>', '<p class="info__announce">', $headline["announce"]) ?>
                <?= str_replace('<p>', '<p class="info__content">', $headline["content"]) ?>
            </div>
            <img src="../images/<?php echo htmlspecialchars($news[0]["image"])?>" alt="" class="content__image">
        </div>
        <a href="/news" class="info__back"><svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path class="back__img" d="M0.293015 8.70711C-0.0975094 8.31658 -0.0975094 7.68342 0.293014 7.2929L6.65698 0.928934C7.0475 0.538409 7.68067 0.538409 8.07119 0.928934C8.46171 1.31946 8.46171 1.95262 8.07119 2.34315L2.41434 8L8.07119 13.6569C8.46171 14.0474 8.46171 14.6805 8.07119 15.0711C7.68067 15.4616 7.0475 15.4616 6.65698 15.0711L0.293015 8.70711ZM26 9L1.00012 9L1.00012 7L26 7L26 9Z" fill="#841844"/>
        </svg>НАЗАД К НОВОСТЯМ</a>
    </div>
</body>
</html>