<?php
mysqli_set_charset($con, "utf8");

$link = mysqli_connect("localhost", "root", "");

$sql = 'INSERT INTO cities SET name = "Арзамас"';
if ($link == false){
    print("Ошибка" . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
$result = mysql_query($link,$sql);
if ($result == false) {
	print("Ошибка");
}
else {
	$city_id = mysqli_insert_id($link);

        $sql = 'INSERT INTO weather_log SET city_id = ' . $city_id . ', day = "2017-09-03", temperature = 10, cloud = 1';

        $result = mysqli_query($link, $sql);

        if ($result == false) {
            print("Произошла ошибка при выполнении запроса");
	}
}
$sql = 'SELECT id, name FROM cities';
$result = mysqli_query($link, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC)
while ($row = mysqli_fetch_array($result)) {
    print("Город: " . $row['name'] . "; Идентификатор: . " . $row['id'] . "<br>");
}
?>