'use strict';

import $ from 'jquery';

export default class Pagination {

    page() {
        $(function () {
            $('#pagination').on('click', '.yar-pagination__page', function () {

                let page = $(this).data('page');

                $.ajax({
                    url: "/requests/update_catalog.php",
                    method: "get",
                    data: {page: page},
                    dataType: "json",
                    success: function (data) {
                        $('#pagination').html(data.pagination);
                        $('#products').html(data.products);
                    }
                });
            });
        })
    }
}