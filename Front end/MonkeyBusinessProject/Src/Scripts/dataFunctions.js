/**
 * Created by 11502064 on 12/05/2017.
 */

function addDataToTable() {
    fetch('http://192.168.47.134/~user/Monkey_Business/events', {
        method: 'get',
        dataType: 'json',
    }).then(function (response) {
        var data = JSON.stringify(response);
        var target = document.getElementById("dataTableContent");

        var row = document.createElement("TR");
        var cel_1 = document.createElement("TD");
        var cel_2 = document.createElement("TD");
        var cel_3 = document.createElement("TD");
        var cel_4 = document.createElement("TD");
        var cel_5 = document.createElement("TD");

        cel_1.append(response[0]);
        cel_2.append(response[1]);
        cel_3.append(response[2]);
        cel_4.append(response[3]);
        cel_5.append(response[4]);

        row.appendChild(cel_1);
        row.appendChild(cel_2);
        row.appendChild(cel_3);
        row.appendChild(cel_4);
        row.appendChild(cel_5);

        target.append(row);

        alert(response);
        console.log('success', data);
    })
}
