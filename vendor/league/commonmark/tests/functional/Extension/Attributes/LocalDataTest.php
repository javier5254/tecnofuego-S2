<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 * (c) 2015 Martin Hasoň <martin.hason@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace League\CommonMark\Tests\Functional\Extension\Attributes;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\Attributes\AttributesExtension;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Tests\Functional\AbstractLocalDataTest;

/**
 * @internal
 */
final class LocalDataTest extends AbstractLocalDataTest
{
    protected function setUp(): void
    {
        $environment = new Environment();
        $environment->addExtension(new CommonMarkCoreExtension());
        $environment->addExtension(new GithubFlavoredMarkdownExtension());
        $environment->addExtension(new AttributesExtension());
        $this->converter = new MarkdownConverter($environment);
    }

    /**
     * @dataProvider dataProvider
     */
    public function testRenderer(string $markdown, string $html, string $testName): void
    {
        $this->assertMarkdownRendersAs($markdown, $html, $testName);
    }

    /**
     * @return iterable<string, string, string>
     */
    public function dataProvider(): iterable
    {
        foreach ($this->loadTests(__DIR__ . '/data') as $test) {
            yield $test;
        }
    }
}
