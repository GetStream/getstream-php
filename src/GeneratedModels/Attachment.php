<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * An attachment is a message object that represents a file uploaded by a user.
 */
class Attachment implements JsonSerializable
{
    public function __construct(public ?object $custom = null,
        public ?string $assetUrl = null,
        public ?string $authorIcon = null,
        public ?string $authorLink = null,
        public ?string $authorName = null,
        public ?string $color = null,
        public ?string $fallback = null,
        public ?string $footer = null,
        public ?string $footerIcon = null,
        public ?string $imageUrl = null,
        public ?string $ogScrapeUrl = null,
        public ?int $originalHeight = null,
        public ?int $originalWidth = null,
        public ?string $pretext = null,
        public ?string $text = null,
        public ?string $thumbUrl = null,
        public ?string $title = null,
        public ?string $titleLink = null,
        public ?string $type = null,
        public ?array $actions = null,
        public ?array $fields = null,
        public ?Images $giphy = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'custom' => $this->custom,
            'asset_url' => $this->assetUrl,
            'author_icon' => $this->authorIcon,
            'author_link' => $this->authorLink,
            'author_name' => $this->authorName,
            'color' => $this->color,
            'fallback' => $this->fallback,
            'footer' => $this->footer,
            'footer_icon' => $this->footerIcon,
            'image_url' => $this->imageUrl,
            'og_scrape_url' => $this->ogScrapeUrl,
            'original_height' => $this->originalHeight,
            'original_width' => $this->originalWidth,
            'pretext' => $this->pretext,
            'text' => $this->text,
            'thumb_url' => $this->thumbUrl,
            'title' => $this->title,
            'title_link' => $this->titleLink,
            'type' => $this->type,
            'actions' => $this->actions,
            'fields' => $this->fields,
            'giphy' => $this->giphy,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(custom: $json['custom'] ?? null,
            assetUrl: $json['asset_url'] ?? null,
            authorIcon: $json['author_icon'] ?? null,
            authorLink: $json['author_link'] ?? null,
            authorName: $json['author_name'] ?? null,
            color: $json['color'] ?? null,
            fallback: $json['fallback'] ?? null,
            footer: $json['footer'] ?? null,
            footerIcon: $json['footer_icon'] ?? null,
            imageUrl: $json['image_url'] ?? null,
            ogScrapeUrl: $json['og_scrape_url'] ?? null,
            originalHeight: $json['original_height'] ?? null,
            originalWidth: $json['original_width'] ?? null,
            pretext: $json['pretext'] ?? null,
            text: $json['text'] ?? null,
            thumbUrl: $json['thumb_url'] ?? null,
            title: $json['title'] ?? null,
            titleLink: $json['title_link'] ?? null,
            type: $json['type'] ?? null,
            actions: $json['actions'] ?? null,
            fields: $json['fields'] ?? null,
            giphy: $json['giphy'] ?? null
        );
    }
} 
