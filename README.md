# php7-practice-1

## ライブラリ


### 準備

```bash
docker build -t composer ./docker/composer
```

### インストール

```bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    composer install
```

### 追加

```bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    composer require php:^7.2
```

### アップデート

```bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    composer update
```

## DB マイグレート

### 初期化

```bash
docker build -t phinx ./docker/phinx
```

```bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    -w /app \
    phinx vendor/bin/phinx init
```

### マイグレーションファイル作成

```bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    -w /app \
    phinx vendor/bin/phinx create CreateUserTable
```

### マイグレーション実行

```bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    --net php7-practice-1_default \
    -w /app \
    phinx vendor/bin/phinx migrate -e development
```
