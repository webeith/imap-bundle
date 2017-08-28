ImapBundle
=====
[![License](https://poser.pugx.org/webeith/imap-bundle/license.png)](https://packagist.org/packages/webeith/imap-bundle)
[![Total Downloads](https://poser.pugx.org/webeith/imap-bundle/downloads.png)](https://packagist.org/packages/webeith/dnsbl-bundle)

* [See how to use service](http://github.com/webeith/php-imap)

Usage Example
-------------

``` php
$this->getContainer()->get('imap')->getMailBox('mailbox_name');
```
Configuration config.yml example
-------------

``` yml
webeith_imap:
    mailboxes:
        hotmail_user:
            login: "example@hotmail.com"
            password: "password"
            port: 995
            connection_string: "{imap.gmail.com:993/imap/ssl}INBOX"
            encoding: "utf-8"
            attachments_dir: "/tmp/"
        gmail_user_inbox:
            login: "example@gmail.com"
            password: "password"
            connection_string: "{imap.gmail.com:993/imap/ssl}INBOX"
            encoding: "utf-8"
            attachments_dir: "/tmp/"

```
## Installation

### Install via Composer

Add the following lines to your `composer.json` file and then run `php composer.phar install` or `php composer.phar update`:

```json
{
    "require": {
        "webeith/imap-bundle": "dev-master"
    }
}
```

### Register the bundle

To start using the bundle, register it in `app/AppKernel.php`:

```php
public function registerBundles()
{
    $bundles = array(
        // Other bundles...
        new Webeith\ImapBundle\WebeithImapBundle(),
    );
}
```
