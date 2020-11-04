<?php

namespace Blogg\Http;

class Operator
{
    private array $session;

    public array $post = [];
    public ?string $error_msg;
    public ?string $success_msg;

    /**
     * Operator constructor.
     * @param array $session
     */
    public function __construct(array $session)
    {
        $this->session = $session;
    }

    /**
     * @param string $page
     */
    public function getView(string $page): void
    {
        $path = dirname(__DIR__) . '/views/' . $page . '.php';

        $private = [
            'edit', 'add'
        ];

        if (file_exists($path))
        {
            if (in_array($page, $private) && !isset($this->session['active'])) {
                $path = str_replace($page, 404, $path);
            }
        }

        require $path;
    }
}