<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Rebuild\Command;

use Rebuild\Config\Config;
use Rebuild\Server\ServerFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class StartCommand extends Command
{
    protected $config;

    public function __construct(Config $config)
    {
        parent::__construct();
        $this->config = $config;
    }

    protected function configure()
    {
        $this->setName('start')->setDescription('启动服务');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $config = $this->config;
        $configs = $config->get('server');
        $serverFactory = new ServerFactory();
        $serverFactory->configure($configs);
        $serverFactory->getServer()->start();
        return 1;
    }
}
