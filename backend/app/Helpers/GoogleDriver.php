<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GoogleDriver
{
    public static function upload($image)
    {
        if (is_array($image)) {
            $urls = [];
            $names = [];
            foreach ($image as $item) {
                $imageName = Str::random(32) . '.' . $item->getClientOriginalExtension();
                Storage::disk('google')->put($imageName, file_get_contents($item));
                $urls[] = Storage::disk('google')->url($imageName);
                $names[] = Storage::disk('google')->path($imageName);
            }
            return [
                'urls' => $urls,
                'names' => $names
            ];
        }
        $imageName = Str::random(32) . '.' . $image->getClientOriginalExtension();
        Storage::disk('google')->put($imageName, file_get_contents($image));
        $url = Storage::disk('google')->url($imageName);
        $name = Storage::disk('google')->path($imageName);
        return [
            'url' => $url,
            'name' => $name
        ];
    }

    public static function delete($image)
    {
        if($image) {
            Storage::disk('google')->delete($image);
        }
    }
}
