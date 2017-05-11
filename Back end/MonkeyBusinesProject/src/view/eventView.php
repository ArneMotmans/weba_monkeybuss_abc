<?php namespace view;

class eventView implements IView
{
    public function show($data)
    {
        header ('Content-Type: application/json');

        if (isset($data['events'])){
            echo json_encode($data['events']);
        } else {
            echo '{}';
        }
    }
}