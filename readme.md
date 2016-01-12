# laravel5-couchdb
# Work in progress: 01/12/2016
CouchDB database driver for Laravel 5

## Dependencies

*laravel5-couchdb* uses [doctrine/couchdb](https://github.com/doctrine/couchdb).

## Installation

`composer require defenestrator/laravel5-couchdb`.

Add the service provider in `app/config/app.php`:

```php
'Defenestrator\Laravel5\Couchdb\CouchdbServiceProvider',
```

When using couchdb connections, Laravel will automatically provide you with the corresponding couchdb objects.

## Configuration

Change your default database connection name in `app/config/database.php`:

```php
'default' => 'couchdb',
```

And add a new couchdb connection:

```php
'couchdb' => array(
    'driver'   => 'couchdb',
    'type'     => 'socket',
    'host'     => 'localhost',
    'ip'       => null,
    'port'     => 5984,
    'dbname'   => 'database',
    'user'     => 'username',
    'password' => 'password',
    'logging'  => false,
),
```
## Examples

```php
/**
 * @var \Defenestrator4\Laravel\Couchdb\CouchdbConnection
 */
$connection = DB::connection('couchdb');

/**
 * @var \Doctrine\CouchDB\CouchDBClient
 */
$couchdb = $connection->getCouchDB();
```

**Create/Update/Find Document example**

```php
$connection = DB::connection('couchdb');
$couchdb = $connection->getCouchDB();

list($id, $rev) = $connection->postDocument(array('foo' => 'bar'));
$couchdb->putDocument(array('foo' => 'baz'), $id, $rev);
$doc = DB::connection('couchdb')->findDocument($id);
```

All three methods can be called on $connection or $couchdb.

Thanks to [rbewley4](https://github.com/rbewley4/laravel-couchdb) for the Laravel 4 implementation, 
upon which this is intend to expand.