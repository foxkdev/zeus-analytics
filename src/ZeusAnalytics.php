<?php
namespace Zeus\Analytics;

use Zeus\Analytics\ZeusClient;

use Google_Client;
use Google_Service_Analytics;

use DateTime;

class ZeusAnalytics{

  protected $config;


  public function __construct($config = null){ //esto no funciona para nada?
    $this->config = $config;
  }



  /*
   *GET VIEWS VISITS
   *
   */
  public function getVisits($from, $to, $url_explode = null){ //toda la info de productos necesaria?
    $id = config('zeus_analytics.id');
    
    $client = ZeusClient::getClient();

    $service = new Google_Service_Analytics($client);

    // dump($service);die;
    try {
            $results = $service->data_ga->get('ga:' . $id, $from, $to, 'ga:pageviews', ['dimensions' => 'ga:source,ga:medium,ga:pagePath', 'max-results' => 10000]);
            $data = [];
            if ($views = $results->getRows()) {
              // dump($views);die;
                foreach ($views as $view) {
                  if($url_explode == null || strpos($view[2], $url_explode) === 0){
                    $data[] = [
                        'source' => $view[0],
                        'medium' => $view[1],
                        'permalink' => $view[2],
                        'views' => (int)$view[3],
                    ];
                  }
                }
            }
            return $data;
		} catch (Google_Service_Exception $e) {
			return $e;
		} catch (Google_Auth_Exception $e) {
			return $e;
		}

  }
  //GET

}
 ?>
