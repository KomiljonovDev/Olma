<?php
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.remove.bg/v1.0/removebg',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('image_url'=> "https://thumbs.dreamstime.com/z/dora-explorer-gold-coast-aus-nov-featured-first-animated-latina-character-leading-role-childrens-47460003.jpg",
        'size' => 'auto'),
        CURLOPT_HTTPHEADER => array('X-Api-Key: yriBtG1oqMiwh7TjqkMhu9b5'),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    file_put_contents(time() . ".png", $response);
    echo $response;
?>