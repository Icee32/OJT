< script >
    function checkLatestEntries() {
        // Get the selected dates
        const covidStartDate = document.getElementById("startDateCovid").value;
        const covidEndDate = document.getElementById("endDateCovid").value;
        const pertussisStartDate = document.getElementById("startDatePertussis").value;
        const pertussisEndDate = document.getElementById("endDatePertussis").value;

        // Prepare the AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "forms.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Prepare the data to send
        const data = `covid_start_date=${covidStartDate}&covid_end_date=${covidEndDate}&pertussis_start_date=${pertussisStartDate}&pertussis_end_date=${pertussisEndDate}`;

        // Handle the response
        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                displayResults(response);
            } else {
                console.error("Error:", xhr.statusText);
            }
        };

        // Send the request
        xhr.send(data);
    }

function displayResults(data) {
    // Update the UI based on the response from forms.php (e.g., display messages)
    const covidMessage = document.createElement("p");
    covidMessage.textContent = data.covidEntries ? "Recent Covid Vaccinations found!" : "No recent Covid Vaccinations found.";
    document.querySelector("section.box:nth-child(1)").appendChild(covidMessage);

    const pertussisMessage = document.createElement("p");
    pertussisMessage.textContent = data.pertussisEntries ? "Recent Pertussis Vaccinations found!" : "No recent Pertussis Vaccinations found.";
    document.querySelector("section.box:nth-child(2)").appendChild(pertussisMessage);
} < /script></script >