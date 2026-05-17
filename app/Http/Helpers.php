<?php

//return file uploaded via uploader
/*if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        if (($asset = \App\Media::find($id)) != null) {
            return my_asset($asset->file_url);
        }
        return null;
    }
}*/

/*if (! function_exists('my_asset')) {
    function my_asset($path, $secure = null)
    {
        if(env('FILESYSTEM_DRIVER') == 's3'){
            return Storage::disk('s3')->url($path);
        }
        else {
            return app('url')->asset($path, $secure);
        }
    }
}*/

/*if (! function_exists('static_asset')) {
    function static_asset($path, $secure = null)
    {
        return app('url')->asset($path, $secure);
    }
}*/

if (! function_exists('format_title')) {
    /**
     * Format title: English → ucfirst, Bengali → 그대로
     * @param string $title
     * @return string
     */
    function format_title(string $title): string
    {
        // Check if first character is English letter
        if (preg_match('/^[a-zA-Z]/u', $title)) {
            return ucfirst($title); // English → first letter capital
        }

        // Otherwise return original (Bangla or other)
        return mb_convert_case($title, MB_CASE_TITLE, "UTF-8");
    }
}

if (! function_exists('uploadFile')) {
    function uploadFile($file, $width = null, $height = null, $subPath = null)
    {
        if (! $file) {
            return null;
        }

        // 📁 Folder
        $baseFolder = 'uploads';
        $folder = $subPath
            ? $baseFolder . '/' . trim($subPath, '/')
            : $baseFolder;

        $destinationPath = public_path($folder);

        if (! file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // 🆔 File info
        $uniq_id = uniqid();
        $org_file_name = pathinfo(
            $file->getClientOriginalName(),
            PATHINFO_FILENAME
        );

        // 📄 Filename (WEBP always)
        $suffix = ($width && $height) ? "_{$width}x{$height}" : '';
        $file_name = $uniq_id . $suffix . '.webp';

        // 🖼 Image processing
        $img = \Intervention\Image\Facades\Image::make($file->getRealPath());

        // 🔁 Resize ONLY if width & height provided
        if ($width && $height) {
            $img->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // 🔥 Convert to WEBP (size reduce)
        $img->encode('webp', 80)
            ->save($destinationPath . '/' . $file_name);

        // 🌐 URL
        $url = $folder . '/' . $file_name;

        // 💾 DB Save
        $media = \App\Media::create([
            'type' => 1,
            'file_original_name' => $org_file_name,
            'file_url' => $url,
            'user_id' => \Auth::guard('admin')->check()
                ? \Auth::guard('admin')->user()->id
                : (\Auth::guard('manager')->check() ? \Auth::guard('manager')->user()->id : null),
        ]);

        return $media->id;
    }
}
