<?php
require ('request.php');

echo "<h3>Список лучших городов:</h3>";
echo '<div class="city-list">';

while($row = mysqli_fetch_assoc($citiesList)){
    echo "<p><em>$row[city_name]</em></p>";
}

echo '</div>';