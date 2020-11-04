<?php

namespace Blogg\Models;

use Blogg\Http\Database;
use TechOne\Database\Connection;

class PostModel extends Database
{
    protected Connection $pdo;

    /**
     * PostModel constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->pdo = $this->db->getConnection();
    }

    /**
     * @param int $started
     * @param int $ended
     * @return mixed
     * @throws \Throwable
     */
    public function get(int $started, int $ended)
    {
        return $this->pdo->query('SELECT * FROM posts ORDER BY date DESC LIMIT :started, :ended', [
            'start' => $started,
            'ended' => $ended
        ]);
    }

    /**
     * @return mixed
     * @throws \Throwable
     */
    public function getAll()
    {
        return $this->pdo->query('SELECT * FROM posts ORDER BY date DESC');
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Throwable
     */
    public function getById(int $id)
    {
        $req = $this->pdo->query('SELECT * FROM posts WHERE id = :id LIMIT 1', ['id' => $id]);

        return count($req) === 1 ? $req[0] : $req;
    }

    /**
     * @param array $data
     * @return mixed
     * @throws \Throwable
     */
    public function add(array $data)
    {
        return $this->pdo->query(
            'INSERT INTO posts (title, small_desc, content, author) VALUES(:title, :small_desc, :content, :author)',
            [
                'title' => $data['title'],
                'small_desc' => $data['small_desc'],
                'content' => $data['content'],
                'author' => $data['author'],
            ]
        );
    }

    /**
     * Updating an existing post by passing as a parametre the data as an array
     * @param array $data
     * @return bool
     * @throws \Throwable
     */
    public function update(array $data) {

        return $this->pdo->query(
            'UPDATE posts SET title=:title, small_desc=:small_desc, content=:content, author=:author, date=NOW() WHERE id = :postId LIMIT 1',
            [
                'postId' => $data['postId'],
                'title' => $data['title'],
                'small_desc' => $data['small_desc'],
                'content' => $data['content'],
                'author' => $data['author'],
            ]
        );
    }

    /**
     * @param int $id
     * @return mixed
     * @throws \Throwable
     */
    public function delete(int $id)
    {
        return $this->pdo->query('DELETE FROM posts WHERE id = :postId LIMIT 1', ['postId' => $id]);
    }
}