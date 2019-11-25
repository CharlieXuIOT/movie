<?php


class Token
{
    /**
     * 每次登入時，將一個hash過的值寫入DB的token欄位
     */
    function setToken($account)
    {
        $hash_account = password_hash($account, PASSWORD_DEFAULT);
        $query = 'UPDATE `member` SET `token` = ? WHERE `account` = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $hash_account, $account);
        return $stmt->execute();
    }

    /**
     * 執行會影響到DB資料的行為時，拿前端的token和後端做比對
     */
}