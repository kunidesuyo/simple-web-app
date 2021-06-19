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

## 詳しく分かってないこと
- docker-composeの記法、書き方