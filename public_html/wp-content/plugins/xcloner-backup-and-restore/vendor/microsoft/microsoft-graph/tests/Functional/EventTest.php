<?php

namespace XCloner;

if (!\defined('ABSPATH') && \PHP_SAPI !== 'cli') {
    die;
}
use XCloner\PHPUnit\Framework\TestCase;
use XCloner\Microsoft\Graph\Test\GraphTestBase;
use XCloner\Microsoft\Graph\Model;
class EventTest extends TestCase
{
    /**
     * @group functional
     */
    public function testGetCalendarView()
    {
        $graphTestBase = new GraphTestBase();
        $client = $graphTestBase->graphClient;
        $startTime = new \DateTime('today midnight');
        $startTime = $startTime->format('Y-m-d H:i:s');
        $endTime = new \DateTime('tomorrow midnight');
        $endTime = $endTime->format('Y-m-d H:i:s');
        $todaysEvents = $client->createRequest("GET", "/me/calendarView?startDateTime={$startTime}&endDateTime={$endTime}")->setReturnType(Model\Event::class)->execute();
        $this->assertNotNull($todaysEvents);
    }
}
\class_alias('XCloner\EventTest', 'EventTest', \false);
