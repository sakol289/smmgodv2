@echo off
cd /d "C:\Users\cybersafe\Downloads\GlowPerfectPanel\web"

echo Adding files to git...
git add .

echo Creating commit...
git commit -m "Initial commit"

echo Pushing to origin/main...
git push -u origin main
