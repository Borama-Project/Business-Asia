<?php
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