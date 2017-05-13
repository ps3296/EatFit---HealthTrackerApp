<?php
/**
 * @author      Wizacha DevTeam <dev@wizacha.com>
 * @copyright   Copyright (c) Wizacha
 * @license     https://opensource.org/licenses/MIT
 */
namespace Wizacha\Middleware;

use Aws\Credentials\CredentialsInterface;
use Aws\Signature\SignatureInterface;
use GuzzleHttp\Psr7\Request;

class AwsSignatureMiddleware
{
    /**
     * @var \Aws\Credentials\CredentialsInterface
     */
    protected $credentials;

    /**
     * @var \Aws\Signature\SignatureInterface
     */
    protected $signature;

    /**
     * @param CredentialsInterface $credentials
     * @param SignatureInterface $signature
     */
    public function __construct(CredentialsInterface $credentials, SignatureInterface $signature)
    {
        $this->credentials = $credentials;
        $this->signature = $signature;
    }

    /**
     * @param $handler
     * @return callable
     */
    public function __invoke($handler)
    {
        return function ($request)  use ($handler) {
            $headers = $request['headers'];
            if ($headers['host']) {
                if (is_array($headers['host'])) {
                    $headers['host'] = array_map([$this, 'removePort'], $headers['host']);
                } else {
                    $headers['host'] = $this->removePort($headers['host']);
                }
            }
            $psrRequest = new Request($request['http_method'], $request['uri'], $headers, $request['body']);
            $psrRequest = $this->signature->signRequest($psrRequest, $this->credentials);

            $request['headers'] = array_merge($psrRequest->getHeaders(), $request['headers']);
            return $handler($request);
        };
    }

    /**
     * AWS api seems to doesn't use port part in host field
     * @param string $host
     * @return string
     */
    protected function removePort($host)
    {
        return parse_url($host)['host'];
    }

}