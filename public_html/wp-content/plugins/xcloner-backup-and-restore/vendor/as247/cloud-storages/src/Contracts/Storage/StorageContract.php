<?php

namespace XCloner\As247\CloudStorages\Contracts\Storage;

if (!defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\As247\CloudStorages\Exception\FileNotFoundException;
use XCloner\As247\CloudStorages\Exception\InvalidVisibilityProvided;
use XCloner\As247\CloudStorages\Exception\UnableToCopyFile;
use XCloner\As247\CloudStorages\Exception\UnableToCreateDirectory;
use XCloner\As247\CloudStorages\Exception\UnableToDeleteDirectory;
use XCloner\As247\CloudStorages\Exception\UnableToDeleteFile;
use XCloner\As247\CloudStorages\Exception\UnableToMoveFile;
use XCloner\As247\CloudStorages\Exception\UnableToReadFile;
use XCloner\As247\CloudStorages\Exception\UnableToRetrieveMetadata;
use XCloner\As247\CloudStorages\Exception\UnableToWriteFile;
use XCloner\As247\CloudStorages\Service\GoogleDrive;
use XCloner\As247\CloudStorages\Service\OneDrive;
use XCloner\As247\CloudStorages\Support\FileAttributes;
use XCloner\As247\CloudStorages\Support\StorageAttributes;
use XCloner\As247\CloudStorages\Support\Config;
use XCloner\As247\CloudStorages\Exception\FilesystemException;
use Traversable;
interface StorageContract
{
    /**
     * @const  VISIBILITY_PUBLIC  public visibility
     */
    const VISIBILITY_PUBLIC = 'public';
    /**
     * @const  VISIBILITY_PRIVATE  private visibility
     */
    const VISIBILITY_PRIVATE = 'private';
    /**
     * @return mixed | GoogleDrive | OneDrive
     */
    public function getService();
    /**
     * @param string $path
     * @param $contents
     * @param Config|null $config
     * @throws UnableToWriteFile
     * @throws FilesystemException
     */
    public function writeStream(string $path, $contents, Config $config = null): void;
    /**
     * @param string $path
     * @return resource
     * @throws UnableToReadFile
     * @throws FileNotFoundException
     * @throws FilesystemException
     */
    public function readStream(string $path);
    /**
     * @param string $path
     * @throws UnableToDeleteFile
     * @throws FilesystemException
     * @throws FileNotFoundException
     */
    public function delete(string $path): void;
    /**
     * @param string $path
     * @throws UnableToDeleteDirectory
     * @throws FilesystemException
     * @throws FileNotFoundException
     */
    public function deleteDirectory(string $path): void;
    /**
     * @param string $path
     * @param Config|null $config
     * @throws UnableToCreateDirectory
     * @throws FilesystemException
     */
    public function createDirectory(string $path, Config $config = null): void;
    /**
     * @param string $path
     * @param mixed $visibility
     * @throws InvalidVisibilityProvided
     * @throws FilesystemException
     */
    public function setVisibility(string $path, $visibility): void;
    /**
     * @param string $path
     * @param bool $deep
     * @return Traversable<StorageAttributes>
     * @throws FilesystemException
     */
    public function listContents(string $path, bool $deep): Traversable;
    /**
     * @param string $source
     * @param string $destination
     * @param Config|null $config
     * @throws UnableToMoveFile
     * @throws FilesystemException
     */
    public function move(string $source, string $destination, Config $config = null): void;
    /**
     * @param string $source
     * @param string $destination
     * @param Config|null $config
     * @throws UnableToCopyFile
     * @throws FilesystemException
     */
    public function copy(string $source, string $destination, Config $config = null): void;
    /**
     * @param $path
     * @return FileAttributes
     * @throws FileNotFoundException
     * @throws UnableToRetrieveMetadata
     * @throws FilesystemException
     */
    public function getMetadata($path): FileAttributes;
}
