# arguments: 1 = name of .tar.gz file (part before extension), 2 = environment symbol
# warning: script should be located in public_html (or similar; directory for application) while archived app on previous level (before public_html or similar)
find . ! \( -path ./uploads -prune -o -path ./unpack.sh \) | xargs /bin/rm -rf
tar xvfz ../$1.tar.gz -C ./
rm ../$1.tar.gz
chmod g-w frontend/web/index.php
chmod g-w frontend/web
chmod g-w frontend
chmod g-w backend/web/index.php
chmod g-w backend/web
chmod g-w backend
php init --env=$2 --overwrite=All
php yii rbac/update
php yii migrate --migrationPath=@console/migrations --interactive=0
chmod 0777 frontend/runtime/logs
chmod 0777 backend/runtime/logs
chmod 0777 console/runtime/logs
chmod 0777 common/rbac/assignments.php
chmod 0777 vendor/kartik-v/mpdf/ttfontdata