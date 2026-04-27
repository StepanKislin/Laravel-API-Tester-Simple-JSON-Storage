<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel API Project') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /*! Tailwind CSS v4.0 (минимизированный сброс) */
                :root {
                    --bg: #FDFDFC; --bg-dark: #0a0a0a;
                    --text: #1b1b18; --text-dark: #EDEDEC;
                    --accent: #f53003; --accent-dark: #FF4433;
                    --border: #e3e3e0; --border-dark: #3E3E3A;
                }
                @media (prefers-color-scheme: dark) {
                    :root { --bg: var(--bg-dark); --text: var(--text-dark); --border: var(--border-dark); }
                }
                * { box-sizing: border-box; margin: 0; padding: 0; }
                body {
                    font-family: 'Instrument Sans', system-ui, sans-serif;
                    background: var(--bg); color: var(--text);
                    display: flex; align-items: center; justify-content: center;
                    min-height: 100vh; padding: 2rem; line-height: 1.5;
                }
                .card {
                    background: #fff; border: 1px solid var(--border);
                    border-radius: 1rem; padding: 2.5rem; max-width: 600px; width: 100%;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
                    text-align: center; transition: transform 0.2s;
                }
                .card:hover { transform: translateY(-2px); }
                @media (prefers-color-scheme: dark) {
                    .card { background: #161615; border-color: var(--border-dark); box-shadow: 0 4px 20px rgba(0,0,0,0.4); }
                }
                h1 { font-size: 1.8rem; font-weight: 600; margin-bottom: 1rem; }
                p { color: #706f6c; margin-bottom: 2rem; font-size: 1.05rem; }
                @media (prefers-color-scheme: dark) { p { color: #A1A09A; } }
                
                .btn {
                    display: inline-flex; align-items: center; gap: 0.5rem;
                    background: var(--text); color: var(--bg);
                    padding: 0.75rem 1.5rem; border-radius: 0.5rem;
                    text-decoration: none; font-weight: 500; font-size: 1rem;
                    transition: opacity 0.2s, transform 0.2s; border: 1px solid transparent;
                }
                .btn:hover { opacity: 0.9; transform: translateY(-1px); }
                .btn-outline {
                    background: transparent; color: var(--text);
                    border-color: var(--border);
                }
                .btn-outline:hover { border-color: var(--text); }
                @media (prefers-color-scheme: dark) {
                    .btn { background: var(--text-dark); color: var(--bg-dark); }
                    .btn-outline { color: var(--text-dark); border-color: var(--border-dark); }
                    .btn-outline:hover { border-color: var(--text-dark); }
                }
                
                .logo { width: 80px; height: 80px; margin: 0 auto 1.5rem; display: block; }
                .logo path { fill: var(--accent); }
                @media (prefers-color-scheme: dark) { .logo path { fill: var(--accent-dark); } }
                
                .footer { margin-top: 2rem; font-size: 0.85rem; color: #999; }
                .code { 
                    background: rgba(0,0,0,0.05); padding: 0.2rem 0.4rem; 
                    border-radius: 4px; font-family: monospace; font-size: 0.9em; 
                }
                @media (prefers-color-scheme: dark) { .code { background: rgba(255,255,255,0.1); } }
            </style>
        @endif
    </head>
    <body>
        <main class="card">
            <!-- Laravel Logo SVG -->
           

            <!-- Приветствие -->
            <h1>👋 Привет, {{ Auth::check() ? Auth::user()->name : 'Разработчик' }}!</h1>
            
            <p>
                Ваш Laravel API сервер успешно запущен.<br>
                Перейдите в тестер для отправки запросов.
            </p>

            <!-- Кнопка перехода -->
            <a href="http://127.0.0.1:8000/api-test.html" class="btn" target="_blank" rel="noopener noreferrer">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                </svg>
                Открыть API Tester
            </a>

            <!-- Доп. ссылки -->
            <div style="margin-top: 1.5rem; display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <a href="https://laravel.com/docs" target="_blank" class="btn btn-outline">📚 Документация</a>
                <a href="http://127.0.0.1:8000/api/test" target="_blank" class="btn btn-outline">🔌 API Health Check</a>
            </div>

            <!-- Футер -->
            <div class="footer">
                <p>
                    Текущее окружение: <span class="code">{{ app()->environment() }}</span><br>
                    PHP версия: <span class="code">{{ phpversion() }}</span>
                </p>
                <p style="margin-top: 1rem;">
                    <small>
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} 
                        (PHP v{{ PHP_VERSION }})
                    </small>
                </p>
            </div>
        </main>
    </body>
</html>