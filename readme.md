# LivewireTicket

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]



Minimal issue ticketing package for livewire (2) laravel project

## Installation

Via Composer

``` bash
$ composer require alessio-ferretti/livewire-ticket
$ php artisan migrate

```

## Usage

### Bootstrap 5 and Alpinejs

This package require bootstrap library

https://getbootstrap.com/docs/5.2/getting-started/introduction/

And for livewire datatable ( https://github.com/rappasoft/laravel-livewire-tables ) you need to include in your page
``` html
<script src="//unpkg.com/alpinejs" defer></script>
```

### Livewire directive
Add the Livewire directive to your template to include the single componente
``` php
<html>
<body>
.....
@livewire('lt-new',['user_id' => 1])

@livewire('lt-manage',['user_id' => 1,'lt_ticket_id' => 1])

@livewire('lt-table',['theme'=>"bootstrap-5",'editRouteName'=>'hello'])


</body>
</html>
```


## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author@email.com instead of using the issue tracker.

## Credits

- [Author Name][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/alessio-ferretti/livewire-ticket
[ico-downloads]: https://img.shields.io/packagist/dt/alessio-ferretti/livewire-ticket


[link-packagist]: https://packagist.org/packages/alessio-ferretti/livewire-ticket
[link-downloads]: https://packagist.org/packages/alessio-ferretti/livewire-ticket
[link-author]: https://github.com/alessio-ferretti
[link-contributors]: ../../contributors
