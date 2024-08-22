<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// $route['default_controller'] = 'Home';
$route['default_controller'] = 'home_v2/HomeV2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



//TODO | -------------------------------------------------------------------------
//TODO | API CONTROLLER
//TODO | -------------------------------------------------------------------------
$route['api/question/getAll'] = 'ApiController/getAllQuestion';
$route['api/question/submit'] = 'ApiController/userSubmitQuestion';

$route['api/graph/getSummary/(:any)'] = 'ApiController/getAllSummaryGraph/$1';
$route['api/graph/getSummarySection'] = 'ApiController/getSummarySectionGraph';
$route['api/graph/getYearSummary/(:num)'] = 'ApiController/getYearSummaryGraph/$1';
$route['api/graph/getYearSummary'] = 'ApiController/getYearSummaryGraph';
$route['api/graph/getLastThreeYearGraph'] = 'ApiController/getLastThreeYearGraph';
$route['api/graph/getYearSummarySection/(:num)'] = 'ApiController/getYearSummarySectionGraph/$1';
$route['api/graph/getYearSummarySection'] = 'ApiController/getYearSummarySectionGraph';
$route['api/graph/getGraphbar'] = 'ApiController/getGraphbarSetting';
$route['api/graph/updateNorm'] = 'ApiController/updateGraphbarNorm';

$route['api/sync/syncYear/(:any)'] = 'ApiController/syncYearData/$1';

$route['api/sync/syncOldData'] = 'ApiController/insertOldData';

$route['api/summary/getSummary'] = 'ApiController/getScoreAverage';
$route['api/summary/getSubmit'] = 'ApiController/getScore';
$route['api/summary/getStats/(:num)'] = 'ApiController/getStats/$1';
$route['api/summary/getStats'] = 'ApiController/getStats';

$route['api/preview/import'] = 'ApiController/previewImport';

$route['api/test/test'] = 'ApiController/getStats';