<?php namespace view;

class eventView implements IView
{
    public function show($data)
    {
        header ('Content-Type: application/json');
        if (isset($data['event'])){
            echo json_encode($data['event']);
        } else {
            echo '{}';
        }
    }
}