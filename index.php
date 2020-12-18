<?require_once 'engine/page/title.php';?>
<?require_once 'engine/connection/connectionStart.php';?>
<?require_once 'engine/class/table.php';?>
<html>
    <body>
		<?
            $queryTab = "item";
            $headText = "Таблица предметов";
            $arrayTitle = array("№","Наименование", "Преподаватель", "Факультет", "Количество лекций", "Количество лабораторных", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            echo("</div>");
            
            $queryTab = "group";
            $headText = "Таблица групп";
            $arrayTitle = array("№","Название", "Факультет", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            
            $queryTab = "exam_info";
            $headText = "Таблица расписания экзаменов";
            $arrayTitle = array("№","Группа", "Предметы", "Дата консультации", "Дата экзамена", "Аудитория", "Изменить", "Добавить");
            $query = "SELECT * FROM $database.$queryTab  ORDER BY $database.$queryTab.id ASC";
            $result = mysqli_query($link, $query) or die("Не могу выполнить запрос!");
            echo("<div>");
            $a = new Table($headText, $arrayTitle, $result, $queryTab, true);
            
            echo("<div>");
            echo("<div> <a href='gen_pdf.php'> Показать pdf </a> </div>");
            echo("<div> <a href='gen_xls.php'> Показать xls </a> </div>");
            echo("</div>");

            echo("<div>");
            echo("<div> <a href='new.php?Index="."item"."'> Добавить новый предмет</a> </div>");
            echo("<div> <a href='new.php?Index="."group"."'> Добавить новую группу</a> </div>");
            echo("<div> <a href='new.php?Index="."exam"."'> Добавить расписание экзаменов</a> </div>");
            echo("</div>");

		?>
	</body>
</html>
<?require_once 'engine/connection/connectionEnd.php';?>