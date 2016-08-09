<?php

return array(
    'product/view/([0-9+])' => 'product/view/$1',
    'product/add' => 'product/add', // action add ( обработка формы ) 
    'product' => 'product/index', // экшен index (actionIndex в newController )
    '' => 'main/index'
);