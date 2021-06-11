<?php

namespace App\Domains\Http\Jobs;

use Illuminate\Http\Response;

class RespondFileStreamJob
{
    /**
     * @var string
     */
    private string $content;

    /**
     * @var int
     */
    private int $status;

    /**
     * @var array
     */
    private array $headers;

    /**
     * RespondStreamJob constructor.
     * @param string $content
     * @param int $status
     * @param array $headers
     */
    public function __construct(string $content, int $status = Response::HTTP_OK, array $headers = [])
    {
        $this->content = $content;
        $this->status  = $status;
        $this->headers = $headers;
    }

    /**
     * @return Response
     */
    public function handle(): Response
    {
        return new Response(
            $this->content,
            $this->status,
            $this->headers
        );
    }
}
