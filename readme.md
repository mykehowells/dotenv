dotenv Environment Manager
==

If you have used Laravel and gotten used to being able to set and switch between environments as easily as swapping out a .env file.

Using ```mykehowells/dotenv```, you can now add that functionality to your own projects with composer.

Install via Composer
--

Add mykehowells/dotenv to your project via composer with the following line:

```composer require mykehowells/dotenv```


Add the below code to check for a .env file, and import if it exists. Preferably, you should store this file outside of any publicly accessible directories, as it will contain potentially sensitive data - such as database credentials.

Check out the ```vlucas/phpdotenv``` [readme](https://github.com/vlucas/phpdotenv/blob/master/README.md) for more info on that package.

```php
/*----------------------------------------------------------------------------
| ENV CONFIGURATION
|-----------------------------------------------------------------------------
|
| Check to see if an env file exists at project root, if it does, import
| keys and values into putenv( $setting ), otherwise env( $key, $default=null )
| will return default value.
|
|---------------------------------------------------------------------------*/
if( file_exists( __DIR__ . '/.env' ) ) {

	$dotenv = new Dotenv\Dotenv( __DIR__ );
	$dotenv->load();

}
```

You can then start using the ```env( $key, $default = null )``` function to retrieve data from your .env file.
