<?php

Session::flash('zeAccessKey', $datas);
if (Session::has('zeAccessKey'))
{
    $data =  json_encode($datas);
    echo '{ "records":';
    echo $data;
    echo '}';
}
else{
    echo 'data';
}
    
 ?> 