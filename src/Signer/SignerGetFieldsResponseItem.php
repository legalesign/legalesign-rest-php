<?php

declare(strict_types=1);

namespace LegalesignSDK\Signer;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;

/**
 * @phpstan-type SignerGetFieldsResponseItemShape = array{
 *   fieldorder?: int|null,
 *   label?: string|null,
 *   label_extra?: string|null,
 *   state?: bool|null,
 *   value?: string|null,
 * }
 */
final class SignerGetFieldsResponseItem implements BaseModel
{
    /** @use SdkModel<SignerGetFieldsResponseItemShape> */
    use SdkModel;

    #[Api(nullable: true, optional: true)]
    public ?int $fieldorder;

    #[Api(optional: true)]
    public ?string $label;

    #[Api(optional: true)]
    public ?string $label_extra;

    #[Api(optional: true)]
    public ?bool $state;

    /**
     * If the field is a signer file this value will be a short lived download URL.
     */
    #[Api(nullable: true, optional: true)]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?int $fieldorder = null,
        ?string $label = null,
        ?string $label_extra = null,
        ?bool $state = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        null !== $fieldorder && $obj->fieldorder = $fieldorder;
        null !== $label && $obj->label = $label;
        null !== $label_extra && $obj->label_extra = $label_extra;
        null !== $state && $obj->state = $state;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    public function withFieldorder(?int $fieldorder): self
    {
        $obj = clone $this;
        $obj->fieldorder = $fieldorder;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    public function withLabelExtra(string $labelExtra): self
    {
        $obj = clone $this;
        $obj->label_extra = $labelExtra;

        return $obj;
    }

    public function withState(bool $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * If the field is a signer file this value will be a short lived download URL.
     */
    public function withValue(?string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
