<?php
if (isset($_POST['submit'])) {
    $conn = new mysqli("", "", "", "");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $firstname = htmlspecialchars(trim($_POST['firstname']));
    $lastname = htmlspecialchars(trim($_POST['lastname']));
    $rating = (int) $_POST['rating'];
    $review_text = htmlspecialchars(trim($_POST['text']));
    $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, rating, text) VALUES (?, ?, ?, ?)");
    if (!$stmt) {
        die("Ошибка подготовки запроса: " . htmlspecialchars($conn->error));
    }
    $stmt->bind_param("ssis", $firstname, $lastname, $rating, $review_text);
    if ($stmt->execute()) {
    } else {
        echo "Ошибка выполнения запроса: " . htmlspecialchars($stmt->error);
    }
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Отзывы</title>
    <meta name="description" content="Оставьте нам свой отзыв!" />
    <meta name="keywords"
        content="Гирлянда, Купить гирлянду, Украшение гирляндами, Дешёвые гирлянды, Гирлянды в Рязани, Гирлянды в Рязанской области , Украшение домов , украшение домов гирляндами" />
    <meta name="author" content="Ваша гирлянда" />
    <meta name="yandex-verification" content="f4fbc283a3a43a9f" />
    <link rel="canonical" href="https://yourgarland.ru/" />
    <meta name="robots" content="index,follow" />
    <link rel="preload" href="assets/CSS/style.css" as="style" onload="this.rel='stylesheet'" />
    <link rel="preload" href="assets/CSS/normalize.css" as="style" onload="this.rel='stylesheet'" />
    <link rel="stylesheet" type="text/css" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-touch-icon.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png" />
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="manifest" href="assets/favicon/site.webmanifest">
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
    <main class="reviews_php">
        <div class="main_containers">
            <section class="form_section">
                <div class="form_block">
                    <div class="text_heading">
                        <h2 class="text_2 text_2_rev">Поделитесь своим мнением</h2>
                        <p class="text_2">
                            Расскажите, как мы смогли сделать ваш день лучше!
                        </p>
                    </div>
                    <div class="form form_rev">
                        <div class="text_form tf_2">
                            <h2 class="text_rev">Напишите свой комментарий</h2>
                            <p class="text_rev_p">
                                Рады каждому сообщению!
                            </p>
                        </div>
                        <form method="POST" class="form_action form_act" id="contactForm">
                            <div class="full-stars">
                                <div class="rating-group">
                                    <input name="rating" value="0" type="radio" disabled checked />
                                    <label for="fst-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                                        </svg>
                                    </label>
                                    <input name="rating" id="fst-1" value="1" type="radio" />
                                    <label for="fst-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                                        </svg>
                                    </label>
                                    <input name="rating" id="fst-2" value="2" type="radio" />
                                    <label for="fst-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                                        </svg>
                                    </label>
                                    <input name="rating" id="fst-3" value="3" type="radio" />
                                    <label for="fst-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                                        </svg>
                                    </label>
                                    <input name="rating" id="fst-4" value="4" type="radio" />
                                    <label for="fst-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                            <path
                                                d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z" />
                                        </svg>
                                    </label>
                                    <input name="rating" id="fst-5" value="5" type="radio" />
                                </div>
                            </div>
                            <div class="inputs_rev">
                                <div class="input-container ic1">
                                    <input id="firstname" class="input in_2" type="text" placeholder=" " required
                                        name="firstname" />
                                    <label for="firstname" class="placeholder">Имя</label>
                                </div>
                                <div class="input-container ic2">
                                    <input id="lastname" class="input in_2" name="lastname" type="text" placeholder=" "
                                        required />
                                    <label for="lastname" class="placeholder" id="phones">Фамилия</label>
                                </div>
                                <div class="input-container ic2">
                                    <input id="text" class="input in_2" name="text" type="text" placeholder=" "
                                        required />
                                    <label for="text" class="placeholder">Текст</label>
                                </div>
                                <button type="submit" class="submit" name="submit">Отправить</button>
                            </div>
                    </div>
                    </form>
                </div>
            </section>
            <div class="block_reviews_user">
                <div class="container_review">
                    <h1 class="review_title">Отзывы наших клиентов</h1>
                    <div class="reviews_users">
                        <?php
                        $conn = new mysqli("", "", "", "");
                        if ($conn->connect_error) {
                            die("Ошибка подключения: " . $conn->connect_error);
                        }

                        $result = $conn->query("SELECT * FROM users ORDER BY created_at DESC");
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<div class='user_block'>";
                                echo "<div class='rating'>" . str_repeat("
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' fill = '#ffcf40'>
                                            <path d='M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z' />
                                        </svg>
                                    ", $row['rating']) . str_repeat("
                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' fill = 'gray'>
                                            <path d='M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z' />
                                        </svg>
                                    ", 5 - $row['rating']) . "</div>";
                                echo "<h2 class = 'title_user_name'>" . htmlspecialchars($row['firstname']) . " " . htmlspecialchars($row['lastname']) . "</h2>";
                                echo "<p class = 'title_user_name_p'>" . htmlspecialchars($row['text']) . "</p>";
                                echo "</div>";
                            }
                        } else {
                            echo "<p class='subtitle'>Отзывов пока нет...</p>";
                        }
                        $conn->close();
                        ?>
                    </div>
                </div>
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
                            <a href="confidentiality.html" class="confidentiality">Наша политика
                                конфиденциальности</a>
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
                            <a href="reviews.php" class="confidentiality">Отзывы</a>
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
                            <a href="mailto:your_email@example.com"><i class="fa fa-envelope"
                                    aria-hidden="true"></i>your_email@example.com</a>
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