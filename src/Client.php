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

        $baseUrl ??= getenv(
            'LEGALESIGN_SDK_BASE_URL'
        ) ?: 'https://eu-api.legalesign.com/api/v1';

        $options = RequestOptions::with(
            uriFactory: Psr17FactoryDiscovery::findUriFactory(),
            streamFactory: Psr17FactoryDiscovery::findStreamFactory(),
            requestFactory: Psr17FactoryDiscovery::findRequestFactory(),
            transporter: Psr18ClientDiscovery::find(),
        );

        parent::__construct(
            // x-release-please-start-version
            headers: [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'User-Agent' => sprintf('legalesign-sdk/PHP %s', '0.0.1'),
                'X-Stainless-Lang' => 'php',
                'X-Stainless-Package-Version' => '0.0.1',
                'X-Stainless-OS' => $this->getNormalizedOS(),
                'X-Stainless-Arch' => $this->getNormalizedArchitecture(),
                'X-Stainless-Runtime' => 'php',
                'X-Stainless-Runtime-Version' => phpversion(),
            ],
            // x-release-please-end
            baseUrl: $baseUrl,
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
        return $this->apiKey ? ['Authorization' => $this->apiKey] : [];
    }
}
