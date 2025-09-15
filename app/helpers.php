<?php

    if(!function_exists('num_format')){
        function num_format($price){
            return number_format($price, 2);
        }
    }

    if(!function_exists('format_time')){
        function format_time($time){
            return \Carbon\Carbon::parse($time)->format('H:i');
        }
    }
