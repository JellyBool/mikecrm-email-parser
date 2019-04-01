# 麦客CRM 的邮件内容解析

[![Latest Version on Packagist](https://img.shields.io/packagist/v/JellyBool/mikecrm-email-parser.svg?style=flat-square)](https://packagist.org/packages/jellybool/mikecrm-email-parser)
[![Build Status](https://img.shields.io/travis/JellyBool/mikecrm-email-parser/master.svg?style=flat-square)](https://travis-ci.org/JellyBool/mikecrm-email-parser)
[![Quality Score](https://img.shields.io/scrutinizer/g/JellyBool/mikecrm-email-parser.svg?style=flat-square)](https://scrutinizer-ci.com/g/jellybool/mikecrm-email-parser)
[![Total Downloads](https://img.shields.io/packagist/dt/JellyBool/mikecrm-email-parser.svg?style=flat-square)](https://packagist.org/packages/jellybool/mikecrm-email-parser)

使用 麦客 CRM 个人收款的时候，可以使用此 Package 来解析邮件内容，从而完成订单的通知。

## Installation

You can install the package via composer:

```bash
composer require jellybool/mikecrm-email-parser
```

## Usage

``` php
use Jellybool\MikeCRMEmailParser\Parser;

 $parser = new Parser();
 
 $parser->html();
 // 返回邮件的 html 内容
 
 $parser->text();
 // 返回邮件的 text 内容
 
 $parser->order();
 [
  // 这个是 mikecrm 自己维护的订单号
  "mike_no" => "IFP-CN091-1904010000057375-8"
  // 支付成功后，第三方的订单号，mikecrm 应该是用的快钱的 99bill.com 的服务
  "platform_no" => "3375060707"
  // 这个 trade_no 是用户自定义的字段，比如表单的 订单号 等
  "trade_no" => "386815541285972686"
]

 // 如果说你需要自定义返回的 order，可以传入自定义的 正则表达式
 $rules = [
    'mike' => '//', // 这里写你自定义的正则表达式即可
    'platform' => '//',
    'trade' => '//',
 ]
 
  $parser = new Parser($rules);
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [JellyBool](https://github.com/JellyBool)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
