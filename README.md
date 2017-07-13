# Google OAuth テスト

## 環境

初回のみ
```bash
docker build -t google_oauth .
```
起動
```bash
docker run -e APP_ID=xxx -e APP_SECRET=xxx -v `pwd`:/var/www/html/ -p 80:80 -it facebook_oauth
```

## Key

https://console.developers.google.com/  
認証情報→OAuth 2.0 クライアント ID から取得

## 参考ページ  
http://qiita.com/kossacks/items/8d279bcc1acc2c2153ab