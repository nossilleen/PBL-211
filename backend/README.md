# EcoZense Backend

Backend API for EcoZense - Eco Enzyme Marketplace

## Requirements

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & NPM

## Setup

1. Install PHP dependencies:
```bash
composer install
```

2. Copy .env.example to .env and configure:
```bash
cp .env.example .env
```

3. Generate application key:
```bash
php artisan key:generate
```

4. Run migrations:
```bash
php artisan migrate
```

5. Start development server:
```bash
php artisan serve
```

## Project Structure

```
app/
├── Console/         # Console commands
├── Http/           # Controllers, Middleware, Requests
├── Models/         # Eloquent models
├── Providers/      # Service providers
└── Services/       # Business logic services

config/             # Configuration files
database/           # Migrations, seeds, factories
routes/             # API routes
tests/              # Test files
```

## API Documentation

API documentation is available at `/api/documentation` when running the application.

## Development Guidelines

1. Follow Laravel coding standards
2. Write tests for new features
3. Use proper naming conventions
4. Keep controllers thin
5. Add comments for complex logic
6. Use proper validation
7. Follow RESTful API design principles 