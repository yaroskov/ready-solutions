'use strict';

import $ from 'jquery';
import FiltersChange from './FiltersChange.js';

export default class FiltersMenu {

    run() {
        let _this = this;

        $(function () {
            FiltersChange.select();
            _this.dropDown();
            _this.closeDropDownByBody();
        });
    }

    dropDown() {
        $('.yar-filters-panel').on('click', '.yar-filters-panel__filter-title', function () {

            let list = $(this).parent().find('.yar-filters-panel__filter-list');

            $('.yar-filters-panel__filter-list').each(function () {

                if ($(this).get(0) === list.get(0)) {
                    if (list.is(':visible')) {
                        list.hide();
                    } else {
                        list.show();
                    }
                } else {
                    $(this).hide();
                }
            });
        });
    }

    closeDropDownByBody() {
        $('body').on('click', function (e) {
            if ($(e.target).closest('.yar-filters-panel__filter').length === 0) {

                $('.yar-filters-panel__filter-list').each(function () {
                    $(this).hide();
                });
            }
        });
    }
}