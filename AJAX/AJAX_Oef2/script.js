/**
 * Created by 11501537 on 28/04/2017.
 */
window.onload(windowLoaded());

function windowLoaded() {
    document.getElementById('submit').addEventListener("click", function () {
        addToDatabase(document.getElementById('name').value);
    })
    document.getElementById('name').addEventListener("keyup", function () {
        var name = document.getElementById('name').value;
        if (name.length > 0);
        displaySuggestions(name);
    })
}

function addToDatabase(value) {
    fetch('http://localhost:3307/JavaScript/AJAX_Oef2/DbOperations.php', {
        method: 'post',
        body: JSON.stringify({
            name: value
        })
    }).then(function (response) {
        document.getElementById('name').value = "";
    })
}

function displaySuggestions(name) {
    document.getElementById('suggestions').innerHTML = "";
    if (document.getElementById('name').value != "") {
        fetch('http://localhost:3307/JavaScript/AJAX_Oef2/DbOperations.php', {
            method: 'post',
            body: JSON.stringify({
                query: name
            })
        }).then(function (response) {
            return response.json();
        }).then(function (json) {
            for (var i = 0; i < Object.keys(json).length; i++) {
                if (i == 0) {
                    addSuggestion(json[i]['Name']);
                } else {
                    addSuggestion(", " + json[i]['Name']);
                }
            }
        })
    }
}

function addSuggestion(name) {
    var div = document.getElementById('suggestions');
    var span = document.createElement('span');
    span.innerHTML = name;
    span.style.cursor = "pointer";
    span.onclick = function () {
        useSuggestion(name)
    };
    div.appendChild(span);
}

function useSuggestion(name) {
    document.getElementById('name').value = name.replace(/[, ]+/g, " ").trim();
    document.getElementById('suggestions').innerHTML = "";
}