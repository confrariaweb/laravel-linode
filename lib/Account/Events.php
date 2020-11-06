<?php

namespace Linode\Account;

use Linode\Common\Curl;
use Linode\Auth\Core;

class Events extends Core
{
    //Get all events or pass an $id to get a specific event.
    public function getEvent($id=null) {
        $curl = new Curl();
        $apiUrl = $this->getApiUrl();
        $header = $this->getHeader(True);
        $fullUrl = $apiUrl . 'account/events/' . $id;
        $events = $curl->curlGet($fullUrl,$header);
        return $events;
    }
}


?>
