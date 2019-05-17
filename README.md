# BucoStaticXhrHttpCache
Shopware plugin to enable HTTP caching for shop pages in modal boxes

## Features
This plugin enables HTTP cache warming and invalidation for shop pages in modal boxes (or otherwise loaded via AJAX/XHR) in addition to regular shop pages.

## Compatibility
* Shopware >= 5.5.0
* PHP >= 7.0

## Deprecation Notice
There is a [pull request (shopware/shopware#2098)](https://github.com/shopware/shopware/pull/2098) pending targeted for Shopware 5.6. Maybe this
plugin will be part of the Shopware core in the future. 

## Installation

### Git Version
* Checkout plugin in `/custom/plugins/BucoStaticXhrHttpCache`
* Install and active plugin with the Plugin Manager

### Install with composer
* Change to your root installation of Shopware
* Run command `composer require buddha-code/buco-static-xhr-http-cache`
* Install and active plugin with `./bin/console sw:plugin:install --activate BucoStaticXhrHttpCache`

## Contributing
Feel free to fork and send pull requests!

## Licence
This project uses the [GPLv3 License](LICENCE).
