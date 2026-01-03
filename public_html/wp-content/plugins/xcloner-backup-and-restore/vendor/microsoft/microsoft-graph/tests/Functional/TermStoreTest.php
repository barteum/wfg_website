<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\PHPUnit\Framework\TestCase;
use XCloner\Microsoft\Graph\Test\GraphTestBase;
use XCloner\Beta\Microsoft\Graph\TermStore\Model\Store as BetaStore;
class TermStoreTest extends TestCase
{
    private $_client;
    protected function setUp(): void
    {
        $graphTestBase = new GraphTestBase();
        $this->_client = $graphTestBase->graphClient;
    }
    /**
     * @group functional
     */
    public function testBetaGetStore()
    {
        $store = $this->_client->setApiVersion("beta")->createRequest("GET", "/termstore")->setReturnType(BetaStore::class)->execute();
        $this->assertNotNull($store->getDefaultLanguageTag());
    }
}
\class_alias('XCloner\TermStoreTest', 'TermStoreTest', \false);
