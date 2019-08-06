'use strict';

import $ from 'jquery';

export default class Test {

    run() {

        $(function () {
            console.log('jquery here');
        });

        console.log('test');
    }
}