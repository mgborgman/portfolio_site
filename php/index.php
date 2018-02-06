<html>
    <body>
        <h1>This should output</h1>
        <?php
            $range = [];
            function create_range($number) {
                foreach(range(1, $number, 1) as $item) {
                    $range[] = $item;
                }
                return $range;
            }

            
            


        ?>
    </body>
</html>