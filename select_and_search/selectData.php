<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select data</title>
    <link rel="stylesheet" href="db.css">
</head>
<body>
    <h2>PHP Mysql Select Data</h2>
    <form  method="POST">
        <input type="search" name="search" placeholder="Search by email" id="search" oninput="getData(this.value)">
    </form>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Email</th>
        </tr>
        <tbody id="data"></tbody>
    </table>


    <script>
        function getData(search=''){
            let xml = new XMLHttpRequest();
            xml.open("GET", "search.php?search="+search, true);
            xml.onload = function(){
                document.getElementById("data").innerHTML = xml.responseText;
            }

            xml.send();
        }

        getData();
    </script>
</body>
</html>
