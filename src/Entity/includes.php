<?php


namespace Drupal\statzconvert\Entity;


class includes
{
    //Exclude DB Actions
    public const _DO_DB_ACTIONS = true;

    //User Admin Auth Levels
    public const _USER_AUTH_SUPERADMIN = "SUPERADMIN";
    public const _USER_AUTH_ADMIN = "ADMIN";
    public const _USER_AUTH_SYSUSER = "SYSUSER";
    public const _USER_AUTH_NOACCESS = "NOACCESS";

    //Site Pages
    public const _PG_ADMIN_USERS = "ADMINUSERS";
    public const _PG_HOMEPAGE = "HOMEPAGE";
    public const _PG_FILE_LIST = "FILELIST";
    public const _PG_LOGIN = "LOGIN";
    public const _PG_LOGOUT = "LOGOUT";
    public const _PG_SC_FILE_PROC = "SCFILEPROC";
    public const _PG_SC_XML_UTILS = "SCXMLUTILS";
    public const _PG_SITE_TEMPLATE = "SITETEMPLATE";
    public const _PG_WS_CSV_UTILS = "WSCSVUTILS";
    public const _PG_WS_FILE_PROC = "WSFILEPROC";
    public const _PG_USER_PROFILE = "USERPROFILE";

    //Master Database File
    public const _DB_MSTR_FOLDER = "inputDBs/";
    public const _DB_MSTR_FILE = self::_DB_MSTR_FOLDER."CollegeBaseball_FSN_Blank.mdb";
    public const _DB_SYSTEM_FILE = self::_DB_MSTR_FOLDER."system_db.mdb";

//Analytics Roster CSV Array Indexes
    public const _ANA_CSV_UNI = 0;
    public const _ANA_CSV_FNAME = 1;
    public const _ANA_CSV_LNAME = 2;
    public const _ANA_CSV_THROWLR = 3;
    public const _ANA_CSV_BATLR = 4;
    public const _ANA_CSV_POSITION = 5;

//Roster CSV Indexes
    public const _ROS_CSV_UNI = 0;
    public const _ROS_CSV_NAME = 1;
    public const _ROS_CSV_HEIGHT = 2;
    public const _ROS_CSV_WEIGHT = 3;
    public const _ROS_CSV_CLASS = 4;
    public const _ROS_CSV_EXP = 5;
    public const _ROS_CSV_POSITION = 6;
    public const _ROS_CSV_BT = 7;
    public const _ROS_CSV_HOME = 8;
    public const _ROS_CSV_HS = 9;
    public const _ROS_CSV_PREV = 10;

//Hitting/Fielding Stats CSV Array Indexes
    public const _HFSTAT_CSV_UNI = 0;
    public const _HFSTAT_CSV_NAME = 1;
    public const _HFSTAT_CSV_AVG = 2;
    public const _HFSTAT_CSV_GPGS = 3;
    public const _HFSTAT_CSV_AB = 4;
    public const _HFSTAT_CSV_R = 5;
    public const _HFSTAT_CSV_H = 6;
    public const _HFSTAT_CSV_2B = 7;
    public const _HFSTAT_CSV_3B = 8;
    public const _HFSTAT_CSV_HR = 9;
    public const _HFSTAT_CSV_RBI = 10;
    public const _HFSTAT_CSV_TB = 11;
    public const _HFSTAT_CSV_SLG = 12;
    public const _HFSTAT_CSV_BB = 13;
    public const _HFSTAT_CSV_IBB = 14;
    public const _HFSTAT_CSV_HBP = 15;
    public const _HFSTAT_CSV_SO = 16;
    public const _HFSTAT_CSV_GDP = 17;
    public const _HFSTAT_CSV_OBPCT = 18;
    public const _HFSTAT_CSV_SF = 19;
    public const _HFSTAT_CSV_SH = 20;
    public const _HFSTAT_CSV_SBATT = 21;
    public const _HFSTAT_CSV_PO = 22;
    public const _HFSTAT_CSV_A = 23;
    public const _HFSTAT_CSV_E = 24;
    public const _HFSTAT_CSV_FLDPCT = 25;

//Pitching Stats CSV Array Indexes
    public const _PSTAT_CSV_UNI = 0;
    public const _PSTAT_CSV_NAME = 1;
    public const _PSTAT_CSV_ERA = 2;
    public const _PSTAT_CSV_WL = 3;
    public const _PSTAT_CSV_APP = 4;
    public const _PSTAT_CSV_GS = 5;
    public const _PSTAT_CSV_CG = 6;
    public const _PSTAT_CSV_SHO = 7;
    public const _PSTAT_CSV_SV = 8;
    public const _PSTAT_CSV_IP = 9;
    public const _PSTAT_CSV_H = 10;
    public const _PSTAT_CSV_R = 11;
    public const _PSTAT_CSV_ER = 12;
    public const _PSTAT_CSV_BB = 13;
    public const _PSTAT_CSV_IBB = 14;
    public const _PSTAT_CSV_SO = 15;
    public const _PSTAT_CSV_2B = 16;
    public const _PSTAT_CSV_3B = 17;
    public const _PSTAT_CSV_HR = 18;
    public const _PSTAT_CSV_AB = 19;
    public const _PSTAT_CSV_BAVG = 20;
    public const _PSTAT_CSV_WP = 21;
    public const _PSTAT_CSV_HBP = 22;
    public const _PSTAT_CSV_BK = 23;
    public const _PSTAT_CSV_SFA = 24;
    public const _PSTAT_CSV_SHA = 25;
    public const _PSTAT_CSV_GIDP = 26;

