<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Путь к файлу хранилища
     */
    private function getStoragePath(): string
    {
        return 'users.json'; // storage/app/users.json
    }

    /**
     * Загрузить данные из файла
     */
    private function loadUsers(): array
    {
        $path = $this->getStoragePath();
        
        if (!Storage::exists($path)) {
            return [];
        }
        
        $content = Storage::get($path);
        $data = json_decode($content, true);
        
        return is_array($data) ? $data : [];
    }

    /**
     * Сохранить данные в файл
     */
    private function saveUsers(array $users): void
    {
        Storage::put($this->getStoragePath(), json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    /**
     * GET /api/users - Получить всех пользователей
     */
    public function index(): JsonResponse
    {
        $users = $this->loadUsers();
        
        return response()->json([
            'success' => true,
            'data' => array_values($users),
            'count' => count($users)
        ], 200);
    }

    /**
     * POST /api/users - Создать нового пользователя
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'score' => 'nullable|integer|min:0|max:100',
            'tags'  => 'nullable|array',
            'tags.*'=> 'string',
            'active'=> 'nullable|boolean',
        ]);

        // Загружаем текущих пользователей
        $users = $this->loadUsers();
        
        // Генерируем уникальный ID
        $validated['id'] = uniqid('user_');
        $validated['created_at'] = now()->toISOString();
        
        // Добавляем в массив
        $users[$validated['id']] = $validated;
        
        // Сохраняем обратно в файл
        $this->saveUsers($users);

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $validated
        ], 201);
    }

    /**
     * DELETE /api/users - Удалить всех пользователей
     */
    public function destroy(): JsonResponse
    {
        $users = $this->loadUsers();
        $count = count($users);
        
        // Удаляем файл или записываем пустой массив
        $this->saveUsers([]);
        
        return response()->json([
            'success' => true,
            'message' => "Deleted $count users",
            'count' => 0
        ], 200);
    }
}