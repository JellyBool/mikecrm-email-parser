<?php

namespace Jellybool\MikeCRMEmailParser;

/**
 * Class Parser
 * @package Jellybool\MikecrmEmailParse
 */
class Parser {
    /**
     * @var mixed
     */
    protected $body;
    /**
     * @var array
     */
    protected $rules;

    /**
     * Parser constructor.
     */
    public function __construct($rules = [])
    {
        $this->body = json_decode(file_get_contents('php://input'), true);
        $this->rules = count($rules) > 0 ? $rules : [];
    }

    /**
     * return all html from email. Just in case.
     *
     * @return string
     */
    public function html()
    {
        return isset($this->body['html']) ? $this->body['html'] : '';
    }

    /**
     * return all text from email. You could do anything with this text.
     *
     * @return string
     */
    public function text()
    {
        return isset($this->body['text']) ? $this->body['text'] : '';
    }

    /**
     * return basic order information from mikecrm email.
     *
     * @return array
     */
    public function order()
    {
        $mikeRule = isset($this->rules['mike']) ? $this->rules['mike'] : '/麦客订单号：IFP\-CN091\-\d{8,30}\-\d+/';
        $platformRule = isset($this->rules['platform']) ? $this->rules['platform'] : '/支付平台交易号：\d{4,16}/';
        $tradeRule = isset($this->rules['trade']) ? $this->rules['trade'] : '/订单号\n\d{8,36}/';

        return [
            'mike_no'     => $this->getMatchText($mikeRule),
            'platform_no' => $this->getMatchText($platformRule),
            'trade_no'    => $this->getMatchText($tradeRule),
        ];
    }

    /**
     * @return bool
     */
    public function verify()
    {
        return isset($this->body['from']) && $this->body['from'] == 'service@mikecrm-notice.com';
    }

    /**
     * @param $rule
     * @return string|string[]|null
     */
    protected function getMatchText($rule)
    {
        preg_match_all($rule, $this->text(), $matches);
        if (count($matches[0]) > 0) {
            return preg_replace('/([\n\x80-\xff]*)/i', '', $matches[0][0]);
        }

        return '';
    }
}
