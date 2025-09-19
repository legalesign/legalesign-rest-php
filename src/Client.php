<?php

declare(strict_types=1);

namespace Legalesign;

use Http\Discovery\Psr17FactoryDiscovery;
use Http\Discovery\Psr18ClientDiscovery;
use Legalesign\Core\BaseClient;
use Legalesign\Services\AttachmentService;
use Legalesign\Services\DocumentService;
use Legalesign\Services\GroupService;
use Legalesign\Services\InvitedService;
use Legalesign\Services\MemberService;
use Legalesign\Services\NotificationsService;
use Legalesign\Services\PdfService;
use Legalesign\Services\SignerService;
use Legalesign\Services\StatusService;
use Legalesign\Services\SubscribeService;
use Legalesign\Services\TemplatepdfService;
use Legalesign\Services\TemplateService;
use Legalesign\Services\UnsubscribeService;
use Legalesign\Services\UserService;

class Client extends BaseClient
{
    public string $apiKey;

    /**
     * @api
     */
    public AttachmentService $attachment;

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
    public InvitedService $invited;

    /**
     * @api
     */
    public MemberService $member;

    /**
     * @api
     */
    public NotificationsService $notifications;

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
    public SubscribeService $subscribe;

    /**
     * @api
     */
    public TemplateService $template;

    /**
     * @api
     */
    public TemplatepdfService $templatepdf;

    /**
     * @api
     */
    public UnsubscribeService $unsubscribe;

    /**
     * @api
     */
    public UserService $user;

    public function __construct(?string $apiKey = null, ?string $baseUrl = null)
    {
        $this->apiKey = (string) ($apiKey ?? getenv('LEGALESIGN_API_KEY'));

        $base = $baseUrl ?? getenv(
            'LEGALESIGN_BASE_URL'
        ) ?: 'https://lon-dev.legalesign.com/api/v1';

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

        $this->attachment = new AttachmentService($this);
        $this->document = new DocumentService($this);
        $this->group = new GroupService($this);
        $this->invited = new InvitedService($this);
        $this->member = new MemberService($this);
        $this->notifications = new NotificationsService($this);
        $this->pdf = new PdfService($this);
        $this->signer = new SignerService($this);
        $this->status = new StatusService($this);
        $this->subscribe = new SubscribeService($this);
        $this->template = new TemplateService($this);
        $this->templatepdf = new TemplatepdfService($this);
        $this->unsubscribe = new UnsubscribeService($this);
        $this->user = new UserService($this);
    }

    /** @return array<string, string> */
    protected function authHeaders(): array
    {
        return ['Authorization' => $this->apiKey];
    }
}
