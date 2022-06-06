<?php
/*
 * включаем отображение всех ошибок пхп
 */
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


/*
 * указываем название файла откуда будет браться меню ( в формате название меню пробел - название файла с хтмл-ом страницы
 */
$filename = "menu.txt";
$menu =array();

/*
 * если файл найден то загружаем список
 */
if (file_exists($filename) && is_readable($filename))
    $menu = explode( "\n",file_get_contents ($filename) );
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
<!--    верхушка с меню -->
        <div class="header">
            <h1 style="">Спортзал</h1>
            <p>Ничто так не истощает и не разрушает человеческий организм, как физическое бездействие. (с) Аристотель</p>
            <div class="menu">
                <?php
//                парсинг меню, $x1 массив [0=>'Главная', 1=>'1'], перебираем и формируем название и ссылку которую обрабатывает код ниже
                foreach( $menu as $k=>$v )
                {
                    $x1 = explode(" ",$v);
                    echo"<a href='index.php?str=$x1[1]'>$x1[0]</a>";
                }
                ?>
            </div>
        </div>

<!--  собственно контент, парсится исходя с переменной GET (а именно параметр str, если его нет то по умолчанию открывается главное страницы - 1.php ) -->
        <div class="content">
            <?php
            $str = 1;
            if( isset( $_GET['str'] ) )
                $str = $_GET['str'];

            $filename = "page/".$str.".php";
            $fn = @file_get_contents($filename, "r");
            echo $fn;
            ?>
        </div>
    </body>

<!--анимация в ксс файле style.css 16-24 строка
(
 @keyframes slideins {
    from {
        margin-left: -20%;
    }

    to {
        margin-left: 0%;
    }
}

)-->

</html>