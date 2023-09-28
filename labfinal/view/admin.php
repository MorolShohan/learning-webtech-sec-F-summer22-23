<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Project List Retrieval</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
  <div class="container">
    <h1>Project List</h1>
    <button onclick="fetchProjects()">Show Project List</button>
    <ul id="project-list"></ul>
  </div>
</body>
<script>
    function fetchProjects() {
      const xhr = new XMLHttpRequest();
      xhr.open('GET', '../model/ajax.php?action=fetch_projects', true);

      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          const projects = JSON.parse(xhr.responseText);

          const projectList = document.getElementById('project-list');
          projectList.innerHTML = ''; 

          projects.forEach(project => {
            const listItem = document.createElement('li');
            listItem.textContent = project.project_name;
            projectList.appendChild(listItem);
          });
        }
      };

      xhr.send();
    }
  </script>
</html>
