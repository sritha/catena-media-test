<?php

namespace CatenaMediaBundle\Controller;

use CatenaMediaBundle\ServiceProvider\Processor\ServiceProviderProcess;
use CatenaMediaBundle\ServiceProvider\Provider\ServiceProvider;
use CatenaMediaBundle\ServiceProvider\RequestType\RequestType;
use CatenaMediaBundle\ServiceType\Params\ServiceTypeParamsFactory;
use CatenaMediaBundle\ServiceType\ServiceType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    public function indexAction()
    {
        $requestParams = array(
            'classId'    => '1',
            'action'     => 'template',
            'marketSort' => 'HF',
            'filterBIR'  => 'N'
        );

        try{
            // Call action.
            $process = new ServiceProviderProcess(
                ServiceTypeParamsFactory::create(new ServiceType(ServiceType::CACHE_PRICE_FEED), $requestParams),
                new ServiceProvider(ServiceProvider::WILLIAMHILL),
                new RequestType(RequestType::HIERARCHY_BY_MARKET_TYPE),
                $this->getDoctrine()->getManager()
            );
            $serviceProviderResponse = $process->execute();
            $response = $serviceProviderResponse->getResponse();

        }
        catch (\Exception $e){
            $response = array(); // @todo: handle Exception
        }


        return $this->render('CatenaMediaBundle:Default:index.html.twig',array(
            'response' => $response,
        ));
    }
}
