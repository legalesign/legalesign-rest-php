<?php

declare(strict_types=1);

namespace LegalesignSDK;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use LegalesignSDK\Core\BaseClient;
use LegalesignSDK\Services\DocumentService;
use LegalesignSDK\Services\GroupService;
use LegalesignSDK\Services\PdfService;
use LegalesignSDK\Services\SignerService;
use LegalesignSDK\Services\StatusService;
use LegalesignSDK\Services\TemplatepdfService;
use LegalesignSDK\Services\TemplateService;

class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public DocumentService $document;

    /**
     * @api
     */
    public GroupService $group;

    /**
     * @api
     */
    public PdfService $pdf;

    /**
     * @api
     */
    public SignerService $signer;

    /**
     * @api
     */
    public StatusService $status;

    /**
     * @api
     */
    public TemplateService $template;

    /**
     * @api
     */
    public TemplatepdfService $templatepdf;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('LEGALESIGN_SDK_API_KEY'));

        $base = $baseUrl ?? getenv(
            'LEGALESIGN_SDK_BASE_URL'
        ) ?: 'https://eu-api.legalesign.com/api/v1';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            headers: [
                'Content-Type' => 'application/json', 'Accept' => 'application/json',
            ],
            baseUrl: $base,
            options: $options,
        );

        $this->document = new DocumentService($this);
        $this->group = new GroupService($this);
        $this->pdf = new PdfService($this);
        $this->signer = new SignerService($this);
        $this->status = new StatusService($this);
        $this->template = new TemplateService($this);
        $this->templatepdf = new TemplatepdfService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return ['Authorization' => $this->apiKey];
    }
}
