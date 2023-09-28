<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project Data Retrieval</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <script>
    function fetchProjectData() {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', '../model/ajax.php?action=fetch_projects', true);

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const projects = JSON.parse(xhr.responseText);

          const tableBody = document.getElementById('project-table-body');
          tableBody.innerHTML = ''; // Clear previous data

          projects.forEach(project => {
            const row = document.createElement('tr');
            const nameCell = document.createElement('td');
            const descriptionCell = document.createElement('td');

            nameCell.textContent = project.project_name;
            descriptionCell.textContent = project.project_description;

            row.appendChild(nameCell);
            row.appendChild(descriptionCell);
            tableBody.appendChild(row);
          });
        }
      };

      xhr.send();
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>Project Data Retrieval</h1>
    <button onclick="fetchProjectData()">Fetch Projects</button>
    <table>
      <thead>
        <tr>
        <th>Project ID</th>
          <th>Project Name</th>
          <th>Project Description</th>
        </tr>
      </thead>
      <tbody id="project-table-body"></tbody>
    </table>
  </div>
</body>
</html>
