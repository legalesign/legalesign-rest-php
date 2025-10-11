<?php

declare(strict_types=1);

namespace LegalesignSDK\Templatepdf\Fields\FieldListResponse;

use LegalesignSDK\Core\Attributes\Api;
use LegalesignSDK\Core\Concerns\SdkModel;
use LegalesignSDK\Core\Contracts\BaseModel;
use LegalesignSDK\Document\PdfFieldValidationEnum;
use LegalesignSDK\Templatepdf\Fields\FieldListResponse\Object1\ElementType;
use LegalesignSDK\Templatepdf\Fields\FieldListResponse\Object1\FontName;

/**
 * @phpstan-type object1_alias = array{
 *   ax: float,
 *   ay: float,
 *   bx: float,
 *   by: float,
 *   elementType: value-of<ElementType>,
 *   page: int,
 *   signer: int|null,
 *   align?: null|1|2|3,
 *   fieldorder?: int,
 *   fontName?: value-of<FontName>,
 *   fontSize?: int,
 *   hideBorder?: bool,
 *   label?: string,
 *   labelExtra?: string,
 *   logicAction?: 1|2|3,
 *   logicGroup?: string,
 *   mapTo?: string,
 *   optional?: bool,
 *   options?: string,
 *   substantive?: bool,
 *   validation?: null|1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|24|25|26|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|46|47|48|50|51|52|53|54|55|56|57|58|59|60|61|62|63|64|65|66|67|68|69|70|71|72|73|74|75|76|77|78|79|80|81|82|83|84|85|90|91|92,
 *   value?: string,
 * }
 */
final class Object1 implements BaseModel
{
    /** @use SdkModel<object1_alias> */
    use SdkModel;

    /**
     * left vertical, 0 = left page edge, 1 = right page edge.
     */
    #[Api]
    public float $ax;

    /**
     * upper horizontal, 0 = top page edge, 1 = bottom page edge.
     */
    #[Api]
    public float $ay;

    /**
     * right vertical, 0 = left page edge, 1 = right page edge.
     */
    #[Api]
    public float $bx;

    /**
     * lower horizontal. 0 = top page edge, 1 = bottom page edge.
     */
    #[Api]
    public float $by;

    /**
     * Must be one of the following: * signature - signature field  * initials - initials field  * text - signer field (field for signer to complete) * admin - sender field (field to complete by admin user when sending).
     *
     * @var value-of<ElementType> $elementType
     */
    #[Api('element_type', enum: ElementType::class)]
    public string $elementType;

    /**
     * which page to place field on.
     */
    #[Api]
    public int $page;

    /**
     * 1-Index number for signer (witness+100) (approver+200). Null  if sender field.
     */
    #[Api]
    public ?int $signer;

    /**
     * one of the following:
     *   * 1 - left
     *   * 2 - middle
     *   * 3 - right
     *
     * @var 1|2|3|null $align
     */
    #[Api(nullable: true, optional: true)]
    public ?int $align;

    /**
     * order signer progresses through fields, top-down if blank.
     */
    #[Api(optional: true)]
    public ?int $fieldorder;

    /** @var value-of<FontName>|null $fontName */
    #[Api('font_name', enum: FontName::class, optional: true)]
    public ?string $fontName;

    #[Api('font_size', optional: true)]
    public ?int $fontSize;

    #[Api('hide_border', optional: true)]
    public ?bool $hideBorder;

    /**
     * help signer/sender understand what to do.
     */
    #[Api(optional: true)]
    public ?string $label;

    /**
     * @deprecated
     *
     * not in use
     */
    #[Api('label_extra', optional: true)]
    public ?string $labelExtra;

    /**
     * offers options for more advanced forms 1 = One of a set of field (radio group), 2 = Sum a set of fields,  3 = Conditional upon another field.
     *
     * @var 1|2|3|null $logicAction
     */
    #[Api('logic_action', optional: true)]
    public ?int $logicAction;

