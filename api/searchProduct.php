<?php
    if (isset($_REQUEST['search'])) {
        include '../php/db.php';
        function levenshtein_distance($s,$t) {
            $m = strlen($s);
            $n = strlen($t);
            for($i=0;$i<=$m;$i++) $d[$i][0] = $i;
            for($j=0;$j<=$n;$j++) $d[0][$j] = $j;
            for($i=1;$i<=$m;$i++) {
                for($j=1;$j<=$n;$j++) {
                    $c = ($s[$i-1] == $t[$j-1])?0:1;
                    $d[$i][$j] = min($d[$i-1][$j]+1,$d[$i][$j-1]+1,$d[$i-1][$j-1]+$c);
                }
            }
        return $d[$m][$n];
        }
        function extract_words($text) {
            $text = trim( preg_replace( array( '/\s{2,}/', '/[\t\n]/' ), ' ', $text ) );
            return preg_split("/[^\w]*([\s]+[^\w]*|$)/", $text, -1, PREG_SPLIT_NO_EMPTY);;
        }
        function search_dis($query, $text, $minlev=4) {
            $words = extract_words($text);
            $diss = 0;
            foreach($words as $word){
                $lev = levenshtein_distance($query, $word);  
                if($lev < $minlev){
                    $diss++;
                }
            }
            return $diss;
        }
        $search_word = trim($_REQUEST['search']);
        $query = mysqli_query($conn,"SELECT * FROM product WHERE sold=0");
        $temp = [];
        foreach ($query as $item) {
            $diss = search_dis( $search_word, $item['name']);
            if($diss > 0){
                $temp[] = [
                    'product_id' => $item['id'],
                    'name' => $item['name'],
                    'cost' => $item["cost"],
                    'description' => $item['description'],
                    'img' => $item["img1"],
                    'distance' => $diss
                ];
            }
        }
        usort($temp, function($a, $b) {
        if($a['distance']==$b['distance']) return 0;
        return $a['distance'] > $b['distance']?1:-1;
        });

        if (count($temp)>29) {
        }else{
            foreach ($query as $item) {
                $diss = search_dis( $search_word, $item['description']);
                if($diss > 0){
                    $temp[] = [
                        'product_id' => $item['id'],
                        'name' => $item['name'],
                        'cost' => $item["cost"],
                        'description' => $item['description'],
                        'img' => $item["img1"],
                        'distance' => $diss
                    ];
                }
            }
            usort($temp, function($a, $b) {
            if($a['distance']==$b['distance']) return 0;
            return $a['distance'] > $b['distance']?1:-1;
            });
            
        }
        $data = array();
        $data["ok"] = true;
        $data["message"] = "success";
        $i = 0;
        foreach ($temp as $key => $value) {
            $data["result"][] = $value;
            $i++;
            if ($i == 30) {
                break;
            }
        }
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_SLASHES);
    }else{
        $data = array();
        $data["ok"] = false;
        $data["message"] = "search not found";
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_SLASHES);
    }
        
?>