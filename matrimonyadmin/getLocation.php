<?php

//if latitude and longitude are submitted

if(!empty($_POST['latitude']) && !empty($_POST['longitude'])){

    //send request and receive json data by latitude and longitude

    //$url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng='.trim($_POST['latitude']).','.trim($_POST['longitude']).'&key=AIzaSyAI244XL_NkVyo-OqGgWWy4Hi7nRZR4DsA';

    $url = 'https://api.opencagedata.com/geocode/v1/json?q='.trim($_POST['latitude']).'+'.trim($_POST['longitude']).'&key=34d8867645274971bea9922d5758b1c2&language=en&pretty=1';

    $json = @file_get_contents($url);

    $data = json_decode($json);

    $status = $data->status->code;

    print_r($data->results);

    //print_r($data->status->code);

    

    //if request status is successful

    if($status == 200){

        //get address from json data

        $location = $data->results[0]->formatted;

    }else{

        $location =  '';

    }

    

    //return address to ajax 

    echo $location;

}

?>