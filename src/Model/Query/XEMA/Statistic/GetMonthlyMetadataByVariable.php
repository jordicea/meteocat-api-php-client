<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\XEMA\Statistic;

/**
 * Class Statistic\GetMonthlyMetadataByVariable
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/estadistics-diaris/#metadades-destadistics-mensuals-per-variable
 * @package Meteocat\Model\Query\XEMA\Statistic
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class GetMonthlyMetadataByVariable extends Base
{
    /**
     * Endpoint.
     */
    private const URI = '/mensuals/{codi_variable}/metadades';

    /**
     * @var int|null
     */
    private $variable = null;

    /**
     * GetYearlyMetadataByVariable constructor.
     *
     * @param int $variable Variable code.
     */
    public function __construct(int $variable)
    {
        $this->variable = $variable;
    }

    /**
     * @return string
     */
    private function generateUri() : string
    {
        $uri = self::URI;
        $uri = str_replace('{codi_variable}', $this->variable, $uri);

        return $uri;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . "/GetMonthlyMetadataByVariable";
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . $this->generateUri();
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}