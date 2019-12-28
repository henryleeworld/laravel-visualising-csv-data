# Laravel 6 CSV 資料視覺化

使用逗號分隔值（CSV）檔案來大量匯入你的資料，可以使用任何文字編輯器或 Excel 等應用程式來建立 CSV 檔案。Laravel 6 CSV 資料視覺化主要是用的 [QuickAdminPanel](https://quickadminpanel.com) 生成的，除了一些定制代碼，可依需求彈性改造的工具。

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
- 產⽣ Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以登入經由 `/login` 來進行登入，預社的電子郵件和密碼分別為 __admin@admin.com__ 和 __password__ 。

----

## 畫面截圖
![](https://i.imgur.com/dFQ7QQA.png)
> CSV 檔案必須與目標資料集的架構相符

![](https://i.imgur.com/QYvPyZ0.png)
> 指定資料欄位對應資料庫欄位

![](https://i.imgur.com/BbFrhJT.png)
> 可以匯入至 1048576 列和 16384 欄

![](https://i.imgur.com/jjszDkQ.png)
> 折線圖用直線段將各數據點連接起來而組成的圖形，以折線方式顯示數據的變化趨勢

----

## 檔案範例
[匯入資料範例](https://srv-file9.gofile.io/download/YJsc2o/Sample.csv)
