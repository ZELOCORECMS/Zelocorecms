<?php

namespace ZelocoreCMS\AiClientDependencies\Http\Discovery\Strategy;

use ZelocoreCMS\AiClientDependencies\Psr\Http\Message\RequestFactoryInterface;
use ZelocoreCMS\AiClientDependencies\Psr\Http\Message\ResponseFactoryInterface;
use ZelocoreCMS\AiClientDependencies\Psr\Http\Message\ServerRequestFactoryInterface;
use ZelocoreCMS\AiClientDependencies\Psr\Http\Message\StreamFactoryInterface;
use ZelocoreCMS\AiClientDependencies\Psr\Http\Message\UploadedFileFactoryInterface;
use ZelocoreCMS\AiClientDependencies\Psr\Http\Message\UriFactoryInterface;
/**
 * @internal
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 *
 * Don't miss updating src/Composer/Plugin.php when adding a new supported class.
 */
final class CommonPsr17ClassesStrategy implements DiscoveryStrategy
{
    /**
     * @var array
     */
    private static $classes = [RequestFactoryInterface::class => ['Phalcon\Http\Message\RequestFactory', 'Nyholm\Psr7\Factory\Psr17Factory', 'GuzzleHttp\Psr7\HttpFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Diactoros\RequestFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Guzzle\RequestFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Slim\RequestFactory', 'Laminas\Diactoros\RequestFactory', 'Slim\Psr7\Factory\RequestFactory', 'ZelocoreCMS\AiClientDependencies\HttpSoft\Message\RequestFactory'], ResponseFactoryInterface::class => ['Phalcon\Http\Message\ResponseFactory', 'Nyholm\Psr7\Factory\Psr17Factory', 'GuzzleHttp\Psr7\HttpFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Diactoros\ResponseFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Guzzle\ResponseFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Slim\ResponseFactory', 'Laminas\Diactoros\ResponseFactory', 'Slim\Psr7\Factory\ResponseFactory', 'ZelocoreCMS\AiClientDependencies\HttpSoft\Message\ResponseFactory'], ServerRequestFactoryInterface::class => ['Phalcon\Http\Message\ServerRequestFactory', 'Nyholm\Psr7\Factory\Psr17Factory', 'GuzzleHttp\Psr7\HttpFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Diactoros\ServerRequestFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Guzzle\ServerRequestFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Slim\ServerRequestFactory', 'Laminas\Diactoros\ServerRequestFactory', 'Slim\Psr7\Factory\ServerRequestFactory', 'ZelocoreCMS\AiClientDependencies\HttpSoft\Message\ServerRequestFactory'], StreamFactoryInterface::class => ['Phalcon\Http\Message\StreamFactory', 'Nyholm\Psr7\Factory\Psr17Factory', 'GuzzleHttp\Psr7\HttpFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Diactoros\StreamFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Guzzle\StreamFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Slim\StreamFactory', 'Laminas\Diactoros\StreamFactory', 'Slim\Psr7\Factory\StreamFactory', 'ZelocoreCMS\AiClientDependencies\HttpSoft\Message\StreamFactory'], UploadedFileFactoryInterface::class => ['Phalcon\Http\Message\UploadedFileFactory', 'Nyholm\Psr7\Factory\Psr17Factory', 'GuzzleHttp\Psr7\HttpFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Diactoros\UploadedFileFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Guzzle\UploadedFileFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Slim\UploadedFileFactory', 'Laminas\Diactoros\UploadedFileFactory', 'Slim\Psr7\Factory\UploadedFileFactory', 'ZelocoreCMS\AiClientDependencies\HttpSoft\Message\UploadedFileFactory'], UriFactoryInterface::class => ['Phalcon\Http\Message\UriFactory', 'Nyholm\Psr7\Factory\Psr17Factory', 'GuzzleHttp\Psr7\HttpFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Diactoros\UriFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Guzzle\UriFactory', 'ZelocoreCMS\AiClientDependencies\Http\Factory\Slim\UriFactory', 'Laminas\Diactoros\UriFactory', 'Slim\Psr7\Factory\UriFactory', 'ZelocoreCMS\AiClientDependencies\HttpSoft\Message\UriFactory']];
    public static function getCandidates($type)
    {
        $candidates = [];
        if (isset(self::$classes[$type])) {
            foreach (self::$classes[$type] as $class) {
                $candidates[] = ['class' => $class, 'condition' => [$class]];
            }
        }
        return $candidates;
    }
}
