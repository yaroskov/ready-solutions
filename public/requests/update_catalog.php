<?php
use Controllers\EShop\EShopCatalog;

require_once dirname(__FILE__) . '/../../vendor/autoload.php';

$eShopCatalog = new EShopCatalog();

$products = $eShopCatalog->pagination(4, $_GET['page'])->products();

$results = [];

require_once( dirname(__FILE__) . '/../../src/templates/pages/eshop_catalog/paginator.php');
$results['pagination'] = pagination($eShopCatalog);

require_once( dirname(__FILE__) . '/../../src/templates/pages/eshop_catalog/products.php');
$results['products'] = products($products);

header('Content-Type: application/json');

echo json_encode($results);