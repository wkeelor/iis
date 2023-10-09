<?php

namespace App\Models;
class Event{
    public static function all_events(){
        return [
            [
                'id' => 1,
                'title' => 'Názov eventu 1',
                'description' => 'Popis eventu 1'
            ],
            [
                'id' => 2,
                'title' => 'Názov eventu 2',
                'description' => 'Popis eventu 2'
            ]
        ];
    }

    public static function find($id){
        $events = self::all_events();
        foreach($events as $event){
            if($event['id'] == $id){
                return $event;
            }
        }
        return null;
    }
}
