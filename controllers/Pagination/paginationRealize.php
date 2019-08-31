<?php
namespace Controllers\Pagination;

interface paginationRealize
{
    public function pagination($itemsOnPage, $currentPage);

    public function itemsNumber();
}