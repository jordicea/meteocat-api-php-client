<?php

declare(strict_types=1);

namespace Meteocat\Model\Factory;

use Meteocat\Model\Entity\Response;
use Meteocat\Model\Exception\EntityNotFound;
use Meteocat\Model\Exception\StoreResponseAlreadyExist;
use Meteocat\Model\Exception\StoreResponseDirectoryNotFound;

/**
 * Class Builder
 *
 * @package Meteocat\Model\Factory
 * @author  Màrius Asensi Jordà <marius.asensi@gmail.com>
 */
class Builder
{
    /**
     * Convert from JSON response to the desired entity.
     *
     * @param string $entity
     * @param string $raw
     *
     * @return Response|array
     * @throws EntityNotFound
     */
    public static function create(string $entity, string $raw)
    {
        if (!class_exists($entity)) {
            throw new EntityNotFound();
        }

        // Parse.
        $response = json_decode(html_entity_decode($raw));

        // Unique response.
        if (!is_array($response)) {
            return new $entity($response);
        }

        $result = [];
        foreach ($response as $item) {
            $result[] = new $entity($item);
        }

        return $result;
    }

    /**
     * Checks if a directory exist.
     *
     * @param string $path Directory to check.
     *
     * @return bool
     */
    public static function canUsePathToSave(string $path)
    {
        return empty($path) || !file_exists($path);
    }

    /**
     * Saves the $raw string in a new file.
     *
     * @param string $path    Path of the new file
     * @param string $file    File name.
     * @param string $raw     Data to save.
     * @param bool   $replace Replace if the file already exist.
     *
     * @return bool
     * @throws StoreResponseAlreadyExist|StoreResponseDirectoryNotFound
     */
    public static function save(string $path, string $file, string $raw, bool $replace = false) : bool
    {
        if (!self::canUsePathToSave($path)) {
            throw new StoreResponseDirectoryNotFound();
        }

        // Name with path and file extension.
        $file = sprintf("%s/response.%s.json", $path, $file);

        if ($replace || !file_exists($file)) {
            $result = file_put_contents($file, html_entity_decode($raw));
        } else {
            throw new StoreResponseAlreadyExist();
        }

        return $result !== false;
    }
}
