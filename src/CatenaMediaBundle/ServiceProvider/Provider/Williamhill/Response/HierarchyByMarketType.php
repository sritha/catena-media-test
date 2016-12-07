<?php

namespace CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Response;

use CatenaMediaBundle\ServiceProvider\Provider\ServiceProvider;
use CatenaMediaBundle\ServiceType\Params\ServiceTypeParams;
use CatenaMediaBundle\ServiceType\Params\ServiceTypeParamsFactory;
use CatenaMediaBundle\ServiceType\ServiceType;
use CatenaMediaBundle\Entity;
use Doctrine\ORM\EntityManager;


/**
 * Class HierarchyByMarketType
 *
 * @package CatenaMediaBundle\ServiceProvider\Provider\Williamhill\Response
 */
class HierarchyByMarketType extends WilliamhillResponse
{

    /** Stores Entity Manager
     *
     * @var EntityManager
     */
    private $em;


    public function __construct($xmlData, ServiceTypeParams $inputParams = null, $rootNode = 'response', EntityManager $em)
    {
        parent::__construct($xmlData, $inputParams);
        $this->em       = $em;
    }

    public function processErrors() {

        return parent::processErrors();
    }

    /**
     * @return array|mixed
     */
    public function parse()
    {
        $feedResponseObj   = $this->jsonResponse;
        $response = array();

        $responseAttributes = $feedResponseObj->{'@attributes'};
        $provider = $responseAttributes->provider;

        $providerFeedResponse = $feedResponseObj->response->{$provider};

        $providerFeedResponse->class = is_object($providerFeedResponse->class) ? [$providerFeedResponse->class] : $providerFeedResponse->class;
        foreach($providerFeedResponse as $key=> $classResponse){

            if($key == '@attributes'){
                continue;
            }

            $classAttributes = $classResponse->{'@attributes'};
            $sportClassId = $classAttributes->id;

            $sportClassEntity = new Entity\SportClass();

            $sportClassEntity->setId($sportClassId)
                ->setMaxrepdate($classAttributes->maxRepDate)
                ->setMaxreptime($classAttributes->maxRepTime)
                ->setName($classAttributes->name)
                ->setProvider($provider);

            $this->em->persist($sportClassEntity);

            $classResponse->type = is_object($classResponse->type) ? [$classResponse->type] : $classResponse->type;

            foreach ($classResponse->type as $sportKey => $sportType) {

                if($sportKey == '@attributes'){
                    continue;
                }

                $sportTypeAttributes = $sportType->{'@attributes'};
                $sportTypeId = $sportTypeAttributes->id;


                $sportTypeEntity = new Entity\Sporttype();

                $sportTypeEntity->setId($sportTypeId)
                    ->setUrl($sportTypeAttributes->url)
                    ->setLastupdatedate($sportTypeAttributes->lastUpdateDate)
                    ->setLastupdatetime($sportTypeAttributes->lastUpdateTime)
                    ->setName($sportTypeAttributes->name)
                    ->setClassid($sportClassEntity);

                $this->em->persist($sportTypeEntity);

                $sportType->market = is_object($sportType->market) ? [$sportType->market] : $sportType->market;
                foreach ($sportType->market as $marketKey => $sportMarket) {
                    if($marketKey == '@attributes'){
                        continue;
                    }

                    $sportMarketAttributes = $sportMarket->{'@attributes'};
                    $sportMarketId = $sportMarketAttributes->id;

                    $sportMarketEntity = new Entity\Sportmarket();

                    $sportMarketEntity->setId($sportMarketId)
                        ->setUrl($sportMarketAttributes->url)
                        ->setLastupdatedate($sportMarketAttributes->lastUpdateDate)
                        ->setLastupdatetime($sportMarketAttributes->lastUpdateTime)
                        ->setName($sportMarketAttributes->name)
                        ->setEventdate($sportMarketAttributes->date)
                        ->setEventtime($sportMarketAttributes->time)
                        ->setPlaceavailable(($sportMarketAttributes->placeAvailable == 'Y') ? 1: 0)
                        ->setCashoutavailable(($sportMarketAttributes->cashoutAvailable == 'Y') ? 1: 0)
                        ->setEachwayavailable(($sportMarketAttributes->eachwayAvailable == 'Y') ? 1: 0)
                        ->setFirstpriceavailable(($sportMarketAttributes->firstPriceAvailable == 'Y') ? 1: 0)
                        ->setForcastavailable(($sportMarketAttributes->forcastAvailable == 'Y') ? 1: 0)
                        ->setGuarenteedpriceavailable(($sportMarketAttributes->guarenteedPriceAvailable == 'Y') ? 1: 0)
                        ->setTricastavailable(($sportMarketAttributes->tricastAvailable == 'Y') ? 1: 0)
                        ->setLivepriceavailable(($sportMarketAttributes->livePriceAvailable == 'Y') ? 1: 0)
                        ->setStartingpriceavailable(($sportMarketAttributes->startingPriceAvailable == 'Y') ? 1: 0)
                        ->setBettilldate($sportMarketAttributes->betTillDate)
                        ->setBettilltime($sportMarketAttributes->betTillTime)
                        ->setTypeid($sportTypeEntity);

                    $this->em->persist($sportMarketEntity);

                    $sportMarket->participant = is_object($sportMarket->participant) ? [$sportMarket->participant] : $sportMarket->participant;
                    foreach ($sportMarket->participant as $participantKey => $participant) {
                        if($participantKey == '@attributes'){
                            continue;
                        }
                        $participantAttributes = $participant->{'@attributes'};
                        $participantId = $participantAttributes->id;

                        $participantEntity = new Entity\Participant();
                        $participantEntity->setId($participantId)
                            ->setName($participantAttributes->name)
                            ->setOdds($participantAttributes->odds)
                            ->setMarketid($sportMarketEntity)
                            ->setLastupdatedate($participantAttributes->lastUpdateDate)
                            ->setLastupdatetime($participantAttributes->lastUpdateTime)
                            ->setOddsdecimal($participantAttributes->oddsDecimal)
                            ->setHandicap($participantAttributes->handicap);

                        $this->em->persist($participantEntity);
                    }
                }
            }
        }

        $this->setResponse($response);
    }


}
