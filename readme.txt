1. 建立"109213054_陳紫柔"的資料夾在C:\xampp\htdocs\下
(全部檔案交齊後再壓縮繳交作業)
2. 開啟http://localhost/phpmyadmin/
3. 新增使用者root(密碼: ),並產生資料庫hw7
 * 帳號: "使用文字方塊:" root
 * 主機名稱： 選"本機" (localhost)
 * 資料庫勾選"utf8mb4_unicode_ci"
4. 匯入information.sql
5. 執行http://localhost/109213054_陳紫柔/login.html ，開始進行登入操作

檔案說明:

db.php:連結資料庫的檔案

登入:
login.html:登入介面
login.php:執行登入的指令

註冊:
register.html:註冊新會員的介面
register.php:執行註冊的php檔

會員資料:
memberData.php:會員登入後顯示的會員資料php檔
chData.php:按下修改資料按鈕後出現的修改資料介面
changData.php:執行修改資料的php檔
changpw.html:按下修改密碼按鈕後出現的修改密碼介面
changpw.php:執行修改密碼的php檔
