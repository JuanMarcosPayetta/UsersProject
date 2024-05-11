<?php

namespace App\Helpers;

use Exception;

class EnvHelper
{

    /**
     * Retrieve an environment variable from the .env file.
     *
     * @param string $key The environment variable key
     * @return string The environment variable value
     * @throws Exception If the environment variable is not found or the .env file cannot be opened
     */

    public static function getEnvVar(string $key): string
    {
        $envFile = file_get_contents('../.env');

        if ($envFile === false) {
            throw new Exception('Failed to open .env file');
        }

        $lines = explode("\n", $envFile);
        $envVars = [];

        foreach ($lines as $line) {
            $line = trim($line);

            if (empty($line) || strpos($line, '#')) {
                continue;
            }

            list($envKey, $envValue) = explode('=', $line, 2);

            // Remove double quotes if present
            $envValue = trim($envValue, '"');

            // Replace references to other environment variables
            $envValue = preg_replace_callback('/\${(.*?)}/', function ($match) {
                return getenv($match[1]);
            }, $envValue);

            $envVars[$envKey] = $envValue;
        }

        if (!isset($envVars[$key])) {
            throw new Exception("Environment variable '$key' not found in .env file");
        }

        return $envVars[$key];
    }


}











    /**
     * Retrieve an environment variable from the .env file.
     *
     * @param string $key The environment variable key
     * @return string The environment variable value
     * @throws Exception If the environment variable is not found or the .env file cannot be opened
     */

    /**
    public static function getEnvVar(string $key): string
    {
        $envFile = fopen('../.env', 'r');

        if (!$envFile) {
            throw new Exception('Failed to open .env file');
        }

        $envVars = [];
        while (($line = fgets($envFile)) !== false) {
            $line = trim($line);
            if (strpos($line, '=') === false) {
                continue;
            }

            list($key, $value) = explode('=', $line);
            $envVars[$key] = $value;
        }
        fclose($envFile);

        if (!isset($envVars[$key])) {
            print_r("No estaaaaaaaaaaaaaa");
            throw new Exception("Environment variable '$key' not found in .env file");
        }
        else{
            print_r($envVars[$key]);
            print_r("siiiii estaaaa");
        }

        return $envVars[$key];
    }

}*/
