<?php

class Pagination
{
    public $startPage, $endPage, $pagesTotal, $currentPage, $itemsOnPage;

    public function run($itemsOnPage, $allItemsNumber, $currentPage = 1, $shownPages = 3)
    {
        $this->itemsOnPage = $itemsOnPage;
        $pagesTotal = $allItemsNumber / $itemsOnPage;
        $pagesTotal = ceil($pagesTotal);
        $pagesTotal = intval($pagesTotal);

        $this->currentPage = $currentPage;

        if ($shownPages > $pagesTotal) {
            $shownPages = $pagesTotal;
        }

        if ($pagesTotal > 2) {

            $steps = $shownPages - 1;

            $startPage = $endPage = $this->currentPage;

            while ($steps > 0) {
                if ($startPage > 1) {
                    $startPage--;
                    $steps--;
                }
                if ($endPage < $pagesTotal) {
                    $endPage++;
                    $steps--;
                }
            }
        } else {
            $startPage = 1;
            $endPage = $pagesTotal;
        }

        $this->startPage = $startPage;
        $this->endPage = $endPage;
        $this->pagesTotal = $pagesTotal;
    }
}