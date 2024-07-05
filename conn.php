<?php
    $sql = "CREATE TABLE IF NOT EXISTS `todo` (
        `task_id` INT(11) NOT NULL AUTO_INCREMENT,
        `task` VARCHAR(150) NOT NULL,
        `status` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`task_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
      $conn->query($sql);
       
    // Проверка наличия записей перед вставкой
$tasks = [
  ['task' => 'Check Errors', 'status' => 'Done'],
  ['task' => 'Need Improvements', 'status' => ''],
  ['task' => 'Check Errors', 'status' => '']
];

foreach ($tasks as $task) {
  $checkSql = "SELECT 1 FROM `todo` WHERE `task` = '" . $conn->real_escape_string($task['task']) . "' LIMIT 1";
  $result = $conn->query($checkSql);

  if ($result->num_rows == 0) {
      $insertSql = "INSERT INTO `todo` (`task`, `status`) VALUES ('" . $conn->real_escape_string($task['task']) . "', '" . $conn->real_escape_string($task['status']) . "')";
      $conn->query($insertSql);
}
}

      // Проверка наличия первичного ключа
$tableInfoQuery = "SHOW KEYS FROM `todo` WHERE Key_name = 'PRIMARY'";
$result = $conn->query($tableInfoQuery);

// Проверка результатов
if ($result->num_rows == 0) {
    // SQL-запрос для добавления первичного ключа
    $sqlAddPrimaryKey = "ALTER TABLE `todo` ADD PRIMARY KEY (`task_id`)";
    $conn->query($sqlAddPrimaryKey);
  }
       
       $sqlAlterTable = "ALTER TABLE `todo` 
                  MODIFY `task_id` INT(11) NOT NULL AUTO_INCREMENT,
                  AUTO_INCREMENT=6";
        $conn->query($sqlAlterTable);
?>