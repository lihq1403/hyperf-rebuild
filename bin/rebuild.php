<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
use Rebuild\Command\StartCommand;
use Rebuild\Config\ConfigFactory;
use Symfony\Component\Console\Application;

! defined('BASE_PATH') && define('BASE_PATH', dirname(__DIR__, 1));

require BASE_PATH . '/vendor/autoload.php';

$application = new Application();

$config = new ConfigFactory();
$config = $config();
$commands = $config->get('commands');

foreach ($commands as $command) {
    if ($command === StartCommand::class) {
        $application->add(new StartCommand($config));
    } else {
        $application->add(new $command());
    }
}
$application->run();
