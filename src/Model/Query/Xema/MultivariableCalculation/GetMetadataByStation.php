<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\MultivariableCalculation;

/**
 * Class MultivariableCalculation\GetMetadataByStation
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/#metadades-de-les-variables-duna-estacio
 * @package Meteocat\Model\Query\Xema\MultivariableCalculation
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetMetadataByStation extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/estacions/{codi_estacio}/variables/cmv/metadades';

    /**
     * @var string|null
     */
    private $station = null;

    /**
     * GetMetadataByStation constructor.
     *
     * @param string $station Station code.
     */
    public function __construct(string $station)
    {
        $this->station = $station;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_estacio}', $this->station, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetMetadataByStation";
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return sprintf('%s/%s/v%s%s',parent::BASE_URL, parent::NAME, parent::VERSION, $this->generateUri());
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
