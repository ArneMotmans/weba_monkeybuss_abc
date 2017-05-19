/**
 * Created by 11501537 on 28/04/2017.
 */
window.addEventListener('load', windowLoaded);

function checkIfValid(value) {
    var valid = true;
    Object.keys(value).forEach(function (key) {
        if (value[key] === "" || value[key] == null)
            valid = false;

    });
    return valid;
}

function windowLoaded() {
    document.getElementById('submit').addEventListener("click", function () {
        var $credentials = new Array();
        $credentials['event_name'] = document.getElementById('eventnaam').value;
        $credentials['start_date'] = document.getElementById('startdatum').value;
        $credentials['end_date'] = document.getElementById('einddatum').value;
        $credentials['person_id'] = String(Math.floor((Math.random() * 999) + 1));

        if (checkIfValid($credentials)) {
            addToDatabase($credentials);
        } else {
            alert('Gelieve alle velden in te vullen')
        }
    });

}

function addToDatabase(value) {
    fetch('http://192.168.241.140/~user/Monkey_Business/events/add', {
        method: "POST",
        body: JSON.stringify({
            event_name: value.event_name,
            start_date: value.start_date,
            end_date: value.end_date,
            person_id: value.person_id
        })
    }).then(function () {
        document.getElementById('eventnaam').value = "";
        document.getElementById('startdatum').value = "";
        document.getElementById('einddatum').value = "";
        window.location.href = 'opdrachten_main.html';
    })
}
