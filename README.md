# Symfony 2 Mailjet Extension #

This bundle makes the mailjet library easy to use from a Symfony 2 library

## Installation

Simply add the following to your composer.json file

```js
{
    "require": {
        "gwk/mailjetbundle": "0.1"
    }
}
```

And use composer to install the bundle:
```
composer.phar update gwk/mailjetbundle
```

Now add the bundle to your app/AppKernel.php:

```php
$bundles[] = new GWK\MailjetBundle\GWKMailjetBundle();
```

## Configuration

```yaml
gwk_mailjet:
	api_key: "YOUR API KEY" # Required
	secret_key: "YOUR SECRET KEY" # Required
	debug: true # Optional, defaults to %kernel.debug%
	debug_level: 2 # Optional, Mailjet debug level, defaults to 1 not used if debug = false
	format: xml # Optional, the format in which to receive results, defaults to json
```

## Usage

In your code simply request the "mailjet" service to start using it:

```php
$mailjet = $this->get("mailjet");

$mailjet->listsAddContact(array('method' => 'POST', 'contact' => 'foo@bar.com', 'id' => '%list_id%'));
```

License
=======

MIT, See LICENSE

*WARNING* Mailjet has attached no license to their library so I'm assuming it's public domain code.
