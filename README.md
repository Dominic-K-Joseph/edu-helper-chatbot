# EduHelperAgent

An educational AI chatbot built with Laravel and LarAgent.  
The chatbot helps students learn basic educational topics like:

- Solar System
- Fractions
- Water Cycle

The application includes session-based chat history, topic restriction, validation, reset functionality, and a clean chatbot UI.

---

# Features

- Educational chatbot interface
- Session-based chat history
- Topic-based response restriction
- Greeting support (`hi`, `hello`)
- Input validation
- Reset chat functionality
- Toast validation messages
- Auto-scroll chat behavior
- Responsive UI design
- Basic typing indicator simulation

---

# Technologies Used

- PHP 8.3
- Laravel
- LarAgent
- Blade Template Engine
- HTML
- CSS
- JavaScript

---

# Supported Topics

The chatbot currently supports:

- Solar System
- Fractions
- Water Cycle

Any unrelated topic will return a restriction message.

---

# Installation

## 1. Navigate to Project

```bash
cd edu-helper
```

---

## 2. Install Dependencies

```bash
composer install
```

---

## 3. Configure Environment

Copy `.env.example` to `.env`

```bash
cp .env.example .env
```

---

## 4. Generate Application Key

```bash
php artisan key:generate
```

---

## 5. Configure OpenAI Placeholder

Add in `.env`

```env
OPENAI_API_KEY=dummy_key
```

---

## 6. Start Development Server

```bash
php artisan serve
```

---

# Project Structure

```text
    app
    ↓
    Http
    ↓
    Controllers
    ↓
    ChatController.php

    ------

    resources
    ↓
    views
    ↓
    chat.blade.php

    -------

    public
    ↓
    css
    ↓
    chat.css
```
---

# Validation

The chatbot validates:

- Empty messages
- Maximum character limit
- String input

---

# Chat Flow

1. Student sends message
2. Message stored in session
3. Topic validation occurs
4. Bot generates educational response
5. Chat history displayed in UI

---

# Reset Functionality

The reset button clears session-based chat history.

---

# Notes

- Chat history is stored using Laravel sessions
- Current AI responses are educational mock responses
- Application structure is prepared for real LLM integration

---

# Future Improvements

- Real OpenAI API integration
- AJAX-based real-time chat
- Database chat persistence
- User authentication
- Multi-topic AI support

---

# Author

Dominic K Joseph