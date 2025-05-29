<?php

namespace Modules\Administration\Libraries;



class AdminDbScripts
{


    public static function getlastTransactionsChartData($num_rows)
    {
        $sql = "SELECT                
                SUM(h.total) as 'value',
                 h.orderdate as 'category'
                FROM " . TBL_PAYMENT_HISTORY . " h

                GROUP BY h.orderdate

                ORDER BY h.id DESC 
                LIMIT " . $num_rows;

        return $sql;
    }
}
