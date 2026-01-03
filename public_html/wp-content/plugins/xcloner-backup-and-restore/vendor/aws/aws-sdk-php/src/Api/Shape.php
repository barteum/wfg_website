<?php

namespace XCloner\Aws\Api;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
/**
 * Base class representing a modeled shape.
 */
class Shape extends AbstractModel
{
    /**
     * Get a concrete shape for the given definition.
     *
     * @param array    $definition
     * @param ShapeMap $shapeMap
     *
     * @return mixed
     * @throws \RuntimeException if the type is invalid
     */
    public static function create(array $definition, ShapeMap $shapeMap)
    {
        static $map = ['structure' => 'XCloner\Aws\Api\StructureShape', 'map' => 'XCloner\Aws\Api\MapShape', 'list' => 'XCloner\Aws\Api\ListShape', 'timestamp' => 'XCloner\Aws\Api\TimestampShape', 'integer' => 'XCloner\Aws\Api\Shape', 'double' => 'XCloner\Aws\Api\Shape', 'float' => 'XCloner\Aws\Api\Shape', 'long' => 'XCloner\Aws\Api\Shape', 'string' => 'XCloner\Aws\Api\Shape', 'byte' => 'XCloner\Aws\Api\Shape', 'character' => 'XCloner\Aws\Api\Shape', 'blob' => 'XCloner\Aws\Api\Shape', 'boolean' => 'XCloner\Aws\Api\Shape'];
        if (isset($definition['shape'])) {
            return $shapeMap->resolve($definition);
        }
        if (!isset($map[$definition['type']])) {
            throw new \RuntimeException('Invalid type: ' . print_r($definition, \true));
        }
        $type = $map[$definition['type']];
        return new $type($definition, $shapeMap);
    }
    /**
     * Get the type of the shape
     *
     * @return string
     */
    public function getType()
    {
        return $this->definition['type'];
    }
    /**
     * Get the name of the shape
     *
     * @return string
     */
    public function getName()
    {
        return $this->definition['name'];
    }
}
