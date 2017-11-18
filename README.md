# MinecraftServerList
MinecraftServerList Form Taiwan

創世神伺服器列表
由 阿任 製作&開源

需求：
PHP5.6 (以上無法 最低)
phpMyadmin 4.6.5.2

安裝方法：
每個資料夾內都有 "sql.inc.php" 裡面是設定資料庫的檔案
資料夾 "datebase" 是資料庫，上傳到你的資料庫即可

第一次請先至 http://127.0.0.1/dashboard?c=register 註冊，後到資料庫 "svList_account" 的地方，找到你剛剛註冊的資料 Admin資料表位置改成 '1'
Google小驗證部分請自行輸入 'siteKey' (在 action/_core/裡面有的通通有有Google驗證 不要的話就自己註解掉或是移除)

上面完成後請至 _core/header.php 裡設定 <\!-- #網站資料# --\> 部分 只要有og:開頭都是FB的資料

其他就交給各位自行設定摸索囉~
還有請尊重我，不要將作者介紹跟版權聲明移除QwQ

有任何問題就直接上 issue 吧!
