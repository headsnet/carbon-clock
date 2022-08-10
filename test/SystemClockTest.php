<?php
/*
 * This file is part of the Headsnet CarbonClock package.
 *
 * (c) Headstrong Internet Services Ltd 2022
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Headsnet\CarbonClock\Test;

use Carbon\CarbonImmutable;
use Carbon\CarbonTimeZone;
use Headsnet\CarbonClock\SystemClock;
use PHPUnit\Framework\TestCase;

class SystemClockTest extends TestCase
{
    public function test_now_should_respect_the_provided_timezone(): void
    {
        $timezone = new CarbonTimeZone('America/Sao_Paulo');
        $clock = new SystemClock($timezone);

        $lower = new CarbonImmutable('now', $timezone);
        $now = $clock->now();
        $upper = new CarbonImmutable('now', $timezone);

        self::assertEquals($timezone, $now->getTimezone());
        self::assertGreaterThanOrEqual($lower, $now);
        self::assertLessThanOrEqual($upper, $now);
    }

    public function test_from_utc_creates_an_instance_using_utc_as_timezone(): void
    {
        $clock = SystemClock::fromUTC();
        $now = $clock->now();

        self::assertSame('utc', $now->getTimezone()->getAbbr());
    }

    public function test_from_system_timezone_creates_an_instance_using_the_default_timezone_in_system(): void
    {
        $clock = SystemClock::fromSystemTimezone();
        $now = $clock->now();

        self::assertSame(date_default_timezone_get(), $now->getTimezone()->toRegionName());
    }
}
