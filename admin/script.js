document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('showButton').addEventListener('click', function () {
        fetchDataAndDisplay();
    });
});

function fetchDataAndDisplay() {
    fetch('fetchData.php')
        .then(response => response.json())
        .then(dataArray => {
            displayData(dataArray);
        })
        .catch(error => console.error('Error fetching data:', error));
}

function displayData(dataArray) {
    const container = document.getElementById('dataContainer');
    const numberContainer = document.getElementById('numberContainer');

    container.innerHTML = '';
    numberContainer.innerHTML = '';

    const totalRows = dataArray.length;

    numberContainer.innerHTML = `<h5 class="card-title">Number: ${totalRows}</h5>`;

    dataArray.forEach(data => {
        const dataContainer = document.createElement('div');

        dataContainer.innerHTML = `
            <p>ID: ${data.id}</p>
            <p>Name: ${data.name}</p>
            <p>Email: ${data.email}</p>
            
        `;

        container.appendChild(dataContainer);
    });
}


document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('showUserDataButton').addEventListener('click', function () {
        fetchUserDataAndDisplay();
    });
});

function fetchUserDataAndDisplay() {
    fetch('fetchUserData.php')
        .then(response => response.json())
        .then(dataArray => {
            displayUserData(dataArray);
            countTotalRows(dataArray);
        })
        .catch(error => console.error('Error fetching user data:', error));
}

function displayUserData(dataArray) {
    const userDataContainer = document.getElementById('userDataContainer');

    userDataContainer.innerHTML = '';

    if (dataArray.length > 0) {
        const table = document.createElement('table');
        table.classList.add('table', 'table-bordered', 'mt-4');

        // Create table header
        const headerRow = document.createElement('tr');
        for (const key in dataArray[0]) {
            const th = document.createElement('th');
            th.textContent = key;
            headerRow.appendChild(th);
        }
        table.appendChild(headerRow);

        // Create table body
        dataArray.forEach(user => {
            const row = document.createElement('tr');
            for (const key in user) {
                const td = document.createElement('td');
                td.textContent = user[key];
                row.appendChild(td);
            }
            table.appendChild(row);
        });

        userDataContainer.appendChild(table);
    } else {
        userDataContainer.innerHTML = '<p>No user data available</p>';
    }
}

function countTotalRows(dataArray) {
    const totalRowsContainer = document.getElementById('totalRowsContainer');

    if (dataArray.length > 0) {
        const totalRows = dataArray.length;
        totalRowsContainer.innerHTML = `<p>Total Rows: ${totalRows}</p>`;
    } else {
        totalRowsContainer.innerHTML = '<p>No user data available</p>';
    }
}
