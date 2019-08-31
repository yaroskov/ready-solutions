'use strict';

import $ from 'jquery';

export default class FiltersChange {

    static select() {
        $('.yar-filters-panel').on('click', '.yar-filters-list__item', function () {

            let filter = $(this).parents('.yar-filters-panel__filter').find('.yar-filters-panel__filter-title');
            let selectedText = $(this).data('name');
            filter.text(selectedText);
            filter.data('name', selectedText);

            let id = $(this).data('id');
            filter.data('id', id);

            $(this).parents('.yar-filters-panel__filter-list').hide();

            let data = {};

            let filtersPanel = $(this).parents('.yar-filters-panel');

            let selectedKey = filter.data('key');

            let isStoped = false;
            filtersPanel.find('.yar-filters-panel__filter').each(function () {

                let id = '', name = '';

                let filter = $(this).find('.yar-filters-panel__filter-title');
                let key = filter.data('key');

                if(!isStoped) {
                    id = filter.data('id');
                    name = filter.data('name');
                }

                data[key] = {id: id, name: name};

                if (selectedKey === key) {
                    isStoped = true;
                }
            });

            // debugger;
            // console.log(data);
            FiltersChange.sendData(data, filtersPanel);
        });
    }

    static sendData(data, resultsBlock) {
        $.ajax({
            url: '/requests/update_filters.php',
            dataType: 'json',
            type: 'get',
            data: {data: data},
            success: function (data) {
                // console.log(data.filters);
                resultsBlock.html(data.filters);
            }
        });
    }
}