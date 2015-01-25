<?php

namespace Core\Application;

/**
 * This class is responsible for all configs which are important. It loads them from the 'config.json' in the root dir.
 * @author Andreas Bissinger <mail@bissinger-andreas.de>
 */
class Config {
    public static function buildPath ($parts) {
        return implode(DIRECTORY_SEPARATOR, $parts);
    }

    public static function getModulesDirectory () {
        $parts = explode(DIRECTORY_SEPARATOR, self::getRootPath());
        $parts = array_merge($parts, array('src', 'modules'));
        return self::buildPath($parts);
    }

    public static function getRootPath () {
        return dirname(dirname(dirname(__DIR__)));
    }
}