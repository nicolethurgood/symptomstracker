<?php
function Curl($url, $post_data, &$http_status, &$header = null) {

    $ch=curl_init();
    // user credencial
    curl_setopt($ch, CURLOPT_USERPWD, "username:passwd");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);

    // post_data
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);

    if (!is_null($header)) {
        curl_setopt($ch, CURLOPT_HEADER, true);
    }
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json', 'X-Postmark-Server-Token: f892d24d-b2c1-4e79-ada4-3f231f38de4f'));

    curl_setopt($ch, CURLOPT_VERBOSE, true);
    
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    $response = curl_exec($ch);
      
    $body = null;
    // error
    if (!$response) {
        $body = curl_error($ch);
        // HostNotFound, No route to Host, etc  Network related error
        $http_status = -1;
        Log::error("CURL Error: = " . $body);
    } else {
       //parsing http status code
        $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (!is_null($header)) {
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);

            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);
        } else {
            $body = $response;
        }
    }

    curl_close($ch);

    return $body;
}

$Subject = "Symptoms - " . $Name . " - " . $Date;

$url = "https://api.postmarkapp.com/email/withTemplate/";

$json = "{
    \"From\": \"covid-notification@nyfa.edu\",
    \"To\": \"$UserName\",
    \"ReplyTo\": \"$ReplyTo\",
    \"TemplateId\": \"$TemplateId\",
    \"TemplateModel\": {
              \"Subject\": \"$Subject\",
              \"Name\": \"$Name\",
              \"IDNumber\": \"$IDNumber\",
              \"Message\": \"$TestMessage\",
              \"VaccMessage\": \"$VaccMessage\",
              \"Symptoms_Cough\": \"$Symptoms_Cough\",
              \"Symptoms_Breath\": \"$Symptoms_Breath\",
              \"Symptoms_Fever\": \"$Symptoms_Fever\",
              \"Symptoms_Chills\": \"$Symptoms_Chills\",
              \"Symptoms_Fatigue\": \"$Symptoms_Fatigue\",
              \"Symptoms_Aches\": \"$Symptoms_Aches\",
              \"Symptoms_Headache\": \"$Symptoms_Headache\",
              \"Symptoms_LossTastSmell\": \"$Symptoms_LossTastSmell\",
              \"Symptoms_SoreThroat\": \"$Symptoms_SoreThroat\",
              \"Symptoms_Congestion\": \"$Symptoms_Congestion\",
              \"Symptoms_Diarrhea\": \"$Symptoms_Diarrhea\",
              \"Symptoms_Nausea\": \"$Symptoms_Nausea\",
              \"Symptoms_Contacted\": \"$Symptoms_Contacted\",
              \"Symptoms_Traveled\": \"$Symptoms_Traveled\"
          }
}";

$ret = Curl($url, $json, $http_status);

