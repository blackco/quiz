#!/bin/bash
# Deploying quiz

echo 'Hello World';

export FROM=/Users/blackco/Documents/java/src/quiz
export TO=/Users/blackco/Temp2/angular-seed

cp ${FROM}/web/app/view1/* ${TO}/app/view1
cp ${FROM}/web/app/view2/* ${TO}/app/view2
cp ${FROM}/web/app/scores/* ${TO}/app/scores
cp ${FROM}/web/app/games/* ${TO}/app/games
cp ${FROM}/web/app/index.html ${TO}/app
cp ${FROM}/web/app/app.js ${TO}/app

echo '${FROM} = ' ${FROM}

