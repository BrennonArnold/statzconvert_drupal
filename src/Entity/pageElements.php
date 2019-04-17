<?php


namespace Drupal\statzconvert\Entity;


class pageElements
{
    public $pageCode;
    public $userAuth;
    public $userName;
    public $userFLName;
    public $navBar;
    public $msgBlock;
    public $errmsg;

    public function __construct()
    {
        $argv = func_get_args();
        switch (func_num_args()) {
            case 0:
                self::__construct0();
                break;
            case 1:
                self::__construct1($argv[0]);
                break;
            case 2:
                self::__construct2($argv[0], $argv[1]);
                break;
            case 2:
                self::__construct3($argv[0], $argv[1], $argv[2]);
                break;
        }
    }

    public function __construct0() {

    }

    public function __construct1($inPage) {
        $inc = new includes();
        $this->pageCode = $inPage;
        $this->userAuth = "SUPERADMIN";
//        $this->userAuth = "NOACCESS";
//        $this->navBar = $this->genNavBar();
        //$this->msgBlock = $this->genMsgBlock();
    }

    public function __construct2($inPage, $inUserID) {
        $inc = new includes();
        $this->pageCode = $inPage;
        $myUser = new adminUser($inUserID, $inc::_DB_MSTR_FILE);
        $this->userName = $myUser->username;
        $this->userFLName = $myUser->firstname." ".$myUser->lastname;
        $this->userAuth = $myUser->authlevel;
        $this->navBar = $this->genNavBar();
        //$this->msgBlock = $this->genMsgBlock();
    }

    public function __construct3($inPage, $inUserID, $inAuthLevel) {
        //$inc = new includes();
        //$this->pageCode = $inPage;
        //$this->userAuth = $inAuthLevel;
        //$this->navBar = $this->genNavBar();
    }

    public function genNavBar() {
        $inc = new includes();
        $rtnString = "";
        $lnkActInd_home = "";
        $lnkActInd_scxml = "";
        $lnkActInd_admin = "";
        $lnkActInd_files = "";
        $lnkActInd_wscsv = "";

        switch ($this->pageCode) {
            case $inc::_PG_ADMIN_USERS:
                $lnkActInd_admin = " class=\"active\"";
                break;
            case $inc::_PG_HOMEPAGE:
                $lnkActInd_home = " class=\"active\"";
                break;
            case $inc::_PG_FILE_LIST:
                $lnkActInd_files = " class=\"active\"";
                break;
            case $inc::_PG_SC_XML_UTILS:
                $lnkActInd_scxml = " class=\"active\"";
                break;
            case $inc::_PG_SC_FILE_PROC:
                $lnkActInd_scxml = " class=\"active\"";
                break;
            case $inc::_PG_WS_CSV_UTILS:
                $lnkActInd_wscsv = " class=\"active\"";
                break;
            case $inc::_PG_WS_FILE_PROC:
                $lnkActInd_wscsv = " class=\"active\"";
                break;
            case $inc::_PG_USER_PROFILE:
                $lnkActInd_user = " active";
                break;
            default:
                break;
        }

        $rtnString.="<ul class=\"nav navbar-nav\">";
        $rtnString.="<li".$lnkActInd_home."><a href='/statzconvert/'>Home</a></li>";
        if ($this->userAuth == $inc::_USER_AUTH_SUPERADMIN || $this->userAuth == $inc::_USER_AUTH_ADMIN) {
            $rtnString.="<li".$lnkActInd_scxml."><a href='/statzconvert/scxmlutils'>StatCrew XML</a></li>";
            $rtnString.="<li".$lnkActInd_wscsv."><a href='/statzconvert/wscsvutils'>Website CSV</a></li>";
        }
        $rtnString.="<li".$lnkActInd_files."><a href='/statzconvert/filelisting'>Converted Files</a></li>";
        if ($this->userAuth == $inc::_USER_AUTH_SUPERADMIN) {
            $rtnString.="<li".$lnkActInd_admin."><a href='/statzconvert/adminusers'>Admin Users</a></li>";
        }
        $rtnString.="</ul>";

        return $rtnString;

    }

}