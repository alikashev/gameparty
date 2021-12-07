<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/tablestyle.css">
</head>
<body>
    
<?php

class OutputData {

    function __construct() {
    }

    function createForm() {
        //todo
    }

    function createSelectBox() {
        //todo
        
    }

    function createTable($rows) {
        $html = '<table class="tablerow" border="2">';
        $html .= "<a class='add-btn' href='./View/addsong.php'>Add song</a>";
            $html .= '<tr>';
            	foreach($rows[0] as $key => $value){
            		$html .= "<th>" . $key . "</th>";
            	}
            $html .= "</tr>";
            	foreach($rows as $row){
            		$html .= '<tr>';
            			foreach($row as $columns) {
            				$html .= "<td>" . $columns . "</td>";
            			}
                        $html .= "<td><a id=\"Button-td\" href=\"index.php?action=readone&id=".$row["id"]."\">Read</a></td>";
                        $html .= "<td><a id=\"Button-td\" href=\"index.php?action=delete&id=".$row["id"]."\">Delete</a></td>";
                        $html .= "<td><a id=\"Button-td\" href=\"index.php?action=update&id=".$row["id"]."\">Update</a></td>";
            		$html .= '</tr>';
            	}
        $html .= '</table>';

        return $html;
    }


    function __destruct() {
        //todo
    }
}

?>
    
</body>
</html>