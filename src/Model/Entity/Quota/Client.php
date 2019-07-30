<?php

declare(strict_types=1);

namespace Meteocat\Model\Entity\Quota;

use stdClass;

/**
 * Class Client
 *
 * @package Meteocat\Model\Entity\Quota
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
final class Client
{
    /**
     * @var string|null
     */
    private $name = null;

    /**
     * Client constructor.
     *
     * @param stdClass $data
     */
    public function __construct(stdClass $data)
    {
        $this->name = (string)$data->nom;
    }

    /**
     * @return string|null
     */
    public function getName() : ?string
    {
        return $this->name;
    }
}
