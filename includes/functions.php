<?php
// Copyright 2017 ASYST Technology Solutions. All rights reserved.

function SendMySQLDisplayQuery_v2(
  $inQuery,
  $inPageNo,
  $inMaxRows,
  $inGetPara, 
  $conn = array("host"=>HOST, "db"=>DB, "user"=>USER, "pwd"=>PASS),
  $get_data_type = false,
    $ensure_permission = false
)
{
// $inGetPara contains the get parameter for the inMaxRows and inPageNo

    $rtpostype = array();
    
  if (($inQuery == '') && (strtoupper(substr($inQuery,0,5)) != 'SELECT')) {
    $res_arr[0] = array('Field');
    $res_arr[1] = array('ERROR no available items');
    return $res_arr;
  }
  $inQuery = trim($inQuery, ' ');
  $inQuery = str_replace('  ', ' ', $inQuery);
  
  if ($conn == NULL)
    {
    $conn = array("host"=>HOST, "db"=>DB, "user"=>USER, "pwd"=>PASS);
  }
    
    // connect
    {
        $hostname_conDemo = $conn['host'];
        $database_conDemo = $conn['db'];
        $username_conDemo = $conn['user'];
        $password_conDemo = $conn['pwd'];
        $conDemo = mysql_pconnect($hostname_conDemo, $username_conDemo, $password_conDemo) or trigger_error(mysql_error(),E_USER_ERROR); 
        mysql_select_db($database_conDemo, $conDemo);
    }
    
    
    // ENSURE THE READABILITY
    {
        $inQuery = ensure_read_status_sql($inQuery, $conn);
    }
    // ENSURE THE READABILITY

    
  $lcquery = strtolower($inQuery);
  $qry_parts = explode(' from ', $lcquery);  // spliting the query : [0='SELECT * '] FROM [1='table . . . ']
    
    
  if (($qry_parts[0] == 'select *') || ($qry_parts[0] == 'select distinct *'))
    {
      // parse through the query string to find the first table string
      $table_parts = explode(' ', $qry_parts[1]);
      $firsttable = $table_parts[0];
      
      // get the fields
            {
                
                // build the query
                $query_rsPOS = "DESCRIBE ".$firsttable;

                //$query_rsPOS = "SHOW TYPES FROM ".$firsttable;
                $rsPOS = mysql_query($query_rsPOS, $conDemo) or die(mysql_error());

                $row_rsPOS = mysql_fetch_assoc($rsPOS);
                $totalRows_rsPOSF = mysql_num_rows($rsPOS);

                // extract the fields
                $indx= 0;
                do {
                    $rtposfield[$indx] = $row_rsPOS['Field'];
                    //echo $rtposfield[$indx].'<br>';
                    $indx++;
                } while ($row_rsPOS = mysql_fetch_assoc($rsPOS));
            }
      
      // get the data types
      if ($get_data_type == true)
      {
        $query_data_type = 'SELECT DISTINCT'
                  .' COLUMN_NAME'
                  .', DATA_TYPE'
                .' FROM'
                  .' INFORMATION_SCHEMA.COLUMNS'
                .' WHERE 1'
                  .' AND TABLE_NAME = "'.$firsttable.'"'
                                    .' AND COLUMN_NAME IN ("'.implode('", "', $rtposfield).'")'
        ;
        $rs_data_type = mysql_query($query_data_type, $conDemo) or die(mysql_error());
        $row_data_type = mysql_fetch_assoc($rs_data_type);
        // extract the data types
        $indx= 0;
                $all_data_type = array();
                do {
                    array_push($all_data_type, $row_data_type);
                    
          $rtpostype[$indx] = $row_data_type['DATA_TYPE'];
          $indx++;
                    
        } while ($row_data_type = mysql_fetch_assoc($rs_data_type));
                
                // reorder the data types
                for ($dt=0; $dt<count($all_data_type); $dt++)
                {
                    $value_pos = array_search($all_data_type[$dt]['COLUMN_NAME'], $rtposfield);
                    $rtpostype[$value_pos] = $all_data_type[$dt]['DATA_TYPE'];
                }
                unset($all_data_type);
                
      } else {
        $rtpostype = NULL;
      }
        
  }
    else if ($qry_parts[0] == 'select count(*)')
    {
    
        $rtposfield[0] = 'count(*)';
        $totalRows_rsPOSF = count($rtposfield);
        
  }
    else if (stristr($qry_parts[0], 'select distinct'))
    {
    
    $start = 1;    // the string part to start looking for fields
    $rmv_distinct = explode(' distinct ', $qry_parts[0]);  // remove the distinct string [0]:select [1]:field pairs
    $field_pairs = explode(' ', $rmv_distinct[1]);  // spliting into field pairs: table.field
    for ($i=$start; $i<count($field_pairs); $i++) {
    // notice the counter starts from  1, [0]select, [1]field_part1, [2]field_part2 . . .
      // split each of the field pairs to get the table and the field names
      $field_parts = explode('.', $field_pairs[$i]);  // spliting the fields
      $rtables[$i-1] = $field_parts[0];
      $rtposfield[$i-1] = rtrim($field_parts[1], ',');
    }
    $totalRows_rsPOSF = count($rtposfield);

  }
    else 
    {
    $start = 1;    // the string part to start looking for fields
    $field_pairs = explode(' ', $qry_parts[0]);  // spliting into field pairs: table.field
    
        for ($i=$start; $i<count($field_pairs); $i++)
        {
    // notice the counter starts from  1, [0]select, [1]field_part1, [2]field_part2 . . .
            
      // get the fields
            // skip the proces if the field name is as 
            if (
                $field_pairs[$i] != 'as'
            )
            {
                // split each of the field pairs to get the table and the field names
                $field_parts = explode('.', $field_pairs[$i]);  // spliting the fields
                $rtables[$i-1] = $field_parts[0];
                
                $rtposfield[$i-1] = str_replace(',', '', $field_parts[1]);
                
                //...old_redundant_name AS new_name
                if (
                    $field_pairs[$i+1] == 'as'
                   )
                {
                    // remove the previous field
                    $rtposfield[$i-1] = '';
                    $rpostfield_combine = str_replace(',,', ',', implode(',', $rtposfield));
                    $rtposfield = explode(',', $rpostfield_combine);
                    
                    // then save the field name
                    $rtposfield[$i-1] = rtrim($field_pairs[$i+2], ',');
                }
                
            // DEBUG PLEASE REACTIVATE
                
                if ($get_data_type)
                {
                    // get the data types
                    $query_data_type = 'SELECT'
                            .' INFORMATION_SCHEMA.COLUMNS.COLUMN_NAME'
                            .', INFORMATION_SCHEMA.COLUMNS.DATA_TYPE'
                        .' FROM'
                            .' INFORMATION_SCHEMA.COLUMNS'
                        .' WHERE 1'
                            .' AND INFORMATION_SCHEMA.COLUMNS.TABLE_NAME = "'.$field_parts[0].'"'
                            .' AND INFORMATION_SCHEMA.COLUMNS.COLUMN_NAME = "'.$rtposfield[$i-1].'"'
                    ;
                    //echo $query_data_type.'<br><br>';
                    $rs_data_type = mysql_query($query_data_type, $conDemo) or die(mysql_error());
                    $row_data_type = mysql_fetch_assoc($rs_data_type);

                    // extract the data types
                    $rtpostype[$i-1] = $row_data_type['DATA_TYPE'];
                    $rtpostype[$i-1] = (is_array($rtpostype[$i-1])) ? $rtpostype[$i-1][0] : $rtpostype[$i-1];
                }
                
            //DEBUG PLEASE REACTIVATE */
      
            }
      
    }
        //echo '<hr class="hr_flat" />';
        
        // remove the null fields
            $rpostfield_combine = str_replace(',,', ',', implode(',', $rtposfield));
            $rtposfield = explode(',', $rpostfield_combine);
            $totalRows_rsPOSF = count($rtposfield);

      

  }
    
    $maxRows_rsQst = $inMaxRows;
    $pageNum_rsQst = $inPageNo;
    
    if (isset($_GET['pageNum_'.$inGetPara])) {
        $pageNum_rsQst = $_GET['pageNum_'.$inGetPara];
    }
    if (isset($_POST['pageNum_'.$inGetPara])) {
        $pageNum_rsQst = $_POST['pageNum_'.$inGetPara];
    }
    
    $startRow_rsQst = $pageNum_rsQst * $maxRows_rsQst;
    
        // SELECT THE DB
    mysql_select_db($database_conDemo, $conDemo);

    $query_rsQst = $inQuery;
    $query_limit_rsQst = $inQuery;
        
        // SLAP ON THE LIMITS IF NOT PROVIDED
    if (
            //(
                ($maxRows_rsQst > 0)
                || ($maxRows_rsQst > 0)
            //)
            && (!stristr($inQuery, ' LIMIT '))
        )
        {
      $query_limit_rsQst = sprintf(
                "%s LIMIT %d, %d"
                , $query_rsQst
                , $startRow_rsQst
                , $maxRows_rsQst
            );
    }
        
        
        // RUN THE SQL
    $rsQst = mysql_query($query_limit_rsQst, $conDemo) or die(mysql_error());
        //$rsQst = recSendQuery($query_limit_rsQst, true, $conn);
        
        // GET A ROW
    $row_rsQst = mysql_fetch_assoc($rsQst);
    
    $all_rsQst = mysql_query($query_rsQst, $conDemo) or die(mysql_error());
    $totalRows_rsQst = (is_resource($all_rsQst)) ? mysql_num_rows($all_rsQst) : 0;
        
        // total number of record in the system
    $rtotal = $totalRows_rsQst;
        
        // total number of record as defined by the query
    $r_qry_total = mysql_num_rows($rsQst);

    $totalPages_rsQst = 0;
    if ($maxRows_rsQst > 0)
        {
      $totalPages_rsQst = ceil($totalRows_rsQst/$maxRows_rsQst)-1;
    }
    
  $indx = 0;
  do {
    for ($i=0; $i<count($rtposfield); $i++){
      
            // clean out the field
            $needle = ' as ';
            $haystack = strtolower($rtposfield[$i]);
            //    echo $rtposfield[$i].'<br><br>';
            if (strstr($haystack, $needle))
            {
                $fld_parts = explode($needle, strtolower($rtposfield[$i]));
                // replace the name of the field with the real name
                $rtposfield[$i] = $fld_parts[1];
            }
            
            // the variable
            $rtpos[$rtposfield[$i]][$indx] = $row_rsQst;
      
            // the request was to count, then count
            if ($rtposfield[$i] !== 'count(*)') {
        $rtpos[$rtposfield[$i]][$indx] = $row_rsQst[$rtposfield[$i]];
      }
      //echo $rtpos[$rtposfield[$i]][$indx].'<br>';
            
    }
    $indx++;
  } while($row_rsQst = mysql_fetch_assoc($rsQst));
  
  //total number of record generated in the query used for pagination
  $totalRowsGenerated = count($rtpos[$rtposfield[0]]);
  
    // save the pagination links and text
  $rpag = getPaginationLinks($totalRowsGenerated, $totalPages_rsQst, $inGetPara);
    
    
  $res['fields'] = $rtposfield;
  $res['types'] = $rtpostype;
  $res['items'] = $rtpos;
  $res['pagination'] = $rpag;
  $res['total'] = $rtotal;
    $res['qry_total'] = $r_qry_total;

  mysql_free_result($rsQst);
    
    
    mysql_close($conDemo);
    
    
  return $res;
  
}

