<?php

declare(strict_types=1);

namespace Meteocat\Model\Query\Xema\MultivariableCalculation;

use Meteocat\Model\Query\Xema\Xema;

/**
 * Class MultivariableCalculation\Base
 *
 * @link    https://apidocs.meteocat.gencat.cat/documentacio/calcul-multivariable/
 * @package Meteocat\Model\Query\Xema\MultivariableCalculation
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
abstract class Base extends Xema
{
    private const URI = '/variables/cmv';

    /**
     * @return string
     */
    public function getName() : string
    {
        return parent::getName() . '/MultivariableCalculation';
    }

    /**
     * @return string
     */
    public function getUrl() : string
    {
        return parent::getUrl() . self::URI;
    }

    /**
     * @return mixed
     */
    public function __toString() : string
    {
        return $this->getUrl();
    }
}
