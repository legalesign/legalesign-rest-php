<?php

namespace Tests\Services\Templatepdf;

use LegalesignSDK\Client;
use LegalesignSDK\Document\PdfFieldValidationEnum;
use LegalesignSDK\Templatepdf\Fields\FieldCreateParams\Body;
use PHPUnit\Framework\Attributes\CoversNothing;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Tests\UnsupportedMockTests;

/**
 * @internal
 */
#[CoversNothing]
final class FieldsTest extends TestCase
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

        $result = $this->client->templatepdf->fields->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                Body::with(
                    ax: 0,
                    ay: 0,
                    bx: 0,
                    by: 0,
                    elementType: 'signature',
                    page: 0,
                    signer: 1,
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

        $result = $this->client->templatepdf->fields->create(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e',
            [
                Body::with(
                    ax: 0,
                    ay: 0,
                    bx: 0,
                    by: 0,
                    elementType: 'signature',
                    page: 0,
                    signer: 1,
                )
                    ->withAlign(1)
                    ->withFieldorder(0)
                    ->withFontName('')
                    ->withFontSize(6)
                    ->withHideBorder(true)
                    ->withLabel('label')
                    ->withLabelExtra('label_extra')
                    ->withLogicAction(1)
                    ->withLogicGroup('logic_group')
                    ->withMapTo('map_to')
                    ->withOptional(true)
                    ->withOptions('options')
                    ->withSubstantive(true)
                    ->withValidation(PdfFieldValidationEnum::$PDF_FIELD_VALIDATION_ENUM_1)
                    ->withValue('value'),
            ],
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }

    #[Test]
    public function testList(): void
    {
        if (UnsupportedMockTests::$skip) {
            $this->markTestSkipped('Prism tests are disabled');
        }

        $result = $this->client->templatepdf->fields->list(
            '182bd5e5-6e1a-4fe4-a799-aa6d9a6ab26e'
        );

        $this->assertTrue(true); // @phpstan-ignore method.alreadyNarrowedType
    }
}
