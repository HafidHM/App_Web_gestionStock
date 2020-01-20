<?php
class Database
{
    public function query($query,$params)
    {
        $req = $pdo->prepare($query);
        $req->execute($params);
        return $req;
    }

}