<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/css/gpa.css">
    <title>GPA Calculation</title>
</head>
<body>
    <main>
        <div class="side-bar">
            <div class="usrDetails">
                <div id="profile-picture">
                    <img src="./src/img/Wamz image.jpg" alt="#">
                </div>
                <h2>Student Name</h2>
            </div>
            <section class="upload">
                <h4>Upload Results</h4>
                <p><strong>Note:</strong>
                    <ul>
                        <li>File can either be an excel or csv file. if you are not sure of what to do, please <a href="#"> download a template file</a></li>
                        <br>
                        <li>After you have selected your file, the contents of the file will be displayed on the page, verify before you click on upload because you wont be allowed to re-upload or make changes for security issues unless you contact an <a href="#">administrator</a>.</li>
                        <br>
                        <li><a href="./how_to.html">How GPA is calculated</a></li>
                    </ul>
                </p>
                <br>
                <input type="file">
            </section>
        </div>

        <div class="main-content">
            <h1>Program</h1>
            <?php
                require_once "./src/excelManagement/Classes/PHPExcel.php";
                $path="test1.xlsx";
                $reader= PHPExcel_IOFactory::createReaderForFile($path);
                $excel_Obj = $reader->load($path);

                //Get the last sheet in excel
                //$worksheet=$excel_Obj->getActiveSheet();


                //Get the first sheet in excel
                $worksheet=$excel_Obj->getSheet('0');
                echo $worksheet->getCell('E33')->getValue();
                $lastRow = $worksheet->getHighestRow();
                $colomncount = $worksheet->getHighestDataColumn();
                $colomncount_number=PHPExcel_Cell::columnIndexFromString($colomncount);
                echo $lastRow.'     ';
                echo $colomncount;
                echo "<table border='1'>";
                    for($row=0;$row<=$lastRow;$row++){
                        echo "<tr>";
                        for($col=0;$col<=$colomncount_number;$col++){
                            echo "<td>";
                            echo $worksheet->getCell(PHPExcel_Cell::stringFromColumnIndex($col).$row)->getValue();
                            echo "</td>";
                        }
                        echo "</tr>";
                    }	
                echo "</table>";
            ?>
        </div>
    </main>
</body>
</html>