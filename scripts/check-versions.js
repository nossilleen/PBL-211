#!/usr/bin/env node

const chalk = require('chalk');

// Define minimum versions
const MIN_NODE_VERSION = '14.0.0';
const MIN_NPM_VERSION = '6.0.0';

// Get current versions
const nodeVersion = process.versions.node;
const npmVersion = require('child_process')
  .execSync('npm -v')
  .toString()
  .trim();

// Check Node.js version
const checkNodeVersion = () => {
  console.log('Checking Node.js version...');
  console.log(`Current Node.js version: ${nodeVersion}`);
  console.log(`Required Node.js version: >= ${MIN_NODE_VERSION}`);
  
  const currentParts = nodeVersion.split('.').map(Number);
  const minParts = MIN_NODE_VERSION.split('.').map(Number);
  
  for (let i = 0; i < 3; i++) {
    if (currentParts[i] > minParts[i]) return true;
    if (currentParts[i] < minParts[i]) {
      console.error(chalk.red(`Node.js version ${nodeVersion} is not supported. Required: >= ${MIN_NODE_VERSION}`));
      return false;
    }
  }
  
  return true;
};

// Check npm version
const checkNpmVersion = () => {
  console.log('Checking npm version...');
  console.log(`Current npm version: ${npmVersion}`);
  console.log(`Required npm version: >= ${MIN_NPM_VERSION}`);
  
  const currentParts = npmVersion.split('.').map(Number);
  const minParts = MIN_NPM_VERSION.split('.').map(Number);
  
  for (let i = 0; i < 3; i++) {
    if (currentParts[i] > minParts[i]) return true;
    if (currentParts[i] < minParts[i]) {
      console.error(chalk.red(`npm version ${npmVersion} is not supported. Required: >= ${MIN_NPM_VERSION}`));
      return false;
    }
  }
  
  return true;
};

// Run checks
const nodeVersionValid = checkNodeVersion();
const npmVersionValid = checkNpmVersion();

if (!nodeVersionValid || !npmVersionValid) {
  console.error(chalk.red('Please update your tools before continuing.'));
  process.exit(1);
}

console.log(chalk.green('All version requirements satisfied!'));
process.exit(0); 