/**
 * Created by 11502064 on 12/05/2017.
 */
window.onload = addDataToTable();

function addDataToTable() {
    fetch('http://192.168.47.134/~user/Monkey_Business/events', {
        method: 'get',
    }).then(function (response) {
        return response.json();

    }).then(function (content) {
        for(var i = 0; i < 4; i++){
            var target = document.getElementById("dataTableContent");

            var row = document.createElement("TR");
            var cel_1 = document.createElement("TD");
            var cel_2 = document.createElement("TD");
            var cel_3 = document.createElement("TD");
            var cel_4 = document.createElement("TD");
            var cel_5 = document.createElement("TD");

            cel_1.id = "idCel";

            cel_1.append(content[i].eventId);
            cel_2.append(content[i].eventName);
            cel_3.append(content[i].start_date);
            cel_4.append(content[i].end_date);
            cel_5.append(content[i].personId);

            row.appendChild(cel_1);
            row.appendChild(cel_2);
            row.appendChild(cel_3);
            row.appendChild(cel_4);
            row.appendChild(cel_5);

            target.append(row);
        }

    })
}

function deleteDataFromTable() {
    fetch('http://192.168.47.134/~user/Monkey_Business/events/' + document.getElementById("idCel").innerHTML, {
        method: 'delete'
    })

    document.getElementById("dataTableContent").innerHTML = "";

    addDataToTable();
}
