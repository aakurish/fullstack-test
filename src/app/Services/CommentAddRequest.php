<?php

namespace App\Services;

class CommentAddRequest{

    protected string $CommentName;
    protected string $CommentText;
    protected string $CommentDate;



    public function __construct(){

        $this->CommentName = "";
        $this->CommentText = "";
        $this->CommentDate = "";
    }

    public function getCommentName(){
        return $this->CommentName;
    }

    public function setCommentName(string $CommentName){
        $this->CommentName = $CommentName;
    }

    public function getCommentText(){
        return $this->CommentText;
    }

    public function setCommentText(string $CommentText){
        $this->CommentText = $CommentText;
    }


    public function getCommentDate(){
        return $this->CommentDate;
    }

    public function setCommentDate(string $CommentDate){
        $this->CommentDate = $CommentDate;
    }

}