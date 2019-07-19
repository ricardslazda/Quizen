<?php

use Quiz\Session;

?>
<div id="content">
    <script>
        function createQuestion() {
            let name = promt("What's your quiz name?")

            let xhr = new XMLHttpRequest();

            xhr.onload = function () {
                alert("cool");
            }
            xhr.open('POST', 'quiz/new', true);
            xhr.send('name=' +name);
        }

        function renderList(items){
            let container = document.querySelector('#content');
            ul = document.createElement("ul");
            container.appendChild(ul);
            items.forEach(function(item) {
                let li = document.createElement("li");
                li.innerText = item.title;
                ul.appendChild(li);
            });
        };
        document.addEventListener('DOMContentLoaded', function(){
            let xhr = new XMLHttpRequest();
            xhr.onload = function (event) {
                renderList(JSON.parse(xhr.response));
            };
            xhr.open('GET', '/quiz/all', true);
            xhr.send();
        });
    </script>
    <?= "Hello $name "?? "No name set"?>
</div>