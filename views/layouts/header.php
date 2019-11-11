<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="/template/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Pangolin" rel="stylesheet">

</head>

<body>

<header>

    <body>
    <div class="container">

        <header class="site-header">

            <div style="position: absolute; top: 1%; left: 88.2%;">
                <div id="google_translate_element"></div>
                <script type="text/javascript">
                    function googleTranslateElementInit() {
                        new google.translate.TranslateElement({
                            pageLanguage: 'uk',
                            includedLanguages: 'de,en,fr,ru,uk',
                            layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                            autoDisplay: false
                        }, 'google_translate_element');
                    }

                </script>
                <script type="text/javascript"
                        src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
            </div>


            <div class="site-header-content">

                <div class="site-name">
                    <center><a href="/"><img style="margin-bottom: -15px;"
                                             src="/template/css/images/icons8-сова-64.png">BrainGames</a></center>

                </div>
            </div>
        </header>

        <section class="navbar">
            <nav>
                <ul class="menu">
                    <center>
                        <li><a href="/">Головна</a></li>
                        <li><a href="/game">Ігри</a></li>

                        <?php if (User::isGuest()): ?>
                            <li><a href="/user/register">Реєстрація</a></li>
                            <li><a href="/user/login">Вхід</a></li>

                        <?php else: ?>
                            <li><a href="/cabinet">Профіль</a></li>
                            <li><a href="/user/logout">Вихід</a></li>

                        <?php endif; ?>
                        <li><a href="/user/feedback">Зворотний зв'язок</a></li>
                    </center>
                </ul>
            </nav>
        </section>


</header><!--/header-->