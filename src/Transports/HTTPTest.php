<?php

declare(strict_types=1);

namespace Talbergs\Transports;

use PHPUnit\Framework\TestCase;

class HTTPTest extends TestCase
{
    public function assertRecvChunks(array $chunks, array $expect)
    {
        $actual = [];

        foreach ($chunks as $chunk) {
            $actual = [...$actual, ...iterator_to_array(HTTP::recv($chunk), false)];
        }

        if ($chunks) {
            $this->assertEquals($expect, $actual);
        }
    }

    public function testStreamReveiveEmpty()
    {
        $this->assertRecvChunks([''], []);
    }

    public function testStreamReveiveExact()
    {
        $this->assertRecvChunks(["X-client: vi\r\nContent-length: 10\r\n\r\n0123456789"], ['0123456789']);
        $this->assertRecvChunks(["Content-length: 10\r\n\r\n0123456789"], ['0123456789']);
    }

    public function testStreamReveiveEmptyThenExact()
    {
        $this->assertRecvChunks(['', "Content-length: 10\r\n\r\n0123456789"], ['0123456789']);
    }

    public function testStreamReveiveForeignHeaders()
    {
        $this->assertRecvChunks(["X-client: vi\r\nContent-length: 10\r\n\r\n0123456789"], ['0123456789']);
    }

    public function testStreamReveiveOneInChunks()
    {
        $this->assertRecvChunks(["Content-length: 10\r\n\r\n012345678", '9'], ['0123456789']);
    }

    public function testStreamReveiveManyInOneChunk()
    {
        $this->assertRecvChunks(
            [str_repeat("Content-length: 10\r\n\r\n0123456789", 3)],
            ['0123456789', '0123456789', '0123456789'],
        );
    }

    public function testStreamReveivePerformance()
    {
        // Measure 100k receiver iterations relative to 1.6M simple iterations.
        $start = microtime(true);
        for ($i = 0; $i < 1600000; $i ++) {
            substr(md5((string) rand(1, 10)), 4, 10);
        }
        $etalonDuration = microtime(true) - $start;

        $start = microtime(true);
        for ($i = 0; $i < 100000; $i ++) {
            iterator_to_array(HTTP::recv(str_repeat("Content-length: 10\r\n\r\n0123456789", 3)), false);
        }

        $duration = microtime(true) - $start;
        $this->assertTrue($etalonDuration > $duration);
    }
}
