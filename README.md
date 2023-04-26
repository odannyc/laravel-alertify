# laravel-alertify
An alerts library for Laravel using alertify
```php
alertify()->success("The laravel-alertify package is awesome!");
```

![laravel-alertify](/assets/images/main.png?raw=true)

## Installation
This package uses composer, so require it like so:
```
composer require panchania83/laravel-alertify
```

You'll also need to pull in the `alertify.js` project. This is located here: https://alertifyjs.org/

You can use NPM: 
```
npm install --save alertify.js
```

Or include the CDN version of it in your `app.blade.php` template. (File may vary on your Laravel installation):
```html
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
```

Include the service provider in `config/app.php`:
```php
'providers' => [
    panchania83\Alertify\AlertifyServiceProvider::class,
];
```

Also, include the Alias in `config/app.php`
```php
'aliases' => [
    'Alertify' => panchania83\Alertify\Alertify::class,
];
```

Then, in the template of your Laravel installation, include the view anywhere in the body of your HTML:
```php
@include('alertify::alertify')
```

## Usage
**Make sure you include `alertify.js` prior to using this package. (See installation instructions above)**

You can call the `alertify()` helper function before returning/redirecting to a view:

```php
/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
public function update(Request $request)
{
    alertify()->success('Updated record successfully');
    
    // You can also add multiple alerts!
    alertify('You are awesome!');
    
    return redirect()->back();
}
```

You can either use the `alertify()` helper or use the static Facade:
```php
Alertify::standard('I like alerts')
```

There are 3 types of alerts:

![laravel-alertify](/assets/images/types.png?raw=true)

```php
alertify('this is a standard alert (shows black)');
alertify()->success('this is a success alert (shows green)');
alertify()->error('this is an error alert (shows red)');
```

You can also show multiple alerts by calling that function multiple times:
```php
alertify('alert 1');
alertify('alert 2');
```

You can save the alert and edit it based on logic:
```php
$alert = alertify('i am an alert');
if ($error) {
    $alert->error();
} else {
    $alert->success();
}
```

There's many options you can add per alert:
```php
// Show the alert for 5000 milliseconds and then dismisses itself (default: 4000)
alertify('delayed 5 seconds')->delay(5000);

// Alert stays displayed with no timeout
alertify('i stay displayed on the screen')->persistent();

// Alert can be clicked to be dismissed
alertify('i can be clicked to be dismissed')->clickToClose();

// You can position alerts (default: 'top right')
alertify('i am on the bottom left')->position('bottom left');

// You can attach the alert to some other HTML element (default: 'document.body')
alertify('i am displayed on a different parent')->attach('.some-html-accessor')
```

You can also daisy chain options:
```php
alertify()->success('i am daisychained')->delay(10000)->clickToClose()->position('bottom right');
```
