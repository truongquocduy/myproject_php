<?php
    class lotrinh{
        function __construct(){

        }
        function getkhoahoc($massv){
        $db = new connect();
        $select = "select khoahoc.tenkhoahoc,khoahoc.makhoahoc from khoadanghoc,khoahoc where khoadanghoc.makhoahoc = khoahoc.makhoahoc and massv = $massv";
        $result = $db->getList($select);
        return $result;
        }
        function settientrinh($massv,$makhoahoc){
            $db = new connect();
            $select = "select sobaidahoc from khoadanghoc where massv = $massv and makhoahoc = '$makhoahoc'";
            $sobaihientai = $db->getInstance($select);
            $sobaicanup = $sobaihientai[0]+1;
            echo $sobaicanup;
            $update = "update khoadanghoc set sobaidahoc = $sobaicanup where massv = $massv and makhoahoc = '$makhoahoc'";
            $result = $db->getexec($update);
            return $result;
        }
        function gettientrinh($massv,$makhoahoc){
            $db = new connect();
            $select = "select count(noidung) from chitietkhoahoc where makhoahoc = '$makhoahoc'";
            $sobaimax = $db->getInstance($select);
            $sobaimax = $sobaimax[0];


            $select = "select sobaidahoc from khoadanghoc where makhoahoc = '$makhoahoc' and massv = $massv";
            $sobaihientai = $db->getInstance($select);
            $sobaihientai = $sobaihientai[0];

            $result = ($sobaihientai*100)/$sobaimax;
            return $result;
        }
    }

?>