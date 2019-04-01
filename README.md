# 麦客CRM 的邮件内容解析

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jellybool/mikecrm-email-parser.svg?style=flat-square)](https://packagist.org/packages/jellybool/mikecrm-email-parser)
[![Build Status](https://img.shields.io/travis/jellybool/mikecrm-email-parser/master.svg?style=flat-square)](https://travis-ci.org/jellybool/mikecrm-email-parser)
[![Quality Score](https://img.shields.io/scrutinizer/g/jellybool/mikecrm-email-parser.svg?style=flat-square)](https://scrutinizer-ci.com/g/jellybool/mikecrm-email-parser)
[![Total Downloads](https://img.shields.io/packagist/dt/jellybool/mikecrm-email-parser.svg?style=flat-square)](https://packagist.org/packages/jellybool/mikecrm-email-parser)

使用 麦客 CRM 收款的时候，可以使用此 Package 来解析邮件内容，从而完成订单的通知。

## Installation

You can install the package via composer:

```bash
composer require jellybool/mikecrm-email-parser
```

## Usage

``` php

 $parser = new Parser();
 
 $parser->order();
 [
  // 这个是 mikecrm 自己维护的订单号
  "mike_no" => "IFP-CN091-1904010000057375-8"
  // 支付成功后，第三方的订单号，mikecrm 应该是用的快钱的 99bill.com 的服务
  "platform_no" => "3375060707"
  // 这个 trade_no 是用户自定义的字段，比如表单的 订单号 等
  "trade_no" => "386815541285972686"
]

 $parser->html();
 // 返回邮件的 html 内容
 
 $parser->text();
 // 返回邮件的 text 内容
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email ly913417651@gmail.com instead of using the issue tracker.

## Credits

- [JellyBool](https://github.com/jellybool)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## PHP Package Boilerplate

This package was generated using the [PHP Package Boilerplate](https://laravelpackageboilerplate.com).
