#ZEUS ANALYTICS API INTEGRATIONS

## To install:
in config/app.php set Provider and Alias:

  //provider
  Zeus\Analytics\AnalyticsServiceProvider::class,

  //alias
  'ZeusAnalytics' => Zeus\Analytics\Facades\ZeusAnalytics::class,


copy in composer.json in section psr-4:
  "Zeus\\Analytics\\": "vendor/kloppz/zeus-analytics-api/src"
