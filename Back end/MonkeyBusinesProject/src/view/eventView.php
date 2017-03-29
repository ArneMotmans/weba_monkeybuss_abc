<?php namespace view;

class eventView implements IView
{
    public function show(array $data)
    {
        header ('Content-Type: application/json');

        if (isset($data['event'])){
            $event = $data['event'];
            echo json_encode(['event_id' => $event->getEventId()
                , 'event_name' => $event->getEventName(),
                'start_date' => $event->getStartDate(), 'end_date' => $event->getEndDate(),
                'person_id' => $event->getPersonId()]);
        } else {
            echo '{}';
        }
    }
}