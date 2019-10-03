## Install

Using Composer

```
composer require minhajul/notify
```

Add the service provider to `config/app.php`

```php
Minhajul\Notify\NotifyServiceProvider::class,
```

Optionally include the Facade in `config/app.php` if you'd like.

```php
'Notify' => Minhajul\Notify\Facades\Notify::class,
```

## Usage

### Basic

From your application, call the `flash` method with a message and type.

```php
notify()->flash('Welcome back!', 'success');
```

Within a view, you can now check if a flash message exists and output it.

```php
@if (notify()->ready())
    <div class="alert-box {{ notify()->type() }}">
        {{ notify()->message() }}
    </div>
@endif
```

Then, in your view.

```javascript
@if (notify()->ready())
    <script>
        swal({
            title: "{!! notify()->message() !!}",
            text: "{!! notify()->option('text') !!}",
            type: "{{ notify()->type() }}"
        });
    </script>
@endif
```
