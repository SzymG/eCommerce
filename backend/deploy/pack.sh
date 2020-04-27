tar --exclude 'vagrant' --exclude 'node_modules' --exclude 'deploy' --exclude '.git' --exclude '.buildpath' --exclude '.project' --exclude '.settings' --exclude '.gitignore' --exclude '.idea' --exclude 'frontend/web/assets/*' --exclude 'frontend/runtime/logs/*' --exclude 'frontend/runtime/cache/*' --exclude 'frontend/runtime/debug/*' --exclude 'frontend/runtime/mail/*' --exclude 'backend/web/assets/*' --exclude 'backend/runtime/logs/*' --exclude 'backend/runtime/cache/*' --exclude 'backend/runtime/debug/*' --exclude 'backend/runtime/mail/*' --exclude 'console/runtime/logs/*' --exclude 'console/runtime/cache/*' --exclude 'scss' --exclude 'uploads' --exclude '.bowerrc' --exclude 'composer.json' --exclude 'composer.lock' --exclude 'docker-compose.yml' --exclude 'gulpfile.js' --exclude 'init.bat'  --exclude 'LICENSE.md' --exclude 'package.json' --exclude 'package-lock.json' --exclude 'README.md' --exclude 'Vagrantfile' --exclude 'yii.bat' --exclude 'yii_test.bat' --directory '..' -zcvf $1.tar.gz . --xform s:'./'::

