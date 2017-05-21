/**
 * Created by 11502064 on 12/05/2017.
 */
window.onload = addAllDataToTable();

function addAllDataToTable() {
    fetch('http://192.168.241.140/~user/Monkey_Business/events', {
        method: 'get',
    }).then(function (response) {
        return response.json();

    }).then(function (content) {
        for(var i = 0; Object.keys(content).length; i++){
            var target = document.getElementById("dataTableContent");

            var row = document.createElement("TR");
            var cel_1 = document.createElement("TD");
            var cel_2 = document.createElement("TD");
            var cel_3 = document.createElement("TD");
            var cel_4 = document.createElement("TD");
            var cel_5 = document.createElement("TD");

            cel_1.id = "idCel";

            var personID_Link = document.createElement("A");
            personID_Link.id = "personIdCel" + i;
            personID_Link.setAttribute("onclick", "addDataToTableBasedOnPersonId()");
            personID_Link.style.cursor = "pointer";
            personID_Link.style.textDecoration = "none";
            personID_Link.style.color = "black";
            personID_Link.append(content[i].personId);

            console.log(content[i]);

            cel_1.append(content[i].eventId);
            cel_2.append(content[i].eventName);
            cel_3.append(content[i].start_date);
            cel_4.append(content[i].end_date);
            cel_5.append(personID_Link);

            row.appendChild(cel_1);
            row.appendChild(cel_2);
            row.appendChild(cel_3);
            row.appendChild(cel_4);
            row.appendChild(cel_5);

            target.append(row);
        }

    })
}

function addDataToTableBasedOnPersonId() {
    var persId = this.content;

    fetch('http://192.168.47.134/~user/Monkey_Business/events', {
        method: 'post',
        body: JSON.stringify({personId: persId})
    }).then(function (response) {
        return response.json();
    }).then(function (response) {
        console.log(response);
    })
}
