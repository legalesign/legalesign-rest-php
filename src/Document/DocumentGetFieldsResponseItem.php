<?php

declare(strict_types=1);

namespace LegalesignSDK\Document;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Document\DocumentGetFieldsResponseItem\ElementType;

/**
 * @phpstan-type document_get_fields_response_item = array{
 *   elementType?: value-of<ElementType>,
 *   fieldorder?: int|null,
 *   label?: string,
 *   labelExtra?: string|null,
 *   signer?: int,
 *   state?: bool,
 *   validation?: null|1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|24|25|26|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|46|47|48|50|51|52|53|54|55|56|57|58|59|60|61|62|63|64|65|66|67|68|69|70|71|72|73|74|75|76|77|78|79|80|81|82|83|84|85|90|91|92,
 *   value?: string,
 * }
 */
final class DocumentGetFieldsResponseItem implements BaseModel
{
    /** @use SdkModel<document_get_fields_response_item> */
    use SdkModel;

    /** @var value-of<ElementType>|null $elementType */
    #[Api('element_type', enum: ElementType::class, optional: true)]
    public ?string $elementType;

    #[Api(nullable: true, optional: true)]
    public ?int $fieldorder;

    #[Api(optional: true)]
    public ?string $label;

    #[Api('label_extra', nullable: true, optional: true)]
    public ?string $labelExtra;

    #[Api(optional: true)]
    public ?int $signer;

    /**
     * if saved by signer.
     */
    #[Api(optional: true)]
    public ?bool $state;

    /**
     * fields types and validations:
     *   * 1 - Email
     *   * 2 - yyyy/mm/dd
     *   * 3 - yy/mm/dd
     *   * 4 - dd/mm/yyyy
     *   * 5 - dd/mm/yy
     *   * 6 - mm/dd/yy
     *   * 7 - mm/dd/yy
     *   * 8 - yyyy.mm.dd
     *   * 9 - yy.mm.dd
     *   * 10 - dd.mm.yyyy
     *   * 11 - dd.mm.yy
     *   * 12 - mm.dd.yyyy
     *   * 13 - mm.dd.yy
     *   * 14 - yyyy-mm-dd
     *   * 15 - yy-mm-dd
     *   * 16 - dd-mm-yyyy
     *   * 17 - dd-mm-yy
     *   * 18 - mm-dd-yyyy
     *   * 19 - mm-dd-yy
     *   * 20 - Dropdown list,  use options attribute for items
     *   * 24 - Checkbox tick/cross
     *   * 25 - Checkbox tick/blank
     *   * 26 - Checkbox cross/blank
     *   * 30 - yyyy/mm/dd (automatic)
     *   * 31 - yy/mm/dd (automatic)
     *   * 32 - dd/yy/yyyy (automatic)
     *   * 33 - dd/mm/yy (automatic)
     *   * 34 - mm/dd/yyyy (automatic)
     *   * 35 - mm/dd/yy (automatic)
     *   * 36 - yyyy.mm.dd (automatic)
     *   * 37 - yy.mm.dd (automatic)
     *   * 38 - dd.mm.yyyy (automatic)
     *   * 39 - dd.mm.yy (automatic)
     *   * 40 - mm.dd.yyyy (automatic)
     *   * 41 - mm.dd.yy (automatic)
     *   * 42 - yyyy-mm-dd (automatic)
     *   * 43 - yy-mm-dd (automatic)
     *   * 44 - dd-mm-yyyy (automatic)
     *   * 45 - dd-mm-yy (automatic)
     *   * 46 - mm-dd-yyyy (automatic)
     *   * 47 - mm-dd-yy (automatic)
     *   * 48 - d mmmmm yyyy (automatic)
     *   * 50 - Whole number
     *   * 51 - Number
     *   * 52 - Currency (2 decimals)
     *   * 53 - 1 number
     *   * 54 - 2 numbers
     *   * 55 - 3 numbers
     *   * 56 - 4 numbers
     *   * 57 - 5 numbers
     *   * 58 - 6 numbers
     *   * 59 - 7 numbers
     *   * 60 - 8 numbers
     *   * 61 - 9 numbers
     *   * 62 - 10 numbers
     *   * 63 - 11 numbers
     *   * 64 - 12 numbers
     *   * 65 - 1 characters (any text)
     *   * 66 - 2 characters (any text)
     *   * 67 - 3 characters (any text)
     *   * 68 - 4 characters (any text)
     *   * 69 - 5 characters (any text)
     *   * 70 - 6 characters (any text)
     *   * 71 - 7 characters (any text)
     *   * 72 - 8 characters (any text)
     *   * 73 - secret code, add code in options
     *   * 74 - file attach, append to email to signer
     *   * 75 - file attach, append to final PDF
     *   * 76 - file attach, zip with final PDF for internal use, but not signer
     *   * 77 - force to title caps
     *   * 78 - force to uppercase
     *   * 79 - force to lowercase
     *   * 80 - mm/yy
     *   * 81 - mm/yyyy
     *   * 82 - mm.yy
     *   * 83 - mm.yyyy
     *   * 84 - mm-yy
     *   * 85 - mm-yyyy
     *   * 90 - drawn field
     *   * 91 - countries list
     *   * 92 - honorifics list
     *
     * @var 1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|24|25|26|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|46|47|48|50|51|52|53|54|55|56|57|58|59|60|61|62|63|64|65|66|67|68|69|70|71|72|73|74|75|76|77|78|79|80|81|82|83|84|85|90|91|92|null $validation
     */
    #[Api(enum: PdfFieldValidationEnum::class, nullable: true, optional: true)]
    public ?int $validation;

