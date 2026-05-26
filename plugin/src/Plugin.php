<?php

declare(strict_types=1);

namespace Finkashi\Companion;

final class Plugin
{
    public function __construct(
        public readonly string $version,
    ) {
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function getName(): string
    {
        return 'Finkashi Companion';
    }
}