<?php
namespace Zeus\Analytics;

use Google_Client;
use Google_Service_Analytics;

class ZeusClient{


  /*
   * GET CLIENT GOOGLE AUTH
   * @return client
   */
  public static function getClient() {
        $client = new Google_Client();
        $client->addScope(Google_Service_Analytics::ANALYTICS_READONLY);
        $client->setAccessType('offline');
        $client->setClientId(config('zeus_analytics.client_id'));
        $client->setClientSecret(config('zeus_analytics.client_secret'));
        // $client->setRedirectUri(action('UserController@analytics'));

        // $analytics_token = '{"access_token":"ya29.GltZBNnt_dtBmHxDKo0nktCRtYkus0QeIy_L3X5lC26wkqRmYoMdRRKu2IwsdEcKE-Sy2yfTp4eo1tuTHCnNLodN1UFk5osu5CE9T33aoLQV_xajNn6hGFrp0mEF","expires_in":3600,"refresh_token":"1\/FwmyLMYE9cWuFJID3C1SdOb-D7jeevaUjYEWe6ROazQ","token_type":"Bearer","created":1496082936}';
        $analytics_token = '{"access_token":"' . config('zeus_analytics.access_token') . '","expires_in":3600,"refresh_token":"1\/FwmyLMYE9cWuFJID3C1SdOb-D7jeevaUjYEWe6ROazQ","token_type":"Bearer","created":1496082936}';
        if ($analytics_token) {
            $client->setAccessToken($analytics_token);
        }
        // dump($client);die;
        return $client;
    }


}
 ?>
