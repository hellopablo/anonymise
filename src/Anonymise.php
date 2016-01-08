<?php

namespace Anonymise;

class Anonymise
{
    const CONFIG_FILE = '~/.anonymiserc';
    const NO_INDEX_FILE = '.metadata_never_index';

    // --------------------------------------------------------------------------

    public static function go($aArgs)
    {
        $sCommand = isset($aArgs[0]) ? $aArgs[0] : null;
        $sPath    = isset($aArgs[1]) ? $aArgs[1] : getcwd();

        //  Load up and parse the config file
        if (file_exists(self::CONFIG_FILE)) {

            $oConfig = json_decode(require self::CONFIG_FILE);

        } else {

            $oConfig       = new \stdClass();
            $oConfig->dirs = array(
                'vendor',
                'node_modules',
                'bower_components'
            );
        }

        // --------------------------------------------------------------------------

        //  Perform the search
        foreach ($oConfig->dirs as $sDir) {
            exec('find ' . $sPath . ' -name "' . $sDir . '"', $aResults);

            $aResults = array_unique($aResults);
            $aResults = array_filter($aResults);

            foreach ($aResults as $sResult) {
                touch($sResult . DIRECTORY_SEPARATOR . self::NO_INDEX_FILE);
            }
        }
    }
}
