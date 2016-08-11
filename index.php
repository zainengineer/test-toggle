<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require dirname(__FILE__).'/vendor/autoload.php';

use AJT\Toggl\TogglClient;
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();



$toggl_token = $_ENV['TOGGLE_API_KEY'];
$toggl_client = TogglClient::factory(array('api_key' => $toggl_token));

$workspaces = $toggl_client->getWorkspaces(array());

foreach($workspaces as $workspace){
    $id = $workspace['id'];
    print $workspace['name'] . "\n";
}