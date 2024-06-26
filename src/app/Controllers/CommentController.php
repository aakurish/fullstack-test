<?php
namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Services\CommentManager;
use App\Services\CommentAddRequest;


class CommentController extends ResourceController
{
    protected $modelName = 'App\Models\Comment';
    protected $format = 'json';

    protected $commentManager;

    public function __construct()
    {
        $this->commentManager = new CommentManager();
    }

    public function getAll()
    {
         $this->response->setHeader('Access-Control-Allow-Origin', '*');

        $comments = $this->commentManager->getAll();
        return $this->respond($comments);

    }


    public function getById(int $id)
    {

        $comment = $this->commentManager->getById($id);
        return $this->respond($comment);

    }


    public function add()
    {

        $commentAddRequest = new CommentAddRequest();

        $commentAddRequest->setCommentName($this->request->getVar('name'));
        $commentAddRequest->setCommentText($this->request->getVar('text'));

        //$dateTime = \DateTime::createFromFormat('d.m.Y', $this->request->getVar('date'));
        //$newDateString = $dateTime->format('Y-m-d');

        //$commentAddRequest->setCommentDate($newDateString);
        $commentAddRequest->setCommentDate($this->request->getVar('date'));

        $comment = $this->commentManager->add($commentAddRequest);

        if ($comment) {
            $message = [
                "message" => "Комментарий успешно создан"
            ];
            return $this->respondCreated($message);

        } else {
            $message = [
                "message" => "Ошибка создания комментария"
            ];
            return $this->respond($message, 400);
        }


    }


    public function delete($id = null)
    {

        $comment = $this->commentManager->delete($id);


        if ($comment) {
            $message = [
                "message" => "Комментарий удален"
            ];
            return $this->respondDeleted($message);

        } else {
            $message = [
                "message" => "Комментарий не найден"
            ];
            return $this->respond($message, 400);
        }

    }
};