    function getUniNum($inNum)
    {
        $inNum = trim($inNum);

        if ($inNum == "00") {
            return $inNum;
        } else {
            return ltrim($inNum, "0");
        }
    }

    function getNewID($inVal)
    {
        switch($inVal) {
            case "GAME":
                $count = (int)file_get_contents('GameSeq.txt');
                $count+=1;
                file_put_contents('GameSeq.txt', $count);
                break;
            case "TEAM":
                $count = (int)file_get_contents('TeamSeq.txt');
                $count+=1;
                file_put_contents('TeamSeq.txt', $count);
                break;
            case "PLAYER":
                $count = (int)file_get_contents('PlayerSeq.txt');
                $count+=1;
                file_put_contents('PlayerSeq.txt', $count);
                break;
            case "LEAGUE":
                $count = (int)file_get_contents('LeagueSeq.txt');
                $count+=1;
                file_put_contents('LeagueSeq.txt', $count);
                break;
            case "USER":
                $count = (int)file_get_contents('UserSeq.txt');
                $count+=1;
                file_put_contents('UserSeq.txt', $count);
                break;
        }

        return $count;
    }

    function convNumtoWord($y)
    {
        switch($y) {
            case "1":
                return "one";
                break;
            case "2":
                return "two";
                break;
            case "3":;
                return  "three";
                break;
            case "4":
                return  "four";
                break;
            case "5":
                return  "five";
                break;
            case "6":
                return  "six";
                break;
            case "7":
                return  "seven";
                break;
            case "8":
                return  "eight";
                break;
            case "9":
                return  "nine";
                break;
            case "10":
                return  "ten";
                break;
            default:
                return "bogus";
        }
    }

    function determNameFormat($strname)
    {
        if (count(explode(" ", $strname)) <= 1) {
            return "LASTONLY";
        } elseif (strpos($strname, ",") !== false) {
            if (strpos($strname, ".") !== false) {
                return "LAST,F.";
            } else {
                return "LAST,FIRST";
            }
        } elseif (strpos($strname, ".") !== false) {
            return "F.LAST";
        } else {
            return "FIRSTLAST";
        }
    }

    function trxFileLine($arrTrxLine)
    {
        $strreturn = str_pad($arrTrxLine[0], 12)."@".str_pad($arrTrxLine[1], 2)."@00@Y@".str_pad($arrTrxLine[2], 20)."@        @     @     @                                        @\n";
        return $strreturn;
    }

