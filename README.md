# simple-web-app
[参考サイト](https://note.com/yuki_biwako/n/ncd1ec34c4d5a)  
## 第一章概要
1. Dockerのインストールと動作確認
2. Laravel環境構築
    2-1. Nginxで静的コンテンツ配信サーバを立ち上げる
    2-2. 2-1で立てたNginxでPHPが動作するようにする
    2-3. MySQLを立ち上げる
    2-4. Laravelをインストールする
    2-5. インストールしたLaravelを2-3で立ち上げたMySQLと接続する
3. Git連携
4. デプロイ（本番環境へ公開）

### Dockerインストール
省略

### Laravel環境構築
1. Nginxで静的コンテンツ配信サーバを立ち上げる  
docker-compose.ymlにpullするdocker imageを記述。  
ポートの接続、フォルダ・ファイルのマウントを設定。
2. NginxでPHPが動作するようにする  
Nginx上でPHPを動作させるにはPHP-FPM(FaseCGI Process Manager)を使う(?)
[詳しく書いてあるサイト](https://qiita.com/kotarella1110/items/634f6fafeb33ae0f51dc)  
3. MySQLを立ち上げる  
4. Laravelをインストール  
php-fpmコンテナをDockerfileで作成するように変更  
フォルダの権限でエラーが出たので以下のコマンドをコンテナで実行  
`chmod 777 ./storage/logs`  
`chmod 777 ./storage/framework/sessions`  
`chmod 777 ./storage/framework/views`  

### Git連携

### herokuにデプロイ
- Deployment method  
    - Heroku Git (Use Heroku CLI)  
`$ heroku login`  
`$ heroku git:clone -a simple-web-app-laravel`  
`$ cd simple-web-app-laravel`  
`$ git add .`  
`$ git commit -am "make it better"`  
`$ git push heroku master`  
    - masterブランチではなくmainブランチに変更  
`git checkout -b main`  
`git branch -D master`  
`git push heroku main`  
Procfile作成  

- DB設定
開発環境ではMySQL、本番環境ではPostgreSQL
    - herokuのアドオンにPostgreSQLを作成  
`$ heroku addons:create heroku-postgresql:hobby-dev`    
    - herokuの情報を取得  
`$ heroku config:get DATABASE_URL`    
`$ postgres://qhbxynettwpeys:4d3e36fbf91b57176775c9650f779ad32a6a5f0e623c0083b44e3890417d30fb@ec2-52-4-111-46.compute-1.amazonaws.com:5432/daplbknhkg2us0`    
    - 情報をもとに個別に設定    
`$ heroku config:set DB_CONNECTION=pgsql`  
`$ heroku config:set DB_HOST=ec2-52-4-111-46.compute-1.amazonaws.com`  
`$ heroku config:set DB_DATABASE=daplbknhkg2us0`  
`$ heroku config:set DB_USERNAME=qhbxynettwpeys`  
`$ heroku config:set DB_PASSWORD=4d3e36fbf91b57176775c9650f779ad32a6a5f0e623c0083b44e3890417d30fb`  
    - アプリの情報を設定  
`$ heroku config:set DEBUGBAR_ENABLED=true`  
`$ heroku config:set APP_KEY=base64:szOPr4CoUtDUoE875wMjPuu9ND+dMb22bhRoCCCwCwA=`  

## 第二章
[参考にしたサイト](https://note.com/yuki_biwako/n/n696cb97b64b7)
UserRequest.php
seeder?

## 状況
githubにはdockerfileを含めたリポジトリがある。  
herokugitにはアプリケーションの部分のみ  
とりあえずこのまま進めるが、docker(環境含めて)githubとherokuを連携して、自動deployできたほうがよさそう

## 詳しく分かってないこと
- docker-composeの記法、書き方
- heroku git
- Procfileとは？
- DBのmigrateとは？
- php artisan
