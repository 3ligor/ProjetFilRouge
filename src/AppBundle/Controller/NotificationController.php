<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Notification;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class NotificationController extends Controller {

	public function sendNotificationAction($recipients, $message, $type, $em) {
		
		foreach ($recipients as $recipient) {
			$notification = new Notification();
			$notification->setUser($recipient)
					->setMessage($message)
					->setType($type)
					->setStatus(true)
					->setCreationDate(new \Datetime());
			$em->persist($notification);
			$em->flush();
		}
		return new Response();
	}
}