function displayPicker_v2($query, 
              $cmpid, 
              $key, 
              $value, 
              $title, 
              $isfirst, 
              $conn = array("host"=>HOST, "db"=>DB, "user"=>USER, "pwd"=>PASS),
              $par_title = '',        // the field to be used for the title
              $opt_name = '',          // the field to be used for option name
        // pagination values // I CANT BELIVE WE DONT HAVE THIS YET
        $inPageNo='',
        $inMaxRows='',
        $return = false
)
{
  $res = '';
    
  if ($isfirst) {
    if (($cmpid == NULL) || ($cmpid == '')) {
      $res .= '<option value="0" selected="selected">'.$title.'</option>';
    } else {
      $res .= '<option value="0">'.$title.'</option>';
    }
  }
    
  $qres = SendMySQLDisplayQuery_v2($query, 0, $inPageNo, $inMaxRows, $conn, false, $ensure_permission);
  
  // split the array
  $rfields = $qres['fields'];
  $ritems = $qres['items'];
  $totalRows_rsPOSF = count($rfields);
  $totalRows_rsPOS = count($ritems[$rfields[0]]);
    if (
        count($ritems[$rfields[0]]) > 0
        && $ritems[$rfields[0]][0] > 0
    )
    {
    for ($indx=0; $indx<$totalRows_rsPOS; $indx++) {
    // compare
      
      //echo $value[0] .' : ' . $ritems[$rfields[$value[0]]][$indx] .'=='. $cmpid;
      //echo $value .' : ' . $ritems[$rfields[$value]][$indx] .'=='. $cmpid;
      
      $sel = '';
      if (is_array($value)) {
        $value_fld = $ritems[$rfields[$value[0]]][$indx];
      } else {
        $value_fld = $ritems[$rfields[$value]][$indx];
      }
      
      if ($value_fld == $cmpid)
      {
        $sel = ' selected="selected"';
      }
      

      if (is_array($key))
      {
        $property_title = $ritems[$rfields[$key[0]]][$indx];
      } else {
        $property_title = $ritems[$rfields[$key]][$indx];
      }
      if ($par_title != NULL)
      {
        $property_title = '';
        if (is_array($par_title))
        {
          foreach($par_title as $seltitlekey => $seltitlevalue)
          {
            $property_title .= $ritems[$rfields[$seltitlevalue]][$indx] . '&emsp;|&emsp;';
          }
          $property_title = trim ($property_title, '&emsp;|&emsp;');
        }
        else
        {
          $property_title = $ritems[$rfields[$par_title]][$indx];
        }
      }
      
      $option_html = ''
        . '<option value="' . $ritems[$rfields[$value]][$indx] . '" title = "' . utf8_encode($property_title) .'" '. $sel . '>'
      ;
      
      if (is_array($key))
      {
        for ($k=0; $k<count($key); $k++)
        {
          if ($k != 0)
          {
            $option_html .= '&emsp;|&emsp;';
          }
          $option_html .= ''
            . utf8_encode( $ritems[$rfields[$key[$k]]][$indx] )
          ;
        }
      }
      else
      {
        $option_html .= ''
            . utf8_encode($ritems[$rfields[$key]][$indx])
        ;
      }
      
      $option_html .= ''
        . '</option>'
      ;
      
      $res .= $option_html;
    }
    }
    
    if ($return)
    {
        return $res;
    }
    else
    {
        echo $res;
    }
}
?>