    function txtFileLine($arrTxtLine)
    {
        $strreturn = str_pad($arrTxtLine[0], 3, " ", STR_PAD_LEFT)." ".str_pad($arrTxtLine[1], 25).str_pad($arrTxtLine[2], 4, " ", STR_PAD_LEFT).str_pad($arrTxtLine[3], 4, " ", STR_PAD_LEFT);
        $strreturn .= str_pad($arrTxtLine[4], 3, " ", STR_PAD_LEFT).str_pad($arrTxtLine[5], 3, " ", STR_PAD_LEFT).str_pad($arrTxtLine[6], 3, " ", STR_PAD_LEFT);
        $strreturn .= str_pad($arrTxtLine[7], 3, " ", STR_PAD_LEFT).str_pad($arrTxtLine[8], 3, " ", STR_PAD_LEFT)."\n";
        return $strreturn;
    }

    function txtAnalFileLine($arrAnalLine)
    {
        $strreturn = $arrAnalLine[0]."\t".$arrAnalLine[1]."\t".$arrAnalLine[2]."\t".$arrAnalLine[3]."\t".$arrAnalLine[4]."\t".$arrAnalLine[5]."\t".$arrAnalLine[6]."\n";
        return $strreturn;
    }

    function formatCheckName($inname)
    {
        if (strpos($inname, ",") !== false) {
            $inname = str_replace(',', ', ', strtolower($inname));
            $strreturn = ucwords($inname);
        } else {
            $inname = strtolower($inname);
            $strreturn = ucwords($inname);
        }
        return $strreturn;
    }

    function formatName($inname, $format)
    {
        if (!empty($inname)) {
            //Determine Format of Name
            if (strpos($inname, ",") !== false) {
                $arrname = explode(",", $inname);
                $rtnplayerfname = $arrname[1];
                $rtnplayerlname = $arrname[0];
            } else {
                $rtnplayername = trim($inname, " ");
                $arrname = explode(" ", $rtnplayername);
                if (count($arrname) > 1) {
                    $rtnplayerfname = $arrname[0];
                    $rtnplayerlname = $arrname[1];
                } else {
                    $rtnplayerfname = "FName";
                    $rtnplayerlname = $arrname[0];
                }
            }
            switch($format) {
                case "LAST":
                    return trim($rtnplayerlname);
                    break;
                case "FIRST":
                    return trim($rtnplayerfname);
                    break;
                case "FIRSTLAST":
                    return trim($rtnplayerfname." ".$rtnplayerlname, " ");
                    break;
                case "LASTFIRST":
                    return trim($rtnplayerlname.", ".$rtnplayerfname, " ");
                    break;
                case "CHECKNAME":
                    return strtoupper(trim($rtnplayerlname).",".trim($rtnplayerfname));
                    break;
                default:
                    return $inname;
                    break;
            }
        } else {
            return $inname;
        }
    }

    function convLRtoLong($inVal)
    {
        if ($inVal == "L") {
            return "Left";
        } elseif ($inVal == "R") {
            return "Right";
        } elseif ($inVal == "B") {
            return "Switch";
        } elseif ($inVal == "S") {
            return "Switch";
        } else {
            return $inVal;
        }
    }

    function convLRtoDB($inVal)
    {
        $strReturn = "";

        switch (strtoupper($inVal)) {
            case "L":
                $strReturn = "1";
                break;
            case "LEFT":
                $strReturn =  "1";
                break;
            case "R":
                $strReturn =  "2";
                break;
            case "RIGHT":
                $strReturn =  "2";
                break;
            case "S":
                $strReturn =  "3";
                break;
            case "SWITCH":
                $strReturn =  "3";
                break;
            case "B":
                $strReturn =  "3";
                break;
            case "BOTH":
                $strReturn = "3";
                break;
            default:
                $strReturn = $inVal;
                break;
        }

        return $strReturn;
    }

    function convPostoNum($inVal)
    {
        $strReturn = "";

        switch ($this->conv_pos(strtoupper($inVal))) {
            case "P":
                $strReturn = "1";
                break;
            case "C":
                $strReturn = "2";
                break;
            case "1B":
                $strReturn = "3";
                break;
            case "2B":
                $strReturn = "4";
                break;
            case "3B":
                $strReturn = "5";
                break;
            case "SS":
                $strReturn = "6";
                break;
            case "LF":
                $strReturn = "7";
                break;
            case "CF":
                $strReturn = "8";
                break;
            case "RF":
                $strReturn = "9";
                break;
            default:
                $strReturn = "";
                break;
        }

        return $strReturn;
    }

