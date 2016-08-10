<?php

return array(
    'product/view/([0-9+])' => 'product/view/$1',
    'product' => 'product/index', // экшен index (actionIndex в newController )
    'sort' => 'main/sort', // atcion Sort в ProductController
    '' => 'main/index'
);