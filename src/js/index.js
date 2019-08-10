'use strict';

import '../scss/style.scss';
import FiltersMenu from "./controllers/FiltersMenu";
import Pagination from "./controllers/Pagination";

let filtersMenu = new FiltersMenu();
filtersMenu.run();

let pagination = new Pagination();
pagination.page();