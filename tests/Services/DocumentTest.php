<?php

namespace Tests\Services;

use LegalesignSDK\Client;
use LegalesignSDK\Document\DocumentCreateParams\Signer;
use LegalesignSDK\Document\DocumentCreateParams\Signer\Reviewer;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class DocumentTest extends TestCase
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
    public function testCreate(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->document->create(
            group: 'https://example.com',
            name: 'x',
            signers: [
                Signer::with(
                    email: 'dev@stainless.com',
                    firstname: 'firstname',
                    lastname: 'lastname',
                ),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testCreateWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->document->create(
            group: 'https://example.com',
            name: 'x',
            signers: [
                Signer::with(
                    email: 'dev@stainless.com',
                    firstname: 'firstname',
                    lastname: 'lastname',
                )
                    ->withAttachments(['/api/v1/attachment/IK-GV--w1tvt/'])
                    ->withBehalfof('behalfof')
                    ->withDecideLater(true)
                    ->withExpires(new \DateTimeImmutable('2019-12-27T18:11:19.117Z'))
                    ->withMessage('message')
                    ->withOrder(0)
                    ->withReviewers(
                        [
                            Reviewer::with(email: 'dev@stainless.com')
                                ->withFirstname('firstname')
                                ->withIncludeLink(true)
                                ->withLastname('lastname'),
                        ],
                    )
                    ->withRole('witness')
                    ->withSMS('sms')
                    ->withSubject('subject')
                    ->withTimezone('timezone'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testRetrieve(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->document->retrieve(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->document->list(group: 'group');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testListWithOptionalParams(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->document->list(group: 'group');

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testArchive(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->document->archive(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testGetFields(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->document->getFields(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testPermanentlyDelete(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->document->permanentlyDelete(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
