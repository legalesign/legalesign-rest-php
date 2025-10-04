<?php

declare(strict_types=1);

namespace LegalesignSDK\Document;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type document_new_response = array{signer1?: string}
 */
final class DocumentNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<document_new_response> */
    use SdkModel;

    use SdkResponse;

    #[Api('signer_1', optional: true)]
    public ?string $signer1;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $signer1 = null): self
    {
        $obj = new self;

        null !== $signer1 && $obj->signer1 = $signer1;

        return $obj;
    }

    public function withSigner1(string $signer1): self
    {
        $obj = clone $this;
        $obj->signer1 = $signer1;

        return $obj;
    }
}
