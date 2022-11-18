<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

if (isset($_GET['lookup'])) {
  $lookup = $_GET['lookup'];
  $country = $_GET['country'];
  $stmt = $conn->query("SELECT cities.name AS cname, cities.district, cities.population, countries.name AS conName FROM cities JOIN countries ON countries.code = cities.country_code WHERE countries.name = '$country'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  echo "<table>
  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>";

foreach ($results as $row) {
  echo "<tr>";
  echo "<td>" . $row['cname'] . "</td>";
  echo "<td>" . $row['district'] . "</td>";
  echo "<td>" . $row['population'] . "</td>";
  echo "</tr>";
}

echo "</table>";

} else {

  $country = $_GET['country'];
  $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
  
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<table>
  <tr>
    <th>Name</th>
    <th>Continent</th>
    <th>Independence</th>
    <th>Head of State</th>
  </tr>";
foreach ($results as $row) {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['continent'] . "</td>";
  echo "<td>" . $row['independence_year'] . "</td>";
  echo "<td>" . $row['head_of_state'] . "</td>";
  echo "</tr>";
}
echo "</table>";
}
/*
<ul>
<?php foreach ($results as $row): ?>
  <li><?= $row['name'] . ' is ruled by ' . $row['head_of_state']; ?></li>
<?php endforeach; ?>
</ul>
*/
?>