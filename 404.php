<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="robots" content="noindex" />
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="assets/favicon/apple-touch-icon.png" />
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="assets/favicon/favicon-32x32.png" />
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="assets/favicon/favicon-16x16.png" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <meta name="description" content="Ошибка 404" />
    <link
        rel="preload"
        href="assets/CSS/style.css"
        as="style"
        onload="this.rel='stylesheet'" />
    <link
        rel="preload"
        href="assets/CSS/normalize.css"
        as="style"
        onload="this.rel='stylesheet'" />
    <link
        rel="stylesheet"
        type="text/css"
        href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <title>Страница не найдена</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .block_404 a {
            color: #c0c0c0;
            text-decoration: none;
            transition: all 0.3s ease-in-out;
        }

        .block_404 a:hover {
            color: #ffcf40;
            text-underline-offset: 10px;
            text-decoration: underline;
        }

        .block_404 {
            width: 95%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 40px;
            font-size: 40px;
            text-align: center;
        }

        main {
            width: 100%;
            height: 680px;
            background-color: white;
        }

        .color_404 {
            color: #ffcf40;
        }

        .error_containers {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media screen and (max-width: 700px) {
            .block_404 {
                font-size: 30px;
            }
        }
    </style>
</head>

<body>
    <ul class="lightrope">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>
    <a href="https://wa.me/79106222222">
        <div class="icon">
            <img src="assets/SVG/icons-whatsapp.svg" alt="SVG" type="image/svg+xml" />
        </div>
    </a>
    <header id="header">
        <div class="header">
            <div class="header_container">
                <div class="nav-bar">
                    <div class="logo_title">
                        <a href="index.html">
                            <h1 class="item_logo"><span class="line">Ваша</span>гирлянда</h1>
                        </a>
                    </div>
                    <nav class="nav-link">
                        <ul class="ul-nav">
                            <li class="li-nav">
                                <h2 class="item-nav">
                                    <a href="gallery.html" class="item_a">Галерея</a>
                                </h2>
                            </li>
                            <li class="li-nav">
                                <h2 class="item-nav">
                                    <a href="reviews.php" class="item_a">Отзывы</a>
                                </h2>
                            </li>
                            <li class="li-nav">
                                <h2 class="item-nav">
                                    <a href="contact.html" class="item_a">Контакты</a>
                                </h2>
                            </li>
                            <li class="li-nav">
                                <h2 class="item-nav">
                                    <a href="about.html" class="item_a">О нас</a>
                                </h2>
                            </li>
                        </ul>
                    </nav>
                    <div class="burger">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="main_containers error_containers">
            <div class="block_404">
                <h1>4<span class="color_404">0</span>4</h1>
                <p>К сожалению, страница, которую вы ищете, не найдена.</p>
                <p><a href="index.html">Вернуться на главную страницу</a></p>
            </div>
        </div>
    </main>
    <footer class="footer" id="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Конфиденциальность</h4>
                    <ul>
                        <li>
                            <a href="confidentiality.html" class="confidentiality">Наша политика конфиденциальности</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Другие страницы</h4>
                    <ul>
                        <li>
                            <a href="gallery.html" class="confidentiality">Галлерея</a>
                        </li>
                        <li>
                            <a href="reviews.php" class="confidentiality">Отызвы</a>
                        </li>
                        <li>
                            <a href="contact.html" class="confidentiality">Контакты</a>
                        </li>
                        <li>
                            <a href="about.html" class="confidentiality">О нас</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Контакты</h4>
                    <ul>
                        <li>
                            <a href="tel:+79106222222"><i class="fa fa-mobile" aria-hidden="true"></i>+79106222222</a>
                        </li>
                        <li>
                            <a href="mailto:your_email@example.com"><i class="fa fa-envelope" aria-hidden="true"></i>your_email@example.com</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>follow us</h4>
                    <div class="social-links">
                        <a href="https://vk.com/kv1rl"><i class="fab fa-vk"></i></a>
                        <a href="https://wa.me/79106222222"><i class="fab fa-whatsapp"></i></a>
                        <a href="https://t.me/kv1rl"><i class="fab fa-telegram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="assets/JS/burger.js"></script>
</body>

</html>