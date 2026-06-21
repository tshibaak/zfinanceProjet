<?php
    

    function verifVar($var , $message ?? ''){
        if(!isset($var) && empty($var)){
            return echo " ".$message ;
        }
    }