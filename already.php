function isMemberExists($username, $email)
{
    $query = "select * FROM registered_users WHERE user_name = ? OR email = ?";
    $paramType = "ss";
    $paramArray = array($username, $email);
    $memberCount = $this->ds->numRows($query, $paramType, $paramArray);
    
    return $memberCount;
}