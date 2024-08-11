### フロントエンドはVue.jsかNuxt.jsにリプレース予定

### docker環境のリポジトリ

https://github.com/Hashimoto-Noriaki/laravel-docker-setting

### その他詳細はWikiに記載

https://github.com/Hashimoto-Noriaki/laravel-vue.js-chatwork-app/wiki

### docker構築
```
docker compose build
 ```
 ### docker起動
 ```
docker compose up -d
 ```

 ### ブラウザ起動確認
 ```
 http://localhost:8080/
 ```
### php adminer

 ### コンテナ起動
 ```
 docker exec -it laravel_app bash

 root@258dcd5a3d42:/var/www/html#
 ```

### インフラ環境、デプロイ環境GCP
クラウド
- CloudRun
- CloudRunJobs
- CloudBuild
- ArtifactRegistry

### なぜこの構成か
月10円とかで運用できて、経費削減できるため

### Cloud Run
アプリのデプロイ先 (Dockerイメージを元に実行)

### CloudRunJobs
バッチ処理用のアプリをデプロイして定期実行するもの(Dockerイメージを元に実行)

### ArtifactRegistry
Dockerのコンテナイメージの保管先 (このイメージを元にCloudRunやCloudRunJobsにデプロイする)

### CloudBuild
自動デプロイ (Githubのmainにマージしたら自動でイメージを作ってArtifactRegistryに保管してくれて、その後CloudRunやCloudRunJobsに自動でデプロイしてくれる)

### ダミーで作ったあリポジトリ

https://github.com/Hashimoto-Noriaki/laravel-vue.js-chatwork-mock
