<?php
/*
 * Parses the XML config files in the app/etc directory in to usable PHP array structures
 * @origin  Someone posted this class file as an article and removed it after I offered some improvements
 *   such as using glob and believe changing glob(/etc/*) to glob(/etc/*.xml) removed the need for the regex match.
 */
class Config
{
    public static function getConfig() {
        $scan = glob('etc/*');
        $config = new stdClass();

        foreach ($scan as $path) {
            // we only require xml files, so we will ignore everything else including subdirectories
            if (preg_match('/\.xml$/', $path)) {
                // Load the config xml in to a variable, find the file name and store it in the config data
                $config = json_decode(json_encode(simplexml_load_file($path, null , LIBXML_NOCDATA)));
                preg_match('/etc\/(.*?)\./s', $path, $matches);
                $config->$matches[1] = $config;
            }
        }

        return $config;
    }
}

// Example usage
$configVariables = Config::getConfig();   
var_dump($configVariables); 
