function insertMemberRecord($username, $displayName, $password, $email)
{
    $passwordHash = md5($password);
    $query = "INSERT INTO registered_users (user_name, display_name, password, email) VALUES (?, ?, ?, ?)";
    $paramType = "ssss";
    $paramArray = array(
        $username,
        $displayName,
        $passwordHash,
        $email
    );
    $insertId = $this->ds->insert($query, $paramType, $paramArray);
    return $insertId;
}