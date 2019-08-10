<?php

require_once dirname(__FILE__) . '/../../controllers/EShopCatalog.php';

$eShopCatalog = new EShopCatalog();

$products = $eShopCatalog->pagination(2, $_GET['page'])->products();

$results = [];

require_once( dirname(__FILE__) . '/../../src/templates/pages/eshop_catalog/paginator.php');
$results['pagination'] = pagination($eShopCatalog);

require_once( dirname(__FILE__) . '/../../src/templates/pages/eshop_catalog/products.php');
$results['products'] = products($products);

header('Content-Type: application/json');

echo json_encode($results);