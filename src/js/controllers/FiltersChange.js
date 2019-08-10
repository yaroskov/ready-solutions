'use strict';

import $ from 'jquery';

export default class FiltersChange {

    static select() {
        $('.yar-filters-list__item').on('click', function () {

            let filter = $(this).parents('.yar-filters-panel__filter')
                .find('.yar-filters-panel__filter-title');
            let selectedText = $(this).text();

            filter.text(selectedText);

            $(this).parents('.yar-filters-panel__filter-list').hide();
        });
    }
}