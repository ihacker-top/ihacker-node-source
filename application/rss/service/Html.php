<?php

namespace app\rss\service;

class Html {

    public function getHtmlByUrl ($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $htmlString = curl_exec($ch);
        curl_close($ch);
        return $htmlString;
    }

    public function getJsonByUrl ($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json', 
            'Content-Type: application/json'
        ]);
        $htmlString = curl_exec($ch);
        curl_close($ch);
        return $htmlString;
    }
}