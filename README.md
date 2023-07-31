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
  | カラム名 | 型      | 備考     |
  | -------- | ------- | -------- |
  | id       | Integer | PK       |
  | name     | String  | NOT NULL |
  | password | String  | NOT NULL |
- categories
  | カラム名 | 型      | 備考             |
  | -------- | ------- | ---------------- |
  | id       | Integer | PK               |
  | user_id  | Integer | FK(app_users.id) |
  | category | String  | NOT NULL         |
- todos
  | カラム名     | 型       | 備考                      |
  | ------------ | -------- | ------------------------- |
  | id           | Integer  | PK                        |
  | user_id      | Integer  | FK(app_users.id)          |
  | category_id  | Integer  | FK(categories.id)         |
  | todo         | Text     | NOT NULL                  |
  | limit_date   | datetime | NULLABLE                  |
  | is_completed | Boolean  | True:完了<br>False:未完了 |
  | created_at   | datetime | NOT NULL                  |
  | updated_at   | datetime | NOT NULL                  |

## API
| URL                      | メソッド | 機能                       |
| ------------------------ | -------- | -------------------------- |
| /register                | POST     | ユーザー登録               |
| /login                   | POST     | ログイン                   |
| /users                   | GET      | 全ユーザーデータを取得     |
| /categories/{userId}     | GET      | ユーザー毎のカテゴリを取得 |
| /categories/create       | POST     | カテゴリを作成             |
| /categories/delete       | DELETE   | カテゴリを削除             |
| /todos                   | GET      | 全TODOを取得               |
| /todos/{userId}          | GET      | ユーザー毎のTODOを取得     |
| /todos/show/{categoryId} | GET      | カテゴリ毎のTODOを取得     |
| /todos/create            | POST     | TODOを作成                 |
| /todos/update/{todoId}   | PUT      | TODOを編集                 |
| /todos/delete/{todoId}   | DELETE   | TODOを編集                 |
