#!/usr/bin/env node

const fs = require('fs');
const path = require('path');
const chalk = require('chalk');

// Check if backend .env file exists
const checkBackendEnv = () => {
  const backendEnvPath = path.join(__dirname, '..', 'backend', '.env');
  const backendEnvExamplePath = path.join(__dirname, '..', 'backend', '.env.example');
  
  console.log('Checking backend environment...');
  
  if (!fs.existsSync(backendEnvPath)) {
    console.warn(chalk.yellow('Backend .env file not found!'));
    
    if (fs.existsSync(backendEnvExamplePath)) {
      console.log('Example env file exists. You can copy it using:');
      console.log(chalk.cyan('cd backend && cp .env.example .env'));
    } else {
      console.error(chalk.red('No .env.example file found in backend directory!'));
      return false;
    }
    return false;
  }
  
  console.log(chalk.green('Backend .env file exists.'));
  return true;
};

// Check if frontend .env file exists (if needed)
const checkFrontendEnv = () => {
  const frontendEnvPath = path.join(__dirname, '..', 'frontend', '.env');
  const frontendEnvExamplePath = path.join(__dirname, '..', 'frontend', '.env.example');
  
  console.log('Checking frontend environment...');
  
  // Frontend may not require .env file, so we're just checking existence
  if (fs.existsSync(frontendEnvPath)) {
    console.log(chalk.green('Frontend .env file exists.'));
    return true;
  }
  
  if (fs.existsSync(frontendEnvExamplePath)) {
    console.log('Frontend example env file exists. You may need to copy it:');
    console.log(chalk.cyan('cd frontend && cp .env.example .env'));
  } else {
    console.log('No frontend .env file found. This might be expected.');
  }
  
  return true; // Return true even if not found, as it might be optional
};

// Check if Node.js environment is set
const checkNodeEnv = () => {
  console.log('Checking Node.js environment...');
  
  const nodeEnv = process.env.NODE_ENV || 'development';
  console.log(`Current NODE_ENV: ${nodeEnv}`);
  
  return true;
};

// Run checks
const backendEnvValid = checkBackendEnv();
const frontendEnvValid = checkFrontendEnv();
const nodeEnvValid = checkNodeEnv();

if (!backendEnvValid) {
  console.error(chalk.red('Environment setup incomplete. Please fix the issues before continuing.'));
  process.exit(1);
}

console.log(chalk.green('Environment check completed successfully!'));
process.exit(0); 