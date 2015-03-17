<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificationController extends Controller {

	public function sendNotificationAction($recipients, $message, $type) {
		$em = $this->getDoctrine()->getManager();
		
		
	}

}
