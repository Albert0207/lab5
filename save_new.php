<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<html>
    <body>
		<?
			if(isset($_POST['index'])){
                $index = htmlentities(mysqli_real_escape_string($link, $_POST['index']));
                switch($index){
                    case "item":
                        if((isset($_POST['name']))&&(isset($_POST['teacher']))&&(isset($_POST['faculty']))&&(isset($_POST['count_lecture']))&&(isset($_POST['count_lab']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $teacher = htmlentities(mysqli_real_escape_string($link, $_POST['teacher']));
                            $faculty = htmlentities(mysqli_real_escape_string($link, $_POST['faculty']));
                            $count_lecture = htmlentities(mysqli_real_escape_string($link, $_POST['count_lecture']));
                            $count_lab = htmlentities(mysqli_real_escape_string($link, $_POST['count_lab']));
                            if((strlen($name)==0)||(strlen($teacher)==0)||(strlen($faculty)==0)||(strlen($count_lecture)==0)||(strlen($count_lab)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "INSERT INTO $database.$index (id, name, teacher, faculty, count_lecture, count_lab) VALUES (NULL, '$name', '$teacher', '$faculty', '$count_lecture', '$count_lab')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "group":
                        if((isset($_POST['name']))&&(isset($_POST['faculty']))){
                            $name = htmlentities(mysqli_real_escape_string($link, $_POST['name']));
                            $faculty = htmlentities(mysqli_real_escape_string($link, $_POST['faculty']));
                            if((strlen($name)==0)||(strlen($faculty)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "INSERT INTO $database.$index (id, name, faculty) VALUES (NULL, '$name', '$faculty')";
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                    case "exam":
                        if((isset($_POST['item_select']))&&(isset($_POST['group_select']))&&(isset($_POST['date_c']))&&(isset($_POST['date_e']))&&(isset($_POST['audit']))){
                            $item_select= htmlentities(mysqli_real_escape_string($link, $_POST['item_select']));
                            $group_select = htmlentities(mysqli_real_escape_string($link, $_POST['group_select']));
                            $date_c = htmlentities(mysqli_real_escape_string($link, $_POST['date_c']));
                            $date_e = htmlentities(mysqli_real_escape_string($link, $_POST['date_e']));
                            $audit = htmlentities(mysqli_real_escape_string($link, $_POST['audit']));
                            if(($item_select=="")||($group_select=="")||(strlen($audit)==0)){
                                die("Ошибка значения пусты");
                            }
                            $query = "INSERT INTO `exam` (`id`, `ex_group`, `item`, `date_c`, `date_e`, `audit`) VALUES ('', '$group_select', '$item_select', '$date_c', '$date_e', '$audit')";
                            //$query = "INSERT INTO $database.$index (id, ex_group, item, date_c, date_e, audit) VALUES (NULL, '$group_select', '$item_select', '$date_c', '$date_e', '$audit')";
                            //echo $query;
                            mysqli_query($link, $query) or die("Не могу выполнить запрос!");
                            if(mysqli_affected_rows($link)>0){
                                echo("<p>Thanks! You added $index.");
                                echo "<p><a href=\"index.php\"> Return</a>"; 
                            } else { 
                                echo("Saving error. <a href=\"index.php\"> Return</a>");
                            }
                        }
                    break;
                }
			}
		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>