<?php

$indice_id = $_GET['id'];
$table_job = $_GET['table'];

echo $table_job;

$table_job_split = explode(",", $table_job);

$data = [];

$data['job_tittle'] = $table_job_split[0];
$data['job_description'] = $table_job_split[1];
$data['job_profil'] = $table_job_split[2];
$data['job_contract'] = $table_job_split[3];
$data['job_salary'] = $table_job_split[4];
$data['job_experience'] = $table_job_split[5];
$data['job_qualification'] = $table_job_split[6];
$data['job_city'] = $table_job_split[7];

$host = "localhost";
$username = "root";
$password = "";
$db = "new_energie_concept";
$value = 0;

$conn = new mysqli($host,$username, $password,$db) ;

$sql_req = 'DELETE FROM `poste` WHERE `poste`.`poste_id` = "'. $indice_id .'" ';

$res = $conn->multi_query($sql_req);

$sql_req = 'INSERT INTO `poste` (`poste_id`, `titre`, `descriptif_poste`, 
                                 `profil_recherche`, `type_contrat`, `salaire`, 
                                 `experience_exigee`, `qualification`, `city`) 
            VALUES ("'.$indice_id.'", "'.$data['job_tittle'].'", "'.$data['job_description'].'",
                    "'.$data['job_profil'].'", "'.$data['job_contract'].'", "'.$data['job_salary'].'",
                    "'.$data['job_experience'].'", "'.$data['job_qualification'].'","'.$data['job_city'].'");';

$res = $conn->multi_query($sql_req);

header("Location: http://localhost/site-vitrine-nec-ingenierie.fr/formulaire_rejoignez-nous.php");
exit();