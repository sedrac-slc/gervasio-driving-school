<?php

    if(!function_exists('num_format')){
        function num_format($price){
            return number_format($price, 2);
        }
    }
