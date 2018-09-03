# php7-practice-1

## ライブラリインストール

```bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    composer:1.7.2 install
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
