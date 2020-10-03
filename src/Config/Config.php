<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace Rebuild\Config;

use Rebuild\Contract\ConfigInterface;

class Config implements ConfigInterface
{
    /**
     * @var array
     */
    protected $configs = [];

    public function __construct(array $configs)
    {
        $this->configs = $configs;
    }

    public function get(string $key, $default = null)
    {
        return $this->configs[$key] ?? $default;
    }

    public function has(string $keys)
    {
        return isset($this->configs[$keys]);
    }

    public function set(string $key, $value)
    {
        $this->configs[$key] = $value;
    }
}
