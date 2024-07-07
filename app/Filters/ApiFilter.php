<?php

namespace App\Filters;


use illuminate\Http\Request;

class ApiFilter
{
    protected $safeParms = [];

    protected $columnMap = [];

    protected $operatorMap = [];

    public function transform(Request $request)
    {
        $eloQuery = [];


        foreach ($this->safeParms as $parm => $operators) {
            $query = $request->query($parm);
            if (!isset($query)) {
                continue;
            }

            $column = $this->columnMap[$parm] ?? $parm;
            foreach ($operators as $operator) {
                if (isset($query[$operator])) {
                    $Foperator = $query[$operator];
                    if ($this->operatorMap[$operator] == 'like') {
                        $Foperator = "%" . $query[$operator] . "%";
                    }
                    $eloQuery[] = [$column, $this->operatorMap[$operator], $Foperator];
                }
            }
        }


        // dd($column);
        return $eloQuery;
    }
}
