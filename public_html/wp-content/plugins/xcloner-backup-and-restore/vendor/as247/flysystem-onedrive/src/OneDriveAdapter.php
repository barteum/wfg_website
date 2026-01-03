<?php

/**
 * Created by PhpStorm.
 * User: alt
 * Date: 17-Oct-18
 * Time: 8:44 AM
 */
namespace XCloner\As247\Flysystem\OneDrive;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\As247\CloudStorages\Storage\OneDrive;
use XCloner\As247\Flysystem\DriveSupport\StorageToAdapter;
use XCloner\Microsoft\Graph\Graph;
use XCloner\League\Flysystem\Adapter\AbstractAdapter;
class OneDriveAdapter extends AbstractAdapter
{
    use StorageToAdapter;
    protected $storage;
    public function __construct(Graph $graph, $options = '')
    {
        if (!is_array($options)) {
            $options = ['root' => $options];
        }
        $this->storage = new OneDrive($graph, $options);
        $this->setPathPrefix($options['root'] ?? '');
        $this->throwException = $options['debug'] ?? '';
    }
    public function getTemporaryUrl($path, $expiration = null, $options = [])
    {
        return $this->getMetadata($path)['@downloadUrl'] ?? '';
    }
}
