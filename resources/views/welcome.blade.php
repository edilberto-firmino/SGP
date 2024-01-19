<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Treinos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        #calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            grid-gap: 10px;
        }

        .day {
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
        }

        .today {
            background-color: #4CAF50;
            color: #fff;
        }

        .event {
            background-color: #3498db;
            color: #fff;
            padding: 5px;
            margin: 2px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Agenda de Treinos</h1>
    </header>
    <main>
        <div id="calendar"></div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendar = document.getElementById('calendar');

            function createCalendar() {
                const daysOfWeek = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
                const currentDate = new Date();
                const currentMonth = currentDate.getMonth();
                const daysInMonth = new Date(currentDate.getFullYear(), currentMonth + 1, 0).getDate();

                for (let i = 0; i < 7; i++) {
                    const dayHeader = document.createElement('div');
                    dayHeader.classList.add('day');
                    dayHeader.textContent = daysOfWeek[i];
                    calendar.appendChild(dayHeader);
                }

                for (let i = 1; i <= daysInMonth; i++) {
                    const dayElement = document.createElement('div');
                    dayElement.classList.add('day');
                    dayElement.textContent = i;

                    if (i === currentDate.getDate() && currentMonth === currentDate.getMonth()) {
                        dayElement.classList.add('today');
                    }

                    calendar.appendChild(dayElement);
                }

                addEvent(5, 'Treino de Cardio');
                addEvent(12, 'Treino de Força');
                addEvent(20, 'Descanso');

                function addEvent(day, eventName) {
                    const dayElement = calendar.children[day + 6]; 
                    const eventElement = document.createElement('div');
                    eventElement.classList.add('event');
                    eventElement.textContent = eventName;
                    dayElement.appendChild(eventElement);
                }
            }

            createCalendar();
        });
    </script>
</body>
</html>
