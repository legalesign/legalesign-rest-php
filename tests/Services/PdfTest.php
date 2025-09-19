<?php

namespace Tests\Services;

use Legalesign\Client;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class PdfTest extends TestCase
{
    protected Client $client;

    protected function setUp(): void
    {
        parent::setUp();

        $testUrl = getenv('TEST_API_BASE_URL') ?: 'http://127.0.0.1:4010';
        $client = new Client(apiKey: 'My API Key', baseUrl: $testUrl);

        $this->client = $client;
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support application/pdf responses");
        }

        $result = $this->client->pdf->retrieve('docId');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreatePreview(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support application/pdf responses");
        }

        $result = $this->client->pdf->createPreview(
            group: '/api/v1/group/IK-GV--w1tvt/',
            isSignaturePerPage: 0,
            signatureType: 0,
            signeeCount: 0,
            text: 'text',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreatePreviewWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped("Prism doesn't support application/pdf responses");
        }

        $result = $this->client->pdf->createPreview(
            group: '/api/v1/group/IK-GV--w1tvt/',
            isSignaturePerPage: 0,
            signatureType: 0,
            signeeCount: 0,
            text: 'text',
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
