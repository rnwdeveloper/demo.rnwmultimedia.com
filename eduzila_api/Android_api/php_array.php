<?php
$arr = array(
        array(
            'ID' => '1617',
            'Date' => '2020-01-10',
            'Diff' => -2,
            'matchedKeys' => array
                (
                    'Location' => 'cf004913',
                    'Serial_Number' => '19m047304r',
                )

        ),
        
        array(
            'ID' => '1618',
            'Date' => '2020-01-10',
            'Diff' => 4,
            'matchedKeys' => array
                (
                    'Location' => 'cf004913',
                    'PatientName' => 'mccauley bruce',
                    'Serial_Number' => '19m047304r',
                    'test_number' => '19m047304r',
                   
                )

        ),
        
        
        array(
            'ID' => '1619',
            'Date' => '2020-01-10',
            'Diff' => 15,
            'matchedKeys' => array
                (
                    'Location' => 'cf004913',
                    'PatientName' => 'mccauley bruce',
                     'Serial_Number' => '19m047304r',
                )

        ),
        
         array(
            'ID' => '1619',
            'Date' => '2020-01-10',
            'Diff' => 10,
            'matchedKeys' => array
                (
                    'Location' => 'cf004913',
                    'PatientName' => 'mccauley bruce',
                    'Serial_Number' => '19m047304r',
                    'test_number1' => '19m047304r',
                    'test_number1' => '19m047304r',
                )

        )
        );

$min= $arr[0]['Diff'];

$n = count($arr);  
   
   for ($i = 0; $i < $n; $i++) 
   { 
       if ( $arr[$i]['Diff'] < $min ) 
          $min = $arr[$i]['Diff']; 
   }
  $total_key1=0;
$position=0;

for ($i = 0; $i < $n; $i++) 
   { 
       if ( $arr[$i]['Diff'] ==  $min ) 
       {
            //print_r( $arr[$i]['matchedKeys']);
                 $total_key= count($arr[$i]['matchedKeys']);
        
            if($total_key > $total_key1)
            {
                $total_key1=$total_key;
                $position=$i;

            } 
         }
         
    }

echo "The answer is ".$position;







?>