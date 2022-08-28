<?php

    function getImage($image, $size = 'default'){
        if($size != 'default'){
            return asset('upload/'.$size.'/'.$image);
        }
        return asset('upload/'.$image);
    }

    function getFile($file){
        return asset('upload/'.$file);
    }

