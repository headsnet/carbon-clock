![Build Status](https://github.com/headsnet/carbon-clock/actions/workflows/ci.yml/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/headsnet/carbon-clock/v)](//packagist.org/packages/headsnet/carbon-clock)
[![Total Downloads](https://poser.pugx.org/headsnet/carbon-clock/downloads)](//packagist.org/packages/headsnet/carbon-clock)
[![License](https://poser.pugx.org/headsnet/carbon-clock/license)](//packagist.org/packages/headsnet/carbon-clock)

# Carbon Clock

A clock interface and implementation using the [Carbon](https://carbon.nesbot.com/docs/) date manipulation library.

### Usage

Wherever you need access to the system time, inject a clock implementation by typehinting against the `Clock` interface.

In production environments, create a service from the `SystemClock`, and arrange for this to be injected wherever the
`Clock` interface is used.

During testing, you can substitute the `FrozenClock` implementation, which will provide additional features for freezing
time, and otherwise manipulating it to make testing time sensitive code much easier.


### Contributing

Contributions are welcome. Please submit pull requests with one fix/feature per
pull request.

Composer scripts are configured for your convenience:

```
> composer test       # Run test suite
> composer cs         # Run coding standards checks
> composer cs-fix     # Fix coding standards violations
> composer static     # Run static analysis with Phpstan
```

### Licence

This code is released under the MIT licence. Please see the LICENSE file for more information.



