#!/bin/bash

sed_name()
{
    cat $1 | sed -e "s/mvc_frame/$2/g" > $1.new && mv $1.new $1
}

if [ ! -n "$1" ] ;then
    echo "Usage: $0 <name>"
    exit
fi

ROOT_DIR="$(cd "$(dirname $0)" && pwd)"/../../

mv $ROOT_DIR/project/config/development/nginx/mvc_frame.conf $ROOT_DIR/project/config/development/nginx/$1.conf
mv $ROOT_DIR/project/config/development/supervisor/mvc_frame_queue_worker.conf $ROOT_DIR/project/config/development/supervisor/$1_queue_worker.conf
mv $ROOT_DIR/project/config/production/nginx/mvc_frame.conf $ROOT_DIR/project/config/production/nginx/$1.conf
mv $ROOT_DIR/project/config/production/supervisor/mvc_frame_queue_worker.conf $ROOT_DIR/project/config/production/supervisor/$1_queue_worker.conf

sed_name $ROOT_DIR/project/config/development/nginx/$1.conf $1
sed_name $ROOT_DIR/project/config/development/supervisor/$1_queue_worker.conf $1
sed_name $ROOT_DIR/project/config/production/nginx/$1.conf $1
sed_name $ROOT_DIR/project/config/production/supervisor/$1_queue_worker.conf $1
sed_name $ROOT_DIR/project/tool/start_development_server.sh $1
sed_name $ROOT_DIR/project/tool/production/after_push.sh $1
sed_name $ROOT_DIR/project/tool/production/check_update.sh $1
