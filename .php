<!DOCTYPE html>
<html xmlns:12="http://www.w3.org/1999/html">
    <head>
        <link rel="stylesheet" href="css/bootstrap.css">
        <style type="text/css">
            .td-error{
                background-color: crimson;
                color: white;
            }
        </style>

    </head>
    <body>
    <table class="table table-bordered">
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Events</th>
        </tr>
            <?php
            $table = "laba3.txt";


            if(file_exists($table) and is_readable($table)) {
                $file = file_get_contents($table);
                // $cell = explode("/", $file);
                $cell = explode("\r\n", $file);
                foreach ($cell as $key) {

                    if(stripos($key,"/")){
                        $minicell = explode("/", $key);
                        if(count($minicell)!=3) {
                            array_splice($minicell, 3, count($minicell), "Error in row!!!! Check it :(");
                        }
                    }
                    else{
                        $minicell = array(" "," ", " ", "Error in row!!!! Check it :(");
                    }

                    ?>

                    <tr>
                        <?
                        for ($j = 0; $j < count($minicell); $j++){
                            if (!preg_match(('/((0[1-9]|[12]\d|3[01]).(0[1-9]|1[012]).(\d{2}))$/'), $minicell[0])) {
                                $minicell[0] = "Format error";
                            }
                            if(!preg_match(('/^(([0,1][0-9])|(2[0-3])):[0-5][0-9]$/'), $minicell[1])){
                                $minicell[1] = "Format error";
                            }
                            if($minicell[$j]=="Error in row!!!! Check it :(" or $minicell[$j]=="Format error"){
                                echo "<td class='td-error'>".$minicell[$j]."</td>";
                            }
                            else {
                                echo "<td>" . $minicell[$j] . "</td>";
                            }
                        } ?>
                    </tr>
                <? }
            }?>

    </table>

    </body>
</html>