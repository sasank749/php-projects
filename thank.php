<?php
namespace Phppot;

use \Phppot\Member;
if (! empty($_POST["register-user"])) {
    
    $username = filter_var($_POST["userName"], FILTER_SANITIZE_STRING);
    $displayName = filter_var($_POST["firstName"], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["userEmail"], FILTER_SANITIZE_STRING);
    require_once ("Member.php");
    /* Form Required Field Validation */
    $member = new Member();
    $errorMessage = $member->validateMember($username, $displayName, $password, $email);
    
    if (empty($errorMessage)) {
        $memberCount = $member->isMemberExists($username, $email);
        
        if ($memberCount == 0) {
            $insertId = $member->insertMemberRecord($username, $displayName, $password, $email);
            if (! empty($insertId)) {
                header("Location: thankyou.php");
            }
        } else {
            $errorMessage[] = "User already exists.";
        }
    }
}
?>