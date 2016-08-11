<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require dirname(__FILE__).'/vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();



$toggl_token = $_ENV['TOGGLE_API_KEY'];

$client = new GuzzleHttp\Client();
$vUrl = 'https://www.toggl.com/api/v8/workspaces';
$vUrl = 'https://www.toggl.com/api/v8/workspaces/1043423';
$vUrl = 'https://www.toggl.com/api/v8/workspaces/1043423/users';

/**
 * Following won't work because it is only available for pro
 */
$vUrl = 'https://www.toggl.com/api/v8/workspaces/1043423/tasks';
//$vUrl = 'https://www.toggl.com/api/v8/workspaces/1043423/projects';
/**
 * Following is not working for some reason.
 * I assigned project to multiple tasks but no task is appearing
 */
$vUrl = 'https://www.toggl.com/api/v8/projects/10764415/tasks';

$vUrl = 'https://www.toggl.com/api/v8/projects/10764415';
$res = $client->get($vUrl, ['auth' => [$toggl_token, 'api_token']]);
//echo $res->getStatusCode();
// "200"
//echo $res->getHeader('content-type');
// 'application/json; charset=utf8'
echo "<pre>";
print_r($res->getBody());
// {"type":"User"...'
var_export($res->json());
