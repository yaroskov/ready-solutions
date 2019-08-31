<?php
namespace Controllers\Pagination;

abstract class PaginationExecutor
{
    public $pagination;

    abstract public function paginType($itemsOnPage, $currentPage);

    public function pagination($itemsOnPage, $currentPage)
    {
        $this->pagination = $this->paginType($itemsOnPage, $currentPage);
        return $this;
    }
}