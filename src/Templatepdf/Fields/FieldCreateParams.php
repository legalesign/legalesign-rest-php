<?php

declare(strict_types=1);

namespace LegalesignSDK\Templatepdf\Fields;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkParams;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Templatepdf\Fields\FieldCreateParams\Body;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new FieldCreateParams); // set properties as needed
 * $client->templatepdf.fields->create(...$params->toArray());
 * ```
 * Replace existing pdf fields with new ones.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->templatepdf.fields->create(...$params->toArray());`
 *
 * @see LegalesignSDK\Templatepdf\Fields->create
 *
 * @phpstan-type field_create_params = array{body: list<Body>}
 */
final class FieldCreateParams implements BaseModel
{
    /** @use SdkModel<field_create_params> */
    use SdkModel;
    use SdkParams;

    /** @var list<Body> $body */
    #[Api(list: Body::class)]
    public array $body;

    /**
     * `new FieldCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * FieldCreateParams::with(body: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new FieldCreateParams)->withBody(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Body> $body
     */
    public static function with(array $body): self
    {
        $obj = new self;

        $obj->body = $body;

        return $obj;
    }

    /**
     * @param list<Body> $body
     */
    public function withBody(array $body): self
    {
        $obj = clone $this;
        $obj->body = $body;

        return $obj;
    }
}
