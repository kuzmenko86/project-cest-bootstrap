<?php
namespace ISM\Factory;

use ISM\Intface\CommandIntface;
/**
 * Factory class for command tools.
 */
class CmdToolFactory
{
    const TOOL_SUFFIX_NAME = 'Tool';

    /**
     * Factory method to create command.
     *
     * @param string $cmdName Command name.
     *
     * @return bool
     * @throws \Exception
     */
    public static function getCommand($cmdName)
    {
        $paths = explode('\\', __NAMESPACE__);
        $cmdClassName =  '\\' . $paths[0] . '\\Tool\\' . $cmdName . static::TOOL_SUFFIX_NAME;

        try {
            $cmdClass = new $cmdClassName();
        } catch (\Exception $e) {
            throw new \Exception ('Cannot load class '. $cmdClassName);
        }

        if ($cmdClass && ($cmdClass instanceof CommandIntface) ) {
            return $cmdClass;
        }

        return false;
    }
}
