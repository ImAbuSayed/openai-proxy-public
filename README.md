# OpenAI Region Bypass Proxy

![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)
![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-purple.svg)

A secure and efficient proxy service for OpenAI's API, designed to bypass regional restrictions while maintaining high performance and security. Built with Laravel 11 and featuring a modern Filament admin dashboard.

## 🌟 Features

- **Multi-Endpoint Support**
  - Chat Completion API
  - Text-to-Speech (TTS) API
  - Speech-to-Text (Whisper) API
- **Secure Authentication**
  - API key management
  - Request validation
- **Modern Admin Dashboard**
  - Built with Filament
  - API key management interface
  - Usage statistics
- **Comprehensive Logging**
  - Request tracking
  - Error logging
  - Usage monitoring

## 🚀 Quick Start

### Prerequisites

- PHP 8.2+
- Composer
- MySQL/PostgreSQL
- OpenAI API Key

### Installation

1. Clone the repository:

```bash
git clone https://github.com/ImAbuSayed/openai-region-bypass-proxy.git
```

2. Install dependencies:

```bash
composer install
```

3. Copy environment file:

```bash
cp .env.example .env
```

4. Configure your environment variables:

```env
APP_URL=your-domain.com
OPENAI_API_KEY=your-openai-api-key
```

5. Generate application key:

```bash
php artisan key:generate
```

6. Run migrations:

```bash
php artisan migrate
```

7. Create your first admin user:

```bash
php artisan make:filament-user
```

## 📚 Documentation

Comprehensive documentation is available in the admin dashboard under the Documentation section. API endpoints include:

- `/api/openai-proxy/chat` - Chat Completion API
- `/api/openai-proxy/speech` - Text-to-Speech API
- `/api/openai-proxy/transcription` - Speech-to-Text API

## 🔒 Security

- Request validation
- API key authentication
- Rate limiting
- Request logging

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🏷️ Keywords

openai, api-proxy, laravel, filament, text-to-speech, speech-to-text, chat-completion, region-bypass, whisper-api, gpt

## 🔗 Links

- [Documentation](https://your-domain.com/admin/documentation)
- [Issue Tracker](https://github.com/yourusername/openai-region-bypass-proxy/issues)
- [Laravel](https://laravel.com)
- [Filament](https://filamentphp.com)
- [OpenAI API](https://platform.openai.com/docs/api-reference)
