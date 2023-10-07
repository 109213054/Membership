# Membership
會員管理系統
假設有一網站(無須設計該網站)供使用者加入會員，請設計一個會員管理功能，提供以下會員服務:

1.申請加入會員，提供個人及通訊資料，並依網站性質設計兩個會員必填屬性，藉此了解會員偏好。

2.每位會員設定一組帳密，帳號不能與目前其他會員相同。

3.會員使用帳密登入後，可瀏覽並可修改個人資料，包括密碼。

4.會員使用帳密登入後，變更密碼時，應先輸入舊密碼，新密碼也必須輸入兩次，確定舊密碼正確，且兩次輸入的新密碼是相同時，方可修改密碼。

5.會員使用帳密登入後，才可瀏覽/修改個人資料/變更密碼，因此這些網頁必須進行存取控制保護，(請使用session記錄會員登入是否成功以及會員帳號)，以防非會員及其他會員修改資料。

6.依資安原則，密碼不應以明碼儲存於資料庫，請依以下建議撰寫相關程式
    
(1)使用者初次設定或變更密碼時，將密碼以password_hash()函數產生雜湊值(60個字元)
       
    $pwdHash=password_hash("yourPassord", PASSWORD_DEFAULT);
    
    將雜湊值$pwdHash儲存於資料庫的資料表中。
    
(2)會員使用帳密登入時，使用password_verify()進行驗證，假設儲存於資料表中的雜湊值存於$pwdHash

    password_verify('yourPassord', $pwdHash)驗證成功時會傳回true,失敗會傳回false。

    password_hash()可參考https://www.php.net/manual/en/function.password-hash.php
    
    password_verify()可參考https://www.php.net/manual/en/function.password-verify.php
 
(3)作業完成後，請匯出資料表至一個sql檔案，並撰寫一個readme.txt檔案，讓助教了解如何在MySQL資料庫建立相同之資料庫用戶帳號密碼以及同名之資料庫，以利作業批改。

請於readme.txt中提供暑假期間聯絡資訊，以利批改作業發生問題時聯絡。
