<?php
namespace App\Services;


use App\Models\CommentsModel;

class CommentManager implements CommentService{

    protected CommentsModel $commentsModel;

    public function __construct(){
        $this->commentsModel = new CommentsModel();
    }

    public function getById(int $id){

        return $this->commentsModel->find($id);

    }

    public function getAll(){

        return $this->commentsModel->findAll();

    }


    public function add(CommentAddRequest $CommentAddRequest){

        $data = [
            "name" => $CommentAddRequest->getCommentName(),
            "text" => $CommentAddRequest->getCommentText(),
            "date" => $CommentAddRequest->getCommentDate()
        ];

        return $this->commentsModel->insert($data);

    }

    public function update(int $id){


    }
    public function delete(int $id){

        return $this->commentsModel->delete($id);


    }
}