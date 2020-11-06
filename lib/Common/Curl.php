<?php

namespace Linode\Common;

class Curl
{
    const USER_AGENT = 'PHP-Linode-V4/1.0';
    public function curlPost($endpoint, $headers, $post)
    {
        $ch = curl_init();
        $values = array(
            CURLOPT_URL => $endpoint,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_HTTPHEADER => $headers,
	    CURLOPT_USERAGENT => self::USER_AGENT,
        );
        curl_setopt_array($ch, $values);
        $response = curl_exec($ch);
	curl_close($ch);
	$response = json_decode($response);
        return $response;
    }

    public function curlDelete($endpoint, $headers)
    {
        $ch = curl_init();
        $values = array(
            CURLOPT_URL => $endpoint,
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_CUSTOMREQUEST => "DELETE",
            CURLOPT_HTTPHEADER => $headers,
	    CURLOPT_USERAGENT => self::USER_AGENT,
        );
        curl_setopt_array($ch, $values);
	    $response = curl_exec($ch);
	    curl_close($ch);
	    $response = json_decode($response);
        return $response;
    }

    public function curlPut($endpoint, $header)
    {
        $ch = curl_init();
        $values = array(
            CURLOPT_URL => $endpoint,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_URSERAGENT => self::USER_AGENT,

        );
        curl_setopt_array($ch,$values);
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response);
        return $response;
    }
    public function curlGet($endpoint, $header)
    {
	$ch = curl_init();
	$values = array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $endpoint,
	    CURLOPT_USERAGENT => self::USER_AGENT,
	);

        if (!empty($header)) {
	    $values[CURLOPT_HTTPHEADER] = $header;
        }
        curl_setopt_array($ch, $values);
	    $response = curl_exec($ch);
	    curl_close($ch);
	    $response = json_decode($response);
        return $response;
    }
}
