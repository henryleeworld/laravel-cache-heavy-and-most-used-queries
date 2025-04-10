# Laravel 11 快取繁重和最常用查詢

引入 mostafaznv 的 laracache 套件來擴增快取繁重和最常用查詢，資料庫在速度與輸送量方面提供的效能，可能是應用程式整體效能中影響最大的因素。雖然事實上，當今許多資料庫都提供相對較好的效能，但在許多使用案例中，應用程式可能需要更高的效能。憑藉資料庫快取，可以顯著提高輸送量並降低與後端資料庫關聯的資料擷取延遲，從而改善應用程式的整體效能。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/articles/` 來進行文章快取取得。

----

## 畫面截圖
![](https://i.imgur.com/isvVhyX.png)
> 從資料庫中將這些文章取出並放入快取中，可以利用其來改善效能
