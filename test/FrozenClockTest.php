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
use Headsnet\CarbonClock\FrozenClock;
use PHPUnit\Framework\TestCase;

class FrozenClockTest extends TestCase
{
    public function test_now_should_return_always_the_same_object(): void
    {
        $now = new CarbonImmutable();
        $clock = new FrozenClock($now);

        self::assertSame($now, $clock->now());
        self::assertSame($now, $clock->now());
    }

    public function test_now_set_changes_the_object(): void
    {
        $oldNow = new CarbonImmutable();
        $clock = new FrozenClock($oldNow);

        $newNow = new CarbonImmutable();
        $clock->setTo($newNow);

        self::assertNotSame($oldNow, $clock->now());
        self::assertSame($newNow, $clock->now());
    }

    public function test_from_utc_creates_clock_frozen_at_current_system_time_in_utc(): void
    {
        $clock = FrozenClock::fromUTC();
        $now = $clock->now();

        self::assertSame('utc', $now->getTimezone()->getAbbr());
    }
}
