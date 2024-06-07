<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Filters\ArtifactFilter;
use App\Filters\ArtifactFilters;
use Illuminate\Http\Request;
use App\Models\Artifact;
use App\Models\Groups;
use App\Models\Departments;
use App\Models\Collections;
use Dompdf\Dompdf;
use Dompdf\Options;

class ArtifactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArtifactFilter $request)
    {
        $artifact = Artifact::filter($request)->orderByDesc('created_at')->paginate(10);
        $groups = Groups::all();
        $departments = Departments::all();
        $collections = Collections::all();

        return view('admin.artifact.index', [
            'artifact' => $artifact,
            'groups' => $groups,
            'departments' => $departments,
            'collections' => $collections,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groups = Groups::all();
        $departments = Departments::all();
        $collections = Collections::all();
        return view('admin.artifact.create', compact('groups','departments', 'collections'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string'], 
            'inv_number' => ['required'],
            'date_arrival' => ['required', 'date'], 
            'number_arrival' => ['required'],
            'department_id' => ['required'],
            'description' => ['nullable'],
            'history' => ['nullable'],
            'img' => ['nullable'],
            'model' => ['nullable'],
            'document' => ['nullable'],
            'place_found' => ['nullable'],
            'who_found' => ['nullable'],
            'receipt_document' => ['nullable'],
            'material' => ['nullable'],
            'technology' => ['nullable'],
            'height' => ['nullable'],
            'width' => ['nullable'],
            'length' => ['nullable'],
            'weight' => ['nullable'],
            'state' => ['nullable'],
            'storage_loc' => ['nullable'],
            'group_id' => ['nullable'],
            'collections_id' => ['nullable'],
        ]);

        if ($request->input('publish') && !$request->filled('img')) {
            return redirect()->back()->with('error', "Додайте зображення перед публікацією експонату");
        } 
        
        $artifact = new Artifact();
        $artifact->title = $validatedData['title'];
        $artifact->inv_number = $validatedData['inv_number'];
        $artifact->date_arrival = $validatedData['date_arrival'];
        $artifact->number_arrival = $validatedData['number_arrival'];
        $artifact->department_id = $validatedData['department_id'];
        $artifact->description = $validatedData['description'];
        $artifact->history = $validatedData['history'];
        $artifact->img = $validatedData['img'];
        $artifact->model = $validatedData['model'];
        $artifact->document = $validatedData['document'];
        $artifact->place_found = $validatedData['place_found'];
        $artifact->who_found = $validatedData['who_found'];
        $artifact->receipt_document = $validatedData['receipt_document'];
        $artifact->material = $validatedData['material'];
        $artifact->technology = $validatedData['technology'];
        $artifact->size = $validatedData['height'] . 'x' . $validatedData['width'] . 'x' . $validatedData['length'];
        $artifact->weight = $validatedData['weight'];
        $artifact->state = $validatedData['state'];
        $artifact->storage_loc = $validatedData['storage_loc'];
        $artifact->publish = $request->has('publish'); 
        $artifact->group_id = $validatedData['group_id'];
        $artifact->collections_id = $validatedData['collections_id'];

        $artifact->save();

        return redirect()->back()->with('success', "Експонат був успішно доданий!"); 
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
    public function edit(Artifact $artifact)
    {
        $groups = Groups::all(); // Отримати дані про групи
        $departments = Departments::all(); // Отримати дані про групи
        $collections = Collections::all(); // Отримати дані про групи

        $selectedGroupId = $artifact->group_id; // Отримати ідентифікатор групи, до якої відноситься артефакт
        $selectedDepartmentId = $artifact->department_id; // Отримати ідентифікатор групи, до якої відноситься артефакт
        $selectedCollectionId = $artifact->collections_id;

        return view('admin.artifact.edit', [
            'artifact' => $artifact,
            'groups' => $groups, // Передати дані про групи у шаблон
            'selectedGroupId' => $selectedGroupId, // Передати ідентифікатор вибраної групи у шаблон

            'departments' => $departments, // Передати дані про групи у шаблон
            'selectedDepartmentId' => $selectedDepartmentId, // Передати ідентифікатор вибраної групи у шаблон

            'collections' => $collections, // Передати дані про групи у шаблон
            'selectedCollectionId' => $selectedCollectionId,
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artifact $artifact)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string'], 
            'inv_number' => ['required'],
            'date_arrival' => ['required', 'date'], 
            'number_arrival' => ['required'],
            'department_id' => ['required'],
            'description' => ['nullable'],
            'history' => ['nullable'],
            'img' => ['nullable'],
            'model' => ['nullable'],
            'document' => ['nullable'],
            'place_found' => ['nullable'],
            'who_found' => ['nullable'],
            'receipt_document' => ['nullable'],
            'material' => ['nullable'],
            'technology' => ['nullable'],
            'height' => ['nullable'],
            'width' => ['nullable'],
            'length' => ['nullable'],
            'weight' => ['nullable'],
            'state' => ['nullable'],
            'storage_loc' => ['nullable'],
            'group_id' => ['nullable'],
            'collections_id' => ['nullable'],
        ]);

        if ($request->input('publish') && !$request->filled('img')) {
            return redirect()->back()->with('error', "Додайте зображення перед публікацією експонату");
        }         
        

        $artifact->title = $validatedData['title'];
        $artifact->inv_number = $validatedData['inv_number'];
        $artifact->date_arrival = $validatedData['date_arrival'];
        $artifact->number_arrival = $validatedData['number_arrival'];
        $artifact->department_id = $validatedData['department_id'];
        $artifact->description = $validatedData['description'];
        $artifact->history = $validatedData['history'];
        $artifact->img = $validatedData['img'];
        $artifact->model = $validatedData['model'];
        $artifact->document = $validatedData['document'];
        $artifact->place_found = $validatedData['place_found'];
        $artifact->who_found = $validatedData['who_found'];
        $artifact->receipt_document = $validatedData['receipt_document'];
        $artifact->material = $validatedData['material'];
        $artifact->technology = $validatedData['technology'];
        $artifact->size = $validatedData['height'] . 'x' . $validatedData['width'] . 'x' . $validatedData['length'];
        $artifact->weight = $validatedData['weight'];
        $artifact->state = $validatedData['state'];
        $artifact->storage_loc = $validatedData['storage_loc'];
        $artifact->publish = $request->has('publish'); 
        $artifact->group_id = $validatedData['group_id'];
        $artifact->collections_id = $validatedData['collections_id'];

        $artifact->save();
    
        return redirect()->back()->with('success', "Експонат був успішно оновлений!"); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artifact $artifact)
    {
        $artifact->delete();

        return redirect()->back()->with('success', 'Експонат був успішно видалений');
    }


    public function generatePdf($id)
    {
        // Отримайте експонат за допомогою його ідентифікатора
        $artifact = Artifact::find($id);
    
        // Створіть новий Dompdf об'єкт
        $dompdf = new Dompdf();
    
        // Опції для Dompdf (необов'язково)
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true); // Використовуйте сучасний HTML5 парсер
        $options->set('isPhpEnabled', true); // Включіть виконання PHP в документі
    
        // Встановіть опції
        $dompdf->setOptions($options);
    
        // Отримайте повний шлях до зображення
        $imagePath = public_path($artifact->img);
    
        // Перевірте, чи існує зображення та чи воно доступне для читання
        if (file_exists($imagePath)) {
            // Завантажте HTML для генерації PDF
            $html = view('admin.pdf.artifact', compact('artifact', 'imagePath'))->render();
    
            // Завантажте HTML у Dompdf
            $dompdf->loadHtml($html);
    
            // Виконайте обробку HTML до PDF
            $dompdf->render();
    
            // Отримайте згенерований PDF в строку
            $pdfContent = $dompdf->output();
    
            // Збережіть згенерований PDF-файл у папці public/files/docs
            $pdfFileName = "{$artifact->title}.pdf";
            $pdfFilePath = public_path("files/docs/{$pdfFileName}");
            file_put_contents($pdfFilePath, $pdfContent);
    
            // Відправте згенерований PDF у відповідь
            return $dompdf->stream($pdfFileName);
        } else {
            // Якщо зображення не існує або недоступне, поверніть помилку або виконайте інші необхідні дії
            return "Image not found or inaccessible.";
        }
    }
    


}
