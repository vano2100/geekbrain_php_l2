<?php
require_once './vendor/autoload.php';
require_once './lib/db.php';

$loader = new \Twig\Loader\FilesystemLoader('./tpl/');
$twig = new \Twig\Environment($loader);


if (isset($_GET['action'])){
    $pagename = $_GET['action'];
} 
else {
    $pagename = "index";
}

switch ($pagename){
    case "index":
        $images = getImages();
        echo $twig->render($pagename . '.html', ['images' => $images]);
        break;
    case "view":
        $image = $_GET['id'];
        echo $twig->render($pagename . '.html', ['image' => $image]);
        break;
    case "reload":
        reloadImageDir();
        $images = getImages();
        echo $twig->render('index.html', ['images' => $images]);
        break;
    default:
        echo "404 page not found";
}

function getImages(){
    $sql = "select * from images";
    $images = DB::getInstance()->query($sql);
    return $images;
}

function reloadImageDir(){
    $dh = opendir("./img");
    $images = [];
    while (($entry = readdir($dh)) !== false) {
        // пропускаем текущий и родительский каталоги
        if (($entry == '.') || ($entry == '..')) {
            continue;
        }
        $fullFileName = "./img" . DIRECTORY_SEPARATOR . $entry;

        // добавили в массив только файлы
        if (is_file($fullFileName)){
            $images[] = ["name" => $entry, "size" => filesize($fullFileName)];
        }
        
    }
    
    // чистим таблицу и загружаем в нее данные о картинках
    DB::getInstance()->exec("TRUNCATE images");
    $sql = "insert into images (filename, size) values (:name, :size)";
    foreach($images as $image){
        DB::getInstance()->prepare($sql)->execute($image);
    }
}
