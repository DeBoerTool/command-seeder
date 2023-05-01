# Command Seeder for Laravel

An Artisan console command allows calling seeders with arguments.

## Installation

```bash
composer require --dev dbt/command-seeder
```

## Config

Publish the config file:

```bash
php artisan vendor:publish --provider="Dbt\CommandSeeder\CommandSeederServiceProvider" --tag="config"
```

Then populate the `seeders` key with a map like so:

```php
'seeders' => [
    'my-seeder' => MySeeder::class,
];
```

## Seeders

Seeders must extend the `CommandSeederAbstract` class. Each seeder must provide a list of arguments:

```php
public function argumentNames(): ArgumentNames
{
    return new ArgumentNames('firstArg', 'secondArg', 'etc');
}
```

These argument names will be matched up (by index) with the provided CLI arguments and will be passed into the `run` method. If the number of required arguments doesn't match the number of given arguments, an exception will be thrown. 

Additionally, the command's `OutputStyle` is passed into the seeder's constructor so you can output to the console from the seeder:

```php
public function run(Arguments $arguments, int $quantity): void
{
    $firstArg = $arguments->get('firstArg');
    $allArgs = $arguments->all();
    
    // Create some models...
    
    $this->output->info('Write some output...');
}
```

## Usage

```bash
php artisan seed:command {seederName} {quantity} {...arguments}
```

