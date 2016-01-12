<?php
if (Session::has('zeAccessKey'))
{
    // $data =  json_encode($datas);
    // echo '{ "records":';
    // echo $data;
    // echo '}';
    $value = Session::get('zeAccessKey');
        var_dump($value);
}
else{
    echo 'data';
}

 ?> 