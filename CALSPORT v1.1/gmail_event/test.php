<?php
/*require_once 'google-api-php-client/src/Google_Client.php';
require_once 'google-api-php-client/src/contrib/Google_CalendarService.php';
$createdEvent = $service->events->quickAdd(
    'primary',
    'Appointment at Somewhere on June 3rd 10am-10:25am');

echo $createdEvent->getId();*/

/*$event = new Google_Event();
$event->setSummary('Appointment');
$event->setLocation('Somewhere');
$start = new EventDateTime();
$start->setDateTime('2011-06-03T10:00:00.000-07:00');
$event->setStart($start);
$end = new EventDateTime();
$end->setDateTime('2011-06-03T10:25:00.000-07:00');
$event->setEnd($end);
$attendee1 = new EventAttendee();
$attendee1->setEmail('attendeeEmail');
// ...
$attendees = array($attendee1,
                   // ...
                  );
$event->attendees = $attendees;
$createdEvent = $service->events->insert('primary', $event);

echo $createdEvent->getId();
*/

$next_sunday = date('d-m-y', strtotime("next Sunday"));
$ns = date('Ymd', strtotime('next sunday'));
echo $ns."<br>";

	$asunto = "Partido SI / Domingo ".$next_sunday." / 10:30 AM";
	$cuerpo = "Quien se inscribe para el próximo domingo ".$next_sunday."!!!"
			."<br>"
			."<a href='http://www.google.com/calendar/event?action=TEMPLATE&text=Pichanga+Dominical&dates=".$ns."T133000Z/".$ns."T153000Z"."&details=Pichanga!!&location=San+Ignacio+del+bosque,+santiago&trp=false&sprop=&sprop=name:'target='_blank' rel='nofollow'>Add to my calendar</a>";

echo $next_sunday."<br>";
echo $asunto."<br>";
echo $cuerpo;
?>
