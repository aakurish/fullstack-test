<?php

namespace App\Services;


interface CommentService{

    public function getById(int $id);
    public function getAll();

    public function add(CommentAddRequest $commentAddRequest);
    public function update(int $id);
    public function delete(int $id);
}