    function get_row($csv, $row)
    {
        $handle = fopen("$csv", 'r');
        $counter = 0;
        $result = '';
        while (($data = fgetcsv($handle)) !== FALSE) {
            $counter++;
            if ($row == $counter) {
                return $data;
            }
        }
    }

    function getOverallCSVrowbyVal($csv, $inVal) {
        $wkFile = fopen("$csv", 'r');
        while (($data = fgetcsv($wkFile)) !== false) {
            if ($data[0] == $inVal) {
                return $data;
            }
        }
    }

    function conv_class_toSC($inVal) {
        $class = str_replace("R-", "", $inVal);
        $class = strtoupper(str_replace(".", "", $class));

        return $class;
    }

    function conv_pos_toSC($inVal) {
        $pos = explode("/", $inVal);
        return $pos[0];
    }

    function conv_pos($inVal)
    {
        $pos = explode("/", $inVal);

        switch(trim($pos[0])) {
            case "LHP":
                return "P";
                break;
            case "RHP":
                return "P";
                break;
            case "INF":
                return "SS";
                break;
            case "IF":
                return "SS";
                break;
            case "OF":
                return "CF";
                break;
            case "UTL":
                return "SS";
                break;
            default:
                return $pos[0];
        }
    }

    function echoValLine($inlabel, $inval, $inSpace) {
        $strReturn = "";

        $strReturn.="<b><u>".$inlabel."</u></b> - ".$inval;

        for ($x = 1; $x = intval($inSpace); $x++) {
            $strReturn.="<br>";
        }

        return $strReturn;
    }

    function optionListAuthLevel($selectVal = '') {
        $inc = new includes();

        $strReturn = "";
        if ($selectVal == "") {
            $strReturn .= "<option value='' selected='selected'>Please Select...</option>";
        } else {
            $strReturn .= "<option value=''>Please Select...</option>";
        }

        if ($selectVal == $inc::_USER_AUTH_SUPERADMIN) {
            $strReturn .= "<option value='".$inc::_USER_AUTH_SUPERADMIN."' selected='selected'>Super Admin</option>";
        } else {
            $strReturn .= "<option value='".$inc::_USER_AUTH_SUPERADMIN."'>Super Admin</option>";
        }

        if ($selectVal == $inc::_USER_AUTH_ADMIN) {
            $strReturn .= "<option value='".$inc::_USER_AUTH_ADMIN."' selected='selected'>System Admin</option>";
        } else {
            $strReturn .= "<option value='".$inc::_USER_AUTH_ADMIN."'>Admin</option>";
        }

        if ($selectVal == $inc::_USER_AUTH_SYSUSER) {
            $strReturn .= "<option value='".$inc::_USER_AUTH_SYSUSER."' selected='selected'>System User</option>";
        } else {
            $strReturn .= "<option value='".$inc::_USER_AUTH_SYSUSER."'>System User</option>";
        }

        if ($selectVal == "") {
            $strReturn .= "<option value='".$inc::_USER_AUTH_NOACCESS."' selected='selected'>No Access</option>";
        } else {
            $strReturn .= "<option value='".$inc::_USER_AUTH_NOACCESS."'>No Access</option>";
        }

        return $strReturn;
    }

    function convertheighttoinches ($inval) {
        $rtnval = 0;

        $arrval = explode("-", $inval);
        $rtnval = ($arrval[0] * 12) + intval($arrval[1]);

        return $rtnval;
    }

    function convertheighttolong ($inval) {
        $ftval = 0;
        $inchval = 0;

        $ftval = floor($inval/12);
        $inchval = $inval % 12;

        return $ftval."-".$inchval;
    }

    function csvtoarray($filename = '') {
        if (!file_exists($filename) || !is_readable($filename)) {
            return FALSE;
        }

        $header = NULL;
        $arrreturn = array();

        if (($handle = fopen($filename, 'r')) !== FALSE) {
            while (($row = fgetcsv($handle)) !== FALSE) {
                if (!$header) {
                    $header = $row;
                } else {
                    $arrreturn[] = array_combine($header, $row);
                }
            }
            fclose($handle);
        }
        return $arrreturn;
    }

}