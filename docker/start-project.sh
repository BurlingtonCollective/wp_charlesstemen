#!/usr/bin/env bash
npm install
node_modules/.bin/bower install --allow-root
node_modules/.bin/grunt

apache2-foreground