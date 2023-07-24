# シンプルTODOアプリ(API)

## 概要
TODOアプリのAPIサーバー

## 機能
- ユーザー作成
- カテゴリ作成
- カテゴリ削除
- TODO作成
- TODO編集
- TODO削除

## DB

### データベース
todo_app_db

### テーブル
- app_users  
  |カラム名|型|備考|
  |-|-|-|
  |id|Integer|PK|
  |name|String|NOT NULL|
  |password|String|NOT NULL|
- categories
  |カラム名|型|備考|
  |-|-|-|
  |id|Integer|PK|
  |user_id|Integer|FK|
  |category|String|NOT NULL|
- todos
  |カラム名|型|備考|
  |-|-|-|
  |id|Integer|PK|
  |category_id|Integer|FK|
  |todo|Text|NOT NULL|
  |is_completed|Boolean|True:完了<br>False:未完了|

## API
|URL|メソッド|機能|
|-|-|-|
|/categories/create|POST|カテゴリを作成する|
|/categories/delete|DELETE|カテゴリを削除する|
|/todos/show|GET|全TODOデータを取得する|
|/todos/create|POST|TODOを作成する|
|/todos/edit|PUT|TODOを編集する|
|/todos/delete|DELETE|TODOを編集する|