    /**
     * values to enable a given logic_action in the form.
     */
    #[Api('logic_group', optional: true)]
    public ?string $logicGroup;

    /**
     * custom data for form integrations.
     */
    #[Api('map_to', optional: true)]
    public ?string $mapTo;

    #[Api(optional: true)]
    public ?bool $optional;

    /**
     * user for certain validation types.
     */
    #[Api(optional: true)]
    public ?string $options;

    /**
     * @deprecated
     *
     * Set if field substantive to contract terms, if so will not let others sign till this field completed
     */
    #[Api(optional: true)]
    public ?bool $substantive;

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

    /**
     * `new Object1()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Object1::with(
     *   ax: ..., ay: ..., bx: ..., by: ..., elementType: ..., page: ..., signer: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Object1)
     *   ->withAx(...)
     *   ->withAy(...)
     *   ->withBx(...)
     *   ->withBy(...)
     *   ->withElementType(...)
     *   ->withPage(...)
     *   ->withSigner(...)
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
     * @param ElementType|value-of<ElementType> $elementType
     * @param 1|2|3|null $align
     * @param FontName|value-of<FontName> $fontName
     * @param 1|2|3 $logicAction
     * @param 1|2|3|4|5|6|7|8|9|10|11|12|13|14|15|16|17|18|19|20|24|25|26|30|31|32|33|34|35|36|37|38|39|40|41|42|43|44|45|46|47|48|50|51|52|53|54|55|56|57|58|59|60|61|62|63|64|65|66|67|68|69|70|71|72|73|74|75|76|77|78|79|80|81|82|83|84|85|90|91|92|null $validation
     */
    public static function with(
        float $ax,
        float $ay,
        float $bx,
        float $by,
        ElementType|string $elementType,
        int $page,
        ?int $signer,
        ?int $align = null,
        ?int $fieldorder = null,
        FontName|string|null $fontName = null,
        ?int $fontSize = null,
        ?bool $hideBorder = null,
        ?string $label = null,
        ?string $labelExtra = null,
        ?int $logicAction = null,
        ?string $logicGroup = null,
        ?string $mapTo = null,
        ?bool $optional = null,
        ?string $options = null,
        ?bool $substantive = null,
        ?int $validation = null,
        ?string $value = null,
    ): self {
        $obj = new self;

        $obj->ax = $ax;
        $obj->ay = $ay;
        $obj->bx = $bx;
        $obj->by = $by;
        $obj['elementType'] = $elementType;
        $obj->page = $page;
        $obj->signer = $signer;

        null !== $align && $obj->align = $align;
        null !== $fieldorder && $obj->fieldorder = $fieldorder;
        null !== $fontName && $obj['fontName'] = $fontName;
        null !== $fontSize && $obj->fontSize = $fontSize;
        null !== $hideBorder && $obj->hideBorder = $hideBorder;
        null !== $label && $obj->label = $label;
        null !== $labelExtra && $obj->labelExtra = $labelExtra;
        null !== $logicAction && $obj->logicAction = $logicAction;
        null !== $logicGroup && $obj->logicGroup = $logicGroup;
        null !== $mapTo && $obj->mapTo = $mapTo;
        null !== $optional && $obj->optional = $optional;
        null !== $options && $obj->options = $options;
        null !== $substantive && $obj->substantive = $substantive;
        null !== $validation && $obj->validation = $validation;
        null !== $value && $obj->value = $value;

        return $obj;
    }

    /**
     * left vertical, 0 = left page edge, 1 = right page edge.
     */
    public function withAx(float $ax): self
    {
        $obj = clone $this;
        $obj->ax = $ax;

        return $obj;
    }

    /**
     * upper horizontal, 0 = top page edge, 1 = bottom page edge.
     */
    public function withAy(float $ay): self
    {
        $obj = clone $this;
        $obj->ay = $ay;

        return $obj;
    }

