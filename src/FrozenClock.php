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

namespace Headsnet\CarbonClock;

use Carbon\CarbonImmutable;
use Carbon\CarbonTimeZone;

class FrozenClock implements Clock
{
    public function __construct(
        private CarbonImmutable $fakeNow
    ) {
    }

    public static function fromUTC(): self
    {
        return new self(
            CarbonImmutable::now(new CarbonTimeZone('UTC'))
        );
    }

    public function setTo(CarbonImmutable $fakeNow): void
    {
        $this->fakeNow = $fakeNow;
    }

    public function now(): CarbonImmutable
    {
        return $this->fakeNow;
    }
}
