<?php

namespace App\Services;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class TagService
{

    public function storeTag($request) 
    {

        $tag = New Tag;

        if($request->tags !== null) {
            $arrayExplode = explode(";", $request->tags);
        }
        if(end($arrayExplode) == "") array_pop($arrayExplode);

        $tagArray = [];

        foreach($arrayExplode as $tagValue){
            $tagArray[] = [
                'name' => trim($tagValue),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")];
        }

        DB::table('tags')->insert($tagArray);

        $firstId = DB::getPdo()->lastInsertId();
        $lastID = $firstId + count($tagArray) - 1;
        $listId = [];
        foreach (range($firstId, $lastID) as $number) {
            array_push($listId, $number);
        }

        return $listId;

    }

    public function storePivot($postId, $listId) {

        foreach($listId as $id){
            $idArray[] = [
                'post_id' => $postId,
                'tag_id' => $id,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ];
        }

        return $idArray;

    }

}