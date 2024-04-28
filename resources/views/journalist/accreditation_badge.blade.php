<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accreditation Badge</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="min-h-screen bg-gray-100 flex items-center justify-center">
        <div class="max-w-sm w-full bg-white shadow-lg rounded-lg p-6">
            <div class="flex justify-center items-center">
                <div class="text-center">
                    <div class="text-lg font-semibold">Accreditation Badge</div>
                     <div class="text-sm text-gray-600 mt-2">Issued to:</div>
                    <div class="text-xl text-gray-800">{{ $badge->user->name }}</div>
                    <div class="text-sm text-gray-600 mt-2">Media Platform:</div>
                    <div class="text-md text-gray-800">{{ $badge->mediaPlatform->name }}</div>
                    <div class="mt-4">
                        <img src="{{ asset('storage/badges/barcode.png') }}" alt="Barcode" class="mx-auto" /> <!-- Example: Barcode image -->
                    </div>
                    <div class="mt-4">
                        <p class="text-xs text-gray-600">This badge is valid until: {{ $badge->valid_until->format('M d, Y') }}</p>
                        <p class="text-xs text-gray-600">Badge ID: {{ $badge->id }}</p>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>
