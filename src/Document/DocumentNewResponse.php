<?php

declare(strict_types=1);

namespace LegalesignSDK\Document;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Concerns\SdkResponse;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type DocumentNewResponseShape = array{signer_1?: string|null}
 */
final class DocumentNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<DocumentNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?string $signer_1;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $signer_1 = null): self
    {
        $obj = new self;

        null !== $signer_1 && $obj->signer_1 = $signer_1;

        return $obj;
    }

    public function withSigner1(string $signer1): self
    {
        $obj = clone $this;
        $obj->signer_1 = $signer1;

        return $obj;
    }
}
