<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/app/template/css/main.css">
    <link rel="stylesheet" href="/app/template/css/media.css">

    <title>Document</title>
</head>
<body>
<section id="header">
    <div class="container">
        <h1>Трансляции камер видеонаблюдения</h1>

        <ul class="city_navigation">
            <?php
            $active = '';
            if (empty($this->data['pages']['city_id'])) {
                $active = 'active';
            }
            echo '<li class="'.$active.'" ><a href="/">Все</a></li>';
            $active = '';
            if ($this->data['pages']['city_id'] == 1) {
                $active = 'active';
            }
            echo '<li class="'.$active.'" ><a href="/city/1">Красноярск</a></li>';
            $active = '';
            if ($this->data['pages']['city_id'] == 4) {
                $active = 'active';
            }
            echo '<li class="'.$active.'" ><a href="/city/4">Абакан</a></li>';
            $active = '';
            if ($this->data['pages']['city_id'] == 5) {
                $active = 'active';
            }
            echo '<li class="'.$active.'" ><a href="/city/5">Братск</a></li>';
            ?>
        </ul>
    </div>
</section>
<section id="main">
    <div class="container">
        <div class="items">
            <?php
            $i = 1;
            foreach ($this->data['cameras'] as $camera):
                include 'item.php';
                 $i++;
            endforeach; ?>


        </div>
        <?php include 'navigation.php' ?>
    </div>
</section>
<footer>
    <div class="container">

    </div>
</footer>
<script src="/app/template/js/main.js"></script>
</body>
</html>