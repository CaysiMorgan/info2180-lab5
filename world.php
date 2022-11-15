<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$getCountry=trim(filter_var(htmlspecialchars($_GET['country']), FILTER_SANITIZE_STRING));
$country= $conn->query("SELECT * FROM countries WHERE name LIKE '%$getCountry%'");
$country_x= $country->fetchAll(PDO::FETCH_ASSOC);

$getContext =trim(filter_var(htmlspecialchars($_GET['context']), FILTER_SANITIZE_STRING)); 
$cities= $conn->query("SELECT cities.name, cities.district, cities.population FROM cities JOIN countries  ON countries.code = cities.country_code WHERE countries.name LIKE '%$getCountry%'");
$cities_x= $cities->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if ($getcoun && !isset($_GET['context'])); ?>
<table> 
  <tr>
    <th> Country Name</th>
    <th> Continent </th>
    <th> Indenpendence Year</th>  
    <th> Head of State</th>  
  </tr>

  <tbody>
<?php foreach ($results as $row): ?>
  <tr>
          <td><?php echo $row['name'];?></td>
          <td><?php echo $row['continent'];?></td>
          <td><?php echo $row['independence_year'];?></td>
          <td><?php echo $row['head_of_state'];?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
</table>

<?php elseif ($getcoun && isset($_GET['context'])):?>
  <table>
    <tr> 
      <th> Name</th>
      <th> District</th>
      <th> population </th>
 </tr>
<tbody>
  <?php foreach ($results as $row): ?>
    <tr>
      <td> <?php echo $row ['name'];?></td>
      <td><?php echo $row ['district']; ?></td>
      <td><?php echo $row['population'];?></td>
    </tr>
    <?php endforeach; ?>
            </tbody>
        </table>
        <?php endif; ?>