    /**
     * right vertical, 0 = left page edge, 1 = right page edge.
     */
    public function withBx(float $bx): self
    {
        $obj = clone $this;
        $obj->bx = $bx;

        return $obj;
    }

    /**
     * lower horizontal. 0 = top page edge, 1 = bottom page edge.
     */
    public function withBy(float $by): self
    {
        $obj = clone $this;
        $obj->by = $by;

        return $obj;
    }

    /**
     * Must be one of the following: * signature - signature field  * initials - initials field  * text - signer field (field for signer to complete) * admin - sender field (field to complete by admin user when sending).
     *
     * @param ElementType|value-of<ElementType> $elementType
     */
    public function withElementType(ElementType|string $elementType): self
    {
        $obj = clone $this;
        $obj['elementType'] = $elementType;

        return $obj;
    }

    /**
     * which page to place field on.
     */
    public function withPage(int $page): self
    {
        $obj = clone $this;
        $obj->page = $page;

        return $obj;
    }

    /**
     * 1-Index number for signer (witness+100) (approver+200). Null  if sender field.
     */
    public function withSigner(?int $signer): self
    {
        $obj = clone $this;
        $obj->signer = $signer;

        return $obj;
    }

    /**
     * one of the following:
     *   * 1 - left
     *   * 2 - middle
     *   * 3 - right
     *
     * @param 1|2|3|null $align
     */
    public function withAlign(?int $align): self
    {
        $obj = clone $this;
        $obj->align = $align;

        return $obj;
    }

    /**
     * order signer progresses through fields, top-down if blank.
     */
    public function withFieldorder(int $fieldorder): self
    {
        $obj = clone $this;
        $obj->fieldorder = $fieldorder;

        return $obj;
    }

    /**
     * @param FontName|value-of<FontName> $fontName
     */
    public function withFontName(FontName|string $fontName): self
    {
        $obj = clone $this;
        $obj['fontName'] = $fontName;

        return $obj;
    }

    public function withFontSize(int $fontSize): self
    {
        $obj = clone $this;
        $obj->fontSize = $fontSize;

        return $obj;
    }

    public function withHideBorder(bool $hideBorder): self
    {
        $obj = clone $this;
        $obj->hideBorder = $hideBorder;

        return $obj;
    }

    /**
     * help signer/sender understand what to do.
     */
    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj->label = $label;

        return $obj;
    }

    /**
     * not in use.
     */
    public function withLabelExtra(string $labelExtra): self
    {
        $obj = clone $this;
        $obj->labelExtra = $labelExtra;

        return $obj;
    }

    /**
     * offers options for more advanced forms 1 = One of a set of field (radio group), 2 = Sum a set of fields,  3 = Conditional upon another field.
     *
     * @param 1|2|3 $logicAction
     */
    public function withLogicAction(int $logicAction): self
    {
        $obj = clone $this;
        $obj->logicAction = $logicAction;

        return $obj;
    }

    /**
     * values to enable a given logic_action in the form.
     */
    public function withLogicGroup(string $logicGroup): self
    {
        $obj = clone $this;
        $obj->logicGroup = $logicGroup;

        return $obj;
    }

    /**
     * custom data for form integrations.
     */
    public function withMapTo(string $mapTo): self
    {
        $obj = clone $this;
        $obj->mapTo = $mapTo;

        return $obj;
    }

    public function withOptional(bool $optional): self
    {
        $obj = clone $this;
        $obj->optional = $optional;

        return $obj;
    }

    /**
     * user for certain validation types.
     */
    public function withOptions(string $options): self
    {
        $obj = clone $this;
        $obj->options = $options;

        return $obj;
    }

    /**
     * Set if field substantive to contract terms, if so will not let others sign till this field completed.
     */
    public function withSubstantive(bool $substantive): self
    {
        $obj = clone $this;
        $obj->substantive = $substantive;

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
