/**
 * Created by 11501537 on 28/04/2017.
 */
window.addEventListener('load', windowLoaded);

function windowLoaded() {
    document.getElementById('submit').addEventListener("click", function () {
        $credentials = new Array();
        $credentials['event_name'] = document.getElementById('eventnaam').value;
        $credentials['start_date'] = document.getElementById('startdatum').value;
        $credentials['end_date'] = document.getElementById('einddatum').value;
        addToDatabase($credentials);
    });

}

function addToDatabase(value) {
    fetch('http://192.168.180.128/~user/Monkey_Business/events', {
        method: "POST",
        body: JSON.stringify({
            event_name: value.event_name,
            start_date: value.start_date,
            end_date: value.end_date
        })
    }).then(function () {
        document.getElementById('eventnaam').value = "";
        document.getElementById('startdatum').value = "";
        document.getElementById('einddatum').value = "";
    })
}
