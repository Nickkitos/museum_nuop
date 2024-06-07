<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Інвентарна картка експоната: {{ $artifact['title'] }}</title>
    <style>
         body { font-family: DejaVu Sans }
        h1 {
            text-align: center;
            font-size: 22px;
        }
        .block_1 {
            display: table;
            width: 100%;
        }
        .block_1 > div {
            display: table-cell;
            vertical-align: top;
        }
        img {
            width: 400px;
        }
    </style>
</head>
<body>
    <h1>Національний університет "Одеська політехніка"</h1>
    <hr>
    <h1>Інвентарна картка експоната: {{ $artifact['title'] }}</h1><br>
    <div class="block_1">
        <div> <!-- Змініть ширину за потребою -->
            <p><strong>Назва:</strong> {{ $artifact['title'] }}</p>
            <p><strong>Дата надходження:</strong> {{ $artifact['date_arrival'] }}</p>
            <p><strong>№ за книгою надходжень:</strong> {{ $artifact['number_arrival'] }}</p>
            <p><strong>Інвентарний №:</strong> {{ $artifact['inv_number'] }}</p>
            <p><strong>Група:</strong> {{ \App\Models\Groups::find($artifact['group_id'])->name }}</p>
            <p><strong>Відділ:</strong> {{ \App\Models\Departments::find($artifact['department_id'])->name }}</p>
        </div>
        <div class="image">
            <?php if (!empty($artifact['img'])): ?>
            <img src="data:image/png;base64,<?= base64_encode(file_get_contents($artifact['img'])) ?>" alt="">
            <?php endif; ?>        
        </div>
    </div>
    <div>
        <p><strong>Опис:</strong> {!! $artifact['description'] !!}</p>
        <p><strong>Історія предмета:</strong> {!! $artifact['history'] !!}</p>
    </div>
    <div>
        <p><strong>Де знайдено (адреса):</strong> {{ $artifact['place_found'] }}</p>
        <p><strong>Від кого надійшов предмет:</strong> {{ $artifact['who_found'] }}</p>
        <p><strong>Документ надходження:</strong> {{ $artifact['receipt_document'] }}</p>
    </div>
    <div>
        <p><strong>Матеріал:</strong> {{ $artifact['material'] }}</p>
        <p><strong>Техніка виготовлення:</strong> {{ $artifact['technology'] }}</p>
        <p><strong>Розмір (см):</strong> {{ $artifact['size'] }}</p>
        <p><strong>Вага (кг):</strong> {{ $artifact['weight'] }}</p>
    </div>
    <div>
        <p><strong>Стан експонату:</strong> {!! $artifact['state'] !!}</p>
        <p><strong>Місце зберігання:</strong> {!! $artifact['storage_loc'] !!}</p>
    </div>
</body>
</html>
