<?php declare(strict_types = 1);

use Symfony\Component\Cache\Traits\RelayClusterProxy;

require_once __DIR__ . '/vendor/autoload.php';

$initializer = static function () {
    $cluster = new Relay\Cluster(
        name: null,
        seeds: ['valkey-cluster-untracked:6372', 'valkey-cluster-untracked:6373', 'valkey-cluster-untracked:6374'],
        connect_timeout: 5,
        command_timeout: 5,
        persistent: true,
        auth: null,
        context: [],
    );

    return $cluster;
};

$redis = RelayClusterProxy::createLazyProxy($initializer);
$redis->get('x');
