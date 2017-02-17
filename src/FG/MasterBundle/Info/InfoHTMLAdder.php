<?php

namespace FG\MasterBundle\Info;

use Symfony\Component\HttpFoundation\Response;

class InfoHTMLAdder 
{
	public function addInfo (Response $response)
	{
		$content = $response->getContent();

		$html='<div class="info"> Information général sur le site géré par un listener sur le kernel response  </div>';

		$content= str_replace('<body>','<body>'.$html, $content);
		$response->setContent($content);

		return $response;
			}	
}