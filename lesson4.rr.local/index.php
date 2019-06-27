<?php
require_once './vendor/autoload.php';
require_once './lib/db.php';
define ("ITEM_ON_PAGE", 3);
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
        $goods = getGoods();
        echo $twig->render($pagename . '.html', ['goods' => $goods]);
        break;
    case "load":
        $page = 0;
        if (isset($_GET['page'])){
            $page = intval($_GET['page']);
        }
        $goods = getGoods($page);
        $response = [];
        foreach ($goods as $good){
            $response[] = $good;
        }
        header('Content-Type: application/json');
        echo json_encode($response);
        break;
    default:
        echo "404 page not found";
}

function getGoods($page = 0){
    $begin = $page * ITEM_ON_PAGE;
    $sql = "select * from goods order by id limit " . $begin . ', ' . ITEM_ON_PAGE;
    $goods = DB::getInstance()->query($sql);
    return $goods;
}
