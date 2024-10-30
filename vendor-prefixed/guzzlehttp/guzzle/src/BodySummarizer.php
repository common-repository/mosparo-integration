<?php
/**
 * @license MIT
 *
 * Modified using Strauss.
 * @see https://github.com/BrianHenryIE/strauss
 */

namespace MosparoDependencies\GuzzleHttp;

use MosparoDependencies\Psr\Http\Message\MessageInterface;

final class BodySummarizer implements BodySummarizerInterface
{
    /**
     * @var int|null
     */
    private $truncateAt;

    public function __construct(int $truncateAt = null)
    {
        $this->truncateAt = $truncateAt;
    }

    /**
     * Returns a summarized message body.
     */
    public function summarize(MessageInterface $message): ?string
    {
        return $this->truncateAt === null
            ? \MosparoDependencies\GuzzleHttp\Psr7\Message::bodySummary($message)
            : \MosparoDependencies\GuzzleHttp\Psr7\Message::bodySummary($message, $this->truncateAt);
    }
}
