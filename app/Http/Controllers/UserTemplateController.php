<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Получаем все категории и группируем их по коду страны
        $categoriesByCountry = Category::all()->groupBy('country_code');

        // Получаем список стран, для которых есть категории
        $countries = $categoriesByCountry->keys();

        // Передаем обе переменные в вид
        return view('my-templates.create', compact('categoriesByCountry', 'countries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'country_code'  => 'required|string|exists:categories,country_code', // Проверяем, что такая страна есть
            'category_id'   => 'required|integer|exists:categories,id', // Проверяем, что такая категория есть
            'fields'        => 'required|json',
            'layout'        => 'required|string',
        ]);

        $fieldsArray = json_decode($validated['fields'], true);
        if (empty($fieldsArray)) {
            return back()->withErrors(['fields' => 'Нужно добавить хотя бы одно поле.'])->withInput();
        }

        // Сохраняем шаблон с новыми полями
        Auth::user()->userTemplates()->create([
            'name'          => $validated['name'],
            'country_code'  => $validated['country_code'],
            'category_id'   => $validated['category_id'],
            'fields'        => $fieldsArray,
            'layout'        => $validated['layout'],
        ]);

        // Редирект можно сделать на список своих шаблонов (когда он появится)
        return redirect()->route('profile.show', app()->getLocale())->with('success', 'Шаблон успешно создан!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
