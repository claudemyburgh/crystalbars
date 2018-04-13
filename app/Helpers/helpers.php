<?php 


if (!function_exists('on_page')) {

    function on_page($path) 
    {
        return request()->is($path);
    }
    
}

if (!function_exists('return_if')) {

    function return_if($condition, $value) 
    {
        if ($condition) {
            return $value;
        }
    }
    
}


if (!function_exists('return_path')) {

    function return_path($path, $condition, $value) 
    {

    }
    
}


if (!function_exists('e_break')) {
        
    function e_break($value)
    {
        return nl2br(e($value));
    }        

}
