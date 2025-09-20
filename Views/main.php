<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News</title>
    <link rel="stylesheet" href="/styles/main.css"/>
</head>
<body>
    <div class="main">
        <div class="main__header">
            <img class="header__img" src="/images/logo.svg" alt="logo">
            <div class="header__body">
                <h1 class="header__text">ГАЛАКТИЧЕСКИЙ</h1>
                <h1 class="header__text">ВЕСТНИК</h1>
            </div>
        </div>
        <div class="main__banner" style="background-image:url(../images/<?php echo htmlspecialchars($news[0]["image"])?>)">
            <p class="banner__title"><?= $news[0]["title"] ?></p>
            <?= str_replace('<p>', '<p class="banner__text">', $news[0]["announce"])?>
        </div>
        <p class="main__title">Новости</p>
        <?php if (!empty($news)): ?>
            <?php if ($totalPages > 1): ?>
                <div class="main__news">
            <?php endif; ?>
            
                <?php foreach ($news as $headline): ?>
                    <div class="main__news--item">
                        <div class="news--item__date">
                            <p class="date__text"><?= 
                            htmlspecialchars(DateTime::createFromFormat('Y-m-d H:i:s', $headline["date"])->format('d.m.Y'))
                            ?></p>
                        </div>
                        <h2 class="news--item__title"><?= htmlspecialchars($headline["title"]) ?></h2>
                        <?= str_replace('<p>', '<p class="news--item__text">', $headline["announce"]) ?>
                        <a href="news/<?php echo($headline["id"])?>" class="news--item__link">ПОДРОБНЕЕ <svg width="26" height="16" viewBox="0 0 26 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="link__img" d="M25.707 8.70711C26.0975 8.31658 26.0975 7.68342 25.707 7.2929L19.343 0.928934C18.9525 0.538409 18.3193 0.538409 17.9288 0.928934C17.5383 1.31946 17.5383 1.95262 17.9288 2.34315L23.5857 8L17.9288 13.6569C17.5383 14.0474 17.5383 14.6805 17.9288 15.0711C18.3193 15.4616 18.9525 15.4616 19.343 15.0711L25.707 8.70711ZM-8.74228e-08 9L24.9999 9L24.9999 7L8.74228e-08 7L-8.74228e-08 9Z" fill="#841844"/>
                            </svg>
                        </a>
                    </div>
                <?php endforeach; ?>
            
            <?php if ($totalPages > 1): ?>
                </div>
            <?php endif; ?>

            <?php if ($totalPages > 1): ?>
                <div class="main__nav">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>" class="nav__link <?= $i == $page ? 'active' : '' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                    
                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?= $page + 1 ?>" class="nav__button">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="button__next" d="M1 7C0.447715 7 -4.82823e-08 7.44772 0 8C4.82823e-08 8.55228 0.447715 9 1 9L1 7ZM16.466 8.70711C16.8565 8.31658 16.8565 7.68342 16.466 7.29289L10.102 0.928931C9.7115 0.538407 9.07834 0.538407 8.68781 0.928932C8.29729 1.31946 8.29729 1.95262 8.68781 2.34315L14.3447 8L8.68781 13.6569C8.29729 14.0474 8.29729 14.6805 8.68781 15.0711C9.07834 15.4616 9.7115 15.4616 10.102 15.0711L16.466 8.70711ZM1 9L15.7589 9L15.7589 7L1 7L1 9Z" fill="#841844"/>
                            </svg>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
        <?php else: ?>
            <p>Новости не найдены</p>
        <?php endif; ?>
    </div>
</body>
</html>