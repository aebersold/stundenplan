#!/usr/bin/php
<?php
/**
 * @author Simon Aebersold <s.aebersold@gmail.com>
 *
 * ZHAW daily course schedule for the command line.
 * uses the ZHAW CampusInfo API(v 1.5) by Andreas Ahlenstorf 
 */

ini_set('display_errors', 1);

require_once 'lib/curl.php';
require_once 'lib/cli/cli.php';
require_once 'lib/cli/Streams.php';
require_once 'lib/cli/Colors.php';
require_once 'lib/cli/Table.php';
require_once 'lib/cli/Shell.php';
require_once 'lib/cli/table/Renderer.php';
require_once 'lib/cli/table/Ascii.php';
require_once 'lib/cli/table/Tabular.php';

use \Curl\Curl;
use cli;

$API_URL = 'https://api.apps.engineering.zhaw.ch/v1/';

// Args
$user = isset($argv[1]) ? $argv[1] : "";
$date = isset($argv[2]) ? $argv[2] : date_format(date_create('now'), 'Y-m-d');

// hack for tomorrow
if($date === 'tomorrow')
{
    $date = date_format(date_create('tomorrow'), 'Y-m-d');
}

if(empty($user))
{
    \cli\line('stundenplan: ZHAW course schedule for the command line.');
    \cli\line('');
    \cli\line('Useage:');
    \cli\line(' php stundenplan.php username [date]');
    \cli\line('');
    \cli\line(' username:  zhaw username');
    \cli\line(' date:      date in format YYYY-MM-DD | tomorrow');
    \cli\line('');
    exit(1);
}


// curling away
$curl = new Curl();
$curl->setUserAgent('aebersold/stundenplan (https://github.com/aebersold/stundenplan)');
$curl->setHeader('Accept', 'application/json');
$curl->get($API_URL . 'schedules/students/' . $user, array(
    'days' => '1',
    'startingAt' => $date,
));

if ($curl->error) {
    if($curl->error_code == 404)
    {
        \cli\err('%1Error: user not found%n');
    } else {
        \cli\err('%1Error: ' . $curl->error_code . ': ' . $curl->error_message . '%n');    
    }
        
    exit(1);
}
else {
    $data = $curl->response;
}
$curl->close();

// Parse data
$row = array();

\cli\line("Timetable for " . $user . " at " . $date);

foreach($data->days[0]->events as $event)
{
    $start = date_create($event->startTime);
    $end = date_create($event->endTime);
    $room = $event->eventRealizations[0]->room->name;

    $row[] = [
        date_format($start, 'H:i'),
        date_format($end, 'H:i'),
        $event->name,
        $room,
    ];
}

// empty msg
if(empty($row))
{
    \cli\line('%G%0No courses on ' . $date . '!%n');
} else {

    // Print Table
    $headers = ['Start', 'End', 'Course', 'Room'];

    $table = new \cli\Table();
    $table->setHeaders($headers);
    $table->setRows($row);
    $table->display();    
}

exit(0);