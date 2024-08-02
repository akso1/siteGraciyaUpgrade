// to get current year
function getYear() {
    var currentDate = new Date();
    var currentYear = currentDate.getFullYear();
    document.querySelector("#displayYear").innerHTML = currentYear;
}

getYear();

//get time in Moscow location
function getMoscowHours() {
    const moscowTimezone = 'Europe/Moscow';

    // Получаем текущую дату и время в Москве
    const moscowTime = new Date(new Date().toLocaleString('en-US', {
        timeZone: moscowTimezone
    }));
    const hours = moscowTime.getHours();

    console.log(hours);

    const oT = document.getElementById("timeOpenP");
    if (oT) {
        const parentElement = oT.parentNode;
        const newElement = document.createElement('span');
        newElement.style.backgroundColor = "black";
        newElement.style.padding = "5px 10px";
        newElement.style.borderRadius = "10px";

        if (hours > 19 || hours <= 8) {
            newElement.textContent = 'Закрыто';
            newElement.style.color = "red";
        } else {
            newElement.textContent = 'Открыто';
            newElement.style.color = "lime";
        }

        parentElement.insertBefore(newElement, oT.nextSibling);
    } else {
        console.error('Element with id "timeOpenP" not found.');
    }
}

getMoscowHours();


/** google_map js **/
function myMap() {
    var mapProp = {
        center: new google.maps.LatLng(40.712775, -74.005973),
        zoom: 18,
    };
    var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
}

/*Якорь*/
document.addEventListener('DOMContentLoaded', (event) => {
    const links = document.querySelectorAll('.linkJa');

    links.forEach(link => {
        link.addEventListener('click', (event) => {
            event.preventDefault();
            const targetId = link.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);

            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth'
            });
        });
    });
});

//scrollDetect

window.addEventListener('scroll', function() {
    const scrollPosition = window.scrollY;
    var headersection = document.getElementById('header_section');
    if (this.window.innerWidth > 991) {
        if (scrollPosition < 50) {
            headersection.style.backgroundColor = "#17171700";
        } else {
            headersection.style.backgroundColor = "#171717";
        }
    }

});

// add item in trash
function trashcard(id) {
    $.ajax({
        type: "POST",
        url: "shopCard.php",
        dataType: "json",
        data: {
            id: id
        },
        success: function(response) {
            if (response.status === 'success') {
                console.log("ID added: " + response.id);
                console.log("Session array: ", response.session_array);

                $('#itemCount').text(response.item_count); // Предполагается, что у вас есть элемент с id="itemCount"

            } else {
                console.error("Error: " + response.message);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error("Ошибка: " + textStatus + ", " + errorThrown);
            // console.error("Response text: " + jqXHR.responseText);
        }
    });
    fetch('output_id_from_db.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById("right_trash").innerHTML = data;
        })
        .catch(error => console.error('Ошибка:', error));
}

// delite item in trash
function delit(id) {
    fetch('del_it_trash.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: new URLSearchParams({
                'id_to_remove': id
            })
        })
        .then(response => {
            if (!response.ok) {
                // Если ответ имеет статус ошибки, выбрасываем ошибку
                throw new Error('Network response was not ok');
            }
            return response.text(); // Сначала читаем как текст
        })
        .then(text => {
            console.log('Server response:', text); // Отладка: выводим ответ сервера
            try {
                const data = JSON.parse(text); // Попробуем разобрать как JSON
                if (data.status === 'success') {
                    // Обновляем счетчик
                    document.getElementById("itemCount").textContent = data.count;
                    console.log(data.message);

                    // Выполняем второй запрос только после успешного удаления
                    return fetch('output_id_from_db.php');
                } else {
                    console.error('Ошибка:', data.message);
                    throw new Error(data.message); // Прерываем цепочку при ошибке
                }
            } catch (error) {
                console.error('Ошибка при парсинге JSON:', error);
                throw error; // Прерываем цепочку при ошибке парсинга
            }
        })
        .then(response => {
            if (!response.ok) {
                // Если ответ имеет статус ошибки, выбрасываем ошибку
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            document.getElementById("right_trash").innerHTML = data;
        })
        .catch(error => {
            console.error('Ошибка:', error);
            // Здесь можно добавить дополнительную логику для обработки ошибок
        });
}

//v and h trash
function hv_trash() {
    var hv = document.getElementById("right_trash");
    var bn = document.getElementById("but_nav");
    if (hv.style.visibility == "hidden") {
        hv.style.right = "0";
        hv.style.visibility = "visible";
        bn.style.display = "none";

    } else {
        hv.style.right = "-25vw";
        hv.style.visibility = "hidden";

    }
}