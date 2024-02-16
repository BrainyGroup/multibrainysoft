<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;

use App\Models\Tenant;
use App\Models\TenantDetail;

class TenantWelcome extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(public Tenant $tenant, public TenantDetail $tenant_detail)
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('admin@brainysoft.com', 'Brainysoft Admin'),
            replyTo: [
                new Address('yahaya.frezier@datahousetza.com', 'Yahaya Frezier'),
            ],
            subject: 'BrainySoft Welcome Email',
            tags: ['welcome'],
            metadata: [
                'tenant_id' => $this->tenant->id,
            ],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.tenants.welcome',
            with: [
                'tenant' => $this->tenant,
                'tenant_detail' => $this->tenant_detail
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Attachment::fromPath('/path/to/file')
            // ->as('user_guide.pdf')
            // ->withMime('application/pdf'),
        ];
    }
}
