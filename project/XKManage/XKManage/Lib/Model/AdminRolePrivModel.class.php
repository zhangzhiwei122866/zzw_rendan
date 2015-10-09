<?php
class AdminRolePrivModel extends Model
{

    public function get_priv_one($args)
    {
        $where = "";
        foreach($args as $key => $val)
        {
            $where .= " AND " . $key . "=" . "'$val' ";
        }
        return $this->where("1 $where")->find();
    }
}
