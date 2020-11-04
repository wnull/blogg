<?php

namespace Blogg\Controllers;

use Blogg\Http\Operator;
use Blogg\Models\{PostModel, AuthModel};

class BlogController
{
    protected PostModel $modelPost;
    protected AuthModel $modelAuthentication;
    protected Operator $manager;

    private int $id;

    /**
     * BlogController constructor.
     */
    public function __construct()
    {
        $this->manager = new Operator($_SESSION);

        $this->modelPost = new PostModel();
        $this->modelAuthentication = new AuthModel();

        $this->id = isset($_GET['id']) ?(int)  $_GET['id']: 0;
    }

    /**
     * @throws \Throwable
     */
    public function home() {
        $this->manager->post = $this->modelPost->getAll();

        $this->manager->getView('home');
    }

    /**
     * @throws \Throwable
     */
    public function blogPosts()
    {
        $this->manager->post = $this->modelPost->getAll();

        $this->manager->getView('blogPosts');
    }

    /**
     * @throws \Throwable
     */
    public function post()
    {
        $this->manager->post = $this->modelPost->getById($this->id);

        $this->manager->getView('post');
    }

    public function notFound()
    {
        $this->manager->getView('404');
    }

    /**
     * @throws \Throwable
     */
    public function add()
    {
        if (!empty($_POST))
        {
            $data = [
                'title' => $_POST['title'],
                'small_desc' => $_POST['small_desc'],
                'content' => $_POST['content'],
                'author' => $_POST['author']
            ];

            if ($this->modelPost->add($data))
            {
                $this->manager->success_msg = 'The post was added with success.';
            }
            else
            {
                $this->manager->error_msg = 'An error has occured. Please contact the site admin.';
            }
        }



        $this->manager->getView('add');
    }

    /**
     * @throws \Throwable
     */
    public function edit()
    {
        if (!empty($_POST))
        {
            $data = [
                'postId' => $this->id,
                'title' => $_POST['title'],
                'small_desc' => $_POST['small_desc'],
                'content' => $_POST['content'],
                'author' => $_POST['author']
            ];

            if ($this->modelPost->update($data))
            {
                $this->manager->success_msg = 'The post was updated with success.';
            }
            else
            {
                $this->manager->error_msg = 'An error has occured. Please contact the site admin.';
            }
        }
        
        $this->manager->post = $this->modelPost->getById($this->id);

        $this->manager->getView('edit');
    }

    /**
     * @return bool
     * @throws \Throwable
     */
    public function delete()
    {
        return empty($_POST['delete']) && $this->modelPost->delete($this->id);
    }

    /**
     * @throws \Throwable
     */
    public function login()
    {
        if (isset($_POST['username']) && $this->modelAuthentication->getAuth($_POST['username']))
        {
            session_start();
            $_SESSION['active'] = $_POST['username'];

            header('Location: ' . ROOT_URL . '/?action=blogPosts');
            exit;

        } else {
            $this->manager->error_msg = 'Your login are incorrect. Please try again later.';
        }

        $this->manager->getView('login');
    }

    public function logout()
    {
        $this->isAuthAnyRedirect();

        $_SESSION = [];
        session_unset();
        session_destroy();
        setcookie(session_name(), null, 0, '/');

        $this->manager->getView('logout');
    }

    private function isAuthAnyRedirect(): void
    {
        if (empty($_SESSION))
        {
            header('Location: ' . ROOT_URL);
            exit;
        }
    }
}