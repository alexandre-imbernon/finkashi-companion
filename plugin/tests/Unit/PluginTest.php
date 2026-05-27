<?php
declare(strict_types=1);

namespace Finkashi\Companion\Tests\Unit;

use Finkashi\Companion\Plugin;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

final class PluginTest extends TestCase
{
    #[Test]
    public function it_exposes_the_version_given_at_construction(): void
    {
        $plugin = new Plugin('0.1.0');

        self::assertSame('0.1.0', $plugin->getVersion());
    }

    #[Test]
    public function it_exposes_its_name(): void
    {
        $plugin = new Plugin('1.0.0');

        self::assertSame('Finkashi Companion', $plugin->getName());
    }

    #[Test]
    public function its_version_is_immutable_via_readonly_property(): void
    {
        $plugin = new Plugin('0.1.0');

        $this->expectException(\Error::class);
        // @phpstan-ignore-next-line
        $plugin->version = '0.2.0';
    }
}
