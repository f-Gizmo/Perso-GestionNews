<?php

namespace FG\MasterBundle\Info;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class InfoListener{

	protected $infoHTML;
	protected $endDate;

	public function __construct(InfoHTMLAdder $infoHTML, $endDate)
	{
		$this->infoHTML = $infoHTML;
		$this->endDate = new \Datetime($endDate);
	}

	public function proccesInfo(FilterResponseEvent $event)
	{
		  if (!$event->isMasterRequest()) {
      return;
    }
		$restant = $this->endDate->diff(new \datetime())->days;

		if ($restant<= 0) {
			return;
		}

		$response = $this->infoHTML->addInfo($event->getResponse());
		$event->setResponse($response);
	}
}