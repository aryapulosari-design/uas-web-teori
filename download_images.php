<?php
$images = [
    'ai.jpg' => 'https://picsum.photos/seed/ai/800/600',
    'edu.jpg' => 'https://picsum.photos/seed/edu/800/600',
    'health.jpg' => 'https://picsum.photos/seed/health/800/600',
    'tech.jpg' => 'https://picsum.photos/seed/tech/800/600',
    'nature.jpg' => 'https://picsum.photos/seed/nature/800/600',
    'coding.jpg' => 'https://picsum.photos/seed/coding/800/600',
    'morning.jpg' => 'https://picsum.photos/seed/morning/800/600',
    'avatar1.jpg' => 'https://i.pravatar.cc/150?u=a',
    'avatar2.jpg' => 'https://i.pravatar.cc/150?u=b',
];

$gambarDir = __DIR__ . '/storage/app/public/gambar';
$fotoDir = __DIR__ . '/storage/app/public/foto';

if (!is_dir($gambarDir)) mkdir($gambarDir, 0777, true);
if (!is_dir($fotoDir)) mkdir($fotoDir, 0777, true);

$options = [
    "http" => [
        "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36\r\n"
    ]
];
$context = stream_context_create($options);

foreach ($images as $name => $url) {
    echo "Downloading $name...\n";
    $content = file_get_contents($url, false, $context);
    if (str_starts_with($name, 'avatar')) {
        file_put_contents($fotoDir . '/' . $name, $content);
    } else {
        file_put_contents($gambarDir . '/' . $name, $content);
    }
}
echo "Done.\n";
