<?php
use Controllers\EShop\EShopCatalog;

require_once dirname(__FILE__) . '/../../vendor/autoload.php';

$eShopCatalog = new EShopCatalog();

$filters = $eShopCatalog->filters();

$results = [];

require_once( dirname(__FILE__) . '/../../src/templates/pages/eshop_catalog/filters_panel.php');
$results['filters'] = filtersPanel($filters);

header('Content-Type: application/json');

echo json_encode($results);