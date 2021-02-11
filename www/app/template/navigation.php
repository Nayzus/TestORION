<div class="navigation">
    <ul>
        <?php
        $pages = $this->data['pages']['count'];
        $current = $this->data['pages']['current'];
        $urlStart = $this->data['pages']['url'];

        if ($pages <= 8) {
            for ($i = 1; $i <= $pages; $i++) {
                $active = '';
                if ($current === $i) {
                    $active = 'active';
                }

                echo '<li class="' . $active . '"><a href="'.$urlStart.'page/' . $i . '">' . $i . '</a></li>';
            }

        } else {
            /**
             * Первая зарезервированная страница
             */
            if ($current === 1) {
                echo '<li class="active"><a href="'.$urlStart.'page/1">1</a></li>';
            } else {
                echo '<li class=""><a href="'.$urlStart.'page/1">1</a></li>';
            }
            /**
             * Страницы 1-3
             */
            if ($current <= 4) {
                for ($i = 2; $i <= 6; $i++) {
                    $active = '';
                    if ($current === $i) {
                        $active = 'active';
                    }

                    echo '<li class="' . $active . '"><a href="'.$urlStart.'page/' . $i . '">' . $i . '</a></li>';
                }
                if ($pages > 8) {
                    echo '<li><a>...</a></li>';
                }
            }

            if ($current >= 5 && $current < $pages - 5) {
                echo '<li><a>...</a></li>';
                for ($i = $current - 2; $i <= $current + 2; $i++) {
                    $active = '';
                    if ($current === $i) {
                        $active = 'active';
                    }

                    echo '<li class="' . $active . '"><a href="'.$urlStart.'page/' . $i . '">' . $i . '</a></li>';
                }
                echo '<li><a>...</a></li>';
            }

            if ($current >= $pages - 5) {

                echo '<li><a>...</a></li>';

                for ($i = $pages - 6; $i <= $pages - 1; $i++) {
                    $active = '';
                    if ($current === $i) {
                        $active = 'active';
                    }

                    echo '<li class="' . $active . '"><a href="'.$urlStart.'page/' . $i . '">' . $i . '</a></li>';
                }

            }


            /*
             * Последняя зарезервированная страница
             */
            if ($pages !== 1) {
                if ($current === $pages) {
                    echo '<li class="active"><a href="'.$urlStart.'page/' . $pages . '">' . $pages . '</a></li>';
                } else {
                    echo '<li class=""><a href="'.$urlStart.'page/' . $pages . '">' . $pages . '</a></li>';
                }
            }
        }

        ?>
    </ul>
</div>