    #[Api(optional: true)]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ElementType|value-of<ElementType> $elementType
     * @param 1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|24|25|26|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|46|47|48|50|51|52|53|54|55|56|57|58|59|60|61|62|63|64|65|66|67|68|69|70|71|72|73|74|75|76|77|78|79|80|81|82|83|84|85|90|91|92|null $validation
     */
    public static function with(
        ElementType|string|null $elementType = null,
        ?int $fieldorder = null,
        ?string $label = null,
        ?string $labelExtra = null,
        ?int $signer = null,
        ?bool $state = null,
        ?int $validation = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        null !== $elementType && $obj['elementType'] = $elementType;
        null !== $fieldorder && $obj->fieldorder = $fieldorder;
        null !== $label && $obj->label = $label;
        null !== $labelExtra && $obj->labelExtra = $labelExtra;
        null !== $signer && $obj->signer = $signer;
        null !== $state && $obj->state = $state;
        null !== $validation && $obj->validation = $validation;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * @param ElementType|value-of<ElementType> $elementType
     */
    public function withElementType(ElementType|string $elementType): self
    {
        $obj = clone $this;
        $obj['elementType'] = $elementType;

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

    public function withLabelExtra(?string $labelExtra): self
    {
        $obj = clone $this;
        $obj->labelExtra = $labelExtra;

        return $obj;
    }

    public function withSigner(int $signer): self
    {
        $obj = clone $this;
        $obj->signer = $signer;

        return $obj;
    }

    /**
     * if saved by signer.
     */
    public function withState(bool $state): self
    {
        $obj = clone $this;
        $obj->state = $state;

        return $obj;
    }

    /**
     * fields types and validations:
     *   * 1 - Email
     *   * 2 - yyyy/mm/dd
     *   * 3 - yy/mm/dd
     *   * 4 - dd/mm/yyyy
     *   * 5 - dd/mm/yy
     *   * 6 - mm/dd/yy
     *   * 7 - mm/dd/yy
     *   * 8 - yyyy.mm.dd
     *   * 9 - yy.mm.dd
     *   * 10 - dd.mm.yyyy
     *   * 11 - dd.mm.yy
     *   * 12 - mm.dd.yyyy
     *   * 13 - mm.dd.yy
     *   * 14 - yyyy-mm-dd
     *   * 15 - yy-mm-dd
     *   * 16 - dd-mm-yyyy
     *   * 17 - dd-mm-yy
     *   * 18 - mm-dd-yyyy
     *   * 19 - mm-dd-yy
     *   * 20 - Dropdown list,  use options attribute for items
     *   * 24 - Checkbox tick/cross
     *   * 25 - Checkbox tick/blank
     *   * 26 - Checkbox cross/blank
     *   * 30 - yyyy/mm/dd (automatic)
     *   * 31 - yy/mm/dd (automatic)
     *   * 32 - dd/yy/yyyy (automatic)
     *   * 33 - dd/mm/yy (automatic)
     *   * 34 - mm/dd/yyyy (automatic)
     *   * 35 - mm/dd/yy (automatic)
     *   * 36 - yyyy.mm.dd (automatic)
     *   * 37 - yy.mm.dd (automatic)
     *   * 38 - dd.mm.yyyy (automatic)
     *   * 39 - dd.mm.yy (automatic)
     *   * 40 - mm.dd.yyyy (automatic)
     *   * 41 - mm.dd.yy (automatic)
     *   * 42 - yyyy-mm-dd (automatic)
     *   * 43 - yy-mm-dd (automatic)
     *   * 44 - dd-mm-yyyy (automatic)
     *   * 45 - dd-mm-yy (automatic)
     *   * 46 - mm-dd-yyyy (automatic)
     *   * 47 - mm-dd-yy (automatic)
     *   * 48 - d mmmmm yyyy (automatic)
     *   * 50 - Whole number
     *   * 51 - Number
     *   * 52 - Currency (2 decimals)
     *   * 53 - 1 number
     *   * 54 - 2 numbers
     *   * 55 - 3 numbers
     *   * 56 - 4 numbers
     *   * 57 - 5 numbers
     *   * 58 - 6 numbers
     *   * 59 - 7 numbers
     *   * 60 - 8 numbers
     *   * 61 - 9 numbers
     *   * 62 - 10 numbers
     *   * 63 - 11 numbers
     *   * 64 - 12 numbers
     *   * 65 - 1 characters (any text)
     *   * 66 - 2 characters (any text)
     *   * 67 - 3 characters (any text)
     *   * 68 - 4 characters (any text)
     *   * 69 - 5 characters (any text)
     *   * 70 - 6 characters (any text)
     *   * 71 - 7 characters (any text)
     *   * 72 - 8 characters (any text)
     *   * 73 - secret code, add code in options
     *   * 74 - file attach, append to email to signer
     *   * 75 - file attach, append to final PDF
     *   * 76 - file attach, zip with final PDF for internal use, but not signer
     *   * 77 - force to title caps
     *   * 78 - force to uppercase
     *   * 79 - force to lowercase
     *   * 80 - mm/yy
     *   * 81 - mm/yyyy
     *   * 82 - mm.yy
     *   * 83 - mm.yyyy
     *   * 84 - mm-yy
     *   * 85 - mm-yyyy
     *   * 90 - drawn field
     *   * 91 - countries list
     *   * 92 - honorifics list
     *
     * @param 1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|24|25|26|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|46|47|48|50|51|52|53|54|55|56|57|58|59|60|61|62|63|64|65|66|67|68|69|70|71|72|73|74|75|76|77|78|79|80|81|82|83|84|85|90|91|92|null $validation
     */
    public function withValidation(?int $validation): self
    {
        $obj = clone $this;
        $obj->validation = $validation;

        return $obj;
    }

    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
