<?php

/*
 * This file is part of the pkg6/cloud-print.
 *
 * (c) pkg6 <https://github.com/pkg6>
 *
 * (L) Licensed <https://opensource.org/license/MIT>
 *
 * (A) zhiqiang <https://www.zhiqiang.wang>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Pkg6\CloudPrint\Requests;

class PrintRequest
{
    protected ?string $sn = null;

    protected ?string $content = null;

    protected ?int $copies = 1;

    protected ?string $orderId = null;

    protected ?int $retry = 0;

    protected ?string $type = null;

    protected ?string $templateId = null;

    protected ?string $imageUrl = null;

    protected ?string $htmlUrl = null;

    protected ?array $extra = [];

    public static function create(): static
    {
        return new static();
    }

    public function sn(?string $sn): static
    {
        $this->sn = $sn;

        return $this;
    }

    public function getSn(): ?string
    {
        return $this->sn;
    }

    public function content(?string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function copies(?int $copies): static
    {
        $this->copies = $copies;

        return $this;
    }

    public function getCopies(): ?int
    {
        return $this->copies;
    }

    public function orderId(?string $orderId): static
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function retry(?int $retry): static
    {
        $this->retry = $retry;

        return $this;
    }

    public function getRetry(): ?int
    {
        return $this->retry;
    }

    public function type(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function templateId(?string $templateId): static
    {
        $this->templateId = $templateId;

        return $this;
    }

    public function getTemplateId(): ?string
    {
        return $this->templateId;
    }

    public function imageUrl(?string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function htmlUrl(?string $htmlUrl): static
    {
        $this->htmlUrl = $htmlUrl;

        return $this;
    }

    public function getHtmlUrl(): ?string
    {
        return $this->htmlUrl;
    }

    public function extra(array $extra): static
    {
        $this->extra = array_merge($this->extra ?? [], $extra);

        return $this;
    }

    public function getExtra(): ?array
    {
        return $this->extra;
    }

    public function toArray(): array
    {
        return array_filter([
            'sn' => $this->sn,
            'content' => $this->content,
            'copies' => $this->copies,
            'orderId' => $this->orderId,
            'retry' => $this->retry,
            'type' => $this->type,
            'templateId' => $this->templateId,
            'imageUrl' => $this->imageUrl,
            'htmlUrl' => $this->htmlUrl,
            'extra' => $this->extra,
        ], fn ($v) => ! is_null($v));
    }